<?php
require_once ('common.php');
if(isset($_GET['pid'])) {
	$pid = $_GET['pid'];

	if(!is_numeric($pid))
		trigger_error( 'Wrong property parameters ', E_USER_ERROR );

	$row1=getPropertyById($pid);
	if(!$row1)
		redirect('index.php');
	$title = ucfirst( $row['title'] );
}else {
	redirect('index.php');
}
require_once("top.php");
$row=$row1;



//$title=ucfirst($row['name']).' '.ucfirst($row['type']);

?>

<!-- Begin Shadowbox JS v3.0.3.9 -->
<script type="text/javascript">
	/* <![CDATA[ */
	var shadowbox_conf = {
		autoDimensions: false,
		animateFade: true,
		animate: true,
		animSequence: "sync",
		autoplayMovies: true,
		continuous: false,
		counterLimit: 10,
		counterType: "default",
		displayCounter: true,
		displayNav: true,
		enableKeys: true,
		flashBgColor: "#000000",
		flashParams: {bgcolor:"#000000", allowFullScreen:true},
		flashVars: {},
		flashVersion: "9.0.0",
		handleOversize: "resize",
		handleUnsupported: "link",
		initialHeight: 160,
		initialWidth: 320,
		modal: false,
		overlayColor: "#000",
		showMovieControls: true,
		showOverlay: true,
		skipSetup: false,
		slideshowDelay: 0,
		useSizzle: false,
		viewportPadding: 20
	};
	Shadowbox.init(shadowbox_conf);
	/* ]]> */
</script>


<!-- Information panel -->
<div style="width:920px;height:auto;display: inline-block;color:black;line-height: normal;
 padding:20px;overflow: hidden;
 " >

<!--Display the title of the property  -->
<!--<h4 class="item-description" align="left"  style=" border:none;font-weight: normal;font-size: 26px;line-height: 1.8em;">-->

<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
	<?=$row['title'] ?>
<?php

if(!empty($row['place']))
	echo ', '.$row['place_text'];
if(!empty($row['area']))
	echo ', '.$row['area_text'];
if(!empty($row['price']))
	echo ', '.$row['price_text'];
	?>

</h2>
<br>

<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 990px;
        height: 600px; background: #191919; overflow: hidden;">

<!-- Loading Screen -->
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
	<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
	</div>
	<div style="position: absolute; display: block; background: url(images/loading2.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
	</div>
</div>

<!-- Slides Container -->
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 990px; height: 600px; overflow: hidden;">
<?php
$photos = scandir("photos/".$row['id']."/");
?>



	<?php
	foreach ($photos as $value) {
	if (
	(substr($value, -4,4) == '.jpg' ||
	 substr($value, -4,4) == '.png' ||
	 substr($value, -5,5) == '.jpeg')) {
	?>
	<div>
		<img u="image" width="800" height="600" src="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>"
			/>
		<img u="thumb" width="120" height="80" src="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>" />
	</div>
	<?php }}?>

</div>

<!--#region Arrow Navigator Skin Begin -->
<style>
	/* jssor slider arrow navigator skin 05 css */
	/*
	.jssora05l                  (normal)
	.jssora05r                  (normal)
	.jssora05l:hover            (normal mouseover)
	.jssora05r:hover            (normal mouseover)
	.jssora05l.jssora05ldn      (mousedown)
	.jssora05r.jssora05rdn      (mousedown)
	*/
	.jssora05l, .jssora05r {
		display: block;
		position: absolute;
		/* size of arrow element */
		width: 40px;
		height: 40px;
		cursor: pointer;
		background: url(images/a17.png) no-repeat;

		overflow: hidden;
	}
	.jssora05l { background-position: -10px -40px; }
	.jssora05r { background-position: -70px -40px; }
	.jssora05l:hover { background-position: -130px -40px;}
	.jssora05r:hover { background-position: -190px -40px; }
	.jssora05l.jssora05ldn { background-position: -250px -40px; }
	.jssora05r.jssora05rdn { background-position: -310px -40px; }
</style>
<!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="top: 158px; left: 12px;">
        </span>
<!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="top: 158px; right: 32px">
        </span>
