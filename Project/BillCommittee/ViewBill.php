<?php
include("../Assets/Connection/Connection.php");
$title = "";
$amount = "";
$file = "";
$aid = 0;

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_bill WHERE bill_id=" . $did;
    if ($con->query($delQry)) {
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
    <title>View Bills</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        table {
            width: 80%;
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
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .back-button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
        }
        .back-button:hover {
            background-color: #005bb5;
        }
    </style>
</head>

<body>
    <h1>View Bills</h1>
    <table border="1">
        <tr>
            <th>Sl No.</th>
            <th>Title</th>
            <th>Amount</th>
            <th>File</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_bill";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["bill_title"]); ?></td>
                <td><?php echo htmlspecialchars($data["bill_amount"]); ?></td>
                <td>
                    <img src="../Assets/files/BillCommittee/File/<?php echo htmlspecialchars($data["bill_file"]); ?>" width="61" height="61" />
                </td>
                <td><?php
                    $status = $data["bill_status"];

                    if ($status == 1) {
                        echo "APPROVED";
                    } else if ($status == 2) {
                        echo "REJECTED";
                    } else {
                        echo "PENDING";
                    }
                    ?>
                </td>
                <td>
                    <a href="ViewBill.php?did=<?php echo $data["bill_id"]; ?>">Delete</a>
                    <a href="EditBill.php?eid=<?php echo $data["bill_id"]; ?>">Edit</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

</body>
</html>
