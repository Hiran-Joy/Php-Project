<?php
include("../Assets/Connection/Connection.php");
$name = "";
$desc = "";
$date = "";
$count = "";
$aid = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Events</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
    }
    table {
        margin: 50px auto;
        width: 70%;
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
    a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
<h1>View Events</h1>
<table border="1">
  <tr>
    <th>SlNo.</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Count</th>
    <th>Action</th>
  </tr>
  <?php
    $selQry = "select * from tbl_event where event_status=1";
    $result = $con->query($selQry);
    $i = 0;
    while ($data = $result->fetch_assoc()) {
        $i++;    
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo htmlspecialchars($data["event_name"]); ?></td>   
    <td><?php echo htmlspecialchars($data["event_desc"]); ?></td>  
    <td><?php echo htmlspecialchars($data["event_date"]); ?></td>   
    <td><?php echo htmlspecialchars($data["event_count"]); ?></td>             
    <td><a href="AddReport.php">Add Report</a></td>
  </tr>
  <?php
    }
  ?>
</table>  <!-- HTML -->
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
