<?php
include("../Assets/Connection/connection.php");
session_start();

// Fetch the program committee data based on the session ID
$selpc = "SELECT * FROM tbl_program_committee WHERE pc_id='" . $_SESSION["pgid"] . "'";
$respc = $con->query($selpc);
$data = $respc->fetch_assoc();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Profile</title>
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
            border: 1px solid #cccccc;
        }
        th {
            background-color: #0066cc; /* Blue background for table header */
            color: white;
        }
        td {
            background-color: #ffffff; /* White background for table data */
        }
        h1 {
            color: #0066cc; /* Blue color for heading */
        }
        a {
            color: #0066cc; /* Blue color for links */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        .center-text {
            text-align: center; /* Center align text */
        }
        .back-button {
            background-color: #0066cc; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            width: 20%;
        }
        .back-button:hover {
            background-color: #004d99; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Profile Information</h1>
    <table>
        <tr>
            <th scope="row">Name</th>
            <td><?php echo htmlspecialchars($data["pc_name"]); ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo htmlspecialchars($data["pc_email"]); ?></td>
        </tr>
        <tr>
            <td colspan="2" class="center-text">
                <a href="EditProfile.php">Edit Profile</a> / <a href="ChangePassword.php">Change Password</a>
            </td>
        </tr>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>
