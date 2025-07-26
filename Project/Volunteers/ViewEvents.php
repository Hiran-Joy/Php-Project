<?php
include("../Assets/Connection/Connection.php");
$name="";
$desc="";
$date="";
$count="";
$aid=0;
if(isset($_GET["did"]))
{
	$did = $_GET["did"];
	$delQry="delete from tbl_event where event_id=".$did;
	if($con->query($delQry))
	{
		?>
     <script>
	 window.location="ViewEvents.php";
	 </script>
     <?php
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
<table width="387" border="1">
  <tr>
    <td width="46">SlNo.</td>
    <td width="71">Name</td>
    <td width="71">Description</td>
    <td width="71">Date</td>
    <td width="71">Count</td>
  </tr>
	  <?php
	    $selQry="select * from tbl_event";
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
		$i++;	
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["event_name"]; ?></td>   
        <td><?php echo $data["event_desc"]; ?></td>  
        <td><?php echo $data["event_date"]; ?></td>   
        <td><?php echo $data["event_count"]; ?></td>             
       <!--<td><a href="ViewEvents.php?did=<?php echo $data["event_id"];?>">Delete</a>
    <a href="EditEvents.php?eid=<?php echo $data["event_id"];?>">Edit</a></td>     
        </td>-->
        
      </tr>
      <?php
		}
	?>
  
</table>
<button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>