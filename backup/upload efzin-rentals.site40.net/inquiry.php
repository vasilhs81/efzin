<!--*************************************************** -->
<?php
require_once("common.php");

if(isset($_POST['submitInquiry'])){
	if(empty($_POST['userName']) ||empty($_POST['userSurname']) ||empty ($_POST['pid'])
	   ||empty($_POST['userPhone'])||empty($_POST['captcha'])){
		trigger_error('Wrong post parameters ', E_USER_ERROR);
		//redirect('index.php');
	}

	if ($_POST['captcha'] != $_SESSION['cap_code']){
		trigger_error('Wrong captcha code ', E_USER_ERROR);
	}
//	$row=getPropertyById($pid);



	$data=array();
	$data['property_id']=$_POST['pid'];
	$data['fname']=$_POST['userName'];
	$data['sname']=$_POST['userSurname'];
	$data['email']=empty($_POST['userEmail'])?'':$_POST['userEmail'];
	$data['accept_emails']=empty($_POST['userEmailNotify'])?'No':'Yes';
	$data['phone']=$_POST['userPhone'];
	$data['date_start']=empty($_POST['datepicker1'])?NULL:$_POST['datepicker1'];
	$data['date_end']=empty($_POST['datepicker2'])?NULL:$_POST['datepicker2'];
	$data['comments']=(empty($_POST['userComments'])||$_POST['userComments']=='Πληκτρολογείστε εδώ τυχόν ερωτήσεις για το ακίνητο...')?'':$_POST['userComments'];
	$data['num_of_persons']=empty($_POST['userNumberOfPersons'])?1:$_POST['userNumberOfPersons'];
	$data['status']='wait confirmation';

	if(($data['date_start']==NULL && $data['date_end']!=NULL )||($data['date_start']!=NULL && $data['date_end']==NULL ))
		trigger_error('Wrong date parameters ', E_USER_ERROR);
//	if(checkAvailability($_POST['pid'],$data['date_start'],$data['date_end'])==false)
//		trigger_error('Unavailable date parameters ', E_USER_ERROR);


	if(saveInquiry($data))
	{
		require_once("top.php");
	?>
<div class="item-description" style="height: auto;display:inline-block;width: 100%;height: 200px;padding:0;margin:0;">
	<h2>Επιτυχής Καταχώρηση</h2>
	<br>
	<div style="display: block;float:left;width: 48px;height: 48px;">
		<img src="images/user_accept.png" width="64" height="64" >
	</div>
	<div style="display: inline-block;float: left;margin-left: 22px;width: 600px;">
		Η φόρμα αίτησης ενδιαφέροντος κατατέθηκε με επιτυχία.<br>Σύντομα κάποιος συνεργάτης μας θα επικοινωνήσει μαζί σας για περισσότερες
			λεπτομέρειες <br><b>Ευχαριστούμε!</b>
	</div>

	<div class="clear8">&nbsp;</div>
	<div style="width: 100%;text-align: left;vertical-align: bottom;">
		<a href="index.php" class="blueLink2">&#10550; Επιστροφή στην Αρχική Σελίδα</a>
	</div>
<br>



</div>


		<div class="clear8">&nbsp;</div>
	<?php
	require_once("bottom.php");
	exit();
	}
}



//$avals=getAvailabilities($_REQUEST['pID']);
$pid=$_REQUEST['pid'];
$sdate='';
$edate='';

	if(isset($_REQUEST['sd'])){
		$sdate= strptime($_REQUEST['sd'],'%Y-%m-%d');
		if($sdate===FALSE){
			trigger_error("Wrong start-date parameter: $_REQUEST[sd] ", E_USER_ERROR);
			redirect('index.php');
		}
	}
	if(isset($_REQUEST['ed'])){
		//$edate= date_create_from_format('Y-m-j',$_REQUEST['ed'] );
		$edate= strptime($_REQUEST['ed'],'%Y-%m-%d' );
		if($edate===FALSE){
			trigger_error('Wrong end-date parameter: ', E_USER_ERROR);
			redirect('index.php');
		}
	}

	if((empty($sdate) and !empty($edate))||(empty($edate) and !empty($sdate)))
	{
		trigger_error('Both date-parameters are required: ', E_USER_ERROR);
		redirect('index.php');
	}

