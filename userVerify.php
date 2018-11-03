<?php
include("connect.php");

if ($objCon->connect_error) {
    die("Connection failed: " . $objCon->connect_error);
}

$objCon->set_charset("utf8");

$query_user = "SELECT User_ID FROM user_ WHERE User_name = '".$_POST["Admin_username"]."'";
$result_user = mysqli_query($objCon, $query_user);
$row_result_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);

if($row_result_user)
{

    echo "<body onload=\"window.alert('Member ID is not available');window.location.replace('registerUser.php') \">";
    exit;
}
else {


  $strSQL = "INSERT INTO user_ (User_ID, User_name, Password, Name, EMail, Tel, Address, Subdistrict, District, Prorince, Postalcode, Status) VALUES (NULL,'".$_POST["Admin_username"]."','".$_POST["Admin_password"]."',
  '".$_POST["Admin_name"]."','".$_POST["Admin_email"]."','".$_POST["Admin_phone"]."','".$_POST["address"]."','".$_POST["categories"]."','".$_POST["products"]."',
  '".$_POST["products2"]."','".$_POST["Post_Code"]."','".$_POST["Admin_level"]."')";
  $objQuery = mysqli_query($objCon,$strSQL);
  echo "<body onload=\"window.alert('Add User Success');window.location.replace('registerUser.php') \">";
  exit;
}
$objCon->close();

?>
