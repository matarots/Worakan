<?php
	session_start();

	error_reporting(~E_NOTICE);
	if($_SESSION['User_name'] == "")
	{

      echo "<body onload=\"window.alert('Please Login!');\">";
      echo '<meta http-equiv="refresh" content="0; url=index.php" >';
      exit;

	}

	if($_SESSION['Status'] != "ad")
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
    <meta charset="utf-8">
    <title>PP Gift House รูปโพลารอยด์ 2 บาท ช่อดอกสแตติส ดอกไม้แห้ง</title>
		<link rel="stylesheet" type="text/css" href="css/admin.css"/>
  </head>

<body>
<ul>


  <div class="logo">
  <p><img src="pg/logo.jpg" width="150"
    height="150" alt="Eiffel tower">

</ul>

</div>



<div class="dropdown">
  <button class="dropbtn"> จัดการข้อมูล </button>
<div class="dropdown-content">
    <a href="#"> ข้อมูลลูกค้า </a>
    <a href="#"> ข้อมูลดอกไม้สแตติส </a>
    <a href="#"> ข้อมูลตุ๊กตา </a>
    <a href="#"> ข้อมูลสินค้า อื่นๆ </a>
    <a href="#"> ข้อมูลวิธีการชำระเงิน </a>
    <a href="#"> ข้อมูลติดต่อ </a>
  </div>
</div>

<a href="user.html" class="button"> รายการสั่งซื้อสินค้า </a>

<a href="user.html" class="button"> ตะกร้าสินค้า </a>

<a href="user.html" class="button"> ตรวจสอบการชำระเงิน </a>

<div class="dropdown">
  <button class="dropbtn" a href="#"> จัดเตรียมสินค้า </button></a>
<div class="dropdown-content">
    <a href="#"> จัดเตรียมสินค้า </a>
  </div>
  </div>

<div class="dropdown">
  <button class="dropbtn" a href="#"> ข้อมมูลสินค้า </button></a>
<div class="dropdown-content">
    <a href="#"> จัดส่งสินค้า </a>
</div>
</div>

<a href="user.html" class="button"> ใบเสร็จ </a>

<a li style="float:right"a href="logout.php"class="button">ออกจากระบบ</a></li>















  </body>
</html>



<?php
	mysqli_close($objCon);
?>
