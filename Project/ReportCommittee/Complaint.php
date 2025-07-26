<?php
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_POST['btn_submit'])) {
    $complaint = $_POST['txt_title'];
    $details = $_POST['txt_dis'];
    $ins = "insert into tbl_complaint(complaint_title,complaint_content,user_id) values('" . $complaint . "','" . $details . "','" . $_SESSION['rid'] . "')";
    if ($con->query($ins)) {
        ?>
        <script>
        alert('Complaint Sent');
        window.location = "Complaint.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
    }
    table {
        margin: 50px auto;
        width: 60%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    textarea, input[type="text"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
<h1>Submit a Complaint</h1>
<form action="" method="post">
<table width="372" border="1">
  <tr>
    <th scope="row">Complaint Title</th>
    <td><input type="text" name="txt_title" id="txt_title" required /></td>
  </tr>
  <tr>
    <th scope="row">Complaint Description</th>
    <td><textarea name="txt_dis" id="txt_dis" cols="45" rows="5" required></textarea></td>
  </tr>
  <tr>
    <th colspan="2" scope="row">
      <input type="submit" name="btn_submit" id="btn_submit" value="Send" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </th>
  </tr>
</table>
<br />

<h2>Your Complaints</h2>
<table width="600" border="1">
  <tr>
    <th>SI NO</th>
    <th>Title</th>
    <th>Description</th>
    <th>Reply</th>
  </tr>
  <?php
  $i = 0;
  $sel = "select * from tbl_complaint where user_id=" . $_SESSION['rid'];
  $result = $con->query($sel);
  while ($data = $result->fetch_assoc()) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo htmlspecialchars($data['complaint_title']); ?></td>
    <td><?php echo htmlspecialchars($data['complaint_content']); ?></td>
    <td><?php
        $reply = $data['complaint_reply'];
        if ($reply == '') {
            echo "Not Viewed Yet";
        } else {
            echo htmlspecialchars($data['complaint_reply']);
        }
        ?></td>
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
</form>
</body>
</html>
