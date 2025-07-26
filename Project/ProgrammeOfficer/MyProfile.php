<?php
include("../Assets/Connection/connection.php");
session_start();

$seladmin = "SELECT * FROM tbl_programme_officer WHERE po_id='" . $_SESSION["pid"] . "'";
$resadmin = $con->query($seladmin);
$data = $resadmin->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light background color */
            color: #333; /* Text color */
            text-align: center;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* White background for the table */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Box shadow for depth */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #0066cc; /* Blue border */
        }
        th {
            background-color: #0066cc; /* Header background color */
            color: white; /* Header text color */
        }
        a {
            color: #0066cc; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>

<body>
    <h1>Profile Information</h1>
    <table>
        <tr>
            <th>Name</th>
            <td><?php echo htmlspecialchars($data["po_name"]); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($data["po_email"]); ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="EditProfile.php">Edit Profile</a> | 
                <a href="ChangePassword.php">Change Password</a>
            </td>
        </tr>
    </table>
    <!-- HTML -->
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
