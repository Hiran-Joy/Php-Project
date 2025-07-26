<?php
include("../Assets/Connection/Connection.php");
session_start();

// Handle flagging attendance as incorrect
if (isset($_GET["id"])) {
    $did = $_GET["did"];
    $upQry = "UPDATE tbl_attendance SET attendance_status = 3 WHERE attendance_id = " . $_GET['id'];
    if ($con->query($upQry)) {
        ?>
        <script>
            window.location = "ViewAttendance.php";
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
    <title>View Attendance</title>
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
        .absent {
            color: red;
            font-weight: bold;
        }
        .present {
            color: green;
            font-weight: bold;
        }
        .wrong {
            color: orange;
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
    <h1>Attendance Management</h1>

    <h2>Current Attendance</h2>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Attendance</th>
            <th>Change</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_attendance a 
                    INNER JOIN tbl_volunteers v ON a.Volunteers_id = v.Volunteers_id 
                    INNER JOIN tbl_event e ON a.event_id = e.event_id";
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
                    } else {
                        echo '<span class="wrong">Wrong Attendance</span>';
                    }
                    ?>
                </td>
                <td><a href="ViewAttendance.php?id=<?php echo $data['attendance_id']; ?>">Flag</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <h2>Flagged Attendance</h2>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Name</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Attendance</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_attendance a 
                    INNER JOIN tbl_volunteers v ON a.Volunteers_id = v.Volunteers_id 
                    INNER JOIN tbl_event e ON a.event_id = e.event_id 
                    WHERE attendance_status = 3";
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
                    } else {
                        echo '<span class="wrong">Rejected</span>';
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
