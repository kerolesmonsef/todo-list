<?php
error_reporting(0);
session_start(); 
include_once 'classes/movetotodo.php';
if(!isset($_SESSION['showsign'])){$_SESSION['showsign']='true';}

$_SESSION['addnewone']=true;
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet"  href="css/css1.css">
</head>
<body>
	<div class="toper">
	<h1>TODO MAKER <i class="fa fa-check "></i></h1>
</div>
	
	<?php 
		if (isset($error)) {
			echo "<div class='error' id='error'>
				<p>$error</p>
				</div>";
		}
		elseif (isset($checklogin)) {
			echo "<div class='succ' id='succ'>
						<p>Succesfully adding username:- $username</p>
						<button id='btn'>Log Me In</button>
					</div>
					";
		}
		function hidesignupform(){
			$res='';
			global $checklogin, $dont_open_sign_up_form;
			if(isset($checklogin)||@$_SESSION['showsign']=='false'||($dont_open_sign_up_form==false))$res="hidden";
			return $res;
		}

		function hideloginform(){
			$res='';
			global $dont_open_sign_up_form;
			if(@$_SESSION['showsign']=='true' and $dont_open_sign_up_form==true)$res="hidden";
			return $res;
		}
	 ?>
	<div class="thebody" >
		<div class="container">
			<form autocomplete="on" id="register_form" action="check_login.php"  method="post" <?php echo hidesignupform(); ?>   >
				<h1>Register here</h1>
				<h4>username</h4>
				<input autofocus type="text" on name="username" value="<?php if(isset($username))echo $username; ?>" >
				<h4>email</h4>
				<input type="text" name="email" value="<?php if(isset($email))echo $email; ?>">
				<h4>password</h4>
				<input type="password" name="password" value="<?php if(isset($password))echo $password;?>" >
				<h4>Re-password</h4>
				<input type="password" name="Re-password" value="<?php if(isset($Re_password))echo $Re_password; ?>">
				<input type="submit" name="submit" value="Sign Up" formaction="check_login.php">
				<p id="in_sign_in_form">Already Have an Acoount?</p>
			</form>


			<form id="login_form" method="post" action="index.php" <?php echo hideloginform(); ?> >
				<h1>Log In</h1>
				<h4>username</h4>
				<input autofocus type="text" name="user1name" value="<?php if(isset($username))echo $username; ?>" >
				<h4>password</h4>
				<input type="password" name="pass1word" value="<?php if(isset($password))echo $password;?>" >
				<input type="submit" name="submit" value="Log In" formaction="index.php">
				<p id="in_log_in_form">Don't Have an Account ?</p>
			</form>
		</div>
	</div>

</body>
</html>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
	
	 $('#btn').click(function(){
     	$('#succ').hide();
        $('#login_form').removeAttr('hidden');

     });

     <?php if(!$dont_open_sign_up_form){echo "$('#login_form').removeAttr('hidden');";}  ?>
    
	var error=document.getElementById('error');
        $('#in_sign_in_form').click(function(){
        $('#register_form').attr('hidden','');
        $('#login_form').removeAttr('hidden');
       $('#error').hide();
        <?php  $_SESSION['showsign']='false'; ?>
    });
    
    $('#in_log_in_form').click(function(){
        $('#register_form').removeAttr('hidden');
        $('#login_form').attr('hidden','');
        $('#error').hide();
         <?php $_SESSION['showsign']='true'; ?> //for the form
       // alert('dlk');
    });
    
    
</script>