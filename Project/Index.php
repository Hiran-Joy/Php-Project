
<?php
include("./Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>NSS</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="Assets/Templates/Main/css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="Assets/Templates/Main/css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="Assets/Templates/Main/css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="Assets/Templates/Main/images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="Assets/Templates/Main/css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="Assets/Templates/Main/css/owl.carousel.min.css">
<link rel="stylesheet" href="Assets/Templates/Main/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
  .hide {
    display: none;
  }
</style>
</head>
<body>
  <!--header section start -->
    <div class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="logo"><!--<a href="index.html">--><img src="Assets/Templates/Main/images/logoo.png" width="100" height="auto"></a></div>
          </div>
          <div class="col-md-9">
            <div class="menu_text">
              <ul>
                <div class="togle_3">
                  <div class="menu_main">
                  <div class="padding_left0"><a href="#"></a>
                    <span class="padding_left0"><a href="Guest/login.php">Login</a></span></div>
                  </div>
                  <div class="shoping_bag"></div>
                </div> 
                <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                  <a href="index.php">Home</a>
                  <!-- <a href="services.html">Services</a> -->
                  <a href="#aboutnss">About NSS</a> 
                  <a href="#program">Programs</a>
                  <a href="#contactus">Contact Us</a>
                </div>
                </div>
                <span class="navbar-toggler-icon"></span>
                <span onclick="openNav()"><img src="Assets/Templates/Main/images/toggle-icon.png" class="toggle_menu"></span>
              </ul>
            </div>      
          </div>
        </div>
      </div>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <!--<h1 class="banner_taital">NIrmala college </h1> -->
            <h1 class="banner_taital_1">NATIONAL SERVICE SCHEME</h1>
            <p class="banner_text">‎ Not Me But You</p>

<style>
.banner_text {
    font-size: 21px; /* Adjust the size as needed */
}
</style>

            <!--<div class="contact_bt"><a href="contact.html">CONTACT US<span class="contact_padding"><img src="Assets/Templates/Main/images/contact-icon.png"></span></a></div>-->
          </div>
          <div class="col-sm-2">
            <div class="play_icon"><a href="#image-gal"><img src="Assets/Templates/Main/images/play-icon.png"></a></div>
          </div>
          <div class="col-sm-5">
            <div>
              <img src="Assets/Templates/Main/images/activity.png" class="image_1">
          </div>
          
          
          <style>
          .image_1 {
              margin-left: -150px; /* Adjust the value as needed */
          }
          </style>
          
          </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding" id="image-gal">
      <div class="container">
        <h1 class="services_taital"><span>Our</span> <img src="Assets/Templates/Main/images/icon-1.png"> <span style="color: #1f1f1f">Responsibilities</span></h1>
        <p class="services_text">We are committed to building a vibrant and harmonious society, where health and beauty thrive in every aspect of life.</p>
        <center>
          <div class="slider"> <!-- Image slider -->
            <?php
              $gallery="SELECT * from tbl_gallery g inner join tbl_event e on e.event_id=g.event_id where e.event_status=1  AND g.gallery_status = 1";

              $rGal=$con->query($gallery);
              while($dGal=$rGal->fetch_assoc()){
            ?>
              <img class="slide" src="Assets/files/MediaCommittee/photo/<?php echo $dGal['gallery_file'] ?>" style="object-fit: cover; width:400px; height:400px;">
              <?php
              }
              ?>
              <!-- <img class="slide" src="Assets/Templates/Main/Images\NSS_img3.jpg" width="500" height="400">
              <img class="slide" src="Assets/Templates/Main/Images\NSS_img2.jpg" width="500" height="400">
              <img class="slide" src="Assets/Templates/Main/Images\NSS_img4.jpg" width="500" height="400">
              <img class="slide" src="Assets/Templates/Main/Images\NSS_img6.jpg" width="500" height="400"> -->
          </div>
          <br>
          <a href="Gallery.php" class="btn btn-primary">VIEW MORE<span class="contact_padding"><img src="Assets/Templates/Main/images/contact-icon1.png"></span></a>
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide() {
  slides.forEach(slide => slide.style.display = 'none');
  slides[currentSlide].style.display = 'block';
  currentSlide = (currentSlide + 1) % slides.length;
}
setInterval(showSlide, 2000); 
</script>
    <!-- services section start -->
    <!-- about section start -->
    <br>
    <div class="about_section layout_padding">
      <div class="container">
        <div class="row">
          <div id="aboutnss">
          <div class="col-md-6">
            <div><img src="Assets/Templates/Main/images/nsshand-removebg-preview.png" width="400" height="auto"></div>
          </div>
          <div class="col-md-6" >
            <h1 class="services_taital"><span>About </span> <span style="color: #1f1f1f">NSS</span></h1>
            <p class="ipsum_text">The National Service Scheme (NSS) is an Indian government program that develops students' personalities
               through community service. It promotes social awareness and leadership by engaging volunteers in health initiatives, 
               environmental conservation, and education for underprivileged children. NSS empowers students to tackle societal challenges,
                bridging the gap between academic knowledge and real-world experience while fostering socially responsible citizens.
</p>
            <div class="contact_bt_1"><a href="#"><span class="contact_padding"></span></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- about section end -->
    <!-- choose section start -->
    <div class="choose_section layout_padding">
      <div class="container">
        <h1 class="choose_taital"><span>Why </span> <span style="color: #1f1f1f">Choose NSS</span></h1>
        <p class="choose_text">Choosing the National Service Scheme (NSS) can be beneficial for several
           reasons, especially for students and young professionals looking to grow personally and contribute
            to society:</p>
        <div class="choose_section_2 layout_padding">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="choose_box">
               
                <h4 class="client_text">Personal Development</h4>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="choose_box">
               
                <h4 class="client_text">Social Awareness</h4>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="choose_box">
              
                <h4 class="client_text">Skill Enhancement</h4>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="choose_box">
      
                <h4 class="client_text">NSS Certificates</h4>
              </div>
            </div>
          </div>
          <div class="image_3"><img src="Assets/Templates/Main/images/nssfun.png" width="600" height="auto"></div>
        </div>
      </div>
    </div>
    <!-- choose section end -->



	
  
</table>
    <!-- team section start -->
<div class="team_section layout_padding">
  <div class="container">
  <div id="program">
    <h1 class="choose_taital"><span>Our </span> 
      <!--<img src="Assets/Templates/Main/images/icon-1.png"> -->
      <span style="color: #1f1f1f">Programs</span>
    </h1>
    <p class="choose_text">We deliver for the society</p>
    <div class="team_section_2 layout_padding">
      <div class="container">

      <?php
 $selQry = "SELECT * 
 FROM tbl_event e 
 INNER JOIN tbl_gallery g 
 ON e.event_id = g.event_id 
 WHERE e.event_status = 1 AND g.gallery_status = 1";

    $result=$con->query($selQry);
    $counter = 0; // Counter to track number of items
    while($data=$result->fetch_assoc())
    {
      $counter++;
      $hideClass = ($counter > 3) ? 'hide' : ''; // Hide items after the third one
  ?>
    <div class="images_main_1 <?php echo $hideClass; ?>">
      <div class="row">
        <div class="col-sm-5">
          
        <?php
          $selQryOne="select * from tbl_gallery where event_id=".$data['event_id'];
          $resultOne=$con->query($selQryOne);
          if($dataOne=$resultOne->fetch_assoc())
          {
            // Debugging echo
            echo $dataOne['gallery_file']; // Check if this is correct
        ?>
     <img src="./Assets/files/MediaCommittee/photo/<?php echo $dataOne['gallery_file']; ?>" alt="Event Image">

      <?php
          } else {
            // If no image is found, display a default or placeholder image
            echo "<div>No image found for event ID ".$data['event_id']."</div>";
          }
        ?>
          
        </div>
        <div class="col-sm-7">
          <h2 class="consectetur_text"><?= $data['event_name']?></h2>
          <p class="dummy_text"><?php echo $data['event_desc'] ?></p>
        </div>
      </div>
    </div>

    <?php
    }
?>

      <!-- View More Button -->
      <br>
      <div id="viewMoreBtn">
      <div class="btn btn-primary" onclick="showMore()">VIEW MORE<span class="contact_padding"><img src="Assets/Templates/Main/images/contact-icon1.png"></span></a></div>
        <!--<button class="btn btn-primary" onclick="showMore()">View More</button>-->
      </div>

      </div>
    </div>
  </div>
</div>
<!-- team section end -->
    <!-- newsletter section start -->
    
          </div>
        </div>
      </div>
    </div>
    <!-- newsletter section end -->
    <!-- footer section start -->
    <div class="footer_section layout_padding">
      <div class="container">
        <div class="footer_main">
        <div id="contactus">
          <div class="footer_left">
            <h1 class="contact_taital"><span>Contact </span> <img src="Assets/Templates/Main/images/icon-2.png"> <span>Us</span></h1>
          </div>
          <div class="footer_left">
            <div class="location_text"><a href="#"><img src="Assets/Templates/Main/images/map-icon.png"><span class="padding_left_15">Nirmala College, Muvattupuzha</span></a></div>
          </div>
          <div class="footer_left">
            <div class="location_text"><a href="#"><img src="Assets/Templates/Main/images/call-icon.png"><span class="padding_left_15">+71 9876543210</span></a></div>
          </div>
          <div class="footer_left">
            <div class="location_text"><a href="#"><img src="Assets/Templates/Main/images/map-icon.png"><span class="padding_left_15">nssnirmala@gmail.com</span></a></div>
          </div>
        </div>
        <div class="contact_section">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="mail_section">
        <form onsubmit="sendEmail(); return false;">
          <input type="text" class="email_text" placeholder="Name" id="name" name="name" required>
          <input type="email" class="email_text" placeholder="Email" id="email" name="email" required>
          <input type="text" class="email_text" placeholder="Phone Number" id="phone" name="phone">
          <textarea class="massage_text" placeholder="Message" rows="5" id="message" name="message" required></textarea>
          <div class="send_bt"><button type="submit">Send</button></div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  .contact_section {
    padding: 20px;
    display: flex;
    justify-content: center; /* Centers the section horizontally */
    align-items: center; /* Centers the section vertically */
    min-height: 100vh; /* Ensures the section takes full height of the viewport */
  }

  .mail_section {
    background-color: black; /* Set the background color to black */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* width: 1318px; Set the specified width */
    height: 500px; /* Set the specified height */
    width: 1000px;
  }

  .email_text,
  .massage_text {
    width: 950px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-family: Arial, sans-serif;
    background-color: #fff; /* Set input background color to white for contrast */
    color: black; /* Set input text color to black */
  }

  .send_bt {
    text-align: center;
  }

  .send_bt button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  .send_bt button:hover {
    background-color: #0056b3;
  }
</style>

<script>
  function sendEmail() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var message = document.getElementById("message").value;

    var subject = "New message from contact form"; // Default subject
    var gmailLink = "https://mail.google.com/mail/?view=cm&fs=1&to=hiranjoy7@gmail.com" +
                    "&su=" + encodeURIComponent(subject) +
                    "&body=" + encodeURIComponent("Name: " + name + "\nEmail: " + email + "\nPhone: " + phone + "\n\n" + message);

    window.open(gmailLink, '_blank');
  }
