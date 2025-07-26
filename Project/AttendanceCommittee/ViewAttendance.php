<?php
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_GET["id"])) {
    $did = $_GET["did"];
    $upQry = "UPDATE tbl_attendance SET attendance_status = 3 WHERE attendance_id = " . $_GET['id'];
    if ($con->query($upQry)) {
        ?>
        <script>
            alert("Attendance marked as not applicable");
            window.location = "ViewAttendance.php";
        </script>
        <?php
    }
}

if (isset($_GET["did"])) {
    $did = (int)$_GET["did"]; // Cast to integer for security
    $delQry = "DELETE FROM tbl_attendance WHERE attendance_id=?";
    $stmt = $con->prepare($delQry);
    $stmt->bind_param("i", $did);
    if ($stmt->execute()) {
        echo "<script>alert('Attendance deleted successfully!'); window.location='ViewAttendance.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Attendance</title>
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
        .present {
            color: green;
            font-weight: bold;
        }
        .absent {
            color: red;
            font-weight: bold;
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
    <h1>View Attendance</h1>
    <table border="1" align="center">
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Attendance</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_attendance a INNER JOIN tbl_volunteers v ON a.Volunteers_id = v.Volunteers_id INNER JOIN tbl_event e ON a.event_id = e.event_id";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["volunteers_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["event_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["event_date"]); ?></td>
                <td>
                    <?php
                    if ($data["attendance_status"] == 0) {
                        echo '<span class="absent">Absent</span>';
                    } elseif ($data["attendance_status"] == 1) {
                        echo '<span class="present">Present</span>';
                    } elseif ($data["attendance_status"] == 3) {
                        echo "Not Applicable";
                    }
                    ?>
                </td>
                <td>
                <a href="ViewAttendance.php?did=<?php echo $data["attendance_id"]; ?>">Delete</a> | 
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

</body>
</html>
