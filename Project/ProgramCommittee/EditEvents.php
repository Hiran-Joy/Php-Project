<?php
include("../Assets/Connection/Connection.php");

$id=$_GET['eid'];

if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$selQryone="select *from tbl_event where event_id=".$_GET['eid'];
	$resultone=$con->query($selQryone);
	$dataone=$resultone->fetch_assoc();
	$name=$dataone["event_name"];
	$aid=$dataone["event_id"];
	$desc=$dataone["event_desc"];
	$date=$dataone["event_date"];
    $count=$dataone["event_count"];	
}

if(isset($_POST["txt_update"]))
{
	$name=$_POST['txt_name'];
	$desc=$_POST['txt_des'];
	$date=$_POST['txt_date'];
	$count=$_POST['txt_count'];
		$upQry="update tbl_event set event_name='".$name."',event_desc='".$desc."', event_date='".$date."', event_count='".$count."'
 where event_id=".$eid;
		if($con->query($upQry))
		{
			echo "updated";
			$aid=0;
			?>
     		<script>
	 		window.location="ViewEvents.php";
		 	</script>
     <?php
		}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Update Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Alice blue background */
            color: #333;
            text-align: center;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #e6f0ff; /* Light blue background for table */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #007bff;
        }
        th {
            background-color: #007bff; /* Blue background for table header */
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        h1 {
            color: #007bff; /* Blue color for heading */
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], .back-button {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }
        input[type="submit"]:hover, .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .center-text {
            text-align: center;
        }
        .back-button {
            width: 20%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Update Event</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($name); ?>" required /></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><textarea name="txt_des" id="txt_des" cols="45" rows="5" required><?php echo htmlspecialchars($desc); ?></textarea></td>
            </tr>
            <tr>
                <th scope="row">Date</th>
                <td><input type="text" name="txt_date" id="txt_date" value="<?php echo htmlspecialchars($date); ?>" required /></td>
            </tr>
            <tr>
                <th scope="row">Count</th>
                <td><input type="text" name="txt_count" id="txt_count" value="<?php echo htmlspecialchars($count); ?>" required /></td>
            </tr>
            <tr>
                <td colspan="2" class="center-text">
                    <input type="submit" name="txt_update" id="txt_update" value="Update" />
                </td>
            </tr>
        </table>
    </form>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>
