<?php
include("../Assets/Connection/Connection.php");
$name = "";
$desc = "";
$date = "";
$count = "";
$aid = 0;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #e6f0ff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #cccccc;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        a {
            color: #0066cc;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #0066cc;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #0066cc;
            color: white;
        }
        h1 {
            color: #0066cc;
        }
        .back-button {
            background-color: #0066cc; /* Blue background for the button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            display: block; /* Center the button */
            width: 20%; /* Set a width for the button */
        }
        .back-button:hover {
            background-color: #004d99; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>View Events</h1>
    <table width="387" border="1">
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Count</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_event where event_status=1";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["event_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["event_desc"]); ?></td>
                <td><?php echo htmlspecialchars($data["event_date"]); ?></td>
                <td><?php echo htmlspecialchars($data["event_count"]); ?></td>
                <td>
                    <a href="AddAttendance.php?did=<?php echo $data["event_id"]; ?>">AddAttendance</break></a>
                    <!-- Uncomment below to enable Edit functionality -->
                    <!-- <a href="EditEvents.php?eid=<?php echo $data["event_id"];?>">Edit</a> -->
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
    
</body>
</html>
