<?php 
//echo "<script> alert('you in check');</script>";

if($_SERVER['REQUEST_METHOD']=='POST'){
include_once "classes/classmanageuser.php";
$username=$_POST['username'];
$password=$_POST['password'];
$Re_password=$_POST['Re-password'];
$email=$_POST['email'];

$register=new manageuser();
if(empty($username)||empty($password)||empty($Re_password)||empty($email)){$error='*- all field are required';}
elseif(!ereg('^[^0-9].{6,}$',$username)){$error='incorrect username';}
else if( $register->getuserinfo($username)) $error='*- Username Is Alredy Exist<br>';
elseif(!ereg('^.+@.+\..+$', $email))$error="*- Your Email address isn't correct<br>";
elseif (!ereg('^([0-9]|[a-z]|[A-Z]){6,}$', $password)) {
	$error="*- Your Password Should BE more than 6 char or number <br>";
}
elseif($password!=$Re_password)$error="*- Your Password Doesn't match<br>";


if(isset($error))
    include_once"index.php";
else{
	$time=date('h:i:s');
	$date=date('Y-m-d');
	$ip_address=$_SERVER['REMOTE_ADDR'];
	$register=new manageuser();
	$register->regist_user($username,$password,$email,$ip_address,$time,$date);
	$successfully_log_in=true;
	$checklogin=true;
	include_once"index.php";
}
}
