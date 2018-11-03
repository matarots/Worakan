<?php
	session_start();

	error_reporting(~E_NOTICE);
  if($_SESSION['Member_ID'] == "")
  {

      echo "<body onload=\"window.alert('Please Login!');\">";
      echo '<meta http-equiv="refresh" content="0; url=index.php" >';
      exit;

  }

  if($_SESSION['Member_Type'] != "us")
  {

    echo "<body onload=\"window.alert('This page for Admin only!');return history.go(-1)\">";

    exit;
  }

	include("connect.php");
	mysqli_set_charset($objCon, "utf8");
	$ids = $_POST['Mem'];
	echo $ids;
	$rid =	$_POST['roomid'];

		if(trim($ids) == "")
	{
			echo "<body onload=\"window.alert('Please Check Card ID');return history.go(-1)\">";
			exit;
	}

	if(trim($_POST["txtmemberid"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check MemberID');return history.go(-1)\">";
			exit;
	}

	if(trim($_POST["txtfristname"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check Frist Name');return history.go(-1)\">";
			exit;
	}

	if(trim($_POST["txtlastname"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check Last Name');return history.go(-1)\">";
			exit;
	}
	if(trim($_POST["txtaddress"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check Address');return history.go(-1)\">";
			exit;
	}
	if(trim($_POST["txtemail"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check Email');return history.go(-1)\">";
			exit;
	}
	if(trim($_POST["txtphone"]) == "")
	{
			echo "<body onload=\"window.alert('Please Check Telephone Number');return history.go(-1)\">";
			exit;
	}

	$strSQL = "SELECT * FROM member WHERE Member_ID = '".trim($_POST['txtmemberid'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	$strSQL1 = "SELECT * FROM card WHERE Card_ID = '".trim($_POST['txtcardid'])."' ";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
	$objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC);

	$strSQL2 = "SELECT * FROM room WHERE Room_Number = '".trim($rid)."' ";
	$objQuery2 = mysqli_query($objCon,$strSQL2);
	$objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);
	$roomi = $objResult2['Room_ID'];

	$sql =  "DELETE FROM cardwait ";
  	$query = $objCon->query($sql);



	if($objResult)
	{

			echo "<body onload=\"window.alert('Member ID is not available');window.location.replace('adda.php') \">";
			exit;
	}
	elseif ($objResult1) {

			echo "<body onload=\"window.alert('Card ID is not available');window.location.replace('adda.php') \">";
			exit;
	}
	else
	{

		$strSQL = "INSERT INTO member (Id_member,Member_ID,Member_Password,Member_Firstname,Member_Lastname,Member_Address,
		Member_Email,Member_Tel,Member_Type) VALUES (NULL,'".$_POST["txtmemberid"]."',
		'".$_POST["txtmemberid"]."','".$_POST["txtfristname"]."','".$_POST["txtlastname"]."','".$_POST["txtaddress"]."','".$_POST["txtemail"]."','".$_POST["txtphone"]."','".$_POST["dropDown"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);

			$strSQLnewuser = "SELECT * FROM member WHERE Member_ID = '".trim($_POST['txtmemberid'])."' ";
			$objQuerynewuser = mysqli_query($objCon,$strSQLnewuser);
			$objResultnewuser = mysqli_fetch_array($objQuerynewuser,MYSQLI_ASSOC);



		$strSQL1 = "INSERT INTO card (Id_card,Id_member,Card_ID,Member_ID,Card_Type) VALUES (NULL,'".$objResultnewuser["Id_member"]."','".trim($ids)."',
		'".$_POST["txtmemberid"]."','".$_POST["cStatus"]."')";
		$objQuery1 = mysqli_query($objCon,$strSQL1);

		$strSQL2 = "UPDATE  room  SET Room_AdminName = '".$_POST["txtfristname"]."' WHERE `Room`.`Room_ID` = '".$roomi."' ";
		$objQuery2 = mysqli_query($objCon,$strSQL2);

			echo "<body onload=\"window.alert('Add User Success');window.location.replace('adda.php') \">";
			exit;

	}
?>
