<?php
include("../Assets/Connection/Connection.php");
$title = "";
$amount = "";
$file = "";
$aid = 0;

// Handle accepting a bill
if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
    $upQry = "UPDATE tbl_bill SET bill_status = 1 WHERE bill_id = " . $aid;
    if ($con->query($upQry)) {
        echo "<script>alert('Bill Accepted');</script>";
        echo "<script>window.location = 'ViewBill.php';</script>";
    }
}

// Handle rejecting a bill
if (isset($_GET["rid"])) {
    $rid = $_GET["rid"];
    $upQry = "UPDATE tbl_bill SET bill_status = 2 WHERE bill_id = " . $rid;
    if ($con->query($upQry)) {
        echo "<script>alert('Bill Rejected');</script>";
        echo "<script>window.location = 'ViewBill.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bills</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .approved {
            color: green;
            font-weight: bold;
        }
        .rejected {
            color: red;
            font-weight: bold;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Billing Management</h1>

    <table>
        <tr>
            <th>SlNo.</th>
            <th>Title</th>
            <th>Amount</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_bill";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            $status = $data["bill_status"];
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["bill_title"]); ?></td>
                <td><?php echo htmlspecialchars($data["bill_amount"]); ?></td>
                <td><img src="../Assets/files/BillCommittee/File/<?php echo htmlspecialchars($data["bill_file"]); ?>" width="61" height="61" /></td>
               
                <td>
                    <?php
                    if ($status == 0) {
                    ?>
                        <a href="ViewBill.php?aid=<?php echo $data["bill_id"]; ?>">Approve</a>
                        <a href="ViewBill.php?rid=<?php echo $data["bill_id"]; ?>">Reject</a>
                    <?php
                    } else if ($status == 1) {
                        echo '<span class="approved">APPROVED</span>';
                    } else {
                        echo '<span class="rejected">REJECTED</span>';
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table> <!-- HTML -->
<button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

<!-- CSS -->
<style>
  .back-button {
    background-color: #007BFF; /* Blue color */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .back-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05); /* Slight zoom effect */
  }

  .back-button:active {
    transform: scale(0.95); /* Slight shrink effect on click */
  }
</style>
</body>
</html>
