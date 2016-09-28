<?php require_once "top.php"; ?>
<!--*************************************************** -->


	<!---------- Left Side bar container  ----------->
	<!--border: 1px solid #EDEFF8; -->
	<div id="sidebar" style="width: 300px;margin: 0;margin-left: 5px;padding-left: 10px;padding-bottom: 5px;float: left;z-index: 50;color:black;   display: block;padding-bottom: 10px;background-image: url(images/appHeaderBg.png);background-position: 0 0;background-repeat: repeat-x;-moz-border-radius: 9px;-webkit-border-radius: 9px;  -khtml-border-radius: 9px;border-radius: 9px;position: relative;background-color: #FFFFFF;">

	<div class="Appheader fakos" style="
	background-image: url(images/fakos.png);
    background-position: top right;
    background-repeat: no-repeat;

	">


		<div style="margin-top: 5px;line-height:normal;">
                <span style="font-size: 20px;">
                    Αναζήτηση</span><br>
                <span style="font-size: 11px;">
                    Ορίστε τα δικά σας κριτήρια αναζήτησης</span>
		</div>

		</div>

		<label for="property_place" >Περιοχή:</label>
		<input type="text" name="property_place" id="property_place" >
		<div class="clear">&nbsp;</div>
		<fieldset style="border:1px solid #ddd;padding: 8px;width:190px;" >
		<legend>Είδος Ακινήτου</legend>

			<input type="checkbox" name="property_diamerisma" id="property_diamerisma" > <label for="property_diamerisma">Διαμέρισμα</label>
			<br>
			<input type="checkbox" name="property_villa" id="property_villa" > <label for="property_villa">Βίλλα</label>
			<br>
			<input type="checkbox" name="property_mezoneta" id="property_mezoneta" > <label for="property_mezoneta">Μεζονέτα</label>
			<br>
			<input type="checkbox" name="property_monokatoikia" id="property_monokatoikia" > <label for="property_monokatoikia">Μονοκατοικία</label>

			<br>
			<input type="checkbox" name="property_oikopedo" id="property_oikopedo" > <label for="property_oikopedo">Οικόπεδο</label>

			<br>
			<input type="checkbox" name="property_hotel" id="property_hotel" > <label for="property_hotel">Ξενοδοχείο</label>

			<br>
			<input type="checkbox" name="property_others" id="property_others" > <label for="property_others">Διάφορα</label>

		</fieldset>
		<div class="clear">&nbsp;</div>

		<table cellpadding="5" STYLE="color: black;">
			<tr>
		<td><label for="" >Τιμή(&euro;) </label></td>
			<td><input style="" type="text" size="2" name="price_from"> έως <input type="text" size="2" name="price_to"></td>
			</tr>

		<tr>
		<td><label for="property_charge_period" > Χρέωση: </label></td>
			<td><select name="property_charge_period" id="property_charge_period">
					<option value="by_night" >Βραδιά</option><option value="by_month" >Μήνας</option></select></td>
			</tr>
		<tr>
			<td><label for="">Εμβαδό(τ.μ.) </label></td><td>
				<input type="text" size="2" name="area_from"> έως <input type="text" size="2" name="area_to"></td>
			</tr>
</table>

		<div class="clear">&nbsp;</div>

		<fieldset style="border:1px solid #ddd;padding: 8px;width:190px;" >
			<legend>Χαρακτηριστικά: </legend>
			<input type="checkbox" name="property_neodmyto" id="property_neodmyto" > <label for="property_neodmyto">Νεόδμητο</label>
			<br>
			<input type="checkbox" name="property_klimatismos" id="property_klimatismos" > <label for="property_klimatismos">Κλιματισμός</label>
			<br>
			<input type="checkbox" name="property_parking" id="property_parking" > <label for="property_parking">Χώρος Στάθμευσης</label>
			<br>
			<input type="checkbox" name="property_pool" id="property_pool" > <label for="property_pool">Πισίνα</label>
			<br>
			<input type="checkbox" name="property_garden" id="property_garden" > <label for="property_garden">Κήπος</label>
			<br>

		</fieldset>
		<div class="clear">&nbsp;</div>

		<input type='submit' name='' value="Αναζήτηση" style='
                  color:red;font-size:10px;
           font-weight:bold;
   max-width: 120px;
   width: 80px;
   text-align: center;
   padding: 6px;
   crop: right;
   ' />

			<!-------------   Archives ------------>

	<div class="hot-news rounds" style="width:160px;margin-left:20px;display:none;">
		<h4>Archives</h4>

		<ul>
			<li><a href=""
			       title="August 2011">August 2011</a></li>

			<li><a href=""
			       title="July 2011">July 2011</a></li>

			<li style="border: none;"><a href=
			                             "" title=
			                             "June 2011">June 2011</a></li>
		</ul>
	</div>





	<div class="clear" style="height:10px;">&nbsp;</div>
	<!-------- Quick Search  ---------------->
	<!-------- Quick Search  ---------------->



<div class="save-next-walk" style="display: none;
text-align:center;width:160px;
/*background-color:red;*/
border:1px solid black;
padding-bottom:0;margin-bottom:0;padding-right:0px;
/*background-color: #2f2626;*/
border-radius:8px ;-moz-border-radius:8px; -webkit-border-radius:8px;
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwLjY1Ii8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMCIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-8 */

">


		<h2 href="#" style="display:inline-block;text-align:center;padding:4px;font-size: 16px;text-decoration: underline;color:#f38d28;" >
			Αναλυτική Αναζήτηση
		</h2>
		<form action="search.php" method="POST" id="quickSearchFormID" name="quickSearchForm">

			<input type="hidden" name="fromDate" value=""/>
			<input type="hidden" name="submit1" value=""/>
			<input type="hidden" name="tillDate" value=""/>


			<select style="width:140px;margin-top:15px;margin-left:8px;" name="date" id="dateID">
				<option value="0" selected>Any Month</option>
				<option value="5" >May</option>
				<option value="6" >June</option>
				<option value="7" >July</option>
				<option value="8" >August</option>
			</select>

			<select name="place" style="width:140px;margin-top:15px;margin-left:8px;">
				<option value="" selected>Any Destination</option>
				<option value="Samaria" >Samaria</option>
				<option value="Aradena" >Aradena</option>
				<option value="Eligia" >Eligia</option>
				<option value="Klados" >Klados</option>
			</select>

			<div class="clear" style="height: 1px;">&nbsp; </div>
			<div  class="search-button"
			      style="cursor:pointer;margin-top:2px;float:left; margin-left:8px;
font-size: 10px;padding-left: 2px;width: 80px;color:#aaa;
font-weight: bold;font-family: arial;padding-top: 1px;
"
			      onclick="submitQuickSearchForm()"
				>SEARCH ></div>

		</form>
		<a href="search.php" class="blueLink"
		   style="float:right;display: inline-block;margin-top: 20px;"
			>Advanced</a>

	</div>
	<!--end of Quick search -->

	</div>

	<!--------------- End of Left Menus ------------------>


	<!--Center content	-->
	<div style="display: block;margin-left: 330px; margin-top: 0px; overflow: hidden;width: auto;height: auto;line-height:normal;">
	<!---------------Slides -------------------->
	<div class="slider" style="color:white;width: 620px;height: 400px;overflow: hidden;">


		<div class="slides_control" style="position: relative;width: 620px;height: 400px;">

			<div class="slide" style="position: absolute; top: 0px;  z-index: 0;display: block; ">
				<img src="photos/10683/1.jpg" width="600" height="400" alt="ΒΙΛΛΕΣ ΣΤΟ ΚΟΝΤΕ ΜΑΡΙΝΟ">

				<div class="desc" style="margin-top: -40px;margin-left: 20px;">
					<a style="color:white;font-size: 16px;font-weightbold;font-family:Palatino Linotype, Georgia, Serif;" href="">ΒΙΛΛΕΣ ΣΤΟ ΚΟΝΤΕ ΜΑΡΙΝΟ</a>

				</div>
			</div>


			<div class="slide" style="position: absolute; top: 0px;  z-index: 0;display: none; ">
				<img src="photos/8598/1.jpg" width="600" height="400" alt="ΞΕΝΟΔΟΧΕΙΟ ΣΤΟΝ ΚΑΛΑΘΑ">

				<div class="desc" style="margin-top: -40px;margin-left: 20px;">
					<a style="color:white;font-size: 16px;font-weightbold;font-family:Palatino Linotype, Georgia, Serif;" href="">
						ΞΕΝΟΔΟΧΕΙΟ ΣΤΟΝ ΚΑΛΑΘΑ
					</a>

				</div>
			</div>

			<div class="slide" style="position: absolute; top: 0px;  z-index: 0;display: block; ">
				<img src="photos/10683/15_10.jpg" width="600" height="400" alt="ΒΙΛΛΕΣ ΣΤΟ ΚΟΝΤΕ ΜΑΡΙΝΟ">

				<div class="desc" style="margin-top: -40px;margin-left: 20px;">
					<a style="color:white;font-size: 16px;font-weightbold;font-family:Palatino Linotype, Georgia, Serif;" href="">ΒΙΛΛΕΣ ΣΤΟ ΚΟΝΤΕ ΜΑΡΙΝΟ</a>

				</div>
			</div>



		</div>

	</div>

		<!---------------- End of slides --------------->


		<div class="clear">&nbsp;</div>

		<div style="width:100%;height:auto;display: block;margin-top: 40px;color: #000000;padding: 4px;">
		<h2 style="font-size:30px;line-height: normal;font-family: Arial Regular, Arial, sans">Καλως Ήλθατε στο <span style="color: #004a80">Efzin Rentals</span></h2>
		<br>
