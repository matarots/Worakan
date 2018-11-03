<?php

  $stopca = date("Y-m-d");

  error_reporting(~E_NOTICE);


  include("connect.php");
  mysqli_set_charset($objCon, "utf8");
  $strSQL = "SELECT * FROM User WHERE User_ID = '".$_SESSION['User_ID']."' ";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  $query = "SELECT * FROM history INNER JOIN room ON history.Room_ID = room.Room_ID ";
  $result = mysqli_query($objCon, $query);

  $strSQL1 = "SELECT  DISTINCT Room_Floor FROM room";
  $Query = mysqli_query($objCon,$strSQL1);


?>

<?php
  mysqli_close($objCon);
?>



<ul class="t">
      <li><a href="#"> ดอกไม้สเเตติส </a></li>
      <li><a href="#"> ตุ๊กตา </a></li>
      <li><a href="#"> สินค้าอื่นๆ </a></li>
      <li><a href="#"> วิธีการชำระเงิน </a></li>
      <li><a href="#"> ติดต่อ </a></li>
      <li><a href="#"> ตะกร้าสินค้า </a></li>
      <li><a href="#"> ข้อมูลส่วนตัว </a></li>
      <li><a href="#"> เเจ้งการชำระเงิน </a></li>
