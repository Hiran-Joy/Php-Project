<?php
include("../Assets/Connection/connection.php");
session_start();

$selvc="select * from tbl_volunteers where volunteers_id='".$_SESSION["vid"]."'";
$resvc=$con->query($selvc);
$data=$resvc->fetch_assoc();
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
            border: 1px solid #007bff;
        }
        th {
            background-color: #007bff; /* Blue background for table header */
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        h1 {
            color: #007bff; /* Blue color for heading */
        }
        .back-button {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 20%;
        }
        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Profile Details</h1>
    <table>
        <tr>
            <th scope="row">Name</th>
            <td><?php echo $data["volunteers_name"]; ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo $data["volunteers_email"]; ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="EditProfile.php">Edit Profile</a> / <a href="ChangePassword.php">Change Password</a>
            </td>
        </tr>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
</body>
</html>
