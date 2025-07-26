<?php
include("../Assets/Connection/Connection.php");
session_start();

// Check if user ID is set in the session
if (!isset($_SESSION['pid']) || empty($_SESSION['pid'])) {
    echo "User ID not found. Please log in.";
    exit; // Stop further execution
}

// Handling the complaint submission
if (isset($_POST['btn_submit'])) {
    $complaint = $_POST['txt_title'];
    $details = $_POST['txt_dis'];
    $userId = intval($_SESSION['pid']);
    
    // Insert complaint into the database
    $ins = "INSERT INTO tbl_complaint (complaint_title, complaint_content, user_id) VALUES ('$complaint', '$details', '$userId')";
    if ($con->query($ins)) {
        echo "<script>alert('Complaint Sent'); window.location = 'Complaint.php';</script>";
    } else {
        echo "<script>alert('Error sending complaint. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light gray background */
            color: #333; /* Dark text */
            text-align: center; /* Center the text */
        }
        h1 {
            color: #007bff; /* Blue color for headings */
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: white; /* White background for tables */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        th, td {
            padding: 12px;
            border: 1px solid #007bff; /* Blue border for cells */
            text-align: left; /* Left-align text */
        }
        th {
            background-color: #007bff; /* Blue background for header */
            color: white; /* White text for header */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray for even rows */
        }
        tr:hover {
            background-color: #007bff; /* Change background to blue on hover */
            color: white; /* Change text color to white on hover */
        }
        input[type="submit"], input[type="reset"] {
            background-color: #007bff; /* Blue button background */
            color: white; /* White button text */
            border: none; /* No border */
            padding: 10px 20px; /* Padding for buttons */
            cursor: pointer; /* Pointer cursor for buttons */
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .not-replied {
            color: red; /* Red for not viewed complaints */
        }
        .replied {
            color: green; /* Green for replied complaints */
        }
    </style>
</head>
<body>
    <h1>Submit Complaint</h1>
    <form action="" method="post">
        <table border="1" align="center">
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
    </form>

    <h1>Your Complaints</h1>
    <table width="200" border="1" align="center">
        <tr>
            <td scope="row">SI NO</td>
            <td>Title</td>
            <td>Description</td>
            <td>Reply</td>
        </tr>
        <?php
        $i = 0;
        $userId = intval($_SESSION['pid']); // Ensure it's an integer
        $sel = "SELECT * FROM tbl_complaint WHERE user_id=$userId";
        $result = $con->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data['complaint_title']); ?></td>
                <td><?php echo htmlspecialchars($data['complaint_content']); ?></td>
                <td>
                    <?php
                    $reply = $data['complaint_reply'];
                    if ($reply == '') {
                        echo '<span class="not-replied">Not Viewed Yet</span>';
                    } else {
                        echo '<span class="replied">' . htmlspecialchars($reply) . '</span>';
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