</script>


            </div>
            <div class="col-md-6">
              <div class="map_main">
                <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4474.8382077020315!2d76.59237030695735!3d9.977788967413666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07dd8284ced141%3A0x98d748d934ecdc89!2sNirmala%20College%2C%20Muvattupuzha!5e0!3m2!1sen!2sin!4v1728551388818!5m2!1sen!2sin" width="1318" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
              </div>
              <div class="social_icon">
                <ul>
                  <li><a href="#"><img src="Assets/Templates/Main/images/fb-icon1.png"></a></li>
                  <li><a href="#"><img src="Assets/Templates/Main/images/twitter-icon1.png"></a></li>
                  <li><a href="#"><img src="Assets/Templates/Main/images/linkden-icon1.png"></a></li>
                  <li><a href="#"><img src="Assets/Templates/Main/images/instagram-icon1.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
      <div class="container">
        <p class="copyright_text">Copyright 2020 All Right Reserved By <a href="https://html.design">Free html  Templates</a></p>
      </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="Assets/Templates/Main/js/jquery.min.js"></script>
    <script src="Assets/Templates/Main/js/popper.min.js"></script>
    <script src="Assets/Templates/Main/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Templates/Main/js/jquery-3.0.0.min.js"></script>
    <script src="Assets/Templates/Main/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="Assets/Templates/Main/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="Assets/Templates/Main/js/custom.js"></script>
    <!-- javascript --> 
    <script src="Assets/Templates/Main/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
    });
         
    $(".zoom").hover(function(){
         
    $(this).addClass('transition');
    }, function(){
         
    $(this).removeClass('transition');
    });
    });
    </script> 
    <script>
     function openNav() {
     document.getElementById("myNav").style.width = "100%";
    }
     function closeNav() {
     document.getElementById("myNav").style.width = "0%";
    }
    </script>  
    <script>
  function showMore() {
    // Get all the hidden items
    var hiddenItems = document.querySelectorAll('.hide');
    
    // Show hidden items
    hiddenItems.forEach(function(item) {
      item.classList.remove('hide');
    });

    // Hide the "View More" button after showing more items
    document.getElementById('viewMoreBtn').style.display = 'none';
  }
</script>
</body>
</html>