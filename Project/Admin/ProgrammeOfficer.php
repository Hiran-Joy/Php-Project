<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];
    
    $proof = $_FILES["file_proof"]['name'];
    $temp = $_FILES["file_proof"]['tmp_name'];
    move_uploaded_file($temp, '../Assets/files/Officer/Proof/' . $proof);
    
    $photo = $_FILES["file_photo"]['name'];
    $pho = $_FILES["file_photo"]['tmp_name'];
    move_uploaded_file($pho, '../Assets/files/Officer/Photo/' . $photo);

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM tbl_programme_officer WHERE po_email = '$email'";
    $checkResult = $con->query($checkEmailQuery);

    if ($checkResult && $checkResult->num_rows > 0) {
        // Email already exists
        echo "<script>
                alert('Email already exists. Please try with a different email.');
                window.history.back();
              </script>";
    } else {
        // Insert the new record
        $insqry = "INSERT INTO tbl_programme_officer (po_name, po_email, po_password, po_proof, po_photo)
                   VALUES ('$name', '$email', '$password', '$proof', '$photo')";

        if ($con->query($insqry)) {
            echo "<script>
                    alert('Inserted successfully');
                    window.location = 'ProgrammeOfficer.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error inserting the record. Please try again.');
                  </script>";
        }
    }
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_programme_officer WHERE po_id = $did";
    if ($con->query($delQry)) {
        echo "<script>
                window.location = 'ProgrammeOfficer.php';
              </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Programme Officer</title>
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
        background-color: #e6f0ff;
    }
    tr:hover {
        background-color: #d1e7ff;
    }
    input[type="text"], input[type="email"], input[type="file"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #0066cc;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #0055a5;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #0066cc;
    }
    a {
        color: #0066cc;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Programme Officer Form</h1>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="txt_name" title="Name allows only alphabets, spaces, and the first letter must be capital." pattern="^[A-Z]+[a-zA-Z ]*$" id="txt_name" required /></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="txt_email" id="txt_email" required /></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="text" name="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, one lowercase letter, and 8 or more characters" required id="txt_password" /></td>
                </tr>
                <tr>
                    <th>Proof</th>
                    <td><input type="file" name="file_proof" id="file_proof" required /></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input type="file" name="file_photo" id="file_photo" required /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <table>
        <tr>
            <th>SINO</th>
            <th>Officer Name</th>
            <th>Email</th>
            <th>Proof</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_programme_officer";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["po_name"]; ?></td>
            <td><?php echo $data["po_email"]; ?></td>
            <td><img src="../Assets/files/Officer/Proof/<?php echo $data["po_proof"]; ?>" width="75" height="75" /></td>
            <td><img src="../Assets/files/Officer/Photo/<?php echo $data["po_photo"]; ?>" width="75" height="75" /></td>
            <td>
                <a href="ProgrammeOfficer.php?did=<?php echo $data['po_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <center><button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button></center>
    <style>
        .back-button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .back-button:active {
            transform: scale(0.95);
        }
    </style>
</body>
</html>
