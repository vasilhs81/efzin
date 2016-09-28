<?php
//require_once('init.php');
require_once("common.php");


?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Efzin Rentals - Χανιά - Ενοικιάσεις Κατοικιών</title>
<meta name="Keywords" content="rentals in Chania,villas,ενοικιάσεις κατοικιών, villas rental,Γκαρσονιέρα,Οροφοδιαμέρισμα,Διαμέρισμα,Βίλα,Μεζονέτα,Μονοκατοικία" />
<!--<link rel="stylesheet" href="../css/template.css" type="text/css"/>-->

<!--<link rel="shortcut icon" href="../images/favicon.ico" />-->

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bottom.css">
<link rel="stylesheet" type="text/css" href="css/grandTopMenu.css">
<!--<link rel="stylesheet" type="text/css" href="css/loginform.css">-->
<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">


<link rel="stylesheet" id="shadowbox-css-css" href="shadowbox/shadowbox.css" type="text/css" media="screen">
<link rel="stylesheet" id="shadowbox-extras-css" href="shadowbox/extras.css" type="text/css" media="screen">

	<link rel="stylesheet"  href="ui/jquery-ui.min.css" type="text/css" >
<!--	<link rel="stylesheet"  href="ui/jquery-ui.structure.min.css" type="text/css" >-->


	<link rel="stylesheet"  href="autocomplete/autocomplete.css" type="text/css">



	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>


	<script src="ui/jquery-ui.min.js" type="text/javascript"></script>


	<script src="autocomplete/jquery.autocomplete.min.js" type="text/javascript"></script>
<!--	<script src="autocomplete/jquery.ui.autocomplete.html.js" type="text/javascript"></script>-->





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
	<!--<script src="js/jquery.ui.widget.js" type="text/javascript"></script>
	<script src="js/jquery.ui.datepickerOLD.js" type="text/javascript"></script>
	<link href='css/jquery.datetimepicker.css' rel='stylesheet' />
	-->
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
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->


<link rel="stylesheet" type="text/css" href="datepicker/css/default.css">
<script type="text/javascript" src="datepicker/javascript/zebra_datepicker.js"></script>

<!--	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->

<!--<link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.min.css">
<script type="text/javascript" src="datatables/jquery.dataTables.min.js"></script>
-->

<?php }?>


<!--	<script src="shadowbox/shadowbox.js" type="text/javascript"></script>-->










	<!--<script src="shadowbox/shadowbox.js" type="text/javascript"></script>

	<script src="js/coda.js" type="text/javascript"> </script>

	<script type="text/javascript" src="js/slides.min.jquery.js"></script>

	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	-->




<!-- script file to add your own JavaScript -->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script2.js"></script>








<!-- PNG fix for IE6 --><!--[if IE 6]>
        <script type="text/javascript" src="js/dd_belatedpng_0.0.8a-min.js"></script>
        <script type="text/javascript" src="js/ie6-png-fix.js"></script>
    <![endif]-->
<script type="text/javascript" src="js/fb5230720420610a6d20e38efb19d3af.js"></script>

	<?php if(PAGE=="property.php"){?>
<!--	<script src="jssor slider/jssor.slider.mini.js" type="text/javascript"></script>-->

		<script src="jssor slider/jssor.js" type="text/javascript"></script>
		<script src="jssor slider/jssor.slider.js" type="text/javascript"></script>
		<script  type="text/javascript">
			$(document).ready(function() {
				makePhotoGallerySlide();
			});
	</script>
	<?php } ?>






</head>
<body>

<input type="hidden" name="SITE_URL" id="SITE_URL" value="<?=$_SERVER['SERVER_NAME']; ?>">


