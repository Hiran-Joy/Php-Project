<?php
include("../Assets/Connection/Connection.php");

$id = $_GET['eid'];

$selQryone = "select * from tbl_bill where bill_id=" . $_GET['eid'];
$resultone = $con->query($selQryone);
$dataone = $resultone->fetch_assoc();
$title = $dataone["bill_title"];
$amount = $dataone["bill_amount"];

if (isset($_POST["txt_update"])) {
    $title = $_POST['txt_title'];
    $amount = $_POST['txt_amount'];
    $upQry = "update tbl_bill set bill_title='" . $title . "', bill_amount='" . $amount . "' where bill_id=" . $id;
    if ($con->query($upQry)) {
        echo "updated";
        ?>
        <script>
            window.location = "ViewBill.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Update Bill</title>
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
        input[type="text"] {
            width: 90%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004d99;
        }
        .back-button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            width: 20%;
        }
        .back-button:hover {
            background-color: #004d99;
        }
    </style>
</head>

<body>
    <h1>Update Bill</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>Title</th>
                <td>
                    <input type="text" name="txt_title" id="txt_title" value="<?php echo htmlspecialchars($title); ?>" />
                </td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>
                    <input type="text" name="txt_amount" id="txt_amount" value="<?php echo htmlspecialchars($amount); ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="txt_update" id="txt_update" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <button class="back-button" onclick="window.location='ViewBill.php';">Back to View Bills</button>
</body>
</html>
