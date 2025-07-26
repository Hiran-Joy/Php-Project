<?php
include("./Assets/Connection/Connection.php");

// Fetch images from tbl_gallery with gallery_status = 1
$gallery = "SELECT * 
            FROM tbl_gallery g 
            INNER JOIN tbl_event e 
            ON e.event_id = g.event_id 
            WHERE e.event_status = 1 AND g.gallery_status = 1";
$rGal = $con->query($gallery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            max-width: 1200px;
            margin: 20px auto;
            padding: 10px;
        }
        .gallery-item {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .gallery-item .title {
            padding: 10px;
            text-align: center;
            background-color: #333;
            color: #fff;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h1>Image Gallery</h1>

<div class="gallery">
    <?php
    if ($rGal->num_rows > 0) {
        while ($row = $rGal->fetch_assoc()) {
            // Display only images with gallery_status = 1
            echo '<div class="gallery-item">';
            echo '<img src="Assets/files/MediaCommittee/photo/' . $row['gallery_file'] . '" alt="' . $row['gallery_title'] . '">';
            echo '<div class="title">' . $row['gallery_title'] . '</div>';
            echo '</div>';
        }
    } else {
        echo "No images found.";
    }
    ?>
</div>

</body>
</html>
