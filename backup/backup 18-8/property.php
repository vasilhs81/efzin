<?php

require_once("top.php");

if(isset($_GET['pid'])) {
	$pid = $_GET['pid'];
	$row=getPropertyById($pid);

	$title = ucfirst( $row['title'] );
}else {
	redirect('index.php');
}

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

<!--then the basic photo	 -->
<div style="float:left;width: 600;height: 400;Verdana, Arial, Helvetica, sans-serif;">

	<a href="photos/<?php echo ucfirst($row['id']).'/'.$row['photos']?>"
	   rel="shadowbox[sbalbum-29];player=img;" title="2053139930_912e04d7c0_b"
		>
		<img src="photos/<?=$row['id'].'/'.$row['photos']?>"
		     alt="<?=$title ?>" width="990"  height="600"
		     title="<?=$row['title'] ?>"
			>
	</a>
</div>


<div  style="float:left;width:300px;height:auto;color:black;font-size: 18px;
	 font-family: Verdana, Arial, Helvetica, sans-serif;" >
	<div id="track-details"   style="float:left;margin-left: 12px;width: 100%;
		font-size: 16px;line-height: 1.8em;" >

		<div class="item-description" >
			<h3 style="font-size:16px;">Χαρακτηριστικά</h3>
		</div>

		<div class="item-description">
			Κωδικός: <span style="font-weight: bold;float: right"><?=$row['id'] ?></span>
		</div>

		<div class="item-description">
			Κατηγορία: <span style="font-weight: bold;float: right"><?=getTextByCode($row['type']) ?></span>
		</div>

		<?php if(!empty($row['price'])){?>
			<div class="item-description">
				Τιμή: <span style="font-weight: bold;float: right"><?=$row['price_text']?></span>
			</div>
		<?php  } ?>

		<?php if(!empty($row['area'])){?>
			<div class="item-description">
				Εμβαδό: <span style="font-weight: bold;float: right"><?=$row['area_text'] ?> </span>
			</div>
		<?php }?>


		<?php if($row['year']!=0){?>
			<div class="item-description">
				Έτος κατασκευής: <span style="font-weight: bold;float: right"><?=$row['year'] ?></span>
			</div>
		<?php }?>

		<?php if($row['rooms']!=0){?>
			<div class="item-description">
				Δωμάτια: <span style="font-weight: bold;float: right"><?=$row['rooms'] ?></span>
			</div>
		<?php }?>

		<?php if($row['wc']!=0){?>
			<div class="item-description">
				Μπάνια: <span style="font-weight: bold;float: right"><?=$row['wc'] ?></span>
			</div>
		<?php }?>

		<div class="item-description">
			Θέα: <span style="font-weight: bold;float: right"><?=$row['view'] ?></span>
		</div>

		<?php if($row['level']!=null){?>
			<div class="item-description">
				Όροφος: <span style="font-weight: bold;float: right"><?=$row['level'] ?></span>
			</div>
		<?php }?>

		<?php if($row['parking']!=''){?>
		<div class="item-description">
			Θέση στάθμευσης: <span style="font-weight: bold;float: right"><?=getTextByCode($row['parking'])?></span>
		</div>
		<?php }?>

		<?php if($row['pool']!=''){?>
		<div class="item-description">
			Πισίνα: <span style="font-weight: bold;float: right"><?=getTextByCode($row['pool'])?></span>
		</div>
		<?php }?>

		<?php if($row['ac']!=''){?>
		<div class="item-description">
			A/C: <span style="font-weight: bold;float: right"><?=getTextByCode($row['ac'])?></span>
		</div>
		<?php }?>

		<?php if($row['garden']!=''){?>
		<div class="item-description">
			Κήπος: <span style="font-weight: bold;float: right"><?=getTextByCode($row['garden'])?></span>
		</div>
		<?php }?>

		<?php if($row['new_building']!=''){?>
		<div class="item-description">
			Νεόδμητο: <span style="font-weight: bold;float: right"><?=getTextByCode($row['new_building'])?></span>
		</div>
		<?php }?>


		<?php if($row['status']!=''){?>
			<div class="item-description">
				<span style="font-weight: bold;float: left"><?=$row['status']?></span>
			</div>

		<?php }
		else{
			$avail=getAvailabilities($row['id']);
			if(count($avail)>0){?>
				<div class="clear8" >&nbsp;</div>
				<input type="hidden" id="property_id" value="<?=$row['id']?>">
				<div class="item-button3" style="float: right;"
				     onclick="$('.calendar-panel').css('visibility','visible');
						showWait('calendar-panel');
						return false;"
					>
					<img src="images/cal.png" style="vertical-align: middle" >
					Διαθεσιμότητα</div>


			<?php
			}

		}



		?>

	</div>



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
						<dl class="gallery-item">
							<dt class="gallery-icon">

								<a href="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>"
								   rel="shadowbox[sbalbum-29];player=img;" title="2053139930_912e04d7c0_b"
									>
									<img src="photos/<?php echo ucfirst($row['id']).'/'.strtolower($value)?>"
									     alt="2053139930_912e04d7c0_b" class="attachment-thumbnail"
									     title="2053139930_912e04d7c0_b" height="150" width="150"></a>
							</dt></dl>
					<?php }} ?>
			</div>
		</div>
		<div class="clear" style="height: 6px;">&nbsp;</div>

		<a href="index.php"  class="link2" style="margin-left:12px;" > « Επιστροφή στην Αρχική </a>

		<?php
		if($row['status_code']=='Set'){
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
