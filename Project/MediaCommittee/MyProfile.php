<?php
include("../Assets/Connection/connection.php");
session_start();

$selmc = "SELECT * FROM tbl_media_committee WHERE mc_id='" . $_SESSION["mid"] . "'";
$resmc = $con->query($selmc);
$data = $resmc->fetch_assoc();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        table {
            width: 50%;
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
    <h1>Profile Details</h1>
    <table width="200" border="1">
        <tr>
            <th scope="row">Name</th>
            <td><?php echo htmlspecialchars($data["mc_name"]); ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo htmlspecialchars($data["mc_email"]); ?></td>
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
