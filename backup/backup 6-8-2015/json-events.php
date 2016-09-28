<?php

require_once('init.php');


//	$year = date('Y');
//$month = date('m');

global $link;
$ar=array();
if(empty($_POST['property_id']))
	die();
$pid=$_POST['property_id'];

$rows = mysqli_query($link,"select * from availabilities where property_id=$pid");



while($row = mysqli_fetch_array($rows)) {

	$ar[]=array(
		'id' => $row['id'],
		'title' => $row['status']=='ON'?'Free':'Occupied',
		'start' => $row['date_start'],
		'end' => $row['date_end'],
//		'color'=>$row['status']=='ON'?'green':'rgb(191,210,85)',
		'price' => $row['price'],
		//'url' => "event.php?eventID=".$row['eventID']
	);
}







echo json_encode($ar);

?>
