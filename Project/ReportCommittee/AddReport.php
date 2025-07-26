<?php
include("../Assets/Connection/Connection.php");
$title = "";
$report = "";
$file = "";
$aid = 0;
if (isset($_POST["btn_submit"])) {
    $title = $_POST["txt_title"];
    $report = $_POST["txt_report"];
    $file = $_FILES["file_file"]['name'];
    $path = $_FILES["file_file"]['tmp_name'];
    move_uploaded_file($path, '../Assets/files/ReportCommittee/Photo/' . $file);
    
    $insqry = "insert into tbl_report(report_title,report_report,report_file)values('" . $title . "','" . $report . "','" . $file . "')";
    if ($con->query($insqry)) {
        ?>
        <script>
        alert("Inserted");
        window.location = "AddReport.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Report</title>
<style>
    body {
        background-color: white; /* White background for the page */
        font-family: Arial, sans-serif;
        color: #333; /* Dark text for readability */
    }
    
    table {
        width: 50%;
        margin: 50px auto;
        border-collapse: collapse;
        background-color: white; /* White background for the form */
        border: 2px solid #007BFF; /* Blue border */
    }
    
    th {
        background-color: #007BFF; /* Blue background for headers */
        color: white;
        padding: 10px;
        text-align: left;
    }
    
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #007BFF; /* Blue borders for the table cells */
    }

    input[type="text"], textarea, input[type="file"] {
        width: 400px;
        padding: 8px;
        border: 1px solid #007BFF; /* Blue border for input fields */
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF; /* Blue background for the submit button */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    th, td {
        text-align: center; /* Centered text in all table cells */
    }
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table>
    <tr>
      <th>Title</th>
      <td><input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <th>Report</th>
      <td><textarea name="txt_report" id="txt_report" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <th>Images</th>
      <td><input type="file" name="file_file" id="file_file" /></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></th>
    </tr>
  </table>
  <div align="center">  <!-- HTML -->
<a href="HomePage.php" class="back-button">Back to Homepage</a>
</div>
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
</form>
</body>
</html>
