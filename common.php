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

define("PAGE",mb_strtolower(basename($_SERVER['SCRIPT_FILENAME'])));
define("RESULTS_PER_PAGE",5);
define("QUERY",mb_strtolower(basename($_SERVER['QUERY_STRING'])));
define('EMAIL_DELIVERY','vasilhs81@gmail.com');
//define('EMAIL_FROM','admin@efzin-rentals.site40.net');
define('EMAIL_FROM','vasilhs81@gmail.com');
define('EMAIL_HOST','ssl://smtp.gmail.com');
define('EMAIL_USER','vasilhs81@gmail.com');
define('EMAIL_PASS','vhawkgr81');
define('EMAIL_PORT',465);



$LANG=0;
$languages=getLanguagesAssoc();

/*if(isset($_GET['lang'])){
	$sql = "SELECT * from languages where prefix=?";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	$stmt->bind_param('s',$_GET['lang'] );

	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}
	$rs=$stmt->get_result();
	if($rs->num_rows==1) {
		$row              = $rs->fetch_assoc();
		$LANG             = $row['index'];

	}else{
		redirect('index.php');
	}
	$_SESSION['LANG'] = $LANG;
}*/
if(isset($_GET['lang'])) {
	if(in_array($_GET['lang'],array_keys($languages))) {


		/*	$sql = "SELECT * from languages where prefix='$_GET[lang]'";
			$result=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($result);*/
		$row = $languages[ $_GET['lang'] ];

		$LANG             = $row['index'];
		$_SESSION['LANG'] = $LANG;
	}
	else redirect('index.php');
}elseif(!empty($_SESSION['LANG']) ){
	// for filters that accept options, use this format
	$options = array(
		'options' => array(
			'default' => 0, // value to return if the filter fails
			// other options here
			'min_range' => 0,
			'max_range' => count($languages)-1
		)
	);



	$LANG=filter_var($_SESSION['LANG'],FILTER_VALIDATE_INT, $options);
}

$st=mysqli_query($link,"select code,text from text where page='".PAGE."' or page='' ");
$TEXT=array();

if($st===FALSE)
	trigger_error('Wrong SQL: ' . $link->error, E_USER_ERROR);
while($row=mysqli_fetch_array($st)){
	$code=$row['code'];
	//$categ=$row['category'];
	$TEXT[$code]=explode('##',$row['text'])[$LANG];
	//$TEXT_CATEG[$categ]=explode('##',$row['text'])[$LANG];
}
function getLanguages(){
	global $link;
	$st=mysqli_query($link," select * from languages l order by l.index asc");
	if($st===FALSE)
		trigger_error('Wrong SQL: '. $link->error, E_USER_ERROR);

	$rows=$st->fetch_all(MYSQLI_ASSOC);

	return $rows;
}

function getTextByCategory($categ,$page=NULL){
global $link;
global $LANG;
	if(empty($page))
	$st=mysqli_query($link,"select code,text from text where category='$categ' ");
	else
		$st=mysqli_query($link,"select code,text from text where category='$categ' and page='$page'");
	$text=array();

	if($st===FALSE)
		trigger_error('Wrong SQL: '.  $link->error, E_USER_ERROR);
	while($row=mysqli_fetch_array($st)){
		$code=$row['code'];
		//$categ=$row['category'];
		$text[$code]=explode('##',$row['text'])[$LANG];
		//$TEXT_CATEG[$categ]=explode('##',$row['text'])[$LANG];
	}
return $text;

}


function getTextByCode($code){
	global $TEXT;
	return $TEXT[$code];
}


function getAvailabilitiesCount($pid){
	global $link;
	$st=mysqli_query($link,"select count(*) as num from availabilities where property_id=$pid");
	if($st===FALSE)
		trigger_error('Wrong SQL: ' . "select count(*) as num from availabilities where property_id=$pid". ' Error: ' . $link->error, E_USER_ERROR);

	$row=mysqli_fetch_array($st);
	return $row['num'];


}





function saveInquiry($data){
	global $link;
	$sql = "insert into inquiries(property_id,fname,sname,email,accept_emails,phone,date_start,date_end,comments,num_of_persons,status)
			values(?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('issssssssis',$data['property_id'],$data['fname'],$data['sname'],$data['email'],$data['accept_emails'],
		$data['phone'],$data['date_start'],$data['date_end'],$data['comments'],$data['num_of_persons'],$data['status']);

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}

	return true;
}

function generateUniqueId(){
	$stamp = date("Ymdhms");
	$ip = $_SERVER['REMOTE_ADDR'];
	$orderid = "$stamp-$ip";
	$orderid = str_replace(".", "", "$orderid");
	$orderid = str_replace("::", "", "$orderid");
	return $orderid;
}


function moveEntryImages(){
	global $link;
	foreach($_FILES as $name=> $f) {
		$fname=$f['name'];
		if($fname=='')continue;
		$upload_path="photos/entries/";
		$max_filesize = 2000000;
		if ( $_FILES["$name"]["error"] > 0 ) {
			trigger_error('Error uploading file: ' . $_FILES["$name"]["error"] . ' <br>', E_USER_ERROR);
		}


		$temp      = explode( '.', $f['name'] );
		$extension = end( $temp );
		if ( ! in_array( $extension, array( 'jpg', 'gif', 'png','jpeg','bmp' ) ) ) {
			trigger_error('Invalid file type: ' . $f["name"] . ' <br>', E_USER_ERROR);
		}


		if(filesize($_FILES[$name]['tmp_name']) > $max_filesize)
		trigger_error('The file you attempted to upload is too large ' . $f["name"] . ' <br>', E_USER_ERROR);

		if(!is_writable($upload_path))
			trigger_error('Failed To Upload: ' . $f["name"] . ' <br>', E_USER_ERROR);

//		var_dump($fname);
//		echo $_FILES["$name"]["tmp_name"];
		//$tmpfname = tempnam($upload_path, "");

		if(empty($_SESSION['form_id'])) {
			$_SESSION['form_id']= generateUniqueId();

		}
		$tmpfname=$_SESSION['form_id'];

		$new_path=$upload_path .$tmpfname;
	if(!is_dir($new_path))
		if(!mkdir($new_path))
			trigger_error('Failed To Upload : ' . $f["name"] , E_USER_ERROR);

		$fi = new FilesystemIterator($new_path, FilesystemIterator::SKIP_DOTS);
		$cid=iterator_count($fi)+1;

//		move_uploaded_file( $_FILES["$name"]["tmp_name"], $upload_path .$tmpfname.'/'. $fname . '.' . $extension ); //$_FILES["XML[$supplier_id]"]["name"]);
		move_uploaded_file( $_FILES["$name"]["tmp_name"], $new_path.'/'. $cid . '.' . $extension ); //$_FILES["XML[$supplier_id]"]["name"]);
		//new upload folder
		if(empty($_SESSION['nuf']))
			$_SESSION['nuf']=array();
		if(!in_array($tmpfname,$_SESSION['nuf']))
			$_SESSION['nuf'][]=$tmpfname;

	}
	return TRUE;
}