<!--#endregion Arrow Navigator Skin End -->
<!--#region Thumbnail Navigator Skin Begin -->
<!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->
<style>
	/* jssor slider thumbnail navigator skin 01 css */
	/*
	.jssort01 .p            (normal)
	.jssort01 .p:hover      (normal mouseover)
	.jssort01 .p.pav        (active)
	.jssort01 .p.pdn        (mousedown)
	*/

	.jssort01 {
		position: absolute;
		/* size of thumbnail navigator container */
		width: 990px;
		height: 100px;
	}

	.jssort01 .p {
		position: absolute;
		top: 0;
		left: 0;
		width: 120px;
		height: 80px;
	}

	.jssort01 .t {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border: none;
	}

	.jssort01 .w {
		position: absolute;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
	}

	.jssort01 .c {
		position: absolute;
		top: 0px;
		left: 0px;
		width: 120px;
		height: 80px;
		/*border: transparent 2px solid;*/
		box-sizing: content-box;
		background-size: cover;

		background-position: center;
		background: none;
	}

	.jssort01 .pav .c {
		top: 0px;
		left: 0px;
		width: 120px;
		height: 80px;
		background: url(images/t01.png) repeat-x;
		/*border: transparent 2px solid;*/
		/*_border: #fff 2px solid;*/
		/*background-position: 50% 50%;*/
		background-position: center;
	}

	.jssort01 .p:hover .c {
		top: 0px;
		left: 0px;
		width: 120px;
		height: 80px;
		/*border: #333 2px solid;*/
		background: url(images/t01.png) repeat-x;
		background-position: center;
	}

	.jssort01 .p.pdn .c {
		/*background-position: 50% 50%;*/
		width: 120px;
		height: 80px;
		/*border: #000 2px solid;*/
	}

	* html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
		/* ie quirks mode adjust */
		width /**/: 120px;
		height /**/: 80px;
	}
</style>

<!-- thumbnail navigator container -->
<div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;width:1000px;">
	<!-- Thumbnail Item Skin Begin -->
	<div id="thumpslides_id" u="slides" style="cursor: default;">
		<div u="prototype" class="p">
			<div class=w><div u="thumbnailtemplate" class="t"></div></div>
			<div class=c></div>
		</div>
	</div>
	<!-- Thumbnail Item Skin End -->
</div>
<!--#endregion Thumbnail Navigator Skin End -->
<a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
</div>

<!-- End of Slides  -->

<div class="clear">&nbsp;</div>



<!--then the basic photo	 -->
<div style="float:left;width: 990;height: 600;Verdana, Arial, Helvetica, sans-serif;display: none;">

	<a href="photos/<?php echo ucfirst($row['id']).'/'.$row['photos']?>"
	   rel="shadowbox[sbalbum-29];player=img;" title="2053139930_912e04d7c0_b"
		>
		<img src="photos/<?=$row['id'].'/'.$row['photos']?>"
		     alt="<?=$title ?>" width="990"  height="600"
		     title="<?=$row['title'] ?>"
			>
	</a>
</div>




<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
	Χαρακτηριστικά</h2>
<hr style="width: 100%;border: 1px solid #004a80;">

<div  style="float:left;width:100%;height:auto;color:black;font-size: 18px;
font-family: Verdana, Arial, Helvetica, sans-serif;line-height: 1.8em;" >

	<table class="description-table"  cellpadding="4" align='center'  border=0
		  >
		<col width="40">
		<col width="60">

		<tr><th>Κωδικός:</th> <td><?=$row['id'] ?></td> </tr>
		<tr><th>Κατηγορία</th><td><?=getTextByCode($row['type']) ?></td></tr>
		<tr><th>Περιοχή:</th> <td><?=$row['place_text'] ?></td> </tr>

		<?php if(!empty($row['price'])){?>
		<tr><th>Τιμή:</th> <td><?=$row['price_text']?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['area'])){?>
		<tr><th>Εμβαδό:</th> <td><?=$row['area_text']?></td></tr>
		<?php  } ?>


		<?php if(!empty($row['year'])){?>
		<tr><th>Έτος Κατασκευής:</th> <td><?=$row['year']?></td></tr>
		<?php  } ?>


		<?php if(!empty($row['rooms'])){?>
		<tr><th>Υπνοδωμάτια:</th> <td><?=$row['rooms']?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['wc'])){?>
		<tr><th>Μπάνια:</th> <td><?=$row['wc']?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['view'])){?>
		<tr><th>Θέα:</th> <td><?=$row['view']?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['level'])){?>
		<tr><th>Όροφος:</th> <td><?=$row['level']?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['status_code'])){?>
		<tr><th>Διαθεσιμότητα:</th> <td>
				<?php
				if($row['status_code']!='Set') {
					echo getTextByCode($row['status_code']);
				}else{
					$avail=getAvailabilities($row['id']);
					if(count($avail)>0){
						echo '<div class="clear8" >&nbsp;</div>';
						echo '<input type="hidden" id="property_id" value="'.$row['id'].'">';
						echo '<div class="item-button3" id="availability_button"
							 onclick="$'."('.calendar-panel').css('visibility','visible');".'"';
						echo "showWait('calendar-panel');";
						echo "return false;";
							echo '><img src="images/cal.png" style="vertical-align: middle" > Διαθεσιμότητα</div>';

					 }else echo '-'; }?></td></tr>
		<?php  } ?>

		<?php if(!empty($row['amenities'])){?>
			<tr><th>Παροχές:</th> <td><?php
					$amenities=explode(',',$row['amenities']);
					foreach($amenities as $amenity){
						echo "<div style='display:inline-block;padding:0px 8px;margin-right:4px;width:auto;
max-width:160px;height:30px;overflow: hidden;white-space: nowrap;line-height: 2.5em;vertical-align: bottom;
							text-align: center;
							background-color:#eee6e6;'>" .
							getTextByCode($amenity).'</div>';

					}

					?></td></tr>
		<?php  } ?>


		<?php if(!empty($row['af'])){?>
			<tr><th>Επιπλέον Χαρακτηριστικά:</th> <td><?=$row['af']?></td></tr>
		<?php  } ?>




	</table>



