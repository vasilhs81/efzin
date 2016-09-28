<?php
require_once("common.php");
if(isset($_GET['pID'])) {
	$pid = $_GET['pID'];

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

	$title = ucfirst( $row['title'] );
}else {
	header( 'Location: index.php' );
	exit();
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
	 <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;
	 font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
		 <?=$row['title'] ?> </h2>
<br>
	 <hr style="width: 100%;border: 1px dashed #004a80;">

<!--then the basic photo	 -->
	 <div style="float:left;width: 300;height: 200px;Verdana, Arial, Helvetica, sans-serif;">
		 <img src="photos/<?=$row['id'].'/'.$row['photos']?>"
		      alt="<?=$title ?>" height="200" width="300"
		      title="<?=$row['title'] ?>"
			 >

	 </div>


	 <div  style="float:left;width:auto;height:auto;color:black;font-size: 18px;
	 font-family: Verdana, Arial, Helvetica, sans-serif;" >
		 <div id="track-details"   style="float:left;margin-left: 12px;
		font-size: 16px;line-height: 1.8em;" >
<h3>Χαρακτηριστικά</h3>

			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Κωδικός: <span style="font-weight: bold;"><?=$row['id'] ?></span>
			 </p>
			 <?php if($row['price']!=0){?>
			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Τιμή: <span style="font-weight: bold;"><?=$row['price'].'/'.$row['price_period']?></span>
			 </p>
			 <?php  } ?>

			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Εμβαδό: <span style="font-weight: bold;"><?=$row['area'] ?> τ.μ.</span>
			 </p>
			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Τύπος: <span style="font-weight: bold;"><?=$row['type'] ?></span>
			 </p>

			 <?php if($row['year']!=0){?>
			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Έτος κατασκευής: <span style="font-weight: bold;"><?=$row['year'] ?></span>
			 </p>
			 <?php }?>

			 <?php if($row['rooms']!=0){?>
			 <p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Δωμάτια: <span style="font-weight: bold;"><?=$row['rooms'] ?></span>
			 </p>
			 <?php }?>

			 <?php if($row['wc']!=0){?>
				<p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Μπάνια: <span style="font-weight: bold;"><?=$row['wc'] ?></span>
			 </p>
			 <?php }?>

				<p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Θέα: <span style="font-weight: bold;"><?=$row['view'] ?></span>
			 </p>

			 <?php if($row['level']!=null){?>
			<p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Όροφος: <span style="font-weight: bold;"><?=$row['level'] ?></span>
			 </p>
			 <?php }?>

			<p style="font-family: Verdana, Arial, Helvetica, sans-serif;">
				 Θέση στάθμευσης: <span style="font-weight: bold;"><?=$row['parking']?></span>
			 </p>

	 </div>



</div>


<!--<p class="meta">Aug - 18 2011</p> class="alignright size-medium wp-image-89" -->
	 <div class="clear" style="height:12px;">&nbsp;</div>

<div  style="color:black;height:auto;font-size: 22px;line-height: 1.8em;
width:880px;padding-left:20px;display: block;
	font-family: Verdana, Arial, Helvetica, sans-serif;padding:6px;" >

	<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
		ΠΕΡΙΓΡΑΦΗ</h2>
	<hr style="width: 100%;border: 1px dashed #004a80;">
    <?=$row['description'] ?>
</div>



<div class="clear" style="height:12px;">&nbsp;</div>


<!--     <img src="images/gorges/fratiano/7596003234_abd59a7910.jpg">-->
<!--<h2 style="padding-bottom: 2px;margin-bottom: 4px;font-size: 18px;">Photo Gallary</h2>-->
	<div style="width: 100%;height: auto;line-height: normal;">
	<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size:18px;font-weight:bold;color:rgb(0, 102, 153);" >
		PHOTO GALLARY</h2>

		<br>
		<hr style="width: 100%;border: 1px dashed #004a80;">

     <?php

     $photos = scandir("photos/".$row['id']."/");
     ?>


     <div  class="gallery-1">
         <?php
         foreach ($photos as $value) {
             if (substr($value, -4,4) == '.jpg' ||substr($value, -5,5) == '.jpeg') {
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

     <a href="index.php"  class="link2" style="margin-left:12px;" > << Home </a>


 </div>
                                                                                          

<!--*************************************************** -->
<?php require_once("bottom.php");?>
