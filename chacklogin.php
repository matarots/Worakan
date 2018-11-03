<?php
 session_start();
  include("connect.php") ;


$sql = "SELECT * FROM user_ WHERE User_name ='".mysqli_real_escape_string($objCon,$_POST['UserID'])."'and Password = '".mysqli_real_escape_string($objCon,$_POST['Password'])."' ";

$objQuery = mysqli_query($objCon,$sql);
$objRresult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if(!$objRresult)

{
  echo "<body onload=\"window.alert('Check Data');return history.go(-1)\">";
  exit;
}
else
{
    $_SESSION["User_ID"] = $objRresult["User_ID"];
    $_SESSION["User_name"] = $objRresult["User_name"];
    $_SESSION["Status"] = $objRresult["Status"];

    session_write_close();

    if($objRresult["Status"] == ad)
    {
        header("location:admin.php");
    }
    else
    {
      //  header("location:user.php")
    }


    if($objRresult["Status"] == us)
    {
        header("location:user.php");
    }
    else
    {
      //  header("location:user.php")
    }
}

 ?>
