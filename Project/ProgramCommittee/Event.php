<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $desc = $_POST["txt_desc"];
    $date = $_POST["txt_date"];
    $count = $_POST["txt_count"];
    
    // Insert query
    $insqry = "INSERT INTO tbl_event (event_name, event_desc, event_date, event_count) 
               VALUES ('" . $name . "', '" . $desc . "', '" . $date . "', '" . $count . "')";
    
    if ($con->query($insqry)) {
        echo '<script>
                alert("Event Inserted Successfully");
                window.location = "homepage.php"; // Redirect to homepage
              </script>';
    } else {
        echo $insqry;	
    }
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_event WHERE event_id = " . $did;
    if ($con->query($delQry)) {
        echo '<script>
                window.location="Event.php";
              </script>';
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Event Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Alice blue background */
            color: #333;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: white;
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
        a {
            color: #007bff; /* Blue color for links */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], .back-button {
            background-color: #007bff; /* Blue color for button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 200px;
        }
        input[type="submit"]:hover, .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .center-text {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Event Management</h1>
    <form id="form1" name="form1" method="post" action="">
        <table width="410" border="1">
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="txt_name" id="txt_name" required /></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><textarea name="txt_desc" id="txt_desc" cols="45" rows="5" required></textarea></td>
            </tr>
            <tr>
                <th scope="row">Date</th>
                <td><input type="text" name="txt_date" id="txt_date" required /></td>
            </tr>
            <tr>
                <th scope="row">Count</th>
                <td><input type="text" name="txt_count" id="txt_count" required /></td>
            </tr>
            <tr>
                <td colspan="2" class="center-text">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    <table border="1" align="center">
        <tr>
            <td>SINO:</td>
            <td>Name</td>
            <td>Description</td>
            <td>Date</td>
            <td>Count</td>
            <td>Action</td>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_event";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["event_name"]; ?></td>
            <td><?php echo $data["event_desc"]; ?></td>
            <td><?php echo $data["event_date"]; ?></td>
            <td><?php echo $data["event_count"]; ?></td>
            <td><a href="Event.php?did=<?php echo $data["event_id"]; ?>">Delete</a></td>
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
    width: 200px;
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
