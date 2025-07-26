<?php
include("../Assets/Connection/connection.php");
session_start();

$selbc = "SELECT * FROM tbl_bill_committee WHERE bc_id='" . $_SESSION["bid"] . "'";
$resbc = $con->query($selbc);
$data = $resbc->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "UPDATE tbl_bill_committee SET bc_name='$name', bc_email='$email' WHERE bc_id='" . $_SESSION["bid"] . "'";
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
    </style>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table border="1">
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["bc_name"]); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["bc_email"]); ?>" /></td>
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
