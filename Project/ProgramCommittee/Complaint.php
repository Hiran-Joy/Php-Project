<?php
include("../Assets/Connection/Connection.php");
session_start();

if (!isset($_SESSION['pgid']) || empty($_SESSION['pgid'])) {
    echo "User ID not found. Please log in.";
    exit; // Stop further execution
}

if (isset($_POST['btn_submit'])) {
    $complaint = $_POST['txt_title'];
    $details = $_POST['txt_dis'];
    $userId = intval($_SESSION['pgid']);
    $ins = "INSERT INTO tbl_complaint (complaint_title, complaint_content, user_id) VALUES ('$complaint', '$details', '$userId')";
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Submit Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
        }
        table {
            margin: 20px auto;
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
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"], .back-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 5px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover, .back-button:hover {
            background-color: #0056b3;
        }
        /* Custom classes for status replies */
        .not-replied {
            color: red;
            font-weight: bold;
        }
        .replied {
            color: green;
            font-weight: bold;
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
            <th>SI NO</th>
            <th>Title</th>
            <th>Description</th>
            <th>Reply</th>
        </tr>
        <?php
        $i = 0;
        $userId = intval($_SESSION['pgid']); // Ensure it's an integer
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
    </table>

    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>

</body>
</html>
