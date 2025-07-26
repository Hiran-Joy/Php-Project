<?php
include("../Assets/Connection/Connection.php");

if (isset($_GET["aid"])) {
    $aid = intval($_GET["aid"]);
    $upQry = "UPDATE tbl_report SET report_status = 1 WHERE report_id = " . $aid;
    if ($con->query($upQry)) {
        echo "<script>alert('Accepted'); window.location='ViewReport.php';</script>";
    }
}

if (isset($_GET["rid"])) {
    $rid = intval($_GET["rid"]);
    $upQry = "UPDATE tbl_report SET report_status = 2 WHERE report_id = " . $rid;
    if ($con->query($upQry)) {
        echo "<script>alert('Rejected'); window.location='ViewReport.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Management</title>
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
        a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }
        .approve {
            color: green;
        }
        .reject {
            color: red;
        }
        a:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h1>Report Management</h1>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Title</th>
            <th>Report</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_report";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
            $status = $data["report_status"];
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["report_title"]); ?></td>
                <td><?php echo htmlspecialchars($data["report_report"]); ?></td>
                <td><img src="../Assets/files/ReportCommittee/Photo/<?php echo $data["report_file"]; ?>" alt="Report Image" style="width: 100px; height: auto;"/></td>
                <td>
                    <?php
                    if ($status == 0) {
                    ?>
                        <a class="approve" href="ViewReport.php?aid=<?php echo $data["report_id"]; ?>">Approve</a>
                        <a class="reject" href="ViewReport.php?rid=<?php echo $data["report_id"]; ?>">Reject</a>
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
