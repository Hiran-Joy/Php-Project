<?php
include("../Assets/Connection/Connection.php");
session_start();
/*if(isset($_GET["did"]))
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
}*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Attendance Details</title>
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
        .back-button {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 20%;
        }
        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Attendance Details</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Date</th>
            <th>Attendance</th>
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
            <td><?php echo $data["event_date"]; ?></td>              
            <td>
            <?php
            $sel = "select * from tbl_attendance where event_id='".$data["event_id"]."' and Volunteers_id=".$_SESSION["vid"];
            $res = $con->query($sel);
            if($row = $res->fetch_assoc())
            {
                if($row["attendance_status"]== 0)
                {
                    echo "Absent";
                }
                else
                {
                    echo "Present";
                }
            }
            else
            {
            ?>
            Attendance Not Added
            <?php
            }
            ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>
