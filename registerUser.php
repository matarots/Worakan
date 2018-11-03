<?php
include("connect.php") ;


if ($objCon->connect_error) {
    die("Connection failed: " . $objCon->connect_error);
}
$objCon->set_charset("utf8");

  $strSQL1 = "SELECT * FROM province ";
  $Query = mysqli_query($objCon, $strSQL1);

$objCon->close();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Register</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-7 col-xs-12">

    <form  name="register" action="userVerify.php" method="POST" id="register" class="form-horizontal">
       <div class="form-group">
       <div class="col-sm-2">  </div>
       <div class="col-sm-5" align="left">
       <br>
       <h4> สมัครสมาชิก </h4>
       </div>
       <input name="Admin_level" type="hidden" id="Admin_level" value="us" />
       </div>
       <div class="form-group">
       	<div class="col-sm-2" align="right"> Username : </div>
          <div class="col-sm-5" align="left">
            <input  name="Admin_username" type="text" required class="form-control" id="Admin_username" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div>

        <div class="form-group">
        <div class="col-sm-2" align="right"> Password : </div>
          <div class="col-sm-5" align="left">
            <input  name="Admin_password" type="password" required class="form-control" id="Admin_password" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ชื่อ-สกุล : </div>
          <div class="col-sm-7" align="left">
            <input  name="Admin_name" type="text" required class="form-control" id="Admin_name" placeholder="ชื่อ-สกุล" />
          </div>
        </div>


        <div class="form-group">
        <div class="col-sm-2" align="right"> อีเมล์ : </div>
          <div class="col-sm-6" align="left">
            <input  name="Admin_email" type="email" class="form-control" id="Admin_email"   placeholder="อีเมล์"/>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> เบอร์โทร : </div>
          <div class="col-sm-6" align="left">
            <input  name="Admin_phone" type="text" class="form-control" id="Admin_phone"  placeholder="เบอร์โทร" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ที่อยู่ : </div>
          <div class="col-sm-6" align="left">
            <textarea name="address" class="form-control"></textarea>
          </div>
        </div>
				<div class="form-group">
					<select name="categories" id="categories">
							<option value="">จังหวัด</option>
							<?php
							while ($Result =  mysqli_fetch_array($Query,MYSQLI_ASSOC)) {
									?>
									<option  value="<?php echo $Result['province_name']; ?>">
											<?php echo $Result['province_name']; ?>
									</option>
									<?php
							}
							?>
					</select>


					<select name="products" id="products"><option value="">อำเภอ</option></select>


					<select name="products2" id="products2"><option value="">ตำบล</option></select>
				</div>

				<div class="form-group">
				<div class="col-sm-2" align="right">รหัสไปรษณีย์ : </div>
					<div class="col-sm-6" align="left">
						<input  name="Post_Code" type="text" class="form-control" id="Post_Code"  placeholder="รหัสไปรษณีย์" />
					</div>
				</div>

      <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary" id="btn">  สมัครสมาชิก  </button>
          </div>



      </div>
      </form>
</div>
</div>
</div>


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
