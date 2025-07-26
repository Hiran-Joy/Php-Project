<?php
include("../Assets/Connection/connection.php");
session_start();
$message = "";

if (isset($_POST["btn_submit"])) {
    $currentpwd = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirmpwd = $_POST["txtconfirm"];

    // Server-side validation for password strength
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newpwd)) {
        $message = "Password must be at least 8 characters long, alphanumeric, and contain at least one special character.";
    } else {
        $selpo = "SELECT * FROM tbl_Programme_officer WHERE po_password='" . $currentpwd . "' AND po_id='" . $_SESSION["pid"] . "'";
        $respo = $con->query($selpo);
        if ($data = $respo->fetch_assoc()) {
            if ($newpwd == $confirmpwd) {
                $upQry = "UPDATE tbl_Programme_officer SET po_password='" . $newpwd . "' WHERE po_id='" . $_SESSION["pid"] . "'";
                if ($con->query($upQry)) {
                    $message = "Password Updated";
                }
            } else {
                $message = "Passwords do not match.";
            }
        } else {
            $message = "Please check the current password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light background color */
            color: #333; /* Text color */
            text-align: center;
        }
        form {
            width: 300px; /* Fixed width for the form */
            margin: 50px auto; /* Center the form */
            padding: 20px; /* Padding around the form */
            background-color: #ffffff; /* White background for the form */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Box shadow for depth */
            border-radius: 5px; /* Rounded corners */
        }
        table {
            width: 100%; /* Table takes the full width of the form */
        }
        th {
            text-align: left;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0; /* Space between fields */
            border: 1px solid #ccc;
            border-radius: 4px; /* Rounded corners */
        }
        input[type="submit"] {
            background-color: #0066cc; /* Button background color */
            color: white; /* Button text color */
            border: none;
            padding: 10px;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            width: 100%; /* Button takes full width */
        }
        input[type="submit"]:hover {
            background-color: #005bb5; /* Darker blue on hover */
        }
        .message {
            margin-top: 10px; /* Space above the message */
            color: #d9534f; /* Bootstrap danger color */
        }
    </style>
    <script>
        function validateForm() {
            const newPassword = document.getElementById("txtnew").value;
            const confirmPassword = document.getElementById("txtconfirm").value;
            const regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!regex.test(newPassword)) {
                alert("Password must be at least 8 characters long, alphanumeric, and contain at least one special character.");
                return false;
            }

            if (newPassword !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Change Password</h1>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
        <table>
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
                <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Update" /></td>
            </tr>
            <tr>
                <td colspan="2" class="message"><?php echo $message; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>
