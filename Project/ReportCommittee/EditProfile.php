<?php
include("../Assets/Connection/connection.php");
session_start();

$selrc = "select * from tbl_report_committee where rc_id='" . $_SESSION["rid"] . "'";
$resrc = $con->query($selrc);
$data = $resrc->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "update tbl_report_committee set rc_name='" . $name . "', rc_email='" . $email . "' where rc_id='" . $_SESSION["rid"] . "'";
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        color: #333;
        text-align: center;
    }
    table {
        margin: 50px auto;
        width: 50%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    th, td {
        padding: 12px;
        border: 1px solid #007bff;
        text-align: left;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        box-sizing: border-box;
    }
    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        border: 2px solid #007bff;
        background-color: white;
        color: #007bff;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #007bff;
        color: white;
    }
</style>
</head>

<body>
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table width="200" border="1">
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($data["rc_name"]); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo htmlspecialchars($data["rc_email"]); ?>" /></td>
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
