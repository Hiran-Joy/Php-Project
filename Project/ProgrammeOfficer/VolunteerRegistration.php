<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];
    $proof = $_FILES["file_proof"]['name'];
    $tempProof = $_FILES["file_proof"]['tmp_name'];
    $photo = $_FILES["file_photo"]['name'];
    $tempPhoto = $_FILES["file_photo"]['tmp_name'];

    // Server-side validation
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        echo "<script>alert('Name can only contain letters and spaces.'); window.location='VolunteerRegistration.php';</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location='VolunteerRegistration.php';</script>";
        exit;
    }

    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        echo "<script>alert('Password must be at least 8 characters long, include at least one letter, one number, and one special character.'); window.location='VolunteerRegistration.php';</script>";
        exit;
    }

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM tbl_volunteers WHERE volunteers_email = ?";
    $stmt = $con->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists. Please use a different email.'); window.location='VolunteerRegistration.php';</script>";
        exit;
    }
    $stmt->close();

    // Move uploaded files
    move_uploaded_file($tempProof, '../Assets/files/Volunteer/Proof/' . $proof);
    move_uploaded_file($tempPhoto, '../Assets/files/Volunteer/Photo/' . $photo);

    // Prepare the insert statement
    $insqry = "INSERT INTO tbl_volunteers (volunteers_name, volunteers_email, volunteers_password, volunteers_proof, volunteers_photo) 
               VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insqry);
    $stmt->bind_param("sssss", $name, $email, $password, $proof, $photo);

    if ($stmt->execute()) {
        echo "<script>alert('Inserted Successfully'); window.location='VolunteerRegistration.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location='VolunteerRegistration.php';</script>";
    }
    $stmt->close();
}

if (isset($_GET["did"])) {
    $did = intval($_GET["did"]);
    $delQry = "DELETE FROM tbl_volunteers WHERE volunteers_id = ?";
    $stmt = $con->prepare($delQry);
    $stmt->bind_param("i", $did);
    
    if ($stmt->execute()) {
        echo "<script>window.location='VolunteerRegistration.php';</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        input[type="text"], input[type="file"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #ff0000;
        }
        a:hover {
            text-decoration: underline;
        }
        .back-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            width: 20%;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Volunteer Registration</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_name" id="txt_name" required /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_email" id="txt_email" autocomplete="off" required /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt_password" id="txt_password" autocomplete="off" required /></td>
            </tr>
            <tr>
                <td>Proof</td>
                <td><input type="file" name="file_proof" id="file_proof" required /></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="file_photo" id="file_photo" required /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
            </tr>
        </table>
    </form>

    <h2>Registered Volunteers</h2>
    <table>
        <tr>
            <th>S.No</th>
            <th>Volunteer Name</th>
            <th>Email</th>
            <th>Proof</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "SELECT * FROM tbl_volunteers";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["volunteers_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["volunteers_email"]); ?></td>
                <td><img src="../Assets/files/Volunteer/Proof/<?php echo htmlspecialchars($data["volunteers_proof"]); ?>" width="75" height="75" alt="Proof" /></td>
                <td><img src="../Assets/files/Volunteer/Photo/<?php echo htmlspecialchars($data["volunteers_photo"]); ?>" width="75" height="75" alt="Photo" /></td>
                <td><a href="VolunteerRegistration.php?did=<?php echo $data["volunteers_id"]; ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <button class="back-button" onclick="window.location='homepage.php';">Back to Homepage</button>
    
    <script>
        function validateForm() {
            const name = document.getElementById("txt_name").value;
            const email = document.getElementById("txt_email").value;
            const password = document.getElementById("txt_password").value;

            // Name validation: should not contain numbers
            if (/\d/.test(name)) {
                alert("Name cannot contain numbers.");
                return false;
            }

            // Email validation: ensure proper format
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Password validation: at least 8 characters, includes a special character and alphanumeric values
            const passwordPattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!password.match(passwordPattern)) {
                alert("Password must be at least 8 characters long, include at least one letter, one number, and one special character.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
