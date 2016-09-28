<?php require_once "top.php"; ?>
<!--*************************************************** -->


	<!---------- Left Side bar container  ----------->
	<!--border: 1px solid #EDEFF8; -->



	<!--Center content	-->
	<div style="margin-left: 0px;
	margin-top: 0px; overflow: hidden;width: auto;position: relative;
	height: auto;line-height:normal;vertical-align: top;">
	<!---------------Slides -------------------->
	<div class="slider" style="color:white;width: 100%;height: 600px;overflow: hidden;z-index:-10;">
		<?php
		$suggested_properties=getSuggestedProperties();
		$slides=array();
		foreach($suggested_properties as $prop){
			$photos=explode(',',$prop['slide_photos']);
			foreach($photos as $photo){
				$slides[]=array('title'=> $prop['title'],'id'=>$prop['id'],'photo'=>$photo,
					'place'=>$prop['place'],'area'=>$prop['area'],'price'=>$prop['price'],
					'region'=>getTextByCode($prop['region'])

				);
			}
		}
		shuffle($slides);



		?>


<!--		global Slides div-->
				<div class="slides_control" style="position: relative;width: 100%;height: 400px;">

					<?php
					foreach ($slides as $slide){
					?>

			<div class="slide" style="position: absolute; top: 0px;  z-index: 0;display: block; ">
				<img src="photos/<?=$slide['id'].'/'.$slide['photo']?>" width="990"  height="600"
					 alt="<?=$slide['title']?>">

				<div class="desc" style="margin-top: -60px;margin-left: 20px;">
					<a style="color:white;font-size: 22px;font-weight:bold;
					font-family:arial, helvetica, sans-serif" href="property.php?pID=<?=$slide['id']?>"><?=
						//mb_strtoupper($slide['title'],'UTF-8')
						($slide['title'])
						?></a>
					<br>
					<a style="color:white;font-size: 18px;font-weight:normal;
					font-family:arial, helvetica, sans-serif" href=""><?php
						echo $slide['place'].' ('.$slide['region'].')';
						/*if(!empty($slide['price'])){
							echo ' <strong>&euro;'.number_format($slide['price'], 0, '', '.').'</strong>';
						}
						if(!empty($slide['area'])){
							echo ' <strong>'.number_format($slide['area'], 0, '', '.').' '.
								getTextByCode('SQUARE_METERS').'</strong>';
						}*/

						?></a>

				</div>
			</div>
						<?php }?>




<!--end of global slide div-->
		</div>

<!--	end of slider-->
	</div>

		<!---------------- End of slides --------------->

		<!--Left menus div	-->
		<div style="float:left;display: block;width:320px;" >
			<!-------- ----------Anazitisi ------------------------------>

			<?php require_once 'includes/searchform.php'; ?>

			<div class="clear8">&nbsp;</div>

			<a
				id="brosure-link"
				href="http://efzin-property.gr/images/5_1.pdf"
				title="Λήψη της μπροσούρας μας. Μέγεθος: 2,37 MB" style="display: none;">
				Κατεβάστε την Μπροσούρα μας!
			</a>


		</div>
		<!--end of left menus-->


		<div style="width:640px;height:auto;
		display: block;margin-top: 10px;color: #000000;padding: 4px;float:left;
		margin-left:22px;
		">
		<h2 style="font-size:30px;line-height: normal;
		font-family: Verdana,Helvetica Neue, Arial, Helvetica, sans-serif">
			Καλως Ήλθατε στο <span style="color: #1e5799">Efzin Rentals</span></h2>
		<br>
<span style="font-size:16px;font-weight:normal;line-height: 1.8em;">
Το <b>ΕΥ ΖΗΝ</b> αποτελεί μία δυναμική παρουσία στο χώρο των μεσιτικών δραστηριοτήτων στο νομό Χανίων . Έχοντας στο επίκεντρο του ενδιαφέροντος μας τον πελάτη (αγοραστή ή πωλητή), με <b>μεθοδική</b> και <b>οργανωμένη δουλειά</b>, με ακούραστα φιλικούς και ικανούς συνεργάτες (πωλητές, νομικούς, τεχνικούς, αρχιτέκτονες) εγγυόμαστε την καλύτερη εξυπηρέτηση και ενημέρωση σας όσο αφορά θέματα ακίνητης περιουσίας .
</span>


			<div style="line-height: 1.4em;text-align: left;
		vertical-align: top;
		padding:15px;margin-top:5px;
		">
				<a href=""><img src="images/nar.gif"></a>&nbsp;
				<a href=""><img src="images/cei.gif"></a>&nbsp;
				<a href=""><img src="images/sek.gif"></a>&nbsp;
				<a href=""><img src="images/symenox.gif"></a>&nbsp;
			</div>

		</div>



<div class="clear8">&nbsp;</div>

<!--<div style="height: 20px;width: 100%;background-color:black;display: block;vertical-align: text-bottom;padding-top: 8px;" align="center">
	<span style="font-weight: bold;color:white;">ΠΡΟΣΦΟΡΕΣ</span>
</div>
-->


<!----------------- Right Content		---------------->
<div style="float:right;display:block;width:640px;padding:8px;">



	<!--Suggested properties div-->
<div>
	<h4 class="black-header">Το Efzin Προτείνει</h4>
</div>

		<div >
		<?php
		foreach($suggested_properties as $row){
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
				<a class="blueLink" href="property.php?pID=<?=$row['id'] ?>"  >Read more..</a>


			</div>

		</div><!--end of upcomming event plaisio -->


	<?php } ?>



	</div> <!-- End of upcomming events total-->



<!--End of right content	-->
	</div>





<!--end of top center content-->
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