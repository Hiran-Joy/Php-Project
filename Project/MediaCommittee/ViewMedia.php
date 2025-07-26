<?php
include("../Assets/Connection/Connection.php");

if (isset($_GET["did"])) {
    $did = (int)$_GET["did"]; // Cast to integer for security
    $delQry = "DELETE FROM tbl_gallery WHERE gallery_id=?";
    $stmt = $con->prepare($delQry);
    $stmt->bind_param("i", $did);
    if ($stmt->execute()) {
        echo "<script>alert('Media deleted successfully!'); window.location='ViewMedia.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Media Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light background color */
            color: #333; /* Text color */
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* White background for the table */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Box shadow for depth */
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #0066cc; /* Blue border */
        }
        th {
            background-color: #0066cc; /* Header background color */
            color: white; /* Header text color */
        }
        td img {
            max-width: 100%; /* Responsive image */
            height: auto; /* Maintain aspect ratio */
        }
        a {
            color: #0066cc; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        .approved {
            color: green; /* Green for approved status */
        }
        .rejected {
            color: red; /* Red for rejected status */
        }
        .pending {
            color: orange; /* Optional: color for pending status */
        }
        .homepage-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Media Gallery</h1>
    <div class="homepage-button">
    <!--<a href="../homepage.php" style="font-size: 16px; color: #ffffff; background-color: #0066cc; padding: 10px 20px; border-radius: 5px; text-decoration: none;"></a>
    -->
</div>
    <table>
        <tr>
            <th>SlNo.</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_gallery";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo htmlspecialchars($data["gallery_title"]); ?></td>
            <td><img src="../Assets/files/MediaCommittee/Photo/<?php echo htmlspecialchars($data["gallery_file"]); ?>" width="91" height="87" /></td>
            <td>
                <?php
                $status = $data["gallery_status"];    
                if ($status == 1) {
                    echo "<span class='approved'>APPROVED</span>";
                } else if ($status == 2) {
                    echo "<span class='rejected'>REJECTED</span>";
                } else {
                    echo "<span class='pending'>PENDING</span>";
                }
                ?>
            </td>
            <td>
                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $data['gallery_id']; ?>)">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this media?")) {
                window.location.href = "?did=" + id; // Redirect to delete the media
            }
        }
    </script>
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
