<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST['txt_name'];
	$details=$_POST['txt_details'];
	$price=$_POST['txt_price'];
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/User/.$photo");
	$category=$_POST['sel_category'];
	$subcategory=$_POST['sel_subcategory'];
	$insQry="insert into tbl_product(product_name,product_details,product_price,product_photo) values('".$name."','".$details."','".$price."','".$photo."')";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
      <td><p>Photo</p></td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="sel_category"></label>
        <select name="sel_category" id="sel_category" onchange="getSubCategory(this.value)">
        <option>--Select--</option>
        <?php
			$selQry1="select * from tbl_category";
			$resultOne=$con->query($selQry1);
			while($data=$resultOne->fetch_assoc())
			{
		?>
        <option value="<?php echo $data['category_id']; ?>">
        <?php echo $data['category_name']; ?>
        </option>
        <?php
			}
		?>
      </select></td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><label for="sel_subcategory"></label>
        <select name="sel_subcategory" id="sel_subcategory">
                  <option>--Select--</option>

      </select></td>
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
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubCategory(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubCategory.php?did=" + did,
      success: function (result) {

        $("#sel_subcategory").html(result);
      }
    });
  }

</script>

</html>