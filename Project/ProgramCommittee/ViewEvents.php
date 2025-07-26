<?php
include("../Assets/Connection/Connection.php");
$name = "";
$desc = "";
$date = "";
$count = "";
$aid = 0;

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_event WHERE event_id = " . $did;
    if ($con->query($delQry)) {
        ?>
        <script>
        window.location = "ViewEvents.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light gray background */
            color: #333; /* Dark text color */
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 70%; /* Increased width for more data */
            border-collapse: collapse;
            background-color: white; /* White background for table */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        th, td {
            padding: 12px;
            border: 1px solid #007bff; /* Blue border for cells */
            text-align: left; /* Left-align text */
        }
        th {
            background-color: #007bff; /* Blue background for header */
            color: white; /* White text for header */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray background for even rows */
        }
        tr:nth-child(odd) {
            background-color: #ffffff; /* White background for odd rows */
        }
        a {
            color: #007bff; /* Blue color for links */
            text-decoration: none; /* No underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        /* Custom colors for status */
        .approved {
            color: green; /* Green for Approved */
            font-weight: bold;
        }
        .rejected {
            color: red; /* Red for Rejected */
            font-weight: bold;
        }
        .pending {
            color: orange; /* Orange for Pending */
            font-weight: bold;
        }
        .back-button {
            background-color: #007bff; /* Blue background for back button */
            color: white; /* White text for button */
            border: none; /* No border */
            padding: 10px 15px; /* Padding for button */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            margin: 20px; /* Margin around the button */
            text-decoration: none; /* No underline */
        }
        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>View Events</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Count</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_event";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["event_name"]; ?></td>
            <td><?php echo $data["event_desc"]; ?></td>
            <td><?php echo $data["event_date"]; ?></td>
            <td><?php echo $data["event_count"]; ?></td>
            <td>
                <?php
                $status = $data["event_status"];
                if ($status == 1) {
                    echo "<span class='approved'>APPROVED</span>";
                } elseif ($status == 2) {
                    echo "<span class='rejected'>REJECTED</span>";
                } else {
                    echo "<span class='pending'>PENDING</span>";
                }
                ?>
            </td>
            <td>
                <a href="ViewEvents.php?did=<?php echo $data["event_id"]; ?>">Delete</a> | 
                <a href="EditEvents.php?eid=<?php echo $data["event_id"]; ?>">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>
