<?php
$result=0;
if(isset($_POST['btn_submit'])){
	$num=$_POST['txt_num'];
	for($i=2;$i<$num;$i++) {
		if(($num%$i)==0) {
			$result="not a prime number";
		}
	}
	if($result==0) {
		$result="prime number";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{
    
    background-color:#1b1b32 ;
    color:white;
}
h1{
    text-align: center;
    font-size: 50px;
}
.container{
	margin-left:38%;
	margin-top:10%;
    border: solid;
    width: 350px;
    background-color:#0a0a23;
border-radius:15px;
padding-left:10px;
padding-bottom:10px;
}
input[type="submit"]{
    
    background-color: green;
    color:white;
}
input[type="text"]{
    width:100%;
    background-color: #1b1b32;
	color:white;
}
</style>
</head>

<body>
<div class="container">
<font face="Brush Script MT">
<h1>Check Prime</h1></font>
<font face="Verdana, Geneva, sans-serif">
<form id="form1" name="form1" method="post" action="">
  <table width="340">
    <tr>
      <td width="100">Enter a no.</td>
      <td width="183"><label for="txt_num"></label>
      <input type="text" name="txt_num" id="txt_num" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $result; ?></td>
    </tr>
  </table>
</form>
</font>
</div>
</body>
</html>