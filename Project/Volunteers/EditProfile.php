<?php
include("../Assets/Connection/connection.php");
session_start();

$selvc="select * from tbl_volunteers where volunteers_id='".$_SESSION["vid"]."'";
$resvc=$con->query($selvc);
$data=$resvc->fetch_assoc();

if(isset($_POST["btn_submit"]))
{
    $name = $_POST["txt_name"];
    $email = $_POST["txtemail"];

    $upQry = "update tbl_volunteers set volunteers_name='".$name."',volunteers_email='".$email."' where volunteers_id='".$_SESSION["vid"]."'";
    if($con->query($upQry))
    {
        echo "updated";
        ?>
        <script>
            window.location="MyProfile.php";
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
            background-color: #f0f8ff; /* Alice blue background */
            color: #333;
            text-align: center;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #e6f0ff; /* Light blue background for table */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #007bff;
        }
        th {
            background-color: #007bff; /* Blue background for table header */
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        h1 {
            color: #007bff; /* Blue color for heading */
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .back-button {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 20%;
        }
        .back-button:hover {
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
                <td><input type="text" name="txt_name" value="<?php echo $data["volunteers_name"]?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="email" name="txtemail" value="<?php echo $data["volunteers_email"]?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <button class="back-button" onclick="window.location='MyProfile.php';">Back to Profile</button>
</body>
</html>
