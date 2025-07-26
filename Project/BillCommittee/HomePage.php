<?php
include("../Assets/Connection/connection.php");
session_start();  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="../Assets/Templates/Dashboard/admin/dist/styles.css">
    <link rel="stylesheet" href="../Assets/Templates/Dashboard/admin/dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        /* Optional: Add some custom styles */
        .profile-image-container {
            position: relative;
            display: inline-block;
        }
        .file-input {
            display: none; /* Hide the default file input */
        }
        .file-label {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Welcome <?php echo $_SESSION['aname']; ?></h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <div class="profile-image-container">
                        <!--<img id="profileImage" onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
    --><input type="file" class="file-input" id="fileInput" accept="image/*" onchange="previewImage(event)">
                        <label class="" for="fileInput">
                            <i class=""></i>
                        </label>
                    </div>
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Bill Committee</a>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="MyProfile.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user float-left mx-2"></i>
                            View Profile
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="../BillCommittee/ViewEvents.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-calendar-alt float-left mx-2"></i>
                            View Events
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="../BillCommittee/ViewBill.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-file-invoice float-left mx-2"></i>
                            View Bill
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="../BillCommittee/Complaint.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-file-alt float-left mx-2"></i>
                            Report Complaint
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2">
                        <a href="Logout.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-sign-out-alt float-left mx-2"></i>
                            Logout
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>
            </aside>
            <!--/Sidebar-->

            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <h2 class="text-center text-2xl">Welcome to the Bill Committee Dashboard</h2>
                <p class="text-center text-lg">You can manage your events and bills, and access your profile using the links on the left.</p>
            </main>
            <!--/Main-->
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
<script src="./main.js"></script>
</body>

</html>
