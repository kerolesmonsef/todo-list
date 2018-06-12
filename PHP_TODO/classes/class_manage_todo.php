<?php 


include 'classDP.php';

class managetodo
{
	public $link;
	function managetodo()
	{
		$dp_connect=new DBconnection();
		$this->link=$dp_connect->openconnection();
		//echo "$this->link";
		return $this->link;
	}
	function creattodo($username,$title,$descrip,$from,$towhere){
		$sql="INSERT INTO `todotable`(`username`, `title`, `descrip`, `from`, `towhere`, `status`) VALUES ('$username','$title','$descrip','$from','$towhere','none')";
		$result=$this->link->query($sql);
		//echo $result;
		echo $this->link->error;
	}
	function listtodo($username){
		$sql="SELECT  * from  todotable where username='$username'";
		$result=$this->link->query($sql);
		return $result;
	}
	function counttodo($username)
	{
		$sql="SELECT count(*) from todotable where username='$username'";
		$result=$this->link->query($sql);
		$count=0;
		foreach ($result as $key) {
			$count=$key['count(*)'];
		}
		return $count;
	}
	function delete_todao($id){
		$sql="DELETE from todotable where  id ='$id'";
		$this->link->query($sql);
	}
	function edit_todo($id,$descrip,$title,$from,$towhere){
		$sql="UPDATE todotable set descrip='$descrip',title='$title',`from`='$from',towhere='$towhere' where id ='$id'";
		
		$this->link->query($sql);
		echo $this->link->error;
	}
	function test(){echo ";;;;;;;;;;;";}
}
	//$register=new managetodo();

//echo $register->counttodo('kerols');