if(!empty($sdate) and !empty($edate) and  checkAvailability($pid,date_format(new DateTime($_REQUEST['sd']),'Y-m-d'),
		date_format(new DateTime($_REQUEST['ed']),'Y-m-d'))==false){
	trigger_error('Wrong date parameters ', E_USER_ERROR);
	redirect('index.php');
}

require_once("top.php");

$row=getPropertyById($pid);

//if($row)


?>


<div style="width:920px;height:auto;display: inline-block;color:black;line-height: 1.8em;padding:20px;overflow: hidden;">

<!--Display the title of the property  -->
<h4 class="black-header" align="left"  style=" border:none;font-weight: normal;font-size: 32px;">
Δήλωση ενδιαφέροντος για το ακίνητο κωδ.  <span style="font-weight: bold;"><?=$row['id']?> </span> </h4>
<div class="item-description-text" style="font-size:18px;">
	Παρακαλώ καταχωρύστε τα στοιχεία σας για την περίοδο για την οποία ενδιαφέρεστε,
	και θα επικοινωνήσουμε μαζί σας το συντομότερο δυνατό.

</div>
<div class="clear8">&nbsp;</div>
<br>
<!--<span  style="font-size:28px;" > --><?//=$row['title'] ?><!-- (--><?//=$pid?><!--)</span>-->

<br>

<div class="user-label-box" style="border-bottom: 1px solid #004a80;font-weight: bold;color:#004a80">
	Στοιχεία Ακινήτου</div>
<br>
	<div style="float:right;width: 450;height: 300;Verdana, Arial, Helvetica, sans-serif;">

		<a href="photos/<?php echo ucfirst($row['id']).'/'.$row['photos']?>"
		   rel="shadowbox[sbalbum-29];player=img;" title="2053139930_912e04d7c0_b"
			>
			<img src="photos/<?=$row['id'].'/'.$row['photos']?>"
			     alt="<?=$row['title'] ?>" height="300" width="450"
			     title="<?=$row['title'] ?>"
				>
		</a>
	</div>


	<div id="track-details"   style="float:left;margin-left: 8px;width: 420px;height:320px; font-size: 16px;line-height: 1.8em;" >

		<div class="item-description" style="color:#004a80;display:none;">
			<h3>Συνοπτικά Στοιχεία Ακινήτου</h3>
		</div>

		<div class="item-description">
			Τίτλος: <span style="font-weight: bold;float: right"><?=$row['title'] ?></span>
		</div>

		<div class="item-description">
			Περιοχή: <span style="font-weight: bold;float: right"><?=$row['place_text'] ?></span>
		</div>


		<?php if(!empty($row['price'])){?>
			<div class="item-description">
				Τιμή: <span style="font-weight: bold;float: right"><?=$row['price_text']?></span>
			</div>
		<?php  } ?>

		<?php if(!empty($row['area'])){?>
			<div class="item-description">
				Εμβαδό: <span style="font-weight: bold;float: right"><?=$row['area_text'] ?></span>
			</div>
		<?php }?>
		<div class="item-description">
			Κατηγορία: <span style="font-weight: bold;float: right"><?=getTextByCode($row['type']) ?></span>
		</div>

		<?php if(!empty($row['year'])){?>
			<div class="item-description">
				Έτος κατασκευής: <span style="font-weight: bold;float: right"><?=$row['year'] ?></span>
			</div>
		<?php }?>

		<?php if(!empty($row['rooms'])){?>
			<div class="item-description">
				Δωμάτια: <span style="font-weight: bold;float: right"><?=$row['rooms'] ?></span>
			</div>
		<?php }?>

		<?php if(!empty($row['wc'])){?>
			<div class="item-description">
				Μπάνια: <span style="font-weight: bold;float: right"><?=$row['wc'] ?></span>
			</div>
		<?php }?>

		<div class="item-description">
			Θέα: <span style="font-weight: bold;float: right"><?=$row['view'] ?></span>
		</div>


	</div>
<div class="clear8">&nbsp;</div>

<!--STOIXEIA ENDIAFEROMENOU	-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="inquiry-form" >
	<div id="track-details"   style="float:right;margin-left: 12px;width: 100%;
		font-size: 16px;line-height: 1.8em;" >
	<input type="hidden" name="pid" value="<?=$pid ?>">

		<div class="user-label-box" style="border-bottom: 1px solid #004a80;font-weight: bold;color:#004a80">
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
		<label class="user-label-box"  for="userPhone">Τηλέφωνο *</label>
			<input type="text" id="userPhone" name="userPhone" required="" class="user-input-box"
			    value=""  placeholder="Εισάγετε το τηλέφωνό σας.. " >



		</div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userEmail">Email </label>
			<input type="text" id="userEmail" name="userEmail" class="user-input-box"
			    value=""  placeholder="Εισάγετε το e-mail σας.. " >
		</div>


		<div class="clear8">&nbsp;</div>
		<?php 	if($row['status_code']=='Set'and getAvailabilitiesCount($pid)>0){	?>



		<div class="user-label-box"
	     style="border-bottom: 1px dashed #004a80;font-weight: bold;color:#004a80">Ημερομηνίες Ενοικίασης
	</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker1" aria-disabled="true">Ημερομηνία από *</label>
<!--		<input type="text" required="" pattern="\d{2}\-\d{2}\-\d{4}" id="date0" name="date0"   class="MyDate0" />-->
		<input type="text" id="datepicker1" class="user-input-box" name="datepicker1"
		       value="<?=empty($_REQUEST['sd'])?'':$_REQUEST['sd']?>"  size="11" readonly="readonly"
		       style="padding:4px;"  placeholder="Επιλέξτε ημερομηνία.." required="required">
		</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker2">έως *</label>
		<input type="text" id="datepicker2" name="datepicker2" class="user-input-box"
		       value="<?=empty($_REQUEST['ed'])?'':$_REQUEST['ed']?>"  size="11" readonly="readonly"
		       style="padding:4px;" placeholder="Επιλέξτε ημερομηνία.." required="required">

			</div>
		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userFrom">Αριθμός Ατόμων *</label>
		<select class="user-input-box" style="height: 45px;"  placeholder="Επιλέξτε αριθμό" name="userNumberOfPersons" required="required" >
			<option value="">Επιλέξτε αριθμό..</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>

			</div>
	<?php } ?>

		<div class="clear8">&nbsp;</div>

		<div class="user-label-box" style="border-bottom: 1px solid #004a80;font-weight: bold;color:#004a80">
			Σχόλια</div>
		<br>
		<textarea name="userComments" style="width: 99%;height: 400px;border:1px solid #ccc;color:rgb(99, 99, 99);padding: 8px;"
			placeholder="Πληκτρολογείστε εδώ τυχόν ερωτήσεις για το ακίνητο..."
			></textarea>


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
		<div  style="width: 250px;text-align: center;display: inline-block;white-space: nowrap;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone">Εισάγεται τον κωδικό που βλέπετε στο πλαίσιο</label>
			<input type="text" name="captcha" id="captcha"
			       style="display: block;float:left;width:100px;height: 20px;" maxlength="6" size="6"
			       class="user-input-box" required="" />
			&nbsp;<img width="80" height="40" style="margin-left:20px;display: block;float:left;" src="phpcaptcha/captcha.php"/>
		<div id="captcha-error" style="color:red;font-size:11px;display: none;">O κωδικός που πληκτρολογήσατε, δεν είναι σωστός!!!</div>
			<div class="clear">&nbsp;</div>
			<img id="loading-icon"  src="images/loading.gif" width="32" height="32" style="display: none;">
		</div>



		<div class="clear">&nbsp;</div>
		<button type="submit" id="submitInquiry" name="submitInquiry"
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
