<?php 

$dont_open_sign_up_form=true;
//session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	include_once 'classmanageuser.php';

	$register=new manageuser();
	if(isset($_POST['user1name'])){
			$username=$_POST['user1name'];
			$password=$_POST['pass1word'];
			//C:/xampp/htdocs/PHP_TODO/manage_todo.php
		if ($register->loginuser($username,$password)) {
			$_SESSION['username']=$username;
			header("location:manage_todo.php");
		}
		else{
			$error='*- Invalid username or password'.$dont_open_sign_up_form;
			$dont_open_sign_up_form=false;
		}
	}
}
