<?php


include("connect.php") ;
// Create connection


// Check connection
if ($objCon->connect_error) {
    die("Connection failed: " . $objCon->connect_error);
}
$objCon->set_charset("utf8");




$categorie_id = isset($_POST['categories']) ? $_POST['categories'] : "";


 $query_province = "SELECT * FROM province WHERE province_name ='".$categorie_id."'";
 $result_province = mysqli_query($objCon, $query_province);
 $row_result_province = mysqli_fetch_array($result_province,MYSQLI_ASSOC);



 $query = "SELECT * FROM district WHERE province_ID ='".$row_result_province["province_ID"]."'";
 $result = mysqli_query($objCon, $query);


      if($result = $objCon->query($query))
      {
           while($row = mysqli_fetch_array($result))
           {
                echo "<option value=\"" . $row['district_name'] . "\">" . $row['district_name'] . "</option>";
           }
      }
      else
      {
          echo "<option value=\"\">No Item</option>";

      }
?>
