<?php
include("../Assets/Connection/connection.php");
session_start();

$seladmin = "SELECT * FROM tbl_programme_officer WHERE po_id='" . $_SESSION["pid"] . "'";
$resadmin = $con->query($seladmin);
$data = $resadmin->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "UPDATE tbl_programme_officer SET po_name='" . $name . "', po_email='" . $email . "' WHERE po_id='" . $_SESSION["pid"] . "'";
    if ($con->query($upQry)) {
        echo "updated";
        ?>
        <script>
            window.location = "MyProfile.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px; /* Rounded corners */
        }
        input[type="submit"], input[type="reset"] {
            background-color: #0066cc; /* Button background color */
            color: white; /* Button text color */
            border: none;
            padding: 10px 15px;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #005bb5; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["po_name"]); ?>" required /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["po_email"]); ?>" required /></td>
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
