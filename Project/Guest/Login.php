<?php
include("../Assets/Connection/connection.php");
session_start();

if(isset($_POST["btn_submit"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];


	$seladmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$resadmin=$con->query($seladmin);
	
	
	$selpo="select * from tbl_programme_officer where po_email='".$email."' and po_password='".$password."'";
	$respo=$con->query($selpo);
	
	
	$selac="select * from tbl_attendance_committee where ac_email='".$email."' and ac_password='".$password."'";
	$resac=$con->query($selac);
	
	$selbc="select * from tbl_bill_committee where bc_email='".$email."' and bc_password='".$password."'";
	$resbc=$con->query($selbc);
	
	$selpc="select * from tbl_program_committee where pc_email='".$email."' and pc_password='".$password."'";
	$respc=$con->query($selpc);
	
	$selmc="select * from tbl_media_committee where mc_email='".$email."' and mc_password='".$password."'";
	$resmc=$con->query($selmc);

    $selrc="select * from tbl_report_committee where rc_email='".$email."' and rc_password='".$password."'";
	$resrc=$con->query($selrc);
	
	$selvc="select * from tbl_volunteers where volunteers_email='".$email."' and volunteers_password='".$password."'";
	$resvc=$con->query($selvc);



	if($data=$resadmin->fetch_assoc())
	{
			$_SESSION['aid']=$data["admin_id"];
			$_SESSION['aname']=$data["admin_name"];
			header("location:../Admin/Homepage.php");
	}
	else if($datapo=$respo->fetch_assoc())
	{
			$_SESSION['pid']=$datapo["po_id"];
			$_SESSION['aname']=$datapo["po_name"];
			header("location:../ProgrammeOfficer/Homepage.php");
	}
	
	else if($dataac=$resac->fetch_assoc())
	{
			$_SESSION['atid']=$dataac["ac_id"];
			$_SESSION['aname']=$dataac["ac_name"];
			header("location:../AttendanceCommittee/Homepage.php");
	}
	
	else if($databc=$resbc->fetch_assoc())
	{
			$_SESSION['bid']=$databc["bc_id"];
			$_SESSION['aname']=$databc["bc_name"];
			header("location:../BillCommittee/Homepage.php");
	}
	
	else if($datapc=$respc->fetch_assoc())
	{
			$_SESSION['pgid']=$datapc["pc_id"];
			$_SESSION['aname']=$datapc["pc_name"];
			header("location:../ProgramCommittee/Homepage.php");
	}
	
	else if($data=$resmc->fetch_assoc())
	{
			$_SESSION['mid']=$data["mc_id"];
			$_SESSION['aname']=$data["mc_name"];
			header("location:../MediaCommittee/HomePage.php");
	}

    else if($data=$resrc->fetch_assoc())
	{
			$_SESSION['rid']=$data["rc_id"];
			$_SESSION['aname']=$data["rc_name"];
			header("location:../ReportCommittee/Homepage.php");

	}
	
	else if($data=$resvc->fetch_assoc())
	{
			$_SESSION['vid']=$data["volunteers_id"];
			$_SESSION['aname']=$data["volunteers_name"];
			header("location:../volunteers/Homepage.php");
	}

	else
	{
		echo "invalid";
	}

}

?>

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="0">
  
  
  <center>
    <div class="container" >
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text"><b>Welcome</b></p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">Login with your details to continue</p>
                </td>
    <tr>
      <td>EMAIL</td>
      <td><label for="txt_email"></label>
     </td>
    </tr>
     <tr>
                <td class="label-td">
                    <input type="email" name="txt_email" class="input-text" placeholder="Email Address" required>
                </td>
    <tr>
      <td>PASSWORD</td>
      <td><label for="txt_password"></label>
      </td>
    </tr>
    <tr>
                <td class="label-td">
                    <input type="text" name="txt_password" class="input-text" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass"  placeholder="Password" required>
                </td>
            </tr>
    
    <tr>
      <td colspan="0"><div align="left">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
    
    <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>
    
    </div>
    </center>
    
  </table>
</form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="../Assets/Templates/Login/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="txt_email" autocomplete="off" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="txt_password" placeholder="Password">
				</div>
				<button class="button login__submit" name="btn_submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
	           <a href="../Index.php" class="button login__submit" name="btn_submit" style="text-decoration: none;">
				<!-- <a href="HomePage.php" class="back-button">Back to Homepage</a> -->
					<span class="button__text">🏠︎ HomePage</span>
					<i class="button__icon fas fa-chevron-right"></i>
</a>				
			</form>
			<div class="social-login">
				<!--<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>-->
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
