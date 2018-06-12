<?php 

include_once 'classDP.php';

class manageuser 
{
	public $link;
	function manageuser()
	{
		$dp_connect=new DBconnection();
		$this->link=$dp_connect->openconnection();
		//echo "$this->link";
		return $this->link;
	}
	function regist_user($username,$password,$email,$ip_address,$time,$date)
	{
		$sql="INSERT INTO `users`(`username`, `password`, `ip_address`, `time`, `data`,`email`) VALUES('$username','$password','$ip_address','$time','$date','$email')";
		mysqli_query($this->link , $sql) or die(mysqli_error($this->link));
		//echo "successfully add user";
	}
	function loginuser($username,$password){
		try {
			//$sql="SELECT * FROM users where username='$username' and password='$password'";
			//query=$this->link->query($sql);
			//if ($query->num_rows > 0) {
			//	return true;
			//}
		$sql="SELECT * from users where password='$password' and username='$username' ";
		$result = mysqli_query($this->link,$sql);
		if (mysqli_num_rows($result) > 0) {
				return true;
			}
			else {return false;}
	}
	catch (Exception $e){die($e->getMessage());}
	}


	function getuserinfo($username){
	$sql="SELECT * from users where username='$username'";
	$result = $this->link->query($sql);
	if(mysqli_num_rows($result)==1)
	{
		return $result;
	}
	else return false;
}

}


	//$register=new manageuser();
	//echo ($register->grtuserinfo('kerols')==false?'nooooo':'yessssss');
	//$register->regist_user('kerols','01289507034','1.5.0.0.124','12:00','30-12-2015');

 ?>