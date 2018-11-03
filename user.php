<?php
	session_start();

	error_reporting(~E_NOTICE);
	if($_SESSION['User_name'] == "")
	{

      echo "<body onload=\"window.alert('Please Login!');\">";
      echo '<meta http-equiv="refresh" content="0; url=index.php" >';
      exit;

	}

	if($_SESSION['Status'] != "us")
	{

    echo "<body onload=\"window.alert('This page for Admin only!');return history.go(-1)\">";

    exit;
	}


include("connect.php");
	mysqli_set_charset($objCon, "utf8");
	$strSQL = "SELECT * FROM user_ WHERE User_name = '".$_SESSION['User_name']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PP Gift House รูปโพลารอยด์ 2 บาท ช่อดอกสแตติส ดอกไม้แห้ง</title>
    	<link rel="stylesheet"  href="css/user.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>



  <body>


  <ul>
  <div class="logo">
    <p><img src="pg/logo.jpg" width="250"
      height="250" alt="Eiffel tower">
    </ul>

    <ul class="t">
          <li><a href="#"> ดอกไม้สเเตติส </a></li>
          <li><a href="#"> ตุ๊กตา </a></li>
          <li><a href="#"> สินค้าอื่นๆ </a></li>
          <li><a href="#"> วิธีการชำระเงิน </a></li>
          <li><a href="#"> ติดต่อ </a></li>
          <li><a href="#"> ตะกร้าสินค้า </a></li>
          <li><a href="#"> ข้อมูลส่วนตัว </a></li>
          <li><a href="#"> เเจ้งการชำระเงิน </a></li>


<li style="float:right"><a href="logout.php">ออกจากระบบ</a></li>

</ul>
</div>
</body>
</html>





<?php
	mysqli_close($objCon);
?>
