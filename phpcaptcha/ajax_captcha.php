<?php
session_start();
if(isset($_POST['captcha'])){
	$data = array();
	$data ['result']='error';
	if ($_POST['captcha'] == $_SESSION['cap_code'])
	{$data ['result'] = 'success';}
	
	print json_encode ($data);
	exit();
}
?>