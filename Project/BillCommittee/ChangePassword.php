<?php
include("../Assets/Connection/connection.php");
session_start();
$message = "";

if (isset($_POST["btn_submit"])) {
    $currentpwd = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirmpwd = $_POST["txtconfirm"];

    // Check if current password is valid and matches the stored password
    $selbc = "SELECT * FROM tbl_bill_committee WHERE bc_password='$currentpwd' AND bc_id='" . $_SESSION["bid"] . "'";
    $resbc = $con->query($selbc);

    if ($data = $resbc->fetch_assoc()) {
        // Check if new password and confirm password match
        if ($newpwd == $confirmpwd) {
            // Validate new password: alphanumeric + at least 1 special character
            if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newpwd)) {
                // Update password if validation passes
                $upQry = "UPDATE tbl_bill_committee SET bc_password='$newpwd' WHERE bc_id='" . $_SESSION["bid"] . "'";
                if ($con->query($upQry)) {
                    $message = "Password Updated Successfully.";
                }
            } else {
                $message = "New password must be alphanumeric and contain at least one special character.";
            }
        } else {
            $message = "Passwords do not match.";
        }
    } else {
        $message = "Current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
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
        h1 {
            color: #0066cc;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #0066cc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004d99;
        }
        .message {
            color: red; /* Adjust color for message */
        }
    </style>
</head>

<body>
    <h1>Change Password</h1>
    <form id="form1" name="form1" method="post" action="">
        <table border="1">
            <tr>
                <th>Current Password</th>
                <td><input type="password" name="txtcurrent" id="txtcurrent" required /></td>
            </tr>
            <tr>
                <th>New Password</th>
                <td><input type="password" name="txtnew" id="txtnew" required /></td>
            </tr>
            <tr>
                <th>Confirm Password</th>
                <td><input type="password" name="txtconfirm" id="txtconfirm" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Update" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="message"><?php echo htmlspecialchars($message); ?></td>
            </tr>
        </table>
    </form>
</body>
</html>
