<?php
include("../Assets/Connection/Connection.php");
$name = "";
$desc = "";
$date = "";
$count = "";
$aid = 0;

if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
    $upQry = "update tbl_event set event_status=1 where event_id=" . $aid;
    if ($con->query($upQry)) {
        echo "Accepted";
        ?>
        <script>
        window.location = "ViewEvents.php";
        </script>
        <?php
    }
}

if (isset($_GET["rid"])) {
    $rid = $_GET["rid"];
    $upQry = "update tbl_event set event_status=2 where event_id=" . $rid;
    if ($con->query($upQry)) {
        echo "Rejected";
        ?>
        <script>
        window.location = "ViewEvents.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Events</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        color: #333;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        background-color: #e6f0ff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    th, td {
        padding: 10px;
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
    tr:nth-child(even) {
        background-color: #e6f0ff;
    }
    tr:hover {
        background-color: #d1e7ff;
    }
    .action-links a {
        padding: 5px 10px;
        margin: 5px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    .action-links .approve {
        background-color: #28a745;
    }
    .action-links .approve:hover {
        background-color: #218838;
    }
    .action-links .reject {
        background-color: #dc3545;
    }
    .action-links .reject:hover {
        background-color: #c82333;
    }
    .approved {
        color: #28a745;
        font-weight: bold;
    }
    .rejected {
        color: #dc3545;
        font-weight: bold;
    }
</style>
</head>

<body>
    <h1 align="center" style="color:#0066cc">View Events</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Count</th>
        </tr>
        <?php
        $selQry = "select * from tbl_event";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            $status = $data["event_status"];
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["event_name"]; ?></td>
            <td><?php echo $data["event_desc"]; ?></td>
            <td><?php echo $data["event_date"]; ?></td>
            <td><?php echo $data["event_count"]; ?></td>
           
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
