<?php

include("connect.php") ;
// Create connection


// Check connection
if ($objCon->connect_error) {
    die("Connection failed: " . $objCon->connect_error);
}
$objCon->set_charset("utf8");




/*
 * check POST
 */
$categorie_id = isset($_POST['categories']) ? $_POST['categories'] : "";

$query_district = "SELECT * FROM district WHERE district_name ='".$categorie_id."' ";
$result_district = mysqli_query($objCon, $query_district);
$row_result_district = mysqli_fetch_array($result_district,MYSQLI_ASSOC);



$query = "SELECT * FROM subdistrict WHERE district_ID ='".$row_result_district["district_ID"]."'";
$result = mysqli_query($objCon, $query);





     if($result = $objCon->query($query))
     {
          while($row = mysqli_fetch_array($result))
          {
               echo "<option value=\"" . $row['Subdistrict_name'] . "\">" . $row['Subdistrict_name'] . "</option>";
          }
     }
     else
     {
         echo "<option value=\"\">No Item</option>";

     }
?>
