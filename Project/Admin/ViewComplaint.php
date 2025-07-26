<?php
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        color: #333;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        background-color: #e6f0ff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #cccccc;
    }
    th {
        background-color: #0066cc;
        color: white;
    }
    td {
        background-color: #ffffff;
    }
    tr:nth-child(even) {
        background-color: #d1e7ff;
    }
    tr:hover {
        background-color: #cce5ff;
    }
    .not-viewed {
        color: #dc3545;
        font-weight: bold;
    }
    .viewed {
        color: #28a745;
        font-weight: bold;
    }
    .action-links a {
        padding: 5px 10px;
        margin: 5px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        background-color: #007bff;
    }
    .action-links a:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
    <h1 align="center" style="color:#0066cc">Complaints</h1>
    <table>
        <tr>
            <th>SI NO</th>
            <th>Title</th>
            <th>Description</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "select * from tbl_complaint";
        $result = $con->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['complaint_title']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td>
                <?php
                $reply = $data['complaint_reply'];
                if ($reply == '') {
                    echo "<span class='not-viewed'>Not Viewed Yet</span>";
                } else {
                    echo "<span class='viewed'>" . $data['complaint_reply'] . "</span>";
                }
                ?>
            </td>
            <td class="action-links">
                <a href="reply.php?cid=<?php echo $data['complaint_id']; ?>">Reply</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
