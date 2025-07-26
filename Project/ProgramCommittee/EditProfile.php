<?php
include("../Assets/Connection/connection.php");
session_start();

// Fetch the program committee data based on the session ID
$selpc = "SELECT * FROM tbl_program_committee WHERE pc_id='" . $_SESSION["pgid"] . "'";
$respc = $con->query($selpc);
$data = $respc->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "UPDATE tbl_program_committee SET pc_name='" . $con->real_escape_string($name) . "', pc_email='" . $con->real_escape_string($email) . "' WHERE pc_id='" . $_SESSION["pgid"] . "'";
    
    if ($con->query($upQry)) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script>window.location='MyProfile.php';</script>";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light gray background */
            color: #333; /* Dark text color */
            text-align: center; /* Center the text */
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: white; /* White background for table */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        th, td {
            padding: 12px;
            border: 1px solid #007bff; /* Blue border for cells */
            text-align: left; /* Left-align text */
        }
        th {
            background-color: #007bff; /* Blue background for header */
            color: white; /* White text for header */
        }
        input[type="text"], input[type="email"] {
            width: 100%; /* Full width inputs */
            padding: 10px; /* Padding for inputs */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px; /* Rounded corners */
        }
        input[type="submit"], input[type="reset"] {
            background-color: #007bff; /* Blue background for buttons */
            color: white; /* White text for buttons */
            border: none; /* No border */
            padding: 10px 15px; /* Padding for buttons */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            margin: 5px; /* Margin between buttons */
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table width="200" border="1">
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["pc_name"]); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["pc_email"]); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                    <!-- <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /> -->
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
