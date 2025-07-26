<?php
include("../Assets/Connection/connection.php");
session_start();

$seladmin = "select * from tbl_admin where admin_id='" . $_SESSION["aid"] . "'";
$resadmin = $con->query($seladmin);
$data = $resadmin->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        color: #333;
        text-align: center;
    }
    table {
        width: 50%;
        margin: 50px auto;
        border-collapse: collapse;
        background-color: #e6f0ff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    th, td {
        padding: 15px;
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
    a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        background-color: #007bff;
        padding: 8px 12px;
        border-radius: 4px;
        margin: 5px;
    }
    a:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
    <h1 style="color:#0066cc;">Admin Profile</h1>
    <table>
        <tr>
            <th scope="row">Name</th>
            <td><?php echo $data["admin_name"] ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td><?php echo $data["admin_email"] ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="EditProfile.php">Edit Profile</a>
                <a href="ChangePassword.php">Change Password</a>
            </td>
        </tr>
    </table>
</body>
</html>
