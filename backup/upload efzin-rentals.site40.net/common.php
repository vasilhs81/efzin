<?php
/////////////// PHP INITIALIZATION //////////////////
session_start();
ini_set("file_uploads","on" );

if (!isset($link))
//$link = mysql_connect('localhost', 'root', '');
	$link=mysqli_connect("mysql3.000webhost.com","a9163244_user","efzin123","a9163244_efzin");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//mysql_select_db('efzin');
mysqli_query($link,"set names utf8");

define("PAGE",mb_strtolower(basename($_SERVER['SCRIPT_FILENAME'])));
define("QUERY",mb_strtolower(basename($_SERVER['QUERY_STRING'])));
define("RESULTS_PER_PAGE",2);
$LANG=0;
if(isset($_GET['lang'])){
	$sql = "SELECT * from languages where prefix='$_GET[lang]'";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	$LANG=$row['index'];
	$_SESSION['LANG']=$LANG;

}elseif(!empty($_SESSION['LANG'])){
	$LANG=$_SESSION['LANG'];
}
$st=mysqli_query($link,"select code,text from text where page='".PAGE."' or page='' ");
$TEXT=array();

if($st===FALSE)
	trigger_error('Wrong SQL: ' . "select count(*) as num from availabilities where property_id=$pid". ' Error: ' . $link->error, E_USER_ERROR);
