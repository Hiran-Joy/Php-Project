<?php
include("../Assets/Connection/connection.php");
session_start();

$selrc = "select * from tbl_report_committee where rc_id='" . $_SESSION["rid"] . "'";
$resrc = $con->query($selrc);
$data = $resrc->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        color: #333;
        text-align: center;
    }
    table {
        margin: 50px auto;
        width: 50%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    th, td {
        padding: 12px;
        border: 1px solid #007bff;
        text-align: left;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        padding: 5px 10px;
        border: 2px solid #007bff;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }
    a:hover {
        background-color: #007bff;
        color: white;
    }
</style>
</head>

<body>
    <h1>Your Profile</h1>
    <table width="200" border="1">
        <tr>
            <th scope="row">Name</th>
            <td><?php echo htmlspecialchars($data["rc_name"]); ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo htmlspecialchars($data["rc_email"]); ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="EditProfile.php">Edit Profile</a> / 
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
