<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$category=$_POST['sel_category'];
	$subcategory=$_POST['txt_subcategory'];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id) values('".$subcategory."','".$category."')";
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
      <td>Category</td>
      <td><label for="sel_category"></label>
        <select name="sel_category" id="sel_category">
      <option>---select---</option>
      <?php
	  $seloptionQry="select * from tbl_category";
	  $optionResult=$con->query($seloptionQry);
	  while($optiondata=$optionResult->fetch_assoc())
	  {
	  ?>
      <option value="<?php echo $optiondata["category_id"]; ?>">
      <?php echo $optiondata["category_name"]; ?>
      </option>
      <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><label for="txt_subcategory"></label>
      <input type="text" name="txt_subcategory" id="txt_subcategory" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>