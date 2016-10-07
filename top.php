<?php
require_once("common.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Efzin Rentals - Χανιά - Ενοικιάσεις Κατοικιών</title>
	<meta name="Keywords" content="rentals in Chania,villas,ενοικιάσεις κατοικιών, villas rental,Γκαρσονιέρα,Οροφοδιαμέρισμα,Διαμέρισμα,Βίλα,Μεζονέτα,Μονοκατοικία" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/bottom.css">
	<link rel="stylesheet" type="text/css" href="css/grandTopMenu.css">
	<!--<link rel="stylesheet" type="text/css" href="css/loginform.css">-->

	<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">

	<link rel="stylesheet" id="shadowbox-css-css" href="shadowbox/shadowbox.css" type="text/css" media="screen">
	<link rel="stylesheet" id="shadowbox-extras-css" href="shadowbox/extras.css" type="text/css" media="screen">
	<link rel="stylesheet"  href="ui/jquery-ui.min.css" type="text/css" >
	<link rel="stylesheet"  href="autocomplete/autocomplete.css" type="text/css">




	<!-- Scripts -->
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script src="ui/jquery-ui.min.js" type="text/javascript"></script>


	<?php

	if(PAGE=='index.php'){?>

		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/slides.min.jquery.js"></script>

	<?php }
	elseif(PAGE=="inquiry.php" || PAGE=='requestform.php' || PAGE=='entryform.php' ){?>

		<script type="text/javascript">
			jQuery.browser = {};
			(function () {
				jQuery.browser.msie = false;
				jQuery.browser.version = 0;
				if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
					jQuery.browser.msie = true;
					jQuery.browser.version = RegExp.$1;
				}
			})();

		</script>
		<script type="text/javascript" src="datepicker/javascript/zebra_datepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="datepicker/css/bootstrap.css">

		<?php if(PAGE=='entryform.php'){ ?>
			<script type="text/javascript" src="dropzone/dropzone.js"></script>
			<link href='dropzone/dropzone.css' rel='stylesheet'  />
		<?php }?>

	<?php }
	elseif(PAGE=="property.php"){?>
		<link href='fullcalendar/fullcalendar/fullcalendar.css' rel='stylesheet' />
		<link href='fullcalendar/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='fullcalendar/fullcalendar/fullcalendar.min.js'></script>

		<script src="shadowbox/shadowbox.js" type="text/javascript"></script>
		<script src="js/coda.js" type="text/javascript"> </script>
	<?php }
	elseif(PAGE=="search.php"){?>
		<link rel="stylesheet" type="text/css" href="datepicker/css/default.css">
		<script type="text/javascript" src="datepicker/javascript/zebra_datepicker.js"></script>
	<?php }?>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/script2.js"></script>

	<!-- PNG fix for IE6 --><!--[if IE 6]>
	<script type="text/javascript" src="js/dd_belatedpng_0.0.8a-min.js"></script>
	<script type="text/javascript" src="js/ie6-png-fix.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/fb5230720420610a6d20e38efb19d3af.js"></script>

	<?php if(PAGE=="property.php"){?>
		<script src="jssor slider/jssor.js" type="text/javascript"></script>
		<script src="jssor slider/jssor.slider.js" type="text/javascript"></script>
		<script  type="text/javascript">
			$(document).ready(function() {
				makePhotoGallerySlide();
			});
		</script>
	<?php } ?>

	<link rel="stylesheet" media="all"  type="text/css" href="css/restive.css">

	<script type="text/javascript" src="js/restive.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('body').restive({
//				breakpoints: ['10000'],
//				classes: ['nb'],
				breakpoints: ['979'],
				classes: ['css-small'],
				turbo_classes: 'is_mobile=r_mobi,is_phone=r_phone,is_tablet=r_tablet,is_landscape=r_landscape',
				force_dip: true
			});
		});
	</script>

</head>
<body>

<input type="hidden" name="SITE_URL" id="SITE_URL" value="<?=$_SERVER['SERVER_NAME']; ?>">

<!-- *************** Logo Div ***************** -->
<div id="header0" class="logo_div">