<span style="font-size:12px;font-weight:normal;line-height: 1.5em;">
Το <b>ΕΥ ΖΗΝ</b> αποτελεί μία δυναμική παρουσία στο χώρο των μεσιτικών δραστηριοτήτων στο νομό Χανίων . Έχοντας στο επίκεντρο του ενδιαφέροντος μας τον πελάτη (αγοραστή ή πωλητή), με <b>μεθοδική</b> και <b>οργανωμένη δουλειά</b>, με ακούραστα φιλικούς και ικανούς συνεργάτες (πωλητές, νομικούς, τεχνικούς, αρχιτέκτονες) εγγυόμαστε την καλύτερη εξυπηρέτηση και ενημέρωση σας όσο αφορά θέματα ακίνητης περιουσίας .
</span>

		</div>

<div class="clear8">&nbsp;</div>

<!--<div style="height: 20px;width: 100%;background-color:black;display: block;vertical-align: text-bottom;padding-top: 8px;" align="center">
	<span style="font-weight: bold;color:white;">ΠΡΟΣΦΟΡΕΣ</span>
</div>
-->

<div>

	<h4 class="black-header">Το Efzin Προτείνει</h4>
<!--<hr class="black-dashed-line">-->

</div>


		<div class="post-data">
		<?php
global $LANG;
	$rows = mysqli_query($link,"select * from  suggestions s, property p  where p.id=s.property_id  limit 10; ") or die(mysqli_error($link));
	while($row = mysqli_fetch_array($rows)) {
		$row['title']=explode('##',$row['title'])[$LANG];
		$row['description']=explode('##',$row['description'])[$LANG];
		$row['summary']=explode('##',$row['summary'])[$LANG];
	?>
		<div class="clear4">&nbsp;</div>


		<div id="lipsum"  class="upcomming-plaisio" style="background-color: white;color:black;font-family: Arial Regular, Arial, sans">
			<img src="photos/<?=$row['id'].'/'.$row['photos']?>" width="268" height="197"
			     style="float:left;display:inline-block;color: #777" title="<?=$row['title'] ?>" />
			<div style="float:left; width:300px;margin-left:20px;">

				<a href="property.php?pID=<?=$row['id'] ?>" class="header-link"
				   style="font-family: Arial Regular, Arial, sans;font-size:16px;font-weight:bold;color:rgb(0, 102, 153);" ><?=$row['title'] ?> </a> &nbsp;
<!--				<span style="color:#aaa; font-size:14px;font-style:italic;" >--><?//=date('d/m/Y', strtotime($row['date']));  ?><!--</span>-->


				<p style="padding-top:4px;">
					<?=$row['summary'] ?>
				</p>
<!--				<a href="participation.php?eventID=--><?//=$row['eventID'] ?><!--"  class="small-book-button"  >BOOK NOW ></a>-->
				<a href="property.php?pID=<?=$row['id'] ?>"  style="margin-top:6px;font-size:14px;color:#e17009;">Read more..</a>


			</div>

		</div><!--end of upcomming event plaisio -->


	<?php } ?>



	</div> <!-- End of upcomming events total-->






<!--end of center content-->
</div>





	<div class="clear4">&nbsp;</div>
	<div class="clear">&nbsp;</div>









<!--*************************************************** -->
<!--	</div>-->
<!--	</div>-->
<!--	</div>-->

<?php
require_once "bottom.php";

?>