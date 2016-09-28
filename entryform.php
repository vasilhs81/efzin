<!--*************************************************** -->
<?php
require_once("common.php");
if(isset($_POST['submitRequest'])){
if(empty($_POST['userName']) ||empty($_POST['userSurname'])
||empty($_POST['mobile'])||empty($_POST['captcha'])||empty($_POST['region'])||empty($_POST['type'])){
trigger_error('Wrong post parameters ', E_USER_ERROR);
//redirect('index.php');
}

if ($_POST['captcha'] != $_SESSION['cap_code']){
trigger_error('Wrong captcha code ', E_USER_ERROR);
}
//	$row=getPropertyById($pid);


$data=array();
$data['fname']=$_POST['userName'];
$data['sname']=$_POST['userSurname'];
$data['email']=$_POST['userEmail'];
$data['phone']=empty($_POST['userPhone'])?'':$_POST['userPhone'];
$data['place']=empty($_POST['place'])?'':$_POST['place'];
$data['mobile']=$_POST['mobile'];
$data['region']=$_POST['region'];
$data['type']=$_POST['type'];

//$data['accept_emails']=empty($_POST['userEmailNotify'])?'No':'Yes';

$data['area']=empty($_POST['area'])?NULL:$_POST['area'];
$data['price']=empty($_POST['price'])?NULL:$_POST['price'];

$data['price_period']=$_POST['property_charge_period'];

$data['date_start']=empty($_POST['datepicker1'])?NULL:$_POST['datepicker1'];
$data['date_end']=empty($_POST['datepicker2'])?NULL:$_POST['datepicker2'];
$data['comments']=(empty($_POST['userComments']))?'':$_POST['userComments'];
$data['num_of_persons']=empty($_POST['userNumberOfPersons'])?NULL:$_POST['userNumberOfPersons'];
$data['amenities']=NULL;
if(!empty($_POST['amenity']) and is_array($_POST['amenity']))
	$data['amenities']=join(',',array_keys($_POST['amenity']));

$new_entry=saveEntry($data);
	$data['action']='Entry';
	sendNotifEmail($data);

if($new_entry!==FALSE and moveEntryImages($new_entry)==TRUE)
{
require_once("top.php");
?>
<div class="item-description" style="height: auto;display:inline-block;width: 100%;height: 200px;padding:6px;margin:0;background: none;">
	<h4 class="black-header"><?=getTextByCode('SUCCESSFUL_ENTRY')?></h4>
	<br>
	<div style="display: block;float:left;width: 48px;height: 48px;">
		<img src="images/user_accept.png" width="64" height="64" >
	</div>
	<div style="display: inline-block;float: left;margin-left: 22px;width: 600px;">
		<?=getTextByCode('SUCCESSFUL_ENTRY_TEXT')?>
	</div>

	<div class="clear8">&nbsp;</div>
	<div style="width: 100%;text-align: left;vertical-align: bottom;font-size: 12px;margin-left: 4px;">
		<a href="index.php" class="blueLink2">« <?=getTextByCode('BACK_TO_HOME')?></a>
	</div>
	<br>



</div>


<div class="clear8">&nbsp;</div>
<?php
require_once("bottom.php");
exit();
}
}
elseif(count($_FILES)>0){
//	die(count($_FILES));
	moveEntryImages();
	exit();
}

$_SESSION['form_id']=generateUniqueId();
require_once("top.php");

?>





<div style="width:920px;height:auto;display: inline-block;color:black;line-height: 1.8em;padding:20px;overflow: hidden;">

<!--Display the title of the property  -->
<h4 class="black-header" align="left"  style="text-decoration: underline; border:none;font-weight: normal;font-size: 32px;">
	<?=getTextByCode('REQUEST_FORM_HEADER') ?></h4>
<div class="item-description-text" style="font-size:18px;">
	<?=getTextByCode('REQUEST_FORM_HEADER_TEXT')?>
</div>
<div class="clear8">&nbsp;</div>
<br>
<!--<span  style="font-size:28px;" > --><?//=$row['title'] ?><!-- (--><?//=$pid?><!--)</span>-->

<br>

<!--STOIXEIA ENDIAFEROMENOU	-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="inquiry-form" >
	<div id="track-details"   style="float:right;margin-left: 12px;width: 100%;
		font-size: 16px;line-height: 1.8em;" >

		<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			<?=getTextByCode('OWNER_INFO_HEADER')?></div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userName" ><?=getTextByCode('CUSTOMER_NAME')?> *</label>
			<input type="text" id="userName" name="userName" required="" class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_NAME_HINT')?>" >
	</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userSurname"><?=getTextByCode('CUSTOMER_SURNAME')?> *</label>
			<input type="text" id="userSurname" name="userSurname" required="" class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_SURNAME_HINT')?>" >



		</div>


		<div class="clear4">&nbsp;</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box"  for="userPhone"><?=getTextByCode('CUSTOMER_PHONE')?> </label>
			<input type="text" id="userPhone" name="userPhone"  class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_PHONE_HINT')?>" >



		</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box"  for="mobile"><?=getTextByCode('CUSTOMER_MOBILE')?>  *</label>
			<input type="text" id="mobile" name="mobile" required="" class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_MOBILE_HINT')?>" >



		</div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userEmail"><?=getTextByCode('CUSTOMER_EMAIL')?> *</label>
			<input type="text" id="userEmail" name="userEmail" class="user-input-box" required=""
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_EMAIL_HINT')?>" >
		</div>

<!-----------------------  Telos proswpikwn stoixeiwn ----------------------->

<!-- Kritiria Zhthshs ---------------->

		<div class="clear8">&nbsp;</div>
		<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			<?=getTextByCode('PROPERTY_CHARACTERISTICS_HEADER')?></div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
			<label class="user-label-box" ><?=getTextByCode('CRITERIA_PLACE')?> *</label>
			<select  name="region" required="" id="region" class="user-input-box" style="height:53px;width:35%;clear: none;display: inline-block;">
			<option value="" ><?=getTextByCode('CRITERIA_REGION_CHOOSE')?></option>
			<?php
			$regions=getTextByCategory('REGION');
			foreach($regions as $region =>$region_text) {
				$checked='';
				if(isset($_POST['region']) and $_POST['region']==$region)
					$checked='selected';

				echo "<option value='$region' $checked>$region_text</option>\n";
			}
			?>

		</select>&nbsp;
			<input type="text" name="place"  class="user-input-box" style="clear: none;display: inline-block;width:55%;"
			       id="property_place" placeholder="<?=getTextByCode('CRITERIA_PLACE_HINT')?>"
				<?php 	if(isset($_POST['place'])) echo "value='$_POST[property_place]'";?>>

</div>


		<div style="width: 50%;float:left;text-align: left;display: block;">
			<legend class="user-label-box"><?=getTextByCode('CRITERIA_CATEGORY')?> *</legend>

		<select  name="type" id="type" class="user-input-box" style="height:53px;" required="">
			<option value="" style="color:#666" ><?=getTextByCode('CRITERIA_CATEGORY_CHOOSE')?></option>
			<?php
			$types=getTextByCategory('PROPERTY_TYPE');
			foreach($types as $type =>$type_text) {
				$checked='';
				if(isset($_POST['type']) and $_POST['type']==$type)
					$checked='selected';

				echo "<option value='$type' $checked>$type_text</option>\n";
			}
			?>
		</select>
			</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
			<legend class="user-label-box"><?=getTextByCode('CRITERIA_PRICE')?>:&nbsp;</legend>
				<input type="text"  style="width:32%;clear: none;display: inline-block;"  class="user-input-box" name="price" placeholder="<?=getTextByCode('CRITERIA_PROPERTY_PRICE')?> (&euro;)"
						<?php if(!empty($_POST['price'])) echo "value='$_POST[price]'" ?>
						  >&nbsp; <select class="user-input-box" style="height:53px;width: 58%;clear: none;display: inline-block;" name="property_charge_period" id="property_charge_period" >
				<option selected value=""><?=getTextByCode('CRITERIA_PRICE_CHARGE')?></option>
				<?php
				$types=getTextByCategory('PRICE_PERIOD');
				foreach($types as $type =>$type_text) {
					?>
					<option value="<?=$type?>" <?php if(!empty($_POST['property_charge_period']) and $_POST['property_charge_period']==$type)
						echo 'selected'?>><?=$type_text?></option>
				<?php }?>
			</select>

			</div>


		<div style="width: 50%;float:left;text-align: left;display: block;">
		<legend class="user-label-box" style="clear: none;display: inline-block;"><?=getTextByCode('CRITERIA_AREA')?></legend>
		<input type="text" style="width:38%;clear: none;display: inline-block;"   class="user-input-box" name="area"
			<?php if(!empty($_POST['area'])) echo "value='$_POST[area]'" ?> placeholder="<?=getTextByCode('CRITERIA_AREA_HINT')?>" >
</div>


		<div class="clear8">&nbsp;</div>
			<!-----------------------Loipa Xaraktiristika ----------------->
		<div style="width: 100%;float:left;text-align: left;display: inline-block;">
		<legend class="user-label-box"><?=getTextByCode('CRITERIA_OTHER_FEATURES')?>:&nbsp;</legend>
			<?php
			$types=getTextByCategory('AMENITIES');
			$amenities=array();
			if(isset($_POST['amenity']) and is_array($_POST['amenity']))
				$amenities=array_keys($_POST['amenity']);
			foreach($types as $type =>$type_text) {
				?>

				<input type="checkbox" name="amenity[<?=$type?>]" id="amenity_<?=$type?>"
					<?php if(in_array($type,$amenities)) echo 'checked'; ?>
					> <label style="color:#666;" for="amenity_<?=$type?>"><?=$type_text?></label>
				&nbsp;
			<?php }?>
			</div>

		<div class="clear8">&nbsp;</div>

		<script type="text/javascript">
			var TEXT_ERRORS=new Object;
			<?php
				$text_array=getTextByCategory('ERROR_MSG');
				foreach($text_array as $msg =>$val){
					echo "TEXT_ERRORS['$msg']='$val';";
				}
			 ?>

		</script>
		<div id="search-error" style="color:white;display:none;width:240px;height:40px;line-height: 1.6em;
		background-color: #E26261;padding: 4px;
		padding-left: 8px;text-align: left;

		border-radius:8px ;-moz-border-radius:8px; -webkit-border-radius:8px;
		">

		</div>

