<?php
require_once("top.php");

//echo "<div class='clear'>&nbsp;</div>";
//echo '<div style="width:920px;height:auto;display: inline-block;color:black;line-height: 1.8em;padding:20px;overflow: hidden;">';
//GET PARAMETERS
if(!empty($_GET['sc']) or !empty($_GET['sr'])){
	$data           = array();
	if(!empty($_GET['sr'])) {
		$regions=getTextByCategory('REGION');
		if(!in_array($_GET['sr'],array_keys($regions)))
			trigger_error( 'Wrong search parameters ', E_USER_ERROR );
		$data['region'] = $_GET['sr'];
	}
	if(!empty($_GET['sc'])) {
		$types=getTextByCategory('PROPERTY_TYPE');
		if(!in_array($_GET['sr'],array_keys($types)))
			trigger_error( 'Wrong search parameters ', E_USER_ERROR );
		$data['type'] = $_GET['sc'];
	}
	$search_results = searchProperties( $data );

}

else {
	if(empty($_POST)){
		if(empty($_SESSION['POST']))
			trigger_error( 'Wrong search parameters ', E_USER_ERROR );
		$_POST=$_SESSION['POST'];
	}
	if ( ! isset( $_POST['action'] ) ) {
		trigger_error( 'Wrong search parameters ', E_USER_ERROR );
	}
	if ( $_POST['action'] == 'search' ) {//normal search
		if ( empty( $_POST['region'] ) ) {
			trigger_error( 'Wrong search parameters ', E_USER_ERROR );
		}
		if ( empty( $_POST['property_kind'] ) ) {
			trigger_error( 'Wrong search parameters ', E_USER_ERROR );
		}

		$data           = array();
		$data['region'] = $_POST['region'];
		$data['type']   = $_POST['property_kind'];

		if ( ! empty( $_POST['property_place'] ) ) {
			$data['place'] = $_POST['property_place'];
		}

		if ( ! empty( $_POST['price_from'] ) ) {
			$data['price_from'] = $_POST['price_from'];
		}

		if ( ! empty( $_POST['price_to'] ) ) {
			$data['price_to'] = $_POST['price_to'];
		}

		if ( ! empty( $data['price_from'] ) || ! empty( $data['price_to'] ) ) {
			if ( empty( $_POST['property_charge_period'] ) ) {
				trigger_error( 'Wrong search parameters ', E_USER_ERROR );
			}

			$data['price_period'] = $_POST['property_charge_period'];
		}
		if ( ! empty( $_POST['area_from'] ) ) {
			$data['area_from'] = $_POST['area_from'];
		}

		if ( ! empty( $_POST['area_to'] ) ) {
			$data['area_to'] = $_POST['area_to'];
		}

		if ( ! empty( $_POST['amenity'] ) and is_array( $_POST['amenity'] ) ) {
			$data['amenities'] = join( ',', array_keys( $_POST['amenity'] ) );
		}
		//foreach ( $_POST['amenity'] as $amenity => $val ) {
		//	$amenities[]=$amenity


//		AMENITIES LIST
		/*if(!empty($_POST['property_neodmyto']))
			$data['new_property']='YES';

		if(!empty($_POST['property_klimatismos']))
			$data['ac']='YES';

		if(!empty($_POST['property_parking']))
			$data['parking']='YES';


		if(!empty($_POST['property_pool']))
			$data['pool']='YES';

		if(!empty($_POST['property_garden']))
			$data['garden']='YES';*/

		$search_results = searchProperties( $data );
		//print_r($search_results); //works
//	echo "</div>";
		//

	} elseif ( $_POST['action'] == 'quickSearch' ) {
		$words = array();
		$delim = " .,;-()";
		$tok   = strtok( $_POST['keyword'], $delim );
		while ( $tok !== false ) {
			$words[] = $tok;
			$tok     = strtok( $delim );
		}
		$unique_words = array_unique( $words );
		if ( count( $unique_words ) > 0 ) {
			$search_results = quickSearchProperties( $unique_words );
		}
//	$keys=explode(' ',trim($_POST['action']))


	}
}
?>
<?php require_once 'includes/searchform.php';?>

