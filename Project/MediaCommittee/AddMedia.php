<?php
include("../Assets/Connection/Connection.php");
$title = "";
$amount = "";
$file = "";
$aid = 0;



if (isset($_POST["btn_submit"])) {
    $title = $_POST["txt_title"];
    $eid = $_GET['eid'];

    $file = $_FILES["file_file"]['name'];
    $path = $_FILES["file_file"]['tmp_name'];
    move_uploaded_file($path, '../Assets/files/MediaCommittee/photo/' . $file);
    
    $insqry = "insert into tbl_gallery(gallery_title,gallery_file, event_id)values('" . $title . "','" . $file . "', '".$eid. "')";
    if ($con->query($insqry)) {
        ?>
        <script>
            alert("Inserted");
            window.location = "AddMedia.php"; // You can keep this for the same page after insert.
        </script>
        <?php
    }   
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add Media</title>
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

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #007BFF; /* Blue border for input fields */
            border-radius: 4px;
        }

        input[type="submit"], .back-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF; /* Blue background for the submit button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px; /* Add space above the back button */
        }

        input[type="submit"]:hover, .back-button:hover {
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
            <th>File</th>
            <td><input type="file" name="file_file" id="file_file" /></td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                <button type="button" class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
            </th>
        </tr>
    </table>
</form>
</body>
</html>