<div class="logo_img">
	<a  href="index.php" class="logo_img_href">
		<img src="images/logos/logo21_Aster8.png"  alt="Efzin" width="195"
			 height="116" >
	</a>

	<!--    Search form Div-->
	<form action="search.php" method="POST" id="ff1" >
		<input type="hidden" name="action" value="quickSearch"/>
		<div class="<?= (PAGE=='index.php')? "search_div_index":"search_div_others" ?>">

			<input type="text" autocomplete="on" name="keyword" id="sinput" size="20" value="<?=getTextByCode('QUICK_SEARCH')?>..."
				   rel="<?=getTextByCode('QUICK_SEARCH')?>..."
				   class="quick_search"
				   onfocus="if(this.value==this.getAttribute('rel')){
           this.value='';
           $('#sicon').css('opacity','1');
           $(this).css('color','black');
           $(this).css('opacity','1');
           }"

				   onblur="if(this.value==this.getAttribute('rel') || this.value==''){
           this.value=this.getAttribute('rel');
           $('#sicon').css('opacity','0.4');
           $(this).css('opacity','0.5');
           }"
				   onclick="if(this.value==this.getAttribute('rel')){
           this.value='';
           $('#sicon').css('opacity','1');
           $(this).css('color','black');
           $(this).css('opacity','1');
           }"
				   onKeyPress="return submitFormWithEnter(this,event);"
				>
		</div>
		<a href="javascript:$('#ff1').submit();"
		   class="search_icon_href"
		   style="<?php if(PAGE=='index.php') echo 'top:230px;'; else echo 'top:110px;'?> ">
			<img  src="images/search1.png" height="20" width="20" alt="<?=getTextByCode('SEARCH')?>" title="<?=getTextByCode('SEARCH')?>"
				  id="sicon" /></a>
	</form>
	<!--	Top Icons Quick Lunch	-->

	<table align="right" class="top-menu-quick-links"  border="0" cellspacing="5"> <!-- ***start of cart table ***-->

		<!--   #@ -->
		<td nowrap="nowrap" >
			&nbsp;<a class="top-quick-link"  href="index.php" >
				<img  alt="" border="0" height="9" width="13" src="images/top_icon_home.gif"/><?=getTextByCode('SMALL_HOME_PAGE')?></a></td>
		<td nowrap="nowrap">&nbsp;&nbsp;|&nbsp;&nbsp;<a href="profil.php" class="top-quick-link"><?=getTextByCode('SMALL_INFO')?></a></td>
		<td nowrap="nowrap">&nbsp;&nbsp;|&nbsp;&nbsp;<a name="" ><img alt="" border="0" height="8" width="16" src="images/top_icon_net.gif"></a>
			<a href="contact.php" class="top-quick-link"><?=getTextByCode('SMALL_CONTACT')?></a></td>
		</tr>
	</table>

	<!------------------- Language Div ------------------->
	<div class="language-div">
		<?php
		$rows=getLanguages();
		$qs=preg_replace('/&?lang=\w+/','',basename($_SERVER['QUERY_STRING']));
		if($qs!='')
			$qs='&'.$qs;
		if(!empty($_POST))
			$_SESSION['POST']=$_POST;
		?>
		<a href="<?=PAGE?>?lang=<?=$rows[$LANG]['prefix'].$qs ?>"
			><img src="images/<?=$rows[$LANG]['prefix']?>.png"
				  alt="<?=ucfirst($rows[$LANG]['name'])?>"
				  width="25" height="15" style="vertical-align: text-top;">
			<?=mb_strtoupper($rows[$LANG]['prefix'])?> ▼
		</a>
		<?php
		foreach($rows as $row){
			if($row['index']!=$LANG) {
				?>
				<div class="clear8">&nbsp;</div>
				<a href="<?=PAGE?>?lang=<?=$row['prefix'].$qs ?>"
					><img src="images/<?=$row['prefix']?>.png" alt="<?=ucfirst($row['name'])?>"
						  title="<?=ucfirst($row['name'])?>"
						  width="25" height="15"/>
					<?=mb_strtoupper($row['prefix'])?>
				</a>
			<?php }}?>

	</div>
	<!-- End of Language Div -->
</div>

<div class="clear8">&nbsp;</div>
<!---------------------   Grand Destination Menu -------------------->
<div id="content" class="content_div" >
	<!--	rgb(2,58,92);-->
	<ul class="small-menu">
		<li title="<?=getTextByCode('HOME_TITLE')?>" >
			<a  href="index.php"><?=getTextByCode('HOME_TEXT')?></a>
		</li>

		<li title="<?=getTextByCode('PROFIL_TITLE')?>" >
			<a href="profil.php" ><?=getTextByCode('PROFIL_TEXT')?></a>
		</li>

	</ul>


	<ul class="grandDestinationsMenu">

		<li title="<?=getTextByCode('HOME_TITLE')?>" class="home_li">
			<a  href="index.php"><?=getTextByCode('HOME_TEXT')?></a>
		</li>

		<li title="<?=getTextByCode('PROFIL_TITLE')?>" class="profile_li">
			<a href="profil.php" ><?=getTextByCode('PROFIL_TEXT')?></a>
		</li>

		<li class="rentals_li">
			<a href="javascript:void(0);" class="drop" ><?=getTextByCode('RENTALS_TEXT')?> <img id="im1"  /></a>

			<div class="dropdown_4columns" style="z-index: 10;" >

				<!--<div class="col_4">
					<h2>This is a heading title</h2>
				</div>
			-->
				<div class="col_1">

					<a class="inner-link" href="search.php?sr=CHANIA"><img width="48" height="16" src="images/blackchania.png">&nbsp; <?=getTextByCode('CHANIA')?></a>
				</div>

				<div class="col_2">
					<a class="inner-link" href="search.php?sr=MIKONOS"><img width="19" height="17" src="images/blackmikonos4.png">&nbsp; <?=getTextByCode('MIKONOS')?></a>
				</div>

				<div class="col_3">
					<a class="inner-link" href="search.php?sc=HOTEL"><img width="15" height="16" src="images/hotel-black.png">&nbsp; <?=getTextByCode('HOTELS')?></a>
				</div>



				<div class="col_1">
					<a class="inner-link" href="search.php?sr=RETHIMNO"><img width="48" height="16" src="images/blackrethymno.png">&nbsp; <?=getTextByCode('RETHIMNO')?></a>
				</div>

				<div class="col_2" style="display: none;">
					<a class="inner-link"  href="search.php?sc=PLOT"><img width="22" height="22" src="images/plot1.png">&nbsp;<?=getTextByCode('PLOTS')?></a>
				</div>

				<div class="col_2">
					<a class="inner-link" href="search.php?sr=SANTORINI"><img  width="25" height="24" src="images/santorini.png"> <?=getTextByCode('SANTORINI')?></a>
				</div>


				<div class="col_3">
					<a class="inner-link" href="search.php?sc=HOUSE"><img  width="20" height="22" src="images/house1.png">&nbsp;<?=getTextByCode('HOUSES')?></a>
				</div>

				<div class="col_1">
					<a class="inner-link" href="search.php?sr=HERAKLION"><img width="48" height="16" src="images/blackheraklion.png">&nbsp; <?=getTextByCode('HERAKLION')?></a>
				</div>

				<div class="col_2">
					<a class="inner-link" href="search.php?sr=RODOS"><img style="margin-right:6px;" width="17" height="20" src="images/rodos.png">
						<?=getTextByCode('RODOS')?>&nbsp;  </a>
				</div>

				<div class="col_3">
					<a class="inner-link" href="search.php?sc=VILLA"><img width="36" height="20" src="images/villa3.png">&nbsp;<?=getTextByCode('VILLAS')?></a>
				</div>

				<div class="col_1">
					<a class="inner-link" href="search.php?sr=LASSITHI"><img width="48" height="16" src="images/blacklassithi.png">&nbsp; <?=getTextByCode('LASSITHI')?></a>
				</div>

				<div class="col_2">
					<a class="inner-link" href="search.php?sr=CYPRUS"><img style="margin-right:-4px;" width="28" height="17" src="images/blackcyprus.png">&nbsp; <?=getTextByCode('CYPRUS')?></a>
				</div>

				<div class="col_3">
					<a class="inner-link" href="search.php?sc=SEASIDE"><img  width="25" height="25" src="images/blackbeach1.png">&nbsp;<?=getTextByCode('SEASIDES')?></a>
				</div>

				<div class="col_1" style="display: none">
					&nbsp;
				</div>

				<div class="col_2" style="display: none">
					&nbsp;
				</div>

				<div class="col_3" style="display: none">
					<a class="inner-link" href="search.php?sc=APARTMENT"><img  width="10" height="20" src="images/apart.png">&nbsp; <?=getTextByCode('APARTMENTS')?></a>
				</div>
				<!-- End 4 columns container -->
			</div>
		</li>

		<li title="<?=getTextByCode('REQUEST_TITLE')?>" class="request_title">
			<a  href="requestform.php" ><?=getTextByCode('REQUEST_TEXT')?></a>
		</li>

		<li title="<?=getTextByCode('ENTRY_TITLE')?>" class="entry_title">
			<a href="entryform.php"  ><?=getTextByCode('ENTRY_TEXT')?></a>
		</li>

		<li title="<?=getTextByCode('CONTACT_TITLE')?>" class="contact_title">
			<a href="contact.php"><?=getTextByCode('CONTACT_TEXT')?></a>
		</li></ul>

</div>
<!--end of header0 -->
<!--the rest of the page has background white-->

<div id="wrapper" class="wrapper" >
	<div id="mainDiv" class="maindiv">
		<!--End of grand destination menu	-->
		<div class="clear">&nbsp;</div>