<?php
	session_start();

	error_reporting(~E_NOTICE);


	


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<title>Add User</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

</head>
<body>
<div class="containers">
  	<header>
        <p class="logo">Web Application Room Monitoring System Using Arduino</p>
        <div class="header-right">
            <form action="logout.php" method="post">
                <input type="submit" value="LogOut" class="btn btn-danger">
            </form>
            <br>
            <br>
        </div>
    </header>

    <nav >


        <ul id="navbar">
          <li><a href="admin.php">Back&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
          <li><a href="edit.php" style="text-decoration:none">Edit Delete User&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
          <li><a href="managecard.php" style="text-decoration:none">Delete Card&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>


      </ul>

    </nav>
		<article>
			<div class="container" style="width:960px;">
      <form name="addfrom" method="post" action="saveuser.php">
          <h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add User Form </h2><br>
  <center><table width="600" border="1" style="width: 600px" class="table table-bordered" id="tableID">
    <tbody>
      <tr>
        <td width="125"> &nbsp;CardID</td>
        <td width="180">
          <input name="txtcardid" type="text" id="txtcardid" size="15" maxlength="15" disabled="disabled"  value="<?php echo $card; ?>" >
          <a href="runexe.php" class="cssbtn">ReadCard</a>


        </td>
      </tr>
      <tr>
        <td> &nbsp;MemberID</td>
        <td><input name="txtmemberid" type="text" id="txtmemberid" size="15" maxlength="15" onkeypress="JavaScript:return KeyCode2(txtmemberid);">
        </td>
      </tr>
      <tr>
        <td> &nbsp;FristName</td>
        <td><input name="txtfristname" type="text" id="txtfristname" maxlength="50" onkeypress="JavaScript:return KeyCode3(txtfristname);">
        </td>
      </tr>
      <tr>
        <td>&nbsp;LastName</td>
        <td><input name="txtlastname" type="text" id="txtlastname" maxlength="50" onkeypress="JavaScript:return KeyCode3(txtlastname);"></td>
      </tr>
      <tr>
        <td>&nbsp;Address</td>
        <td><textarea name="txtaddress" type="text" id= "txtaddress" size="100" maxlength="100"
          onkeypress="JavaScript:return KeyCode1(txtaddress);" ></textarea></td>
      </tr>
      <tr>
        <td> &nbsp;Email</td>
        <td><input name="txtemail" type="text" id="txtemail" size="30" maxlength="30" onkeypress="JavaScript:return KeyCode1(txtemail);">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Telephone</td>
        <td><input name="txtphone" type="text" id="txtphone" size="10" maxlength="10"
          onkeypress="JavaScript:return KeyCode2(txtphone);">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Status User</td>
        <td>
          <select id="dropDown" name="dropDown" onchange="ViewChange(this)" >
            <option  value="1">ADMIN</option>
            <option  value="0">USER</option>


          </select>
		</td>
      </tr>
       <tr id="tt">
        <td > &nbsp;Room Number</td>
        <td>
                                <div class="roomn">
            <select name="roomid" id="roomlist">
              <option value="">Select Room</option>
              <?php
              $query1 = "SELECT * FROM room  WHERE Room_AdminName = ''";
              $result1 = mysqli_query($objCon, $query1);
                foreach ($result1 as $room ) {


               ?>
               <option value="<?php echo $room[Room_Number] ?>"><?php echo $room[Room_Number]; ?></option>
               <?php
                  }
               ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Status Card</td>
        <td>
          <select name="cStatus" id="cStatus">
            <option value="0">Card</option>
            <option value="1">Keychain</option>
            <input type="hidden" name="Mem" value="<?php echo $card;?>">
          </select>
         <input type="submit" name="Submit" value="Save" class="btn btn-primary">
		</td>
      </tr>

    </tbody>
  </table></center>

  <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>
      </div>
		</article>




</div>
</body>
</html>



<script type="text/javascript">
  function KeyCode(objId)
  {
    if (event.keyCode >= 65 && event.keyCode<=90 || event.keyCode>=97 && event.keyCode<=122) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
    {
      return true;
    }
    else
    {
      alert("English only !!! ");
      return false;
    }
    }
</script>
<script type="text/javascript">
  function KeyCode1(objId)
  {
    if (event.keyCode >= 32 && event.keyCode<=126 ) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
    {
      return true;
    }
    else
    {
      alert("English only !!! ");
      return false;
    }
    }
</script>
<script type="text/javascript">
  function KeyCode2(objId)
  {
    if (event.keyCode >= 48 && event.keyCode<=57) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
    {
      return true;
    }
    else
    {
      alert("Number only !!! ");
      return false;
    }
    }
</script>
<script type="text/javascript">
  function KeyCode3(objId)
  {
    if (event.keyCode >= 65 && event.keyCode<=90 || event.keyCode>=97 && event.keyCode<=122 ||event.keyCode >= 32 && event.keyCode<=47) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
    {
      return true;
    }
    else
    {
      alert("English only !!! ");
      return false;
    }
    }
</script>
<script type="text/javascript">
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
  });
  function ViewChange($this) {
    var pid = $('option:selected', $this).text();
    $('#tableID tr').show();
    $('#tableID tr > td:contains(' + pid + ')').each(function () {
      $(this).parent().toggle();
    });
    if(pid == "ADMIN") {
      $('#tableID tr').show();
    } else {
      $('#tt').hide();
    }
  }
</script>



<?php

	mysqli_close($objCon);
?>