while($row=mysqli_fetch_array($st,MYSQL_ASSOC)){
	$code=$row['code'];
	//$categ=$row['category'];
	$ar=explode('##',$row['text']);
	$TEXT[$code]=$ar[$LANG];
	//$TEXT_CATEG[$categ]=explode('##',$row['text'])[$LANG];
}
function getLanguages(){
	global $link;
	$st=mysqli_query($link," select * from languages l order by l.index asc");
	if($st===FALSE)
		trigger_error('Wrong SQL: '. $link->error, E_USER_ERROR);
	$rows=array();
	while($row=mysqli_fetch_array($st,MYSQL_ASSOC))
		$rows[]=$row;

//$rows=mysqli_fetch_all($st,MYSQLI_ASSOC);
//	$rows=$st->fetch_all();

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
	while($row=mysqli_fetch_array($st,MYSQL_ASSOC)){
		$code=$row['code'];
		//$categ=$row['category'];
		$ar=explode('##',$row['text']);
		$text[$code]=$ar[$LANG];
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

	$row=mysqli_fetch_array($st,MYSQL_ASSOC);
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
	$stamp = date("Ymdh");
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
		$tmpfname = generateUniqueId();
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
		if(!in_array($new_path,$_SESSION['nuf']))
			$_SESSION['nuf'][]=$new_path;

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
	$st = mysqli_query($link,"select * from  suggestions s, property p  where p.id=s.property_id  limit 10; ") or die(mysqli_error($link));
	if($st===FALSE)
		trigger_error('Wrong SQL: '.$link->error, E_USER_ERROR);
//	mysqli_fetch_all($st,MYSQLI_ASSOC);
	$rows=array();
	while($row=mysqli_fetch_array($st,MYSQL_ASSOC)){
		getPropertyArray( $row );
		$rows[]=$row;

	}

	return $rows;


}

function checkAvailability($pid,$sd,$ed){
	global $link;
	$sql = "SELECT * from availabilities where property_id=$pid and date_start<='$sd' and date_end>='$ed'
and status='ON'";
	$result=mysqli_query($link,$sql);


	//$rs=$stmt->get_result();
	if(mysqli_num_rows($result)>0)
		return true;
	return false;

}


function getAvailabilities($pid){
	global $link;
	$sql = "SELECT * from availabilities where property_id=$pid";
	$result=mysqli_query($link,$sql);

	$rows=array();
	while($row=mysqli_fetch_assoc($result))
		$rows[]=$row;

	//$rows=mysqli_fetch_array($result,MYSQL_ASSOC);
	//return $rs->fetch_all();
	return $rows;



}


function getPropertyById($pid){
	global $link;
	$sql  = "SELECT * from property where id=$pid";

	$result=mysqli_query($link,$sql);
	if($result===FALSE)
		trigger_error("Wrong SQL ($sql): ". $link->error, E_USER_ERROR);

	$row=mysqli_fetch_assoc($result);
	//$row = $rs->fetch_assoc();
	getPropertyArray( $row );

	return $row;
}


function quickSearchProperties($words){
	global $link;
	$sql="select * from property where ";

	$criteria=array("status_code<>'Occupied'");
	$criteria2=array();
	$binds=array();
	$binds_type=array();
	foreach($words as &$word) {
		$criteria2[]="instr(place,'$word')>0";
		$criteria2[]="instr(description,'$word')>0";
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

	$result=mysqli_query($link,$sql);


	$results=array();


	while($row=mysqli_fetch_assoc($result)) {
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

	$criteria[]="status_code<>'Occupied'";

	if(!empty($data['region'])) {
		$criteria[] = "region='$data[region]'";
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
			$criteria2[]="type='$type'";
			$binds[]=&$type;
			$binds_type[]='s';
		}
		$criteria[] ='('.join(' or ',$criteria2).')';

	}

	if(!empty($data['place'])) {
		$criteria[] = "instr(place,'$data[place]')>0";
		$binds[]=&$data['place'];
		$binds_type[]='s';
	}

	if(!empty($data['price_from'])) {
		$criteria[] = "price>=$data[price_from]";
		$binds[]=&$data['price_from'];
		$binds_type[]='d';
	}
	if(!empty($data['price_to'])) {
		$criteria[] = "price<=$data[price_to]";
		$binds[]=&$data['price_to'];
		$binds_type[]='d';
	}
	if(!empty($data['price_period'])) {
		$criteria[] = "price_period='$data[price_period]'";
		$binds[]=&$data['price_period'];
		$binds_type[]='s';
	}

	if(!empty($data['area_from'])) {
		$criteria[] = "area>=$data[area_from]";
		$binds[]=&$data['area_from'];
		$binds_type[]='d';
	}


	if(!empty($data['area_to'])) {
		$criteria[] = "area<=$data[area_to]";
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
		$criteria[] = "amenities='$data[amenities]'";
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
	$result=mysqli_query($link,$sql);


	$results=array();
	while($row=mysqli_fetch_assoc($result)) {
		getPropertyArray( $row );
		array_push($results, $row);
	}

	return $results;

}



function getPropertyArray(&$row){
	global $LANG;
	if(!empty($row['title'])) {
$ar=explode('##', $row['title']);
		$row['title'] = $ar[$LANG];
}
	if(!empty($row['description'])) {
$ar=explode('##', $row['description']);
		$row['description'] = $ar[$LANG];
}
	if(!empty($row['af'])) {
	$ar=explode('##', $row['af']);
			$row['af'] = $ar[$LANG];

	}
	if(!empty($row['summary'])) {
	$ar=explode('##', $row['summary']);
			$row['summary'] = $ar[$LANG];
	}
	//if(!empty($row['type']))
	//$row['type']=explode('##',$row['type'])[$LANG];

	if(!empty($row['place'])) {
		$ar=explode('##', $row['place']);
		$row['place'] = $ar[$LANG];
		$row['place_text']=$row['place'].' ('.getTextByCode($row['region']).')';
	}
	if(!empty($row['view'])) {

		$ar=explode('##', $row['view']);
		$row['view'] =$ar [$LANG];
	}
	//if(!empty($row['parking']))
	//$row['parking']=explode('##',$row['parking'])[$LANG];

	if(!empty($row['status'])) {
		$ar=explode('##', $row['status']);
		$row['status'] =$ar [$LANG];
	}
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
	//header( 'Location: '+$url ) ;
	exit();
}
/*$levels = array("Easy","Moderate","Difficult");


function getLevel($lid){
               if(lid=='1') return "easy";
                elseif(lid=='2')return  "moderate";
                else return "difficult";



}*/




function getCategoryName($cid){

$a=getSQLquery("select name from category_product where categID=$cid",0);
return $a;

	
}

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



function display_product($row){
?>	
<div class="product_small"  >
<a style="display:block;float:left;width:80px;height:113px;" href="product.php?itemID=<?=$row['id'] ?>">
<img src="photos/<?=$row[id] ?>.jpg" alt="<?=$row['title'] ?>" 
title="<?=$row['title'] ?>" border="0"  width="80" height="113" style="padding:0; margin:0;"
></a>

<div style=" text-align:left; float:left;margin-left:0px;vertical-align:top;width:180px;white-space:nowrap;">
<table style="width:100%;" > <tr><td>
<a class="product_title" href="product.php?itemID=<?=$row['id'] ?>" title="<?=$row['title']?>" >
<?=only_chars($row['title'],20); ?></a>
</td></tr>
<tr><td style="white-space:normal;" >
Παραγωγός:&nbsp;<span style="font-weight:bold;color:#393;"><?=$row['producer'] ?></span>
                                                
</td></tr>

<tr><td  >
Βάρος:&nbsp;<span class="large_book_faint"><?=$row['weight'] ?></span>
                                                
</td></tr>



<tr><td>
                                                
Τιμή :&nbsp;<span class="price_product" ><?=$row['price'] ?>&nbsp;&euro;</span>
</td></tr>
</table>
</div>

<div class="clear"></div>

<!--Div Add to Cart Button -->
<div style="vertical-align:bottom;float:right;" >
<a href=""><img src="images/addtocart.png" style="width:94px;height:30px;"
alt="add to cart" border="0" title="Προσθήκη στο Καλάθι"
onclick="addCart(<?=$row[id];?>);return false;"
></a>
</div>


</div><!--End of cell -->
<?php	
}

?>