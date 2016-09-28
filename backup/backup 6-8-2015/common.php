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
		header( 'Location: index.php' );
		exit();
	}
	require_once("top.php");
	$row = $rs->fetch_assoc();
	getPropertyArray( $row );
	return $row;
}


function getPropertyArray(&$row){
	global $LANG;
	if(!empty($row['title']))
	$row['title']=explode('##',$row['title'])[$LANG];

	if(!empty($row['description']))
	$row['description']=explode('##',$row['description'])[$LANG];

	if(!empty($row['summary']))
	$row['summary']=explode('##',$row['summary'])[$LANG];

	if(!empty($row['type']))
	$row['type']=explode('##',$row['type'])[$LANG];

	if(!empty($row['place']))
	$row['place']=explode('##',$row['place'])[$LANG];

	if(!empty($row['view']))
	$row['view']=explode('##',$row['view'])[$LANG];

	if(!empty($row['parking']))
	$row['parking']=explode('##',$row['parking'])[$LANG];

	if(!empty($row['status']))
	$row['status']=explode('##',$row['status'])[$LANG];


}

function redirect($url){
	header( 'Location: '+$url ) ;
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