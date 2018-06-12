
<script src="js/jquery-3.3.1.min.js"></script>


<?php 
session_start();
//echo $_SESSION['showsign'];
//error_reporting(0);
if(!isset($_SESSION['username'])){die('can\'t access this page' );}// guest person
include 'classes/class_manage_todo.php';

$opject=new managetodo();
////begaining of update

if(!empty($_SESSION['id']['DPID'])){ ///for update
		$username=$_SESSION['username'];
		$theid= $_SESSION['id']['DPID'];
		$from=$_SESSION['id']['FROM'];
		$towhere=$_SESSION['id']['TOWHERE'];
		$title=$_SESSION['id']['TITLE'];
		$descrip=$_SESSION['id']['DESCRIP'];
		$opject->edit_todo($theid,$descrip,$title,$from,$towhere);
		$_SESSION['id']['DPID']="";
	}
	
	if(!empty($_SESSION['update']['UPDATEID'])){ ///for delete
		$theid=$_SESSION['update']['UPDATEID'];
		//echo $theid;
		$opject->delete_todao($theid);
		$_SESSION['update']['UPDATEID']='';
	};
//end of update
$username=$_SESSION['username'];

if(isset($_POST['create'])){ //for adding new one
	$title=$_POST['title'];
	$descrip=$_POST['descrip'];
	$from=date("Y-m-d");
	$towhere=$_POST['towhere'];
	if(empty($title)||empty($descrip)||empty($towhere)){}
	else
	$opject->creattodo($username,$title,$descrip,$from,$towhere);
	setcookie('addnewone',false,time() + (86400 * 30),"/");
	//echo "yeaaaaaaaaaaaas";
}
function fff($str1,$str2)
{
$arr1=split("-", $str1);
$arr2=split("-", $str2);

$y=($arr1[0]-$arr2[0])*365;
$m=($arr1[1]-$arr2[1])*30;
$d=$arr1[2]-$arr2[2];

return $y+$m+$d ;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Todo</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/manatodo.css">
</head>
<body>




<div class="toper">
	<h1>TODO MAKER <i class="fa fa-check "></i></h1>
</div>





	<div class="todolist">
		<?php echo "<form>";?>
		<table border="0">
			<caption><h3>manage todo</h3></caption>
			<thead>
				<td>Title&nbsp;&nbsp;</td>
				<td>Descripe&nbsp;&nbsp;</td>
				<td data-dk="dl">From&nbsp;&nbsp;</td>
				<td>Due To&nbsp;&nbsp;</td>
				<td>T L&nbsp;&nbsp;</td>
				<td>Progress&nbsp;&nbsp;</td>
				<td>Actions&nbsp;&nbsp;</td>
			</thead>
			
			<?php 

				$result=$opject->listtodo($username);
				foreach ($result as $key) {
					$thecurrentid=$key['id'];
					$titledp=$key['title'];
					$fromdp=$key['from'];
					$towheredp=$key['towhere'];
					$descripdp=$key['descrip'];
						echo "<tr id='tr$thecurrentid' data-done='no' data-write='no'>";

						echo "<td><input type='text' value='$titledp'id='title$thecurrentid' readonly class='cl$thecurrentid' ></td>";
						echo "<td> <textarea readonly id='descrip$thecurrentid' class='cl$thecurrentid'>$descripdp</textarea></td>";
						echo "<td><input type='date' value='$fromdp' id='from$thecurrentid' readonly class='cl$thecurrentid' ></td>";
						echo "<td><input type='date' value='$towheredp' id='towhere$thecurrentid' readonly class='cl$thecurrentid' ></td>";
							$timeleft=fff($key['towhere'],$key['from']);
						echo "<td>$timeleft</td>";
						echo "<td style='color: red;'> <meter min='0' max='20' value='$timeleft' optimum='30'></meter>";if($timeleft<=0)echo "<code> time over</code";echo "</td>";
						echo "<td><span id='e$thecurrentid'>edit</span> | <span id='d$thecurrentid'>delete</span><input type='checkbox' id='c$thecurrentid'>       <button class='upetxt' id='btn$thecurrentid' name='name$thecurrentid'>Update</button></td>  ";
						echo "</tr>";	
					}
			 ?>
		</table>
		<?php echo "</form>"; ?>
		<!--button class='upetxt fuck' id='theid' name='fuck'>Update</button-->
	</div>
<div class="left">
	<div class="leftleft">
		<h2>Main Menu</h2>
		<a href="index.php" id="new" class="fa fa-check">- Create New Account</a>
		<a href="index.php" id="log" class="fa fa-user-circle">- Log with new Account</a>
		<a href="" id="" class="fa fa-envelope-o">- Inbox</a>
		<a href="" id="" class="fa fa-address-book-o">- Read later</a>
		<a href="index.php" id="sign" class="fa fa-exclamation-triangle">- Sign Out</a>
	</div>
	<div class="createtodo">

		<form method="post" >
			<h1>Create A new Todo</h1>
			<input list="sel" placeholder="Type Your Title" name="title" required autofocus>
            <datalist id="sel">
                <option>help</option>
                <option>show</option>
                <option>work</option>
                <option>done</option>
                <option>title</option>
            </datalist>
			
			<textarea class="tarea" placeholder="Description (Optional)" name="descrip" required></textarea>
			<h4>Deu Date</h4>
			<input type="date" name="towhere" >

            <input type="submit" name="create" id="create" class="create" value="Create" required>
		</form>
	</div>
</div>

</body>
</html>




<script src="js/java21.js">//data-write  </script>

<script>
	
$('#log').click(function(){
        	<?php $_SESSION['showsign']='false'; ?>
      
    });
    
 $('#new').click(function(){
        	<?php $_SESSION['showsign']='true'; ?>
    });
 $('.create').mouseover(function(){
        	<?php $_COOKIE['addnewone']=true; //echo "alert(';dlkd;dk');"; ?>
    });
alert();


</script>