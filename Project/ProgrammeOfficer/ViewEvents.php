<?php
include("../Assets/Connection/Connection.php");
$name = "";
$desc = "";
$date = "";
$count = "";
$aid = 0;

// Handle event acceptance
if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
    $upQry = "UPDATE tbl_event SET event_status = 1 WHERE event_id = " . $aid;
    if ($con->query($upQry)) {
        echo "Accepted";
        ?>
        <script>
            window.location = "ViewEvents.php";
        </script>
        <?php
    }
}

// Handle event rejection
if (isset($_GET["rid"])) {
    $rid = $_GET["rid"];
    $upQry = "UPDATE tbl_event SET event_status = 2 WHERE event_id = " . $rid;
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        .approved {
            color: green;
            font-weight: bold;
        }
        .rejected {
            color: red;
            font-weight: bold;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Event Management</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Count</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_event";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            $status = $data["event_status"];
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo htmlspecialchars($data["event_name"]); ?></td>
            <td><?php echo htmlspecialchars($data["event_desc"]); ?></td>
            <td><?php echo htmlspecialchars($data["event_date"]); ?></td>
            <td><?php echo htmlspecialchars($data["event_count"]); ?></td>
            <td>
                <?php
                if ($status == 0) {
                    ?>
                    <a href="ViewEvents.php?aid=<?php echo $data["event_id"]; ?>">Approve</a>
                    <a href="ViewEvents.php?rid=<?php echo $data["event_id"]; ?>">Reject</a>
                    <?php
                } elseif ($status == 1) {
                    echo '<span class="approved">APPROVED</span>';
                } else {
                    echo '<span class="rejected">REJECTED</span>';
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table> <!-- HTML -->
<button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

<!-- CSS -->
<style>
  .back-button {
    background-color: #007BFF; /* Blue color */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .back-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05); /* Slight zoom effect */
  }

  .back-button:active {
    transform: scale(0.95); /* Slight shrink effect on click */
  }
</style>

</body>
</html>
