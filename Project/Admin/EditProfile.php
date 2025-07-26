<?php
include("../Assets/Connection/connection.php");
session_start();

$seladmin = "select * from tbl_admin where admin_id='" . $_SESSION["aid"] . "'";
$resadmin = $con->query($seladmin);
$data = $resadmin->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "update tbl_admin set admin_name='" . $name . "', admin_email='" . $email . "' where admin_id='" . $_SESSION["aid"] . "'";
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
<html>
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
    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
    <h1 style="color:#0066cc;">Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo $data["admin_name"] ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo $data["admin_email"] ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                    <!-- <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
                </td> -->
            </tr>
        </table>
    </form>
</body>
</html>