<!-------------------------------------------HMEROMHNIES-------------------------------->
		<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			<?=getTextByCode('CRITERIA_DATE_HEADER')?></div>




		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker1" aria-disabled="true"><?=getTextByCode('CRITERIA_DATE_FROM')?></label>
<!--		<input type="text" required="" pattern="\d{2}\-\d{2}\-\d{4}" id="date0" name="date0"   class="MyDate0" />-->
		<input type="text" id="datepicker1" class="user-input-box" name="datepicker1" value="<?=empty($sdate)?'':date_format($sdate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;"  placeholder="<?=getTextByCode('CRITERIA_DATE_CHOOSE')?>" required="required">
		</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker2"><?=getTextByCode('CRITERIA_DATE_TO')?></label>
		<input type="text" id="datepicker2" name="datepicker2" class="user-input-box" value="<?=empty($edate)?'':date_format($edate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;" placeholder="<?=getTextByCode('CRITERIA_DATE_CHOOSE')?>" required="required">

			</div>
		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userFrom">&nbsp;</label>
		<select class="user-input-box" style="height: 45px;"  placeholder="<?=getTextByCode('CRITERIA_NUM_PERSONS_HINT')?>" name="userNumberOfPersons"  >
			<option value=""><?=getTextByCode('CRITERIA_NUM_PERSONS')?></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>

			</div>

		<div class="clear8">&nbsp;</div>
<!--------------------------------- SXOLIA--------------------------->
		<legend class="user-label-box"><?=getTextByCode('CRITERIA_COMMENTS')?></legend>
		<textarea  placeholder="<?=getTextByCode('CRITERIA_COMMENTS_REST')?>" name="userComments"
		           style="width: 99%;height: 400px;border:1px solid #ccc;color:black;padding: 8px;"></textarea>


		<div class="clear4">&nbsp;</div>

		<div style="width: 20%;float:left;text-align: left;display: none;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone">Ώρες Επικοινωνίας</label>
			<select class="user-input-box" style="height: 40px;"   >
				<option selected>Όλη Μέρα</option>
				<option>Πρωί</option>
				<option>Απόγευμα</option>

			</select>
		</div>


		<br>
		<!------------------------------UPLOAD FOTOS----------------------------------------	-->
		<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			<?=getTextByCode('UPLOAD_PHOTOS_HEADER')?></div>
		<div class="item-description-text" style="font-size:18px;margin-top:10px;padding:4px;">
			<?=getTextByCode('UPLOAD_PHOTOS_TEXT')?>
		</div>



		<div class="clear8">&nbsp;</div>

		<div id="imageupload" class="dropzone" style="width:600px;border:1px solid #ccc;height:auto;color:#ccc; "></div>




		<!--Captcha panel	-->
		<div  style="width: 300px;text-align: left;display: inline-block;white-space: nowrap;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone"><?=getTextByCode('CRITERIA_CAPTCHA')?></label>
			<input type="text" name="captcha" id="captcha"
			       style="display: block;float:left;width:100px;height: 20px;" maxlength="6" size="6"
			       class="user-input-box" required="" />
			&nbsp;<img width="80" id="captcha-image" height="40" style="margin-left:20px;display: block;float:left;" src="phpcaptcha/captcha.php"/> &nbsp;
			<img width="25" height="25" id="refresh-captcha" style="display:none;cursor:pointer;margin-left:10px;float:left;vertical-align: top;" src="images/refresh.png"/>

		<div id="captcha-error" style="clear:both;color:red;font-size:11px;display: none;"><?=getTextByCode('CRITERIA_CAPTCHA_WRONG')?></div>
			<div class="clear">&nbsp;</div>
			<img id="loading-icon"  src="images/loading.gif" width="32" height="32" style="display: none;">
		</div>



		<div class="clear">&nbsp;</div>
		<button type="submit" id="submitRequest" name="submitRequest"
		        title="πατήστε εδώ για να στήλετε την φόρμα"
		        class="large-book-button" style="width:120px;"><?=getTextByCode('CRITERIA_SUBMIT')?></button>
	</div>

</form>




</div>
<script type="text/javascript">
		$('#datepicker1').Zebra_DatePicker({
			direction: true,
			pair: $('#datepicker2')

		});
		$('#datepicker2').Zebra_DatePicker({
			direction: 1
		});
</script>

<!--*************************************************** -->
<?php require_once("bottom.php"); ?>