<div style="width:auto;height:auto;display: inline-block;color:black;line-height: 1.4em;
padding-top:5px;overflow: hidden;padding-left:5px;">
<!--<p>Βρέθηκαν <b>--><?//=count($search_results)?><!--</b> αποτελέσματα</p>-->
<input type="hidden" id="results_count" value="<?=count($search_results)?>">
<input type="hidden" id="results_per_page" value="<?=RESULTS_PER_PAGE?>">


<table style="width: 640px;display: inline-block;height: auto;"
       border="0" data-page-length='2' id="searchtable" cellspacing="5" cellpadding="3" >

	<thead>
	</thead>
	<tbody>
	<tr><td align="left" colspan="2">
			<p>Βρέθηκαν <b><?=count($search_results)?></b> αποτελέσματα</p>

	</td><td></td></tr>
<?php if(count($search_results)>0){
	$i=1;
foreach($search_results as $row){ ?>
<tr class="search-result-tr" data-rowid="<?=$i++?>" >
	<td><a href="property.php?pid=<?=$row['id']?>">
		<img src="photos/<?=$row['id'].'/'.$row['photos']?>" alt="<?=$row['title']?>"
	         title="<?=$row['title']?>" width="240" height="176"></a></td>
<td>
	<div style="position: relative;height: 170px;">
	<a href="property.php?pid=<?=$row['id'] ?>" class="header-link"
	   style="font-family:verdana, Helvetica, 'Open Sans', Arial, sans-serif;
	   font-size:14px;font-weight:bold;color:rgb(0, 102, 153);"
		><?=$row['title'] ?> </a> <br>
	<span style="color:#aaa; font-size:11px;font-style:italic;" >
		<?=($row['place']).' ('.getTextByCode($row['region']).')'?></span>

<div style="display: block;width:100%;height:auto;max-height:90px;overflow:hidden;">
	<strong>Κωδ. </strong> <?=$row['id']?>
	<p style="padding-top:4px;">
		<?=$row['summary'] ?>
	</p>

</div>
	<div style="display: block;width:100%;height:18px;overflow:hidden;margin-top:2px;">

	<?php
	if(!empty($row['price']))
		echo "<b>".$row['price'].' &euro;</b>/'.getTextByCode($row['price_period']).
		     "<span class='vertical-line'> | </span>";
	?>

	<?php
	if($row['area']!=0)
		echo $row['area_text'].
		     "<span class='vertical-line'> | </span>";
	?>

	<?php
	if($row['rooms']!=0)
		echo number_format($row['rooms'], 0, '', '.').'&nbsp;'.getTextByCode('ROOMS')."<span class='vertical-line'> | </span>";;
	?>

	<?php
	if($row['status_code']=='Free')
		echo '<br><b>'.getTextByCode('ROOM_FREE').'</b> ';
	elseif($row['status_code']=='Set'){
	$avail=getAvailabilities($row['id']);
	if(count($avail)==0)
		echo '<br><b>'.getTextByCode('ROOM_RESERVED').'</b> ';

	}else
		echo '<br><b>'.getTextByCode('ROOM_RESERVED').'</b> ';

	?>


</div>
	<!--				<a href="participation.php?eventID=--><?//=$row['eventID'] ?><!--"  class="small-book-button"  >BOOK NOW ></a>-->

	<div class="clear2">&nbsp;</div>

<div style="position: absolute; left: 0; width: 100%; bottom: 0;">

	<div  class="item-button3"
	      onclick="location.href='property.php?pid=<?=$row['id']?>'"
	      style="vertical-align:bottom;font-size: 11px;cursor: pointer;
	      margin: 0 auto; text-align: right;float:right;margin-right:30px;
	      ">
		Περισσότερα »
	</div>

</div>
</div>
<!--	<a href="property.php?pid=--><?//=$row['id'] ?><!--"-->
<!--	   class="read-more-link">Read more..</a>-->
<!---->


</td>

</tr>


<?php }?>
<?php }?>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>

	<?php if(count($search_results)>RESULTS_PER_PAGE){?>
	<tr><td colspan="2"  id="pagination" align="center"></td></tr>
	<?php }?>
	</tbody>
</table>


<!--<div style="width: 100%;height:40px;border:1px solid #ccc;display:inline-block;line-height: ">-->


</div>





	<!--*************************************************** -->
	<?php require_once("bottom.php");?>