<!-- Logo Div -->
<div id="header0" style="width:100%;height:150px;border:none;display: block;
background-color: white;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+0,1e5799+50,7db9e8+100&amp;0+0,0.74+35,0.71+64,0+100 */
background: -moz-linear-gradient(left,  rgba(30,87,153,0) 0%, rgba(30,87,153,0.74) 35%, rgba(30,87,153,0.72) 50%, rgba(57,114,175,0.71) 64%, rgba(125,185,232,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(30,87,153,0)), color-stop(35%,rgba(30,87,153,0.74)), color-stop(50%,rgba(30,87,153,0.72)), color-stop(64%,rgba(57,114,175,0.71)), color-stop(100%,rgba(125,185,232,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  rgba(30,87,153,0) 0%,rgba(30,87,153,0.74) 35%,rgba(30,87,153,0.72) 50%,rgba(57,114,175,0.71) 64%,rgba(125,185,232,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  rgba(30,87,153,0) 0%,rgba(30,87,153,0.74) 35%,rgba(30,87,153,0.72) 50%,rgba(57,114,175,0.71) 64%,rgba(125,185,232,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  rgba(30,87,153,0) 0%,rgba(30,87,153,0.74) 35%,rgba(30,87,153,0.72) 50%,rgba(57,114,175,0.71) 64%,rgba(125,185,232,0) 100%); /* IE10+ */
background: linear-gradient(to right,  rgba(30,87,153,0) 0%,rgba(30,87,153,0.74) 35%,rgba(30,87,153,0.72) 50%,rgba(57,114,175,0.71) 64%,rgba(125,185,232,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001e5799', endColorstr='#007db9e8',GradientType=1 ); /* IE6-9 */




">

	<div style="width:960px;left:50%;margin-left: -480px;position:absolute;
	height:120px;background: transparent;z-index:100;">
	<a  href="index.php" style="display:inline-block;margin-top: 10px;">
		<img src="images/logos/logo21_Aster8.png"  alt="Efzin" width="195"
			 height="116" >
	</a>

	<!-- End of Logo div-->


	<!--    Search form Div-->
	<form action="search.php" method="POST" id="ff1" >
		<input type="hidden" name="action" value="quickSearch"/>
		<div style="position:absolute;
		<?php if(PAGE=='index.php') echo 'top:230px;z-index:1;';
		else echo 'top:110px;'?>
		left:645px;display:inline-block;
		white-space:nowrap;height:40px;float:left;
           width:480px;color:black;border:none;overflow: hidden;
			z-index: 200;">
			<input type="text" autocomplete="on" name="keyword" id="sinput" size="20" value="<?=getTextByCode('QUICK_SEARCH')?>..."
			       rel="<?=getTextByCode('QUICK_SEARCH')?>..."
			       style="height: 25px;
			       width: 260px;
			       font-style:italic;
                padding-left: 4px;
                border-radius:5px ;-moz-border-radius:5px; -webkit-border-radius:5px;
                border-width: 0px;font-size:12px;margin: 0pt;border-style: solid;
                border-color: rgb(204, 204, 204) rgb(153, 153, 153) rgb(153, 153, 153) rgb(204, 204, 204);

                opacity: 0.5;
                outline: medium          none;color:rgb(180,180,180);"
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
//           $(this).css('color','#B4B4B4');
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
		   style="width: 22px;height: 22px;position:absolute;z-index:200;
		   <?php if(PAGE=='index.php') echo 'top:230px;';
		   else echo 'top:110px;'?>
		   left:875px;margin-top: 4px;">
			<img  src="images/search1.png" height="20" width="20" alt="<?=getTextByCode('SEARCH')?>" title="<?=getTextByCode('SEARCH')?>"
				  id="sicon" style="opacity: 0.4;"/></a>
	</form>



<!--	Top Icons Quick Lunch	-->

		<table align="right" class="top-menu-quick-links"  border="0" style="width:300px;
		position:absolute;z-index:200;
   left:438px;top:5px;
		" cellspacing="5"> <!-- ***start of cart table ***-->

			<!--   #@ -->
			<td nowrap="nowrap" >
				&nbsp;<a class="top-quick-link" style="display:inline-block;padding:2px;" href="index.php" >
					<img  alt="" border="0" height="9" width="13" src="images/top_icon_home.gif"/><?=getTextByCode('SMALL_HOME_PAGE')?></a></td>
			<td nowrap="nowrap">&nbsp;&nbsp;|&nbsp;&nbsp;<a href="profil.php" class="top-quick-link"><?=getTextByCode('SMALL_INFO')?></a></td>
			<td nowrap="nowrap">&nbsp;&nbsp;|&nbsp;&nbsp;<a name="" ><img alt="" border="0" height="8" width="16" src="images/top_icon_net.gif"></a>
				<a href="contact.php" class="top-quick-link"><?=getTextByCode('SMALL_CONTACT')?></a></td>


			</tr>
			</table>


<!------------------------facebook link	-------------->

<a href="https://www.facebook.com/pages/Efzin-Property/103974186330754"
   target="_blank" style="float:right;position:absolute;z-index:200;
   left:438px;top:10px;color:black;font-size:10px;display:none;"
		><img src="images/facebook-fa-black2.png"
			  alt="Join us on Facebook" title="Join us on Facebook"
			  width="22" height="22"/></a>



	<div style="display:none;position:absolute;
	left:100px;top:-10px;width: 300px; height:199px;z-index:10;opacity:0.1"
	><img src="images/opacity27.png" width="300" height="199"/>
	</div>

		<!--opacity photo1	-->
		<div style="display:none;position:absolute;left:400px;top:5px;width: 300px; height:199px;z-index:-10;opacity:0.1"
			><img src="images/opacity29.png" width="200" height="161"/>
		</div>


<div style="display:none;position:absolute;left:200px;top:10px;width: 300px; height:199px;z-index:-10;opacity:0.2"
	><img src="images/opacity31.png" width="200" height="150"/>
	</div>

		<div style="display:none;position:absolute;left:210px;top:5px;width: 300px; height:199px;z-index:-10;opacity:0.4"
			><img src="images/opacity32.png" width="270" height="180"/>
		</div>


		<div style="display:none;position:absolute;left:180px;top:20px;width: 300px; height:199px;z-index:-10;opacity:0.3"
			><img src="images/opacity33.png" width="70%" height="70%"/>
		</div>

<div style="display:none;;position:absolute;
left:250px;top:0px;width: 612px; height:260px;
z-index:-10;opacity:0.9"
			><img src="photos/8598/3c.jpg" width="471" height="200"/>
		</div>


		<div style="display:none;position:absolute;
left:560px;top:26px;width: 414px; height:200px;
z-index:10;opacity: 0.3"
			><img src="images/logos/bg10.png" width="80%" height="80%"/>
		</div>

		<div style="display:none;position:absolute;
left:670px;top:0px;width: 267px; height:200px;
z-index:10;opacity: 0.1"
			><img src="images/logos/bg13.gif" width="231" height="200"/>
		</div>



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
<div id="content" style="
width: 100%; float: left; top:130px;  position: absolute; z-index: 140;white-space: nowrap;
display: table;
clear: both;
">
<!--	rgb(2,58,92);-->
	<ul class="grandDestinationsMenu"  style="
	font-family:'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;
	background-repeat: no-repeat;
	list-style:none;
	width:100%;
	/*margin-left:5px;*/
	height:50px;
	float:left;
	 background: white;
    padding-top: 3px;
    padding-bottom: 3px;
    white-space: nowrap;
    /*margin-bottom: 3px;*/
border-top:1px solid #ddd;
border-bottom:1px solid #ddd;
border-collapse: collapse;

	">
<!--		-->


		<li title="<?=getTextByCode('HOME_TITLE')?>" style="
		position: absolute;
		left:50%;margin-left: -480px;
		display: block;width:150px;height:50px;
		border-right:1px solid #ddd;
		border-left:1px solid #ddd;
		border-collapse: collapse;
		color:rgb(2,58,92);
		float:left;line-height: 3.8em;text-align: center;">
			<a  href="index.php"><?=getTextByCode('HOME_TEXT')?></a>
<!--			<span style="position: absolute;left:80px;top:0px;font-size: 14px;vertical-align: top;">|</span>-->
		</li>



		<li title="<?=getTextByCode('PROFIL_TITLE')?>" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: -330px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="profil.php" ><?=getTextByCode('PROFIL_TEXT')?></a>
		</li>

		<li style="display: block;width:150px;
		position:absolute;left:50%;margin-left: -180px;
		height:50px;border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;"">
		<a href="javascript:void(0);" class="drop" ><?=getTextByCode('RENTALS_TEXT')?> <img style=""  id="im1"  /></a>

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
				<a class="inner-link" href="search.php?sr=SANTORINI"><img style="vertical-align: middle" width="25" height="24" src="images/santorini.png"> <?=getTextByCode('SANTORINI')?></a>
			</div>


			<div class="col_3">
				<a class="inner-link" href="search.php?sc=HOUSE"><img style="vertical-align: middle" width="20" height="22" src="images/house1.png">&nbsp;<?=getTextByCode('HOUSES')?></a>
			</div>




			<div class="col_1">

				<a class="inner-link" href="search.php?sr=HERAKLION"><img width="48" height="16" src="images/blackheraklion.png">&nbsp; <?=getTextByCode('HERAKLION')?></a>
			</div>



			<div class="col_2">
				<a class="inner-link" href="search.php?sr=RODOS"><img style="vertical-align: middle;margin-right:6px;" width="17" height="20" src="images/rodos.png">
					<?=getTextByCode('RODOS')?>&nbsp;  </a>
			</div>


			<div class="col_3">
				<a class="inner-link" href="search.php?sc=VILLA"><img style="vertical-align: middle;" width="36" height="20" src="images/villa3.png">&nbsp;<?=getTextByCode('VILLAS')?></a>
			</div>




			<div class="col_1">
				<a class="inner-link" href="search.php?sr=LASSITHI"><img width="48" height="16" src="images/blacklassithi.png">&nbsp; <?=getTextByCode('LASSITHI')?></a>
			</div>

			<div class="col_2">
				<a class="inner-link" href="search.php?sr=CYPRUS"><img style="vertical-align: middle;margin-right:-4px;" width="28" height="17" src="images/blackcyprus.png">&nbsp; <?=getTextByCode('CYPRUS')?></a>
			</div>

			<div class="col_3">
				<a class="inner-link" href="search.php?sc=SEASIDE"><img style="vertical-align: middle" width="25" height="25" src="images/blackbeach1.png">&nbsp;<?=getTextByCode('SEASIDES')?></a>
			</div>



			<div class="col_1" style="display: none">
				&nbsp;
			</div>

			<div class="col_2" style="display: none">
				&nbsp;
			</div>


			<div class="col_3" style="display: none">
				<a class="inner-link" href="search.php?sc=APARTMENT"><img style="vertical-align: middle" width="10" height="20" src="images/apart.png">&nbsp; <?=getTextByCode('APARTMENTS')?></a>
			</div>







			<!-- End 4 columns container -->


		</div>

		</li>




		<li title="<?=getTextByCode('REQUEST_TITLE')?>" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: -30px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a  href="requestform.php" ><?=getTextByCode('REQUEST_TEXT')?></a>
		</li>

		<li title="<?=getTextByCode('ENTRY_TITLE')?>" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: 120px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="entryform.php"  ><?=getTextByCode('ENTRY_TEXT')?></a>
		</li>

		<!--<li style="position: absolute; left:320px;">
			<a href="why.php" style="z-index:100;">ΑΙΤΗΣΕΙΣ ΖΗΤΗΣΗΣ</a>
			<span style="position: absolute;left:180px;top:0px;font-size: 14px;vertical-align: text-top;">|</span>
		</li>

		<li style="position: absolute; left:540px;">
			<a href="why.php" style="z-index:100;">ΑΙΤΗΣΕΙΣ ΑΝΑΘΕΣΗΣ</a>
			<span style="position: absolute;left:180px;top:0px;font-size: 14px;vertical-align: text-top;">|</span>
		</li>
	-->
		<!--onmouseover="$('#im1').attr('src','images/drop.gif');"
		onmouseout="$('#im1').attr('src','images/down.png');
		src="images/down.png"
		-->

		<li title="<?=getTextByCode('CONTACT_TITLE')?>" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: 270px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="contact.php"><?=getTextByCode('CONTACT_TEXT')?></a>
		</li></ul>

</div>


<!--end of header0 -->
<!--the rest of the page has background white-->

<div id="wrapper" style="
width: 100%;position:relative;background-image:none;
background-color:transparent;height:auto;width:100%;
">

	<div id="mainDiv"
	 style="width:990px;left:50%;top:200px;margin-left: -480px;
	 position:relative;height:auto;background: transparent;" >



<!--End of grand destination menu	-->

	<div class="clear">&nbsp;</div>