function moveEntryImagesToLocation($location){
	global $link;
	foreach($_FILES as $name=> $f) {
		$fname=$f['name'];
		if($fname=='')continue;
		$upload_path="photos/entries/";
		$max_filesize = 2000000;
		if ( $_FILES["$name"]["error"] > 0 ) {
			trigger_error('Error uploading file: ' . $_FILES["$name"]["error"] . ' <br>', E_USER_ERROR);
		}


		$temp      = explode( '.', $f['name'] );
		$extension = end( $temp );
		if ( ! in_array( $extension, array( 'jpg', 'gif', 'png','jpeg','bmp' ) ) ) {
			trigger_error('Invalid file type: ' . $f["name"] . ' <br>', E_USER_ERROR);
		}


		if(filesize($_FILES[$name]['tmp_name']) > $max_filesize)
			trigger_error('The file you attempted to upload is too large ' . $f["name"] . ' <br>', E_USER_ERROR);

		if(!is_writable($upload_path))
			trigger_error('Failed To Upload: ' . $f["name"] . ' <br>', E_USER_ERROR);

//		var_dump($fname);
//		echo $_FILES["$name"]["tmp_name"];
		//$tmpfname = tempnam($upload_path, "");
		$tmpfname = $location;
		$new_path=$upload_path .$tmpfname;
//		echo $new_path;
		if(!is_dir($new_path))
			if(!mkdir($new_path))
				trigger_error('Failed To Upload : ' . $f["name"] , E_USER_ERROR);

		/*$fi = new FilesystemIterator($new_path, FilesystemIterator::SKIP_DOTS);
		$cid=iterator_count($fi)+1;*/

		$fi = glob($new_path.'/*.'.$extension);
		if(!is_array($fi))
			$cid=1;
		else
			$cid = count($fi)+1;
//		echo  $new_path.'/*.'.$extension .' '.$cid;

//		move_uploaded_file( $_FILES["$name"]["tmp_name"], $upload_path .$tmpfname.'/'. $fname . '.' . $extension ); //$_FILES["XML[$supplier_id]"]["name"]);
		if(!move_uploaded_file( $_FILES["$name"]["tmp_name"], $new_path.'/'. $cid . '.' . $extension ))
			trigger_error('Failed To Upload : ' . $f["name"] , E_USER_ERROR);
		//$_FILES["XML[$supplier_id]"]["name"]);
		//new upload folder
		if(empty($_SESSION['nuf']))
			$_SESSION['nuf']=array();
		if(!in_array($tmpfname,$_SESSION['nuf']))
			$_SESSION['nuf'][]=$tmpfname;

	}
	return TRUE;
}


function saveEntry($data){
	global $link;
	$sql = "insert into entries(
fname,
sname,
email,
mobile,
phone,
region,
place,
area,
price,
date_start,
date_end,
comments,
num_of_persons,
type,
amenities,
price_period,
foto_path
)
			values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	$foto_path=NULL;
	if(!empty($_SESSION['nuf']) and is_array($_SESSION['nuf'])){
		$foto_path=join(',',$_SESSION['nuf']);
	}


	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('sssssssddsssissss',
		$data['fname'],
		$data['sname'],
		$data['email'],
		$data['mobile'],
		$data['phone'],
		$data['region'],
		$data['place'],
		$data['area'],
		$data['price'],
		$data['date_start'],
		$data['date_end'],
		$data['comments'],
		$data['num_of_persons'],
		$data['type'],
		$data['amenities'],
		$data['price_period'],
		$foto_path);

//	var_dump($data);

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}
	$_SESSION['nuf']=array();
	$_SESSION['form_id']='';

	//moveEntryImagesToLocation($link->insert_id);
	//return true;
	return $link->insert_id;
}


function saveRequest($data){
	global $link;
	$sql = "insert into request(
fname,
sname,
email,
accept_emails,
mobile,
phone,
region,
place,
area_min,
area_max,
price_min,
price_max,
date_start,
date_end,
comments,
num_of_persons,
type,
amenities,
price_period)
			values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('ssssssssddddsssisss',
		$data['fname'],
		$data['sname'],
		$data['email'],
		$data['accept_emails'],
		$data['mobile'],
		$data['phone'],
		$data['region'],
		$data['place'],
		$data['area_min'],
		$data['area_max'],
		$data['price_min']
		,$data['price_max'],
		$data['date_start'],
		$data['date_end'],
		$data['comments'],
		$data['num_of_persons'],
		$data['type'],
		$data['amenities'],
		$data['price_period']);

//	var_dump($data);

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}

	return true;
}


function saveContact($data){
	global $link;
	$sql = "insert into contact(
fname,
sname,
email,
phone,
comments)
			values(?,?,?,?,?)";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('sssss',
		$data['fname'],
		$data['sname'],
		$data['email'],
		$data['phone'],
		$data['comments']
	);

//	var_dump($data);

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}

	return true;
}



