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
elseif(basename($_SERVER['SCRIPT_FILENAME'])=="inquiry.php"){?>
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





<?php }
elseif(basename($_SERVER['SCRIPT_FILENAME'])=="search.php"){?>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->


<link rel="stylesheet" type="text/css" href="datepicker/css/default.css">
<script type="text/javascript" src="datepicker/javascript/zebra_datepicker.js"></script>


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
<!--<div id="wrapper" style="width: 100%;background-image:none; background-color:transparent;height:auto;" >-->
<div id="mainDiv" style="width:960px;left:50%;margin-left: -480px;border:solid 1px;
background-color: white;position:absolute;height:auto;

" >




<!-- Logo Div -->
<div id="header0" style="width:100%;height:170px;background-image: url(images/bg2.png);" align="left">

	<a  href="index.php" style="display:inline-block;">
		<img src="images/logo3.png"  alt="Efzin" width="364" height="116" >
	</a>

<!-- End of Logo div-->


	<!--    Search form Div-->
	<form action="search.php" method="POST" id="ff1" >
		<input type="hidden" name="submit1" value=""/>
		<div style="position:absolute;top:10px;left:700px;display:inline-block;white-space:nowrap;height:30px;float:left;
           width:380px;color:#555;border:none;overflow: hidden;">
			<input type="text" autocomplete="on" name="keyword" id="sinput" size="20" value="Search .." rel="Search .." style=
			"height: 20px;width: 160px;
                padding-left: 4px;
                border-radius:5px ;-moz-border-radius:5px; -webkit-border-radius:5px;
                border-width: 0px;font-size:12px;margin: 0pt;border-style: solid;border-color: rgb(204, 204, 204) rgb(153, 153, 153) rgb(153, 153, 153) rgb(204, 204, 204);outline: medium none;height:20px;color:rgb(180,180,180);"
		   onfocus="if(this.value==this.getAttribute('rel')){
           this.value='';
           $('#sicon').css('opacity','1');
           $(this).css('color','black');
           }"
	       onblur="if(this.value==this.getAttribute('rel') || this.value==''){
           this.value=this.getAttribute('rel');
           $('#sicon').css('opacity','0.4');
           $(this).css('color','#B4B4B4');
           }"
			       onclick="if(this.value==this.getAttribute('rel')){
           this.value='';
           $('#sicon').css('opacity','1');
           $(this).css('color','black');
           }"
			onKeyPress="return submitFormWithEnter(this,event);"
				>
		</div>
		<a href="javascript:$('#ff1').submit();"
		   style="width: 22px;height: 22px;position:absolute;top:8px;left:840px;margin-top: 4px;">
		<img  src="images/search1.png" height="20" width="20"  id="sicon" style="opacity: 0.4;"/></a>
	</form>


	<!------------------- Language Div ------------------->
	<a href="" style="display:inline-block;float:right;
position:absolute;z-index:200;right:20px;top:5px;color:black;font-size:10px;"
		><img src="images/gb.png" alt="English" title="English" width="16" height="12"/>
	</a>
	&nbsp;
	<a href="" style="display:inline-block;float:right;
position:absolute;z-index:200;right:40px;top:5px;"
		>
		<img src="images/greek_flag.gif" alt="Ελληνικά" title="Ελληνικά" width="16"  height="12"/>
	</a>


<!-- End of Language Div -->

</div>


<!--Grand Destination Menu-->
<div id="content" style="width: 100%; float: left;  position: relative; z-index: 40;">

<ul  class='grandDestinationsMenu'>

	<li style="position: relative;left:5px;">
		<a  href="index.php">ΑΡΧΙΚΗ</a>
		<span style="position: absolute;left:140px;top:0px;font-size: 14px;vertical-align: text-top;">|</span>
	</li>


	<li style="position: absolute; left:280px;">
		<a href="why.php" style="z-index:100;">ΠΡΟΦΙΛ</a>
		<span style="position: absolute;left:140px;top:0px;font-size: 14px;vertical-align: text-top;">|</span>
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
	<li style="position: absolute;left:480px;" onmouseover="$('#im1').attr('src','images/down4.png');"
	    onmouseout="$('#im1').attr('src','images/down3.png');
"><a href="destinations.php" class="drop">ΕΝΟΙΚΙΑΣΕΙΣ
			<img style="position: absolute;left:140px;top:10px;"  id="im1"  src="images/down3.png"/>
		</a>
		<div class="dropdown_1column" style="z-index: 10;">

			<!--<div class="col_4">
				<h2>This is a heading title</h2>
			</div>
		-->
			<div class="col_1">
				<a href="">Ενοικιάσεις Κατοικιών</a>
			</div>

			<div class="col_1">
				<a href="">Ενοικιάσεις Ξενοδοχείων</a>
			</div>

			<div class="col_1">
				<a href="">Ενοικιάσεις Οικοπέδων</a>
			</div>

			<div class="col_1">
				<a href="">Ενοικιάσεις Επαγγελματικών</a>
			</div>

			<!-- End 4 columns container -->


		</div>


    <span style="position: absolute;left:200px;top:0px;font-size: 14px;vertical-align: text-top;">|</span>





	</li>
	<li style="position: absolute;left:750px; border:none;margin-left: 22px;"><a href="calendar.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li></ul>

</div>

<!--End of grand destination menu	-->
<hr style="width: 100%;color:#fff;border:1px solid #eee;" >
	<div class="clear">&nbsp;</div>
