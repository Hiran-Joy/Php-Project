<?php
include("../Assets/Connection/Connection.php");
session_start();

if (!isset($_SESSION['atid']) || empty($_SESSION['atid'])) {
    echo "User ID not found. Please log in.";
    exit; // Stop further execution
}

if (isset($_POST['btn_submit'])) {
    $complaint = $_POST['txt_title'];
    $details = $_POST['txt_dis'];
    $userId = intval($_SESSION['atid']);
    
    // Prepare statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO tbl_complaint (complaint_title, complaint_content, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $complaint, $details, $userId);
    
    if ($stmt->execute()) {
        ?>
        <script>
            alert('Complaint Sent');
            window.location = "Complaint.php";
        </script>
        <?php
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
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
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 80%;
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
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }
        .not-replied {
            color: red;
        }
        .replied {
            color: green;
        }
        .back-button {
            background-color: #007bff; /* Blue background for the button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            display: block; /* Center the button */
            width: 20%; /* Set a width for the button */
        }
        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h1>Submit Complaint</h1>
    <form action="" method="post">
        <table border="1">
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
    <table width="200" border="1">
        <tr>
            <td scope="row">SI NO</td>
            <td>Title</td>
            <td>Description</td>
            <td>Reply</td>
        </tr>
        <?php
        $i = 0;
        $userId = intval($_SESSION['atid']); // Ensure it's an integer
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