function getSuggestedProperties(){
global $link;
	$st = mysqli_query($link,"select * from  suggestions s, property p  where p.id=s.property_id and p.active='y'  limit 20; ") or die(mysqli_error($link));
	if($st===FALSE)
		trigger_error('Wrong SQL: '.$link->error, E_USER_ERROR);
//	mysqli_fetch_all($st,MYSQLI_ASSOC);
	$rows=array();
	while($row=mysqli_fetch_array($st)){
		getPropertyArray( $row );
		$rows[]=$row;

	}

	return $rows;


}

function checkAvailability($pid,$sd,$ed){
	global $link;
	$sql = "SELECT * from availabilities where property_id=? and date_start<=? and date_end>=? and status='ON'";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('iss',$pid,$sd,$ed );

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}
	$rs=$stmt->get_result();
	if($rs->num_rows>0)
		return true;
	return false;

}

function getAvailabilities($pid){
	global $link;
	$sql = "SELECT * from availabilities where property_id=?";
	$stmt = $link->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR);
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param('i',$pid );

	/* Execute statement */
	$exec_result = $stmt->execute();

	if($exec_result === false) {
		trigger_error('SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR);
	}
	$rs=$stmt->get_result();
	return $rs->fetch_all();



}


function getPropertyById($pid){
	global $link;
	$sql  = "SELECT * from property where id=?";
	$stmt = $link->prepare( $sql );
	if ( $stmt === false ) {
		trigger_error( 'Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR );
	}

	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
	$stmt->bind_param( 'i', $pid );

	/* Execute statement */
	$exec_result = $stmt->execute();

	if ( $exec_result === false ) {
		trigger_error( 'SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR );
	}
	$rs = $stmt->get_result();
	if ( $rs->num_rows != 1 ) {
		return FALSE;
	}

	$row = $rs->fetch_assoc();
	getPropertyArray( $row );

	return $row;
}


function quickSearchProperties($words){
	global $link;
	$sql="select * from property where ";

	$criteria=array("status_code<>'Occupied' and active='y' ");
	$criteria2=array();
	$binds=array();
	$binds_type=array();
	foreach($words as &$word) {
		$criteria2[]="instr(place,?)>0";
		$criteria2[]="instr(description,?)>0";
		$binds[]=&$word;
		$binds[]=&$word;
		$binds_type[]='s';
		$binds_type[]='s';

	}
	$criteria[] ='('.join(' or ',$criteria2).')';

	$a_params = array();
	$a=join('',$binds_type);
	$a_params[] =&$a;
	$a_params=array_merge($a_params,$binds);

	$sql.=join(' and ',$criteria);
	$stmt = $link->prepare( $sql);
	if ( $stmt === false ) {
		trigger_error( 'Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR );
	}

/*
	print $sql;
	exit();*/

	/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
	call_user_func_array(array($stmt, 'bind_param'), $a_params);

	/* Execute statement */
	$exec_result = $stmt->execute();
	if ( $exec_result === false ) {
		trigger_error( 'SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR );
	}


	$rs = $stmt->get_result();

	$results=array();
	while($row = $rs->fetch_array(MYSQLI_ASSOC)) {
		getPropertyArray( $row );
		array_push($results, $row);
	}

	return $results;
}


function searchProperties($data){
	global $link;
	$sql="select * from property where ";

	$criteria=array();
	$binds=array();
	$binds_type=array();

	$criteria[]="status_code<>'Occupied' and active='y' ";

	if(!empty($data['region'])) {
		$criteria[] = "region=?";
		$binds[]=&$data['region'];
		$binds_type[]='s';
	}

	$criteria2=array();
	$types=array();
	if(!empty($data['type'])) {
	if(is_array($data['type']))
		$types=array_keys($data['type']);
	else $types[]=$data['type'];

		foreach($types as &$type){
			$criteria2[]="type=?";
			$binds[]=&$type;
			$binds_type[]='s';
		}
		$criteria[] ='('.join(' or ',$criteria2).')';

	}

	if(!empty($data['place'])) {
		$criteria[] = "instr(place,?)>0";
		$binds[]=&$data['place'];
		$binds_type[]='s';
	}

	if(!empty($data['price_from'])) {
		$criteria[] = "price>=?";
		$binds[]=&$data['price_from'];
		$binds_type[]='d';
	}
	if(!empty($data['price_to'])) {
		$criteria[] = "price<=?";
		$binds[]=&$data['price_to'];
		$binds_type[]='d';
	}
	if(!empty($data['price_period'])) {
		$criteria[] = "price_period=?";
		$binds[]=&$data['price_period'];
		$binds_type[]='s';
	}

	if(!empty($data['area_from'])) {
		$criteria[] = "area>=?";
		$binds[]=&$data['area_from'];
		$binds_type[]='d';
	}


	if(!empty($data['area_to'])) {
		$criteria[] = "area<=?";
		$binds[]=&$data['area_to'];
		$binds_type[]='d';
	}

	/*if(!empty($data['new_property'])) {
		$criteria[] = "new_property=?";
		$binds[]=&$data['new_property'];
		$binds_type[]='s';
	}

	if(!empty($data['ac'])) {
		$criteria[] = "ac=?";
		$binds[]=&$data['ac'];
		$binds_type[]='s';
	}

	if(!empty($data['parking'])) {
		$criteria[] = "parking=?";
		$binds[]=&$data['parking'];
		$binds_type[]='s';
	}


	if(!empty($data['pool'])) {
		$criteria[] = "pool=?";
		$binds[]=&$data['pool'];
		$binds_type[]='s';
	}


	if(!empty($data['garden'])) {
		$criteria[] = "garden=?";
		$binds[]=&$data['garden'];
		$binds_type[]='s';
	}*/

	if(!empty($data['amenities'])) {
		$criteria[] = "amenities=?";
		$binds[]=&$data['amenities'];
		$binds_type[]='s';
	}


	/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */

	$a_params = array();
	/* with call_user_func_array, array params must be passed by reference */
	$a=join('',$binds_type);
	$a_params[] =&$a;
	$a_params=array_merge($a_params,$binds);

/*	var_dump($data['type']);
	var_dump($types);
	var_dump($a_params);*/



	$sql.=join(' and ',$criteria);
	$stmt = $link->prepare( $sql);
	if ( $stmt === false ) {
		trigger_error( 'Wrong SQL: ' . $sql . ' Error: ' . $link->error, E_USER_ERROR );
	}



	/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
	call_user_func_array(array($stmt, 'bind_param'), $a_params);



	/* Execute statement */
	$exec_result = $stmt->execute();

	if ( $exec_result === false ) {
		trigger_error( 'SQL: ' . $sql . ' Execution Error: ' . $stmt->error, E_USER_ERROR );
	}

	$rs = $stmt->get_result();

	$results=array();
	while($row = $rs->fetch_array(MYSQLI_ASSOC)) {
		getPropertyArray( $row );
		array_push($results, $row);
	}


	return $results;

}

function getLanguagesAssoc(){
	global $link;
	$st=mysqli_query($link," select * from languages l order by l.index asc");
	if($st===FALSE)
		trigger_error('Wrong SQL: '. $link->error, E_USER_ERROR);
	$rows=array();
	while($row=mysqli_fetch_array($st))
		$rows[$row['prefix']]=$row;

//$rows=mysqli_fetch_all($st,MYSQLI_ASSOC);
//	$rows=$st->fetch_all();

	return $rows;
}

function getPropertyArray(&$row){
	global $LANG;
	if(!empty($row['title']))
	$row['title']=explode('##',$row['title'])[$LANG];

	if(!empty($row['description']))
	$row['description']=explode('##',$row['description'])[$LANG];

	if(!empty($row['af']))
	$row['af']=explode('##',$row['af'])[$LANG];

	if(!empty($row['summary']))
	$row['summary']=explode('##',$row['summary'])[$LANG];

	//if(!empty($row['type']))
	//$row['type']=explode('##',$row['type'])[$LANG];

	if(!empty($row['place'])) {
		$row['place'] = explode('##', $row['place'])[$LANG];
		$row['place_text']=$row['place'].' ('.getTextByCode($row['region']).')';
	}
	if(!empty($row['view']))
	$row['view']=explode('##',$row['view'])[$LANG];

	//if(!empty($row['parking']))
	//$row['parking']=explode('##',$row['parking'])[$LANG];

	if(!empty($row['status']))
	$row['status']=explode('##',$row['status'])[$LANG];

	if(!empty($row['custom_prices']))
	$row['custom_prices']=explode('##',$row['custom_prices'])[$LANG];

	/*if(!empty($row['region']))
	$row['region']=explode('##',$row['region'])[$LANG];*/
	/*if(!empty($row['region']))
		$row['region']=explode('##',$row['region'])[$LANG];*/

	if(!empty($row['area'])) {
		$row['area'] = number_format($row['area'], 0, '', '.');
		$row['area_text']=$row['area'].' '.getTextByCode("SQUARE_METERS");
	}
	if(!empty($row['price'])) {
		$row['price'] = number_format($row['price'], 0, '', '.');
		$row['price_text']=$row['price'].'&euro; /'.getTextByCode($row['price_period']);
	}




}

function redirect($url){
	header( 'Location: '.$url ) ;
	exit();
}
/*$levels = array("Easy","Moderate","Difficult");


function getLevel($lid){
               if(lid=='1') return "easy";
                elseif(lid=='2')return  "moderate";
                else return "difficult";



}*/


function utf8_substr($str, $from, $len){
return mb_substr($str, $from, $len,"utf-8");
 }



function only_chars($text,$num){

	if(mb_strlen($text)<=$num)return $text;

	while(!ctype_space(utf8_substr($text,$num, 1)) && $num>0)
	$num--;
return utf8_substr($text,0,$num)." ...";
	
	
}



function getCurrentFileName(){
	
	$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$pfile = $break[count($break) - 1];

return $pfile; 
	
	}


function getGeneral($q){
	$row=getSQLqueryAll("select * from general");
	return $row[$q];
}

function getSQLquery($q,$i){
	$row=mysql_fetch_array(mysql_query($q));
	return $row[$i];
}

function getSQLqueryAll($q){
$categories = mysql_query($q);
$row=NULL;
$row = mysql_fetch_array($categories,MYSQL_ASSOC) ;
return $row;

}


function error($msg){
die("<div style='font-size:14px;padding:10px;color:red;' align='left'>
	<img src='images/error.gif' alt='error'>&nbsp;Υπήρξε σφάλμα κατά την αποθήκευση των δεδομένων:</div>
<div align='left' class='code' style='padding:5x;'>".$msg."</div><p style='font-size:14px;text-align:left;color:#7C8E28;padding:7px;'>Παρακαλώ προσπαθήστε ξανά..</br><a href='javascript:back();'><< Επιστροφή</a></p>"
."<br></div>"
);

	
}



function sendNotifEmail($data) {
	require_once 'includes/PHPMailer/class.phpmailer.php';
	$to = EMAIL_DELIVERY;


	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: admin@efzin-rentals.site40.net' . "\r\n" .
	            'Reply-To: admin@efzin-rentals.site40.net' . "\r\n" .
	            'X-Mailer: PHP/' . phpversion();

	$subject = '';
	$message = '';

	switch ( $data['action'] ) {
		case 'Contact':
			$subject = 'Αίτηση Επικοινωνίας';
			$message = "<p><strong>Ημερομηνία αίτησης:</strong> " . date( 'l jS \of F Y h:i:s A' ) . " </p>";

			$message .= "<table cellpadding='6' cellspacing='4' >";
			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Χρήστη:</th></tr>";
			$message .= "<tr><th align='left'>Όνομα:</th><td>$data[fname] $data[sname]</td></tr>";
			$message .= "<tr><th align='left'>Τηλέφωνο:</th><td>$data[phone]</td></tr>";
			$message .= "<tr><th align='left'>Email:</th><td>$data[email]</td></tr>";
			$message .= "<tr><th align='left' valign='top'>Παρατηρήσεις:</th><td><pre> $data[comments] </pre></td></tr>";
			$message .= "</table>";

		break;


		case 'Entry':
			$subject = 'Αίτηση Καταχωρησης';
			$message = "<p><strong>Ημερομηνία αίτησης:</strong> " . date( 'l jS \of F Y h:i:s A' ) . " </p>";

			$message .= "<table cellpadding='6' cellspacing='4'>";
			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Χρήστη:</th></tr>";
			$message .= "<tr><th align='left'>Όνομα:</th><td>$data[fname] $data[sname]</td></tr>";
			$message .= "<tr><th align='left'>Τηλέφωνο:</th><td>$data[phone], $data[mobile]</td></tr>";
			$message .= "<tr><th align='left'>Email:</th><td>$data[email]</td></tr>";

			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Ακινήτου:</th></tr>";
			$message .= "<tr><th align='left'>Κατηγορία:</th><td>".getTextByCode($data['type'])."</td></tr>";
			$message .= "<tr><th align='left'>Περιοχή:</th><td>$data[place] " . getTextByCode( $data['region'] ) . "</td></tr>";
			$message .= "<tr><th align='left'>Εμβαδό:</th><td> $data[area] (τ.μ.)</td></tr>";
			$message .= "<tr><th align='left'>Τιμή:</th><td> $data[price]  /" .
			            empty($data['price_period'])?'':getTextByCode($data['price_period']) . " &euro;</td></tr>";
			$message .= "<tr><th align='left'>Ημερομηνίες:</th><td> Από $data[date_start] έως $data[date_end] </td></tr>";
			$message .= "<tr><th align='left'>Αριθμός ατόμων:</th><td> $data[num_of_persons] </td></tr>";
			$message .= "<tr><th align='left'>Παροχές:</th><td> $data[amenities] </td></tr>";
			$message .= "<tr><th align='left'>Παρατηρήσεις:</th><td><pre> $data[comments] </pre></td></tr>";
			$message .= "</table>";

			break;




		case 'Request':
			$subject = 'Αίτηση Αναζήτησης';
			$message = "<h1>Νέα Αίτηση Αναζήτησης </h1>";
			$message = "<p><strong>Ημερομηνία αίτησης:</strong> " . date( 'l jS \of F Y h:i:s A' ) . " </p>";

			$message .= "<table cellpadding='6' cellspacing='4'>";
			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Χρήστη:</th></tr>";
			$message .= "<tr><th align='left'>Όνομα:</th><td>$data[fname] $data[sname]</td></tr>";
			$message .= "<tr><th align='left'>Τηλέφωνο:</th><td>$data[phone], $data[mobile]</td></tr>";
			$message .= "<tr><th align='left'>Email:</th><td>$data[email]</td></tr>";
			$message .= "<tr><th align='left'>Δέχεται Emails:</th><td>".getTextByCode(mb_strtoupper($data['accept_emails']))."</td></tr>";

			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Ακινήτου:</th></tr>";
			$message .= "<tr><th align='left'>Κατηγορία:</th><td>".getTextByCode($data['type'])."</td></tr>";
			$message .= "<tr><th align='left'>Περιοχή:</th><td>$data[place] " . getTextByCode( $data['region'] ) . "</td></tr>";
			$message .= "<tr><th align='left'>Εμβαδό:</th><td> Από $data[area_min] έως $data[area_max] (τ.μ.)</td></tr>";
			$message .= "<tr><th align='left'>Τιμή:</th><td> Από $data[price_min] έως $data[price_max] /" .
			             empty($data['price_period'])?'':getTextByCode($data['price_period']) . " &euro;</td></tr>";
			$message .= "<tr><th align='left'>Ημερομηνίες:</th><td> Από $data[date_start] έως $data[date_end] </td></tr>";
			$message .= "<tr><th align='left'>Αριθμός ατόμων:</th><td> $data[num_of_persons] </td></tr>";
			$message .= "<tr><th align='left'>Παροχές:</th><td> $data[amenities] </td></tr>";
			$message .= "<tr><th align='left'>Παρατηρήσεις:</th><td> $data[comments] </td></tr>";
			$message .= "</table>";

			break;

		case 'Book':
			$subject = 'Αίτηση Ενδιαφέροντος';
			$message = "<h1>Νέα Αίτηση Ενδιαφέροντος </h1>";
			$message = "<p><strong>Ημερομηνία αίτησης:</strong> " . date( 'l jS \of F Y h:i:s A' ) . " </p>";

			$message .= "<table cellpadding='6' cellspacing='4'>";
			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Ακινήτου:</th></tr>";
			$message .= "<tr><th align='left'>Κωδικός:</th><td>".$data['property_id']."</td></tr>";
			$message .= "<tr><th align='left'>Τίτλος:</th><td>".$data['title'].', '.$data['region']."</td></tr>";


			$message .= "<tr><th align='left' style='font-size:16px;' colspan='2'>Στοιχεία Ενδιαφερόμενου:</th></tr>";
			$message .= "<tr><th align='left'>Όνομα:</th><td>$data[fname] $data[sname]</td></tr>";
			$message .= "<tr><th align='left'>Τηλέφωνο:</th><td>$data[phone]</td></tr>";
			$message .= "<tr><th align='left'>Email:</th><td>$data[email]</td></tr>";
			$message .= "<tr><th align='left'>Δέχεται Emails:</th><td>".getTextByCode(mb_strtoupper($data['accept_emails']))."</td></tr>";
			$message .= "<tr><th align='left'>Αριθμός ατόμων:</th><td> $data[num_of_persons] </td></tr>";
			if(!empty($data['date_start']) and !empty($data['date_end']))
				$message .= "<tr><th align='left'>Ημερομηνίες:</th><td> Από $data[date_start] έως $data[date_end] </td></tr>";
			$message .= "<tr><th align='left'>Σχόλια:</th><td> $data[comments] </td></tr>";

			//$message .= "<tr><th align='left'>Κατηγορία:</th><td>".getTextByCode($data['type'])."</td></tr>";
			//$message .= "<tr><th align='left'>Περιοχή:</th><td>$data[place] " . getTextByCode( $data['region'] ) . "</td></tr>";
			//$message .= "<tr><th align='left'>Εμβαδό:</th><td> Από $data[area_min] έως $data[area_max] (τ.μ.)</td></tr>";
			//$message .= "<tr><th align='left'>Τιμή:</th><td> Από $data[price_min] έως $data[price_max] /" .
			  //           empty($data['price_period'])?'':getTextByCode($data['price_period']) . " &euro;</td></tr>";


			//$message .= "<tr><th align='left'>Παροχές:</th><td> $data[amenities] </td></tr>";

			$message .= "</table>";

			break;


		default:
			trigger_error( ' Error: wrong data type', E_USER_ERROR );

	}



	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	try{
		$mail->Host = EMAIL_HOST;                     // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Mailer = "smtp";
		$mail->CharSet = 'UTF-8';
		$mail->Username = EMAIL_USER;   // SMTP username
		$mail->Password = EMAIL_PASS;                           // SMTP password
//		$mail->SMTPSecure = "ssl";
//	$mail->SMTPDebug = 2;
		$mail->Port=EMAIL_PORT; //25 465  587 2525
		$mail->Debugoutput = 'html'; //25 465  587 2525

		$mail->SetFrom(EMAIL_FROM, 'Efzin');
		$mail->AddReplyTo(EMAIL_FROM,"Efzin");
//		$mail->From = EMAIL_FROM;
//		$mail->FromName = 'Efzin';

		$mail->addAddress($to);                 // Add a recipient

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->IsHTML(true);
		if(!$mail->send()) {
			return false;
		} else {
			return true;
		}
	} catch (phpmailerException $e) {
		echo '<h3>Your message has not been sent due to a website error. Please call us at xxx.</h3>';
		echo 'Mailer Error: ' . $mail->ErrorInfo;

		echo $e->errorMessage(); //Pretty error messages from PHPMailer
		echo '\n';
		exit;
		return false;
	}


}

?>