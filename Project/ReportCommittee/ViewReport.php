<?php
include("../Assets/Connection/Connection.php");
session_start();
$title = "";
$report = "";
$file = "";
$aid = 0;

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "delete from tbl_report where report_id=" . $did;
    if ($con->query($delQry)) {
        ?>
        <script>
        window.location = "ViewReport.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Report</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
    }
    table {
        margin: 50px auto;
        width: 80%;
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
    img {
        width: 84px;
        height: 85px;
    }
    a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
    .approved {
        color: green;
        font-weight: bold;
    }
    .rejected {
        color: red;
        font-weight: bold;
    }
    .pending {
        color: orange;
        font-weight: bold;
    }
</style>
</head>

<body>
<h1>View Reports</h1>
<table width="387" border="1">
  <tr>
    <th>SlNo.</th>
    <th>Title</th>
    <th>Report</th>
    <th>Image</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php
    $selQry = "select * from tbl_report";
    $result = $con->query($selQry);
    $i = 0;
    while ($data = $result->fetch_assoc()) {
        $i++;    
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo htmlspecialchars($data["report_title"]); ?></td>   
    <td><?php echo htmlspecialchars($data["report_report"]); ?></td>  
    <td><img src="../Assets/files/ReportCommittee/Photo/<?php echo $data["report_file"]; ?>" /></td>                
    <td>
      <?php
        $status = $data["report_status"];
        if ($status == 1) {
            echo '<span class="approved">APPROVED</span>';
        } else if ($status == 2) {
            echo '<span class="rejected">REJECTED</span>';
        } else {
            echo '<span class="pending">PENDING</span>';
        }
      ?>
    </td>
    <td><a href="ViewReport.php?did=<?php echo $data["report_id"];?>">Delete</a></td>
  </tr>
  <?php
    }
  ?>
</table>
 <!-- HTML -->
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
