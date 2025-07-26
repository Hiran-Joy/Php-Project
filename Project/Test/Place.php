<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$district=$_POST['sel_district'];
	$place=$_POST['txt_place'];
	$pincode=$_POST['txt_pincode'];
	$insQry="insert into tbl_place(place_name,district_id,place_pincode) values('".$place."','".$district."','".$pincode."')";
	if($con->query($insQry))
	{
		echo "inserted";
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>District</td>
      <td><label for="txt_district"></label>
      <select name="sel_district">
      <option>---select---</option>
      <?php
	  $seloptionQry="select * from tbl_district";
	  $optionResult=$con->query($seloptionQry);
	  while($optiondata=$optionResult->fetch_assoc())
	  {
	  ?>
      <option value="<?php echo $optiondata["district_id"]; ?>">
      <?php echo $optiondata["district_name"]; ?>
      </option>
      <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pincode"></label>
      <input type="text" name="txt_pincode" id="txt_pincode" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  
  <table width="200" border="1">
  <tr>
    <td>#</td>
    <td>Ditrict</td>
    <td>Place</td>
     <td>Action</td>
  </tr>
  <?php 
  $i=0;
  $sel = "select * from tbl_place p inner join tbl_district d on d.district_id = p.district_id";
  $result = $con -> query($sel);
  while($data = $result -> fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i ?> </td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"] ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>

</form>
</body>
</html>