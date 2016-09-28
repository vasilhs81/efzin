<?php
/////////////// PHP INITIALIZATION //////////////////
session_start();

if (!isset($link))
//$link = mysql_connect('localhost', 'root', '');
	$link=mysqli_connect("mysql3.000webhost.com","a9163244_user","efzin123","a9163244_efzin");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//mysql_select_db('efzin');
mysqli_query($link,"set names utf8");

$LANG=0;
if(isset($_GET['lang'])){
	$sql = "SELECT * from languages where prefix='$_GET[lang]'";
	$st=mysqli_query($link,$sql);
		if($st===FALSE)
		trigger_error('Wrong SQL: '. $link->error, E_USER_ERROR);

	$row=mysqli_fetch_assoc($result);
	
	$LANG=$row['index'];

}




//mysql_query("set names utf8");

?>