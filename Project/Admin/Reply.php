<?php
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {
    $qry = "UPDATE tbl_complaint SET complaint_reply='" . $_POST['txt_reply'] . "' WHERE complaint_id=" . $_GET['cid'];
    if ($con->query($qry)) {
        ?>
        <script>
            alert("Replied successfully.");
            window.location = "ViewComplaint.php";
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
    <title>Reply to Complaint</title>
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
        input[type="submit"] {
            background-color: #0066cc; /* Button background color */
            color: white; /* Button text color */
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005bb5; /* Button hover color */
        }
    </style>
</head>
<body>
    <h1>Reply to Complaint</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Reply</td>
                <td><textarea name="txt_reply" id="" required></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit" name="btn_submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
