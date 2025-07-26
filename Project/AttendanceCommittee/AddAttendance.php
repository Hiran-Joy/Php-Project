<?php
include("../Assets/Connection/Connection.php");

if (isset($_GET["id"])) {
    $update = "INSERT INTO tbl_attendance(event_id, Volunteers_id, attendance_status) VALUES('" . $_GET["eid"] . "', '" . $_GET["id"] . "', '" . $_GET["status"] . "')";
    if ($con->query($update)) {
        ?>
        <script>
            alert("Attendance Added");
            window.location = "AddAttendance.php?did=<?php echo $_GET["eid"] ?>";
        </script>
        <?php
    
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white; /* White background for the page */
            color: #333; /* Dark text for readability */
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #f0f8ff; /* Light blue background for the table */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #007BFF; /* Blue borders for table cells */
        }
        th {
            background-color: #007BFF; /* Blue background for headers */
            color: white;
        }
        td {
            background-color: #ffffff; /* White background for data cells */
        }
        a {
            color: #007BFF; /* Blue color for links */
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007BFF; /* Blue border for links */
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #0056b3; /* Darker blue on hover */
            color: white;
        }
        h1 {
            color: #007BFF; /* Blue color for the heading */
        }
        .back-button {
            background-color: #007BFF; /* Blue background for the button */
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
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Manage Attendance</h1>
    <table border="1" align="center">
        <tr>
            <th>S.No</th>
            <th>Volunteer</th>
            <th>Volunteer Photo</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_volunteers";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["volunteers_name"]); ?></td>
                <td><img src="../Assets/files/Volunteer/Photo/<?php echo htmlspecialchars($data["volunteers_photo"]); ?>" width="75" height="75" /></td>
                <td>
                    <?php
                    $sel = "SELECT * FROM tbl_attendance WHERE event_id='" . $_GET["did"] . "' AND Volunteers_id=" . $data["volunteers_id"];
                    $res = $con->query($sel);
                    if ($row = $res->fetch_assoc()) {
                        if ($row["attendance_status"] == 0) {
                            echo "Absent";
                        } else {
                            echo "Present";
                        }
                    } else {
                        ?>
                        <a href="AddAttendance.php?id=<?php echo $data["volunteers_id"]; ?>&status=1&eid=<?php echo $_GET["did"]; ?>">Present</a> | 
                        <a href="AddAttendance.php?id=<?php echo $data["volunteers_id"]; ?>&status=0&eid=<?php echo $_GET["did"]; ?>">Absent</a>
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
