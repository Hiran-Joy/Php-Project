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
    <title>Event List</title>
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
        h1 {
            color: #0066cc;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .back-button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
        }
        .back-button:hover {
            background-color: #005bb5;
        }
    </style>
</head>

<body>
    <h1>Event List</h1>
    <table border="1">
        <tr>
            <th>Sl No.</th>
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
                <td><a href="AddBill.php">Add Bill</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

</body>
</html>
