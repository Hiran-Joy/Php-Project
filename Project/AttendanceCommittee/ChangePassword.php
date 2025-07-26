<?php
include("../Assets/Connection/connection.php");
session_start();
$message = "";

if (isset($_POST["btn_submit"])) {
    $currentpwd = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirmpwd = $_POST["txtconfirm"];

    // Check if the current password matches the stored password in the database
    $selbc = "SELECT * FROM tbl_attendance_committee WHERE ac_password='$currentpwd' AND ac_id='" . $_SESSION["atid"] . "'";
    $resbc = $con->query($selbc);
    if ($data = $resbc->fetch_assoc()) {
        if ($newpwd == $confirmpwd) {
            // Check if the new password meets the alphanumeric and special character requirement
            if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $newpwd)) {
                // Update the password if new passwords match and meet the criteria
                $upQry = "UPDATE tbl_attendance_committee SET ac_password='$newpwd' WHERE ac_id='" . $_SESSION["atid"] . "'";
                if ($con->query($upQry)) {
                    $message = "Password Updated";
                }
            } else {
                $message = "Password must be alphanumeric and contain at least one special character.";
            }
        } else {
            $message = "Passwords do not match";
        }
    } else {
        $message = "Please check the current password";
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
        input[type="password"] {
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
    <script>
        // Client-side validation for password
        function validateForm() {
            const currentPwd = document.forms["form1"]["txtcurrent"].value;
            const newPwd = document.forms["form1"]["txtnew"].value;
            const confirmPwd = document.forms["form1"]["txtconfirm"].value;

            // Check if passwords match
            if (newPwd !== confirmPwd) {
                alert("Passwords do not match.");
                return false;
            }

            // Check if password length is at least 6 characters
            if (newPwd.length < 6) {
                alert("Password should be at least 6 characters long.");
                return false;
            }

            // Check if password is alphanumeric and contains at least one special character
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            if (!passwordRegex.test(newPwd)) {
                alert("Password must be alphanumeric and contain at least one special character.");
                return false;
            }

            return true; // Form is valid
        }
    </script>
</head>

<body>
    <h1>Change Password</h1>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
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
