<?php
/////////////// PHP INITIALIZATION //////////////////
session_start();

if (!isset($link))
//$link = mysql_connect('localhost', 'root', '');
	$link=mysqli_connect("localhost","root","","efzin");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//mysql_select_db('efzin');
mysqli_query($link,"set names utf8");

$LANG=0;
if(isset($_GET['lang'])){
	$sql = "SELECT * from languages where prefix=?";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('s',$_GET['lang'] );

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}
	$rs=$stmt->get_result();
	$row = $rs->fetch_assoc();
	$LANG=$row['index'];

}




//mysql_query("set names utf8");

?>