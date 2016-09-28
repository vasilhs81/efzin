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

$data['accept_emails']=empty($_POST['userEmailNotify'])?'No':'Yes';

$data['area_min']=empty($_POST['area_from'])?NULL:$_POST['area_from'];
$data['area_max']=empty($_POST['area_to'])?NULL:$_POST['area_to'];
$data['price_max']=empty($_POST['price_to'])?NULL:$_POST['price_to'];
$data['price_min']=empty($_POST['price_from'])?NULL:$_POST['price_from'];
$data['price_period']=$_POST['property_charge_period'];

$data['date_start']=empty($_POST['datepicker1'])?NULL:$_POST['datepicker1'];
$data['date_end']=empty($_POST['datepicker2'])?NULL:$_POST['datepicker2'];
$data['comments']=(empty($_POST['userComments']))?'':$_POST['userComments'];
$data['num_of_persons']=empty($_POST['userNumberOfPersons'])?NULL:$_POST['userNumberOfPersons'];
$data['amenities']=NULL;
if(!empty($_POST['amenity']) and is_array($_POST['amenity']))
	$data['amenities']=join(',',array_keys($_POST['amenity']));


if(saveRequest($data))
{
require_once("top.php");
?>
<div class="item-description" style="height: auto;display:inline-block;width: 100%;height: 200px;padding:6px;margin:0;background: none;">
	<h4 class="black-header">Επιτυχής Καταχώρηση</h4>
	<br>
	<div style="display: block;float:left;width: 48px;height: 48px;">
		<img src="images/user_accept.png" width="64" height="64" >
	</div>
	<div style="display: inline-block;float: left;margin-left: 22px;width: 600px;">
		Η φόρμα ζήτησης κατατέθηκε με επιτυχία.<br>Σύντομα κάποιος συνεργάτης μας θα επικοινωνήσει μαζί σας για περισσότερες
		λεπτομέρειες <br><b>Ευχαριστούμε!</b>
	</div>

	<div class="clear8">&nbsp;</div>
	<div style="width: 100%;text-align: left;vertical-align: bottom;font-size: 12px;margin-left: 4px;">
		<a href="index.php" class="blueLink2">« Επιστροφή στην Αρχική Σελίδα</a>
	</div>
	<br>



</div>


<div class="clear8">&nbsp;</div>
<?php
require_once("bottom.php");
exit();
}
}

require_once("top.php");

?>





<div style="width:920px;height:auto;display: inline-block;color:black;line-height: 1.8em;padding:20px;overflow: hidden;">

<!--Display the title of the property  -->
<h4 class="black-header" align="left"  style="text-decoration: underline; border:none;font-weight: normal;font-size: 32px;">
Φόρμα Ζήτησης Ακινήτου</h4>
<div class="item-description-text" style="font-size:18px;">
	Συμπληρώστε τα χαρακτηριστικά του ακινήτου που αναζητείτε στην παρακάτω ηλεκτρονική φόρμα και θα επικοινωνήσουμε άμεσα μαζί σας
	με προτάσεις σε επιλεγμένα ακίνητα που ταιριάζουν στις ανάγκες και επιθυμίες σας.
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
			Στοιχεία Ενδιαφερόμενου</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userName" >Όνομα *</label>
			<input type="text" id="userName" name="userName" required="" class="user-input-box"
			    value=""  placeholder="Εισάγετε το όνομά σας.. " >
	</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userSurname">Επίθετο *</label>
			<input type="text" id="userSurname" name="userSurname" required="" class="user-input-box"
			    value=""  placeholder="Εισάγετε το επίθετό σας.. " >



		</div>


		<div class="clear4">&nbsp;</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box"  for="userPhone">Τηλέφωνο (Σταθ.) </label>
			<input type="text" id="userPhone" name="userPhone"  class="user-input-box"
			    value=""  placeholder="Εισάγετε το τηλέφωνό σας.. " >



		</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box"  for="mobile">Τηλέφωνο (Κιν.) *</label>
			<input type="text" id="mobile" name="mobile" required="" class="user-input-box"
			    value=""  placeholder="Εισάγετε το κινητό σας.. " >



		</div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userEmail">Email *</label>
			<input type="text" id="userEmail" name="userEmail" class="user-input-box" required=""
			    value=""  placeholder="Εισάγετε το e-mail σας.. " >
		</div>

<!-----------------------  Telos proswpikwn stoixeiwn ----------------------->

<!-- Kritiria Zhthshs ---------------->

		<div class="clear8">&nbsp;</div>
		<div class="user-label-box" style="border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			Κριτήρια Ζήτησης</div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
			<label class="user-label-box" >Περιοχή *</label>
			<select  name="region" required="" id="region" class="user-input-box" style="height:53px;width:35%;clear: none;display: inline-block;">
			<option value="" >Επιλέξτε Νομό...</option>
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
			       id="property_place" placeholder="Πληκτρολογήστε μια περιοχή..."
				<?php 	if(isset($_POST['place'])) echo "value='$_POST[property_place]'";?>>

