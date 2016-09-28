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
					font-family:arial, helvetica, sans-serif" href="property.php?pid=<?=$slide['id']?>"><?=
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
<div class="clear12">&nbsp;</div>
		<!--Left menus div	-->
		<div style="float:left;display: block;width:320px;" >
			<!-------- ----------Anazitisi ------------------------------>

			<?php require_once 'includes/searchform.php'; ?>

			<div class="clear8">&nbsp;</div>

			<a
				id="brosure-link"
				href="http://efzin-property.gr/images/5_1.pdf"
				title="Λήψη της μπροσούρας μας. Μέγεθος: 2,37 MB" >
				Κατεβάστε την Μπροσούρα μας!
			</a>

			<div class="clear8">&nbsp;</div>
			<div class="clear8">&nbsp;</div>
			<div class="clear8">&nbsp;</div>

			<a
				id="efzin-link"
				href="http://www.efzin-property.gr"
				title="Επισκεφτείτε το Efzin-property" >


			</a>

			<div class="clear8">&nbsp;</div>
			<div class="clear8">&nbsp;</div>

			<a
				id="efzin-villas-link"
				href="http://www.efzin-villas.gr"
				title="Επισκεφτείτε το Efzin-villas" >


			</a>


		</div>
		<!--end of left menus-->


		<div style="width:640px;height:auto;
		display: block;margin-top: 10px;color: #000000;padding: 4px;float:left;
		margin-left:22px;
		">
		<h2 style="font-size:30px;line-height: normal;
		font-family: Verdana,Helvetica Neue, Arial, Helvetica, sans-serif">
			<?=getTextByCode('WELCOME_EFZIN_1')?></h2>
		<br>
<span style="font-size:16px;font-weight:normal;line-height: 1.8em;">
<?=getTextByCode('WELCOME_EFZIN_2')?>
</span>


			<div style="line-height: 1.4em;text-align: left;
		vertical-align: top;
		padding:15px;margin-top:5px;
		">
				<img src="images/nar.gif">&nbsp;
				<img src="images/cei.gif">&nbsp;
				<img src="images/sek.gif">&nbsp;
				<img src="images/symenox.gif">&nbsp;
				<img src="images/logos/sun.jpg" width="110" height="60">&nbsp;
			</div>

		</div>

<div class="item-description-text"
	 style="width:400px;height:auto;font-weight:bold;
	 padding:6px;
	 display:inline-block;text-align: left;margin-left:20px;">
	<?=getTextByCode('WELCOME_EFZIN_3')?>
	<br><br>

		<a href="https://video-fra3-1.xx.fbcdn.net/hvideo-xfp1/v/t43.1792-2/1322345_10200310445673589_467_n.mp4?efg=eyJybHIiOjE1NTgsInJsYSI6MTAyNH0%3D&rl=1558&vabr=1039&oh=32c113765beac60967471003fc18400b&oe=55EB4EE4" target="_blank" id="circle-div1"
		<i  class="fa fa-youtube"></i>
	</a>
	&nbsp;
	<a  href='https://www.facebook.com/pages/Efzin-Property/103974186330754?fref=ts' target="_blank" id="circle-div2"
		<i  class="fa fa-facebook"></i>
	</a>

&nbsp;
	<a  href='https://www.linkedin.com/company/ef-zin' target="_blank" id="circle-div3"
		<i  class="fa fa-linkedin"></i>
	</a>

</div>
<!--<div style="height: 20px;width: 100%;background-color:black;display: block;vertical-align: text-bottom;padding-top: 8px;" align="center">
	<span style="font-weight: bold;color:white;">ΠΡΟΣΦΟΡΕΣ</span>
</div>
-->


<!----------------- Right Content		---------------->
<div style="float:left;display:block;width:640px;height:auto;margin-top:40px;margin-left:22px;">



	<!--Suggested properties div-->


		<div >

			<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;
			color:#004a80;width:96%;font-size:22px;">
				<?=getTextByCode('SUGGEST_EFZIN')?></div>
		<?php
		$i=0;
		foreach($suggested_properties as $row){
	?>
			<div class="suggestions-div" style="background-image: url(photos/<?=$row['id'].'/'.$row['photos']?>);
				<?php if($i%2==0) echo 'float:left;'; else echo 'float:right;' ?>
				"
				 title="<?=$row['title'] ?>"
				 onclick="location.href='property.php?pid=<?=$row['id']?>'"
				>
		<div style="display: block;width:260px;height:50px;top:140px;position: relative;
		background-color: black;margin:auto;
		opacity: 0.6;padding:4px;z-index:1;
		">
		</div>

		<div style="display: block;width:260px;height:50px;top:88px;position: relative;
		background: transparent;margin:auto;
		color:white;z-index:10;">
			<?php
			if(!empty($row['price']))
				echo "<span style='font-weight: bold;font-size:12px;'>$row[price_text]</span><br>";
			echo "<span style='font-weight: bold;font-size:10px;'>$row[title]".(!empty($row['area'])?', '.$row['area_text']:'')."</span><br>";
			echo "<span style='font-weight: normal;font-size:10px;'>$row[place_text]</span><br>";

			?>

		</div>

			</div>

	<?php
		$i++;
			if($i%2==0)
				echo "<div class='clear4'>&nbsp;</div>";
		} ?>



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