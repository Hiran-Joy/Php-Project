<?php
include("../Assets/Connection/Connection.php");

if (isset($_GET["did"])) {
    $did = (int)$_GET["did"]; // Cast to integer for security
    $delQry = "DELETE FROM tbl_event WHERE event_id=?";
    $stmt = $con->prepare($delQry);
    $stmt->bind_param("i", $did);
    if ($stmt->execute()) {
        echo "<script>alert('Event deleted successfully!'); window.location='ViewEvents.php';</script>";
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
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #0066cc; /* Border color */
        }
        th {
            background-color: #0066cc; /* Header background color */
            color: white; /* Header text color */
        }
        td {
            background-color: #ffffff; /* Cell background color */
        }
        a {
            color: #0066cc; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
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
    <h1>Event List</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Count</th>
            <th>Actions</th>
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
                <a href="AddMedia.php<?php echo "?eid=" . $data['event_id']; ?>">Add Media</a> | 
                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $data['event_id']; ?>)">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this event?")) {
                window.location.href = "?did=" + id; // Redirect to delete the event
            }
        }
    </script>
</body>
</html>
