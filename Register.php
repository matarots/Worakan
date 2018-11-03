<?php


$servername = "localhost";
$username = "root";
$password = "123456";
$dbName = "ppgrifhouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");

  $strSQL1 = "SELECT * FROM province ";
  $Query = mysqli_query($conn, $strSQL1);

$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Document</title>
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>


                        <select name="categories" id="categories">
                            <option value="">จังหวัด</option>
                            <?php
                            while ($Result =  mysqli_fetch_array($Query,MYSQLI_ASSOC)) {
                                ?>
                                <option  value="<?php echo $Result['province_ID']; ?>">
                                    <?php echo $Result['province_name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>


                        <select name="products" id="products"><option value="">อำเภอ</option></select>


                        <select name="products2" id="products2"><option value="">ตำบล</option></select>


</body>
</html>

 <script type="text/javascript">
            $(document).ready(function() {
                $('#categories').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {categories: $(this).val()},
                        url: 'select_product.php',
                        success: function(data) {
                            $('#products').html(data);
                        }
                    });
                    return false;
                });
            });
        </script>

         <script type="text/javascript">
            $(document).ready(function() {
                $('#products').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {categories: $(this).val()},
                        url: 'select_product2.php',
                        success: function(data) {
                            $('#products2').html(data);
                        }
                    });
                    return false;
                });
            });
        </script>
