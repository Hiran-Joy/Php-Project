<?php
$result="";
if(isset($_POST["btn_find"]))
{
	 $number = $_POST["txt_evenorodd"];
    if($number % 2 == 0){ 
        $result= "Even";  
    } 
    else{ 
        $result= "Odd"; 
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
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Number</td>
      <td><label for="txt_evenorodd"></label>
      <input type="text" name="txt_evenorodd" id="txt_evenorodd"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_find" id="btn_find" value="Find">
      </div></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php
      echo $result;
	  ?></td>
    </tr>
  </table>
</form>
</body>
</html>

