<?php require_once "top.php"; ?>
<!--*************************************************** -->


	<!---------- Left Side bar container  ----------->
	<!--border: 1px solid #EDEFF8; -->


<!--Left menus div	-->
<div style="float:left;display: block;width:320px;" >
	<!-------- ----------Anazitisi ------------------------------>
<!--rgb(5,123,196)-->
<?php require_once 'includes/searchform.php'; ?>
	<!--------------- End of Left Menus ------------------>

<div class="clear8">&nbsp;</div>
<div class="clear8">&nbsp;</div>

	<div id="brosure-div"  style="display: none;">
		<a href="http://efzin-property.gr/images/5_1.pdf">Κατεβάστε την Μπροσούρα μας!</a>
		<div class="clear4">&nbsp;</div>
		<a id="" href="http://efzin-property.gr/images/5_1.pdf"
		   style="border: none;text-align: center;
		   height: 180px; width: 180px; display: block;margin-left:10px;"
		   title="Λήψη της μπροσούρας μας. Μέγεθος: 2,37 MB">
			<img src="images/brochure.jpg" style="border-width:0px;" alt="undefined"></a>
	</div>




<a
	id="brosure-link"
	href="http://efzin-property.gr/images/5_1.pdf" title="Λήψη της μπροσούρας μας. Μέγεθος: 2,37 MB">
	Κατεβάστε την Μπροσούρα μας!
</a>





</div>
	<!--Center content	-->
	<div style="margin-left: 330px;
	margin-top: 0px; overflow: hidden;width: auto;height: auto;line-height:normal;vertical-align: top;">
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
		<h2 style="font-size:30px;line-height: normal;font-family: Verdana,Helvetica Neue, Arial, Helvetica, sans-serif">Καλως Ήλθατε στο <span style="color: #004a80">Efzin Rentals</span></h2>
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
			<a href="property.php?pid=<?=$row['id']?>">
			<img src="photos/<?=$row['id'].'/'.$row['photos']?>" width="268" height="197"
			     style="float:left;display:inline-block;color: #777" title="<?=$row['title'] ?>" /></a>
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