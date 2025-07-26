<?php
include("../Assets/Connection/Connection.php");
if($con->$insQry)
	{
		$insQry="insert into tbl_user(place_name,district_id,photo_id) values('".$place."','".$district."','".$photo."')";
		if($con->query($insQry))
		{
			echo "Inserted";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
<table width="200" border="1">
  <tr>
    <td>Name</td>
    <td>
      <label for="txt_name"></label>
      <input type="text" name="txt_name" id="name_id" />
      </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <label for="txt_email"></label>
      <input type="text" name="txt_email" id="email_id" />
       </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <label for="txt_password"></label>
      <input type="text" name="txt_password" id="password_id" />
  </tr>
   </td>
  <tr>
    <td>District</td>
    <td><label for="sel_district"></label>
      <select name="sel_district" id="sel_district">
      
      <option>select</option>
      <?php
	  $selQry="select*from tbl_district";
	  $resultOne=$con->query($selQry);
	  while($data=$resultOne->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $data['district_id']?>">
          <?php echo $data["district_name"]?>
          </option>
          <?php
	  }
	  ?>
          </select>
      </td>
  </tr>
  <tr>
    <td>Place</td>
    <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place">
      <option>select</option>
      <?php
	  $selQry="select*from tbl_place";
	  $resultOne=$con->query($selQry);
	  while($data=$resultOne->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $data['place_id']?>">
          <?php echo $data["place_name"]?>
          </option>
          <?php
	  }
	  ?>
      </select>
  </tr>
  <tr>
    <td>Photo  
    <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" />    
    </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="submit_id" id="submit_id" value="Submit" />
        <input type="submit" name="cancel_id" id="cancel_id" value="Cancel" />
      </div>
    </tr>
</table>
</form></td>
</body>
</html>
