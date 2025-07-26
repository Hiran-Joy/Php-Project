<?php
include("../Assets/Connection/connection.php");
session_start();

$selmc = "SELECT * FROM tbl_media_committee WHERE mc_id='" . $_SESSION["mid"] . "'";
$resmc = $con->query($selmc);
$data = $resmc->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "UPDATE tbl_media_committee SET mc_name='" . $name . "', mc_email='" . $email . "' WHERE mc_id='" . $_SESSION["mid"] . "'";
    if ($con->query($upQry)) {
        ?>
        <script>
            alert("Profile Updated Successfully");
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #0066cc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #004d99; /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["mc_name"]); ?>" required /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["mc_email"]); ?>" required /></td>
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