</div>


		<div style="width: 50%;float:left;text-align: left;display: block;">
			<legend class="user-label-box">Κατηγορία Ακινήτου *</legend>

		<select  name="type" id="type" class="user-input-box" style="height:53px;" required="">
			<option value="" style="color:#666" >Επιλέξτε Κατηγορία...</option>
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
			<legend class="user-label-box">Ενδεικτική Τιμή:&nbsp;</legend>
				<input type="text"  style="width:12%;clear: none;display: inline-block;"  class="user-input-box" name="price_from" placeholder="Από.."
						<?php if(!empty($_POST['price_from'])) echo "value='$_POST[price_from]'" ?>
						  >&nbsp;  <input  class="user-input-box" type="text" style="width:12%;clear: none;display: inline-block;" name="price_to" placeholder="έως..."
						<?php if(!empty($_POST['price_to'])) echo "value='$_POST[price_to]'" ?>>
&nbsp;<select class="user-input-box" style="height:53px;width: 60%;clear: none;display: inline-block;" name="property_charge_period" id="property_charge_period" >
				<option selected value="">Χρέωση ανά...</option>
				<?php
				$types=getTextByCategory('PRICE_PERIOD');
				foreach($types as $type =>$type_text) {
					?>
					<option value="<?=$type?>" <?php if(!empty($_POST['property_charge_period']) and $_POST['property_charge_period']==$type)
						echo 'selected'?>><?=$type_text?></option>
				<?php }?>
			</select>
		</div>
		<div class="clear8">&nbsp;</div>
		<div style="width: 50%;text-align: left;display: inline-block;">
			<legend class="user-label-box">Εμβαδό (τ.μ.) :&nbsp;</legend>
					<input style="width:12%;clear: none;display: inline-block;"   class="user-input-box"
						<?php if(!empty($_POST['area_from'])) echo "value='$_POST[area_from]'" ?> placeholder="Από..."
						type="text" name="area_from">&nbsp; <input 	<?php if(!empty($_POST['area_to'])) echo "value='$_POST[area_to]'" ?>
				style="width:12%;clear: none;display: inline-block;"   class="user-input-box"
			placeholder="έως..." type="text" name="area_to">
			</div>

		<div class="clear8">&nbsp;</div>
			<!-----------------------Loipa Xaraktiristika ----------------->
		<div style="width: 100%;float:left;text-align: left;display: inline-block;">
		<legend class="user-label-box">Λοιπά Χαρακτηριστικά:&nbsp;</legend>
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





		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker1" aria-disabled="true">Ημερομηνία από</label>
<!--		<input type="text" required="" pattern="\d{2}\-\d{2}\-\d{4}" id="date0" name="date0"   class="MyDate0" />-->
		<input type="text" id="datepicker1" class="user-input-box" name="datepicker1" value="<?=empty($sdate)?'':date_format($sdate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;"  placeholder="Επιλέξτε ημερομηνία.." required="required">
		</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker2">έως</label>
		<input type="text" id="datepicker2" name="datepicker2" class="user-input-box" value="<?=empty($edate)?'':date_format($edate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;" placeholder="Επιλέξτε ημερομηνία.." required="required">

			</div>
		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userFrom">&nbsp;</label>
		<select class="user-input-box" style="height: 45px;"  placeholder="Επιλέξτε αριθμό" name="userNumberOfPersons"  >
			<option value="">Aριθμός ατόμων..</option>
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
		<legend class="user-label-box">Σημειώσεις</legend>
		<textarea  placeholder="Λοιπά σχόλια/παρατηρήσεις.." name="userComments"
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




		<div class="clear8">&nbsp;</div>
		<input type="checkbox" name="userEmailNotify" id="userEmailNotify">
		<label for="userEmailNotify">Επιθυμώ να ενημερώνομαι για αντίστοιχα ακίνητα μέσω email</label>



		<br>
		<!--Captcha panel	-->
		<div  style="width: 300px;text-align: center;display: inline-block;white-space: nowrap;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone">Εισάγεται τον κωδικό που βλέπετε στο πλαίσιο</label>
			<input type="text" name="captcha" id="captcha"
			       style="display: block;float:left;width:100px;height: 20px;" maxlength="6" size="6"
			       class="user-input-box" required="" />
			&nbsp;<img width="80" id="captcha-image" height="40" style="margin-left:20px;display: block;float:left;" src="phpcaptcha/captcha.php"/> &nbsp;
			<img width="25" height="25" id="refresh-captcha" style="display:none;cursor:pointer;margin-left:10px;float:left;vertical-align: top;" src="images/refresh.png"/>

		<div id="captcha-error" style="clear:both;color:red;font-size:11px;display: none;">O κωδικός που πληκτρολογήσατε, δεν είναι σωστός</div>
			<div class="clear">&nbsp;</div>
			<img id="loading-icon"  src="images/loading.gif" width="32" height="32" style="display: none;">
		</div>



		<div class="clear">&nbsp;</div>
		<button type="submit" id="submitRequest" name="submitRequest"
		        title="πατήστε εδώ για να στήλετε την φόρμα"
		        class="large-book-button" style="width:120px;">ΥΠΟΒΟΛΗ</button>
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