</div>


<!--<p class="meta">Aug - 18 2011</p> class="alignright size-medium wp-image-89" -->
<div class="clear" style="height:12px;">&nbsp;</div>

<div  style="color:black;height:auto;font-size: 22px;line-height: 1.8em;
width:880px;padding-left:20px;display: block;
	font-family: Verdana, Arial, Helvetica, sans-serif;padding:6px;" >

	<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
		Περιγραφή</h2>
	<hr style="width: 100%;border: 1px solid #004a80;">

	<div class="item-description-text">
		<?=$row['description'] ?></div>
</div>



<div class="clear" style="height:12px;">&nbsp;</div>


<!--     <img src="images/gorges/fratiano/7596003234_abd59a7910.jpg">-->
<!--<h2 style="padding-bottom: 2px;margin-bottom: 4px;font-size: 18px;">Photo Gallary</h2>-->
<div style="width: 100%;height: auto;line-height: normal;">
	<button type="submit"
	        title="πατήστε εδώ για να δηλώσετε ενδιαφέρον για το ακίνητο"
	        onclick="location.href='inquiry.php?pid=<?=$pid?>'"
	        class="large-book-button">ΔΗΛΩΣΗ ΕΝΔΙΑΦΕΡΟΝΤΟΣ</button>
<div class="clear8">&nbsp;</div>


	<div style="width: 100%;height: auto;line-height: normal;">

		<div style="width: 100%;height: auto;line-height: normal;">
			<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
				Φωτογραφίες</h2>

			<br>
			<hr style="width: 100%;border: 1px solid #004a80;">

			<?php

			$photos = scandir("photos/".$row['id']."/");
			?>


			<div  class="gallery-1">
				<?php
				foreach ($photos as $value) {
					if (
						(substr($value, -4,4) == '.jpg' ||
						 substr($value, -4,4) == '.png' ||
						 substr($value, -5,5) == '.jpeg') and $value!=$row['photos']) {
						?>
						<dl class="gallery-item" style="width:120px;height: 70px;padding: 20px;margin:0;padding-left:0;">
							<dt class="gallery-icon" style="width:120px;height: 70px;padding: 0;margin:0;">

								<a href="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>"
								   rel="shadowbox[sbalbum-29];player=img;" title=""
									>
									<img src="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>"
									     alt="2053139930_912e04d7c0_b" class="attachment-thumbnail"
									     title="2053139930_912e04d7c0_b" width="120" height="70" ></a>
							</dt></dl>
					<?php }} ?>
			</div>
		</div>
		<div class="clear" style="height: 6px;">&nbsp;</div>

		<a href="index.php"  class="link2" style="margin-left:12px;" > « Επιστροφή στην Αρχική </a>

		<?php
		if($row['status_code']=='Set' and count($avail)>0){
		?>
		<!-- Calendar Splash Screen -->
		<div class="calendar-panel" id="calendar-panel">
			<div class="container" style="width:800px;height:600px;
		 margin-left: auto ;
  margin-right: auto ;
		 " >
				<section id="content">
					<a href=""
					   onclick="$('.calendar-panel').css('visibility','hidden');
				    return false;"
					   style="display: block;width:17px;height:17px;float:right;
               position: absolute;top:5px;right:15px;
               ">
						<img src="images/remove.png"/></a>

					<h1>Διαθεσιμότητα (<?=$row['id']?>)</h1>

					<div style="display: block;width: 100%;height: 100%;
				 background: transparent ;">
						<div id='calendar'></div>
					</div>




					<!--<div class="button">
						<a href="#">Download source file</a>
					</div>-->
				</section><!-- content -->
			</div><!-- container -->


		</div>
		<?php }?>


	</div>


</div>
</div>





	<!--*************************************************** -->
	<?php require_once("bottom.php");?>
