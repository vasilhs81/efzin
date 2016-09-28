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



<link rel="stylesheet" id="shadowbox-css-css" href="shadowbox/shadowbox.css" type="text/css" media="screen">
<link rel="stylesheet" id="shadowbox-extras-css" href="shadowbox/extras.css" type="text/css" media="screen">

<!--<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>-->
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/slides.min.jquery.js"></script>




<?php  if (basename($_SERVER['SCRIPT_FILENAME'])=="events.php" ||
    basename($_SERVER['SCRIPT_FILENAME'])=="destinations.php")
    {
  ?>

        <script type="text/javascript" src="scripts/ddsmoothmenu.js"> </script>
        <script type="text/javascript">

            ddsmoothmenu.init({
                mainmenuid: "smoothmenu1", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                method: 'hover',
                //arrowswap: true,
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            });
            ddsmoothmenu.init({
                mainmenuid: "smoothmenu2", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                method: 'hover',
                //arrowswap: true,
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            });

            /*ddsmoothmenu.init({
             mainmenuid: "smoothmenu2", //Menu DIV id
             orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
             classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
             method: 'toggle', // set to 'hover' (default) or 'toggle'
             arrowswap: true, // enable rollover effect on menu arrow images?
             //customtheme: ["#804000", "#482400"],
             contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
             })*/

        </script>



        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu-v.css" />




    <?php

}elseif(basename($_SERVER['SCRIPT_FILENAME'])=="event.php"){?>
    <link rel="stylesheet" type="text/css" href="css/multitab.css" />
<?php }
elseif(basename($_SERVER['SCRIPT_FILENAME'])=="property.php"){?>
	<script src="shadowbox/shadowbox.js" type="text/javascript"></script>
	<script src="js/coda.js" type="text/javascript"> </script>

	<link href='fullcalendar/fullcalendar/fullcalendar.css' rel='stylesheet' />
	<link href='fullcalendar/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='fullcalendar/fullcalendar/fullcalendar.min.js'></script>

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
elseif(basename($_SERVER['SCRIPT_FILENAME'])=="search.php"){?>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->


<link rel="stylesheet" type="text/css" href="datepicker/css/default.css">
<script type="text/javascript" src="datepicker/javascript/zebra_datepicker.js"></script>

<!--	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->

<!--<link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.min.css">
<script type="text/javascript" src="datatables/jquery.dataTables.min.js"></script>
-->

<?php
}elseif(basename($_SERVER['SCRIPT_FILENAME'])=="why.php"){
?>
<!--<script type="text/javascript" src="js/bjqs-1.3.min.js"/>-->
<script type="text/javascript" src="js/slider.js"/>
<link rel="stylesheet" type="text/css" href="css/bjqs.css" />
<!--<link rel="stylesheet" type="text/css" href="css/bjqs.css" />-->

<?php
}
elseif(basename($_SERVER['SCRIPT_FILENAME'])=="calendar.php"){?>
<!--<script src='../jquery/jquery-ui-1.10.3.custom.min.js'></script>-->

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

<!-- Begin Shadowbox JS v3.0.3.9 -->
<!-- Selected Players: html, iframe, img, qt, swf, wmp -->


<!-- End Shadowbox JS -->



<!--------------Calendar related plugins ------------------->



<!--
	(Required for plugin)
	Dependancies for JQuery Frontier Calendar plugin.
    ** THESE MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>

<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.3.2.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>

<!---------------- End of Calendar Plugins ---------------->



</head>
<body>

<input type="hidden" name="SITE_URL" id="SITE_URL" value="<?=$_SERVER['SERVER_NAME']; ?>">


<!-- Logo Div -->
<div id="header0" style="width:100%;height:200px;border:none;display: block;
background-color: #518cc1;




">

	<div style="width:960px;left:50%;margin-left: -480px;position:absolute;
	height:auto;background: transparent;z-index:100;">
	<a  href="index.php" style="display:inline-block;margin-top: 50px;">
		<img src="images/logos/logo20.png"  alt="Efzin" width="364"
			 height="116" >
	</a>

	<!-- End of Logo div-->


	<!--    Search form Div-->
	<form action="search.php" method="POST" id="ff1" >
		<input type="hidden" name="action" value="quickSearch"/>
		<div style="position:absolute;
		<?php if(PAGE=='index.php') echo 'top:280px;z-index:1;';
		else echo 'top:140px;'?>
		left:635px;display:inline-block;
		white-space:nowrap;height:40px;float:left;
           width:480px;color:black;border:none;overflow: hidden;
			z-index: 200;">
			<input type="text" autocomplete="on" name="keyword" id="sinput" size="20" value="<?=getTextByCode('SEARCH')?>..."
			       rel="<?=getTextByCode('SEARCH')?>..."
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
		   style="width: 22px;height: 22px;position:absolute;
		   <?php if(PAGE=='index.php') echo 'top:280px;z-index:200;';
		   else echo 'top:138px;'?>
		   left:875px;margin-top: 4px;">
			<img  src="images/search1.png" height="20" width="20"
				  id="sicon" style="opacity: 0.4;"/></a>
	</form>



<!------------------------facebook link	-------------->

<a href="https://www.facebook.com/pages/Efzin-Property/103974186330754"
   target="_blank" style="display:none;float:right;position:absolute;z-index:200;left:838px;top:20px;color:black;font-size:10px;"
		><img src="images/facebook2.png" alt="Join us on Facebook" title="Join us on Facebook" width="20" height="20"/>
	</a>



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

		<div style="display:block;position:absolute;
left:670px;top:0px;width: 267px; height:200px;
z-index:10;opacity: 0.1"
			><img src="images/logos/bg13.gif" width="231" height="200"/>
		</div>



		<!------------------- Language Div ------------------->
	<a href="<?=PAGE?>?lang=en" style="display:inline-block;float:right;
position:absolute;z-index:200;left:840px;top:5px;color:black;font-size:10px;"
		><img src="images/gb.png" alt="English" title="English" width="16" height="12"/>
	</a>
	&nbsp;
	<a href="" style="display:inline-block;float:right;
position:absolute;z-index:200;left:860px;top:5px;"
		>
		<img src="images/greek_flag.gif" alt="Ελληνικά" title="Ελληνικά" width="16"  height="12"/>
	</a>


	<!-- End of Language Div -->

</div>

<div class="clear8">&nbsp;</div>
<!---------------------   Grand Destination Menu -------------------->
<div id="content" style="
width: 100%; float: left; top:160px;  position: absolute; z-index: 140;white-space: nowrap;
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


		<li title="Επιστροφή στην Αρχική σελίδα" style="
		position: absolute;
		left:50%;margin-left: -480px;
		display: block;width:150px;height:50px;
		border-right:1px solid #ddd;
		border-left:1px solid #ddd;
		border-collapse: collapse;
		color:rgb(2,58,92);
		float:left;line-height: 3.8em;text-align: center;">
			<a  href="index.php">ΑΡΧΙΚΗ</a>
<!--			<span style="position: absolute;left:80px;top:0px;font-size: 14px;vertical-align: top;">|</span>-->
		</li>



		<li title="Ποιοί είμαστε" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: -330px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="profil.php" >ΠΡΟΦΙΛ</a>
		</li>

		<li style="display: block;width:150px;
		position:absolute;left:50%;margin-left: -180px;
		height:50px;border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;"">
		<a href="" class="drop">ΕΝΟΙΚΙΑΣΕΙΣ <img style=""  id="im1"  /></a>

		<div class="dropdown_4columns" style="z-index: 10;" >

			<!--<div class="col_4">
				<h2>This is a heading title</h2>
			</div>
		-->
			<div class="col_1">

				<a class="inner-link" href="search.php?sr=CHANIA"><img width="48" height="16" src="images/blackchania.png">&nbsp; Χανιά</a>
			</div>

			<div class="col_2">
				<a class="inner-link" href="search.php?sc=HOTEL"><img width="15" height="16" src="images/hotel-black.png">&nbsp; Ξενοδοχεία</a>
			</div>

			<div class="col_1">

				<a class="inner-link" href="search.php?sr=RETHIMNO"><img width="48" height="16" src="images/blackrethymno.png">&nbsp; Ρέθυμνο</a>
			</div>


			<div class="col_2">
				<a class="inner-link" href="search.php?sc=PLOT"><img width="22" height="22" src="images/plot1.png">&nbsp;Οικόπεδα</a>
			</div>



			<div class="col_1">

				<a class="inner-link" href="search.php?sr=HERAKLION"><img width="48" height="16" src="images/blackheraklion.png">&nbsp; Ηράκλειο</a>
			</div>

			<div class="col_2">
				<a class="inner-link" href="search.php?sc=HOUSE"><img width="20" height="22" src="images/house1.png">&nbsp;Μονοκατοικίες</a>
			</div>

			<div class="col_1">
				<a class="inner-link" href="search.php?sr=LASSITHI"><img width="48" height="16" src="images/blacklassithi.png">&nbsp; Λασσήθι</a>
			</div>


			<div class="col_2">
				<a class="inner-link" href="search.php?sc=VILLA"><img width="30" height="20" src="images/villa3.png">&nbsp;Βίλλες</a>
			</div>


			<!-- End 4 columns container -->


		</div>

		</li>




		<li title="Πείτε μας τι ακίνητο ψάχνετε" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: -30px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="requestform.php" >ΖΗΤΗΣΗ</a>
		</li>

		<li title="Καταχωρήστε το ακίνητό σας" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: 120px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="entryform.php" >ΚΑΤΑΧΩΡΗΣΗ</a>
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

		<li title="Επικοινωνήστε μαζί μας" style="display: block;width:150px;height:50px;
		position:absolute;left:50%;margin-left: 270px;
		border-right:1px solid #ddd;color:rgb(2,58,92);float:left;line-height: 3.8em;text-align: center;">
			<a href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
		</li></ul>

</div>


<!--end of header0 -->
<!--the rest of the page has background white-->

<div id="wrapper" style="
width: 100%;position:relative;background-image:none;
background-color:transparent;height:auto;width:100%;
">

	<div id="mainDiv"
	 style="width:990px;left:50%;top:240px;margin-left: -480px;
	 position:relative;height:auto;background: transparent;" >



<!--End of grand destination menu	-->

	<div class="clear">&nbsp;</div>
