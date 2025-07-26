<?php
include("../Assets/Connection/connection.php");
session_start();

// Fetch user data from the database
$selbc = "SELECT * FROM tbl_attendance_committee WHERE ac_id='" . $_SESSION["atid"] . "'";
$resbc = $con->query($selbc);
$data = $resbc->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    // Server-side validation for email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Invalid email format. Please try again.</p>";
    } else {
        // Update query
        $upQry = "UPDATE tbl_attendance_committee SET ac_name='$name', ac_email='$email' WHERE ac_id='" . $_SESSION["atid"] . "'";
        if ($con->query($upQry)) {
            echo "Updated successfully.";
            ?>
            <script>
                window.location = "MyProfile.php";
            </script>
            <?php
        } else {
            echo "<p style='color: red;'>Error updating profile. Please try again.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Profile</title>
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #0066cc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #004d99;
        }
        .center-text {
            text-align: center;
        }
        .error {
            color: red;
        }
    </style>
    <script>
        function validateForm() {
            const email = document.forms["form1"]["txtemail"].value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
        <table border="1">
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["ac_name"]); ?>" required /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["ac_email"]); ?>" required /></td>
            </tr>
            <tr>
                <td colspan="2" class="center-text">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                    <!-- <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /> -->
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
