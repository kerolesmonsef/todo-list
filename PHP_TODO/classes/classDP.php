<?php 
/**
* 
*/
class DBconnection
{
	protected $dp_conn;
	public $dp_name='todo';
	public $dp_server='localhost';
	public $dp_password='';
	public $dp_user='root';
	function openconnection(){
		$this->dp_conn=mysqli_connect($this->dp_server , $this->dp_user , $this->dp_password , $this->dp_name);

		if(!$this->dp_conn){
			die(mysqli_connect_error());
		}

			//echo $this->dp_conn;
			return $this->dp_conn;
		}
}

//$g= new DBconnection();
//$g->openconnection();
 ?>