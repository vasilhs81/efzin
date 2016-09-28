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
	$data['title']=$_POST['ptitle'];
	$data['region']=$_POST['pregion'];

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
	if($data['date_start']!=NULL && $data['date_end']!=NULL )
		if(checkAvailability($_POST['pid'],$data['date_start'],$data['date_end'])==false) {
			echo '<div id="error_msg_id" style="color:red;width:300px;height:60px;display:block;border:1px solid #aaa;
					position: absolute;
					top:40%;
					left:40%;
					z-index: +3000;
					padding:6px;
					line-height: 1.4em;
					background-color: #f5f8f9;

">
<strong>Σφάλμα:</strong>
<a href="#" style="color:mediumblue;float:right;" onclick="document.getElementById(\'error_msg_id\').style.display=\'none\';return false;">
<img src="images/remove.png"></a>
<br>

Οι ημερομηνίες που επιλέξατε δεν είναι διαθέσιμες.

</div>';
			goto L1;
		}

	if(saveInquiry($data))
	{
		$data['action']='Book';
		sendNotifEmail($data);
		require_once("top.php");
	?>
<div class="item-description" style="height: auto;display:inline-block;width: 100%;height: 200px;padding:0;margin:0;">
	<h2><?=getTextByCode('SUCCESSFUL_ENTRY')?></h2>
	<br>
	<div style="display: block;float:left;width: 48px;height: 48px;">
		<img src="images/user_accept.png" width="64" height="64" >
	</div>
	<div style="display: inline-block;float: left;margin-left: 22px;width: 600px;">
		<?=getTextByCode('SUCCESSFUL_ENTRY_TEXT')?>
	</div>

	<div class="clear8">&nbsp;</div>
	<div style="width: 100%;text-align: left;vertical-align: bottom;">
		<a href="index.php" class="blueLink2">&#10550; <?=getTextByCode('BACK_TO_HOME')?></a>
	</div>
<br>



</div>


		<div class="clear8">&nbsp;</div>
	<?php
	require_once("bottom.php");
	exit();
	}
}


L1:
//$avals=getAvailabilities($_REQUEST['pID']);
$pid=$_REQUEST['pid'];
$sdate='';
$edate='';

	if(isset($_REQUEST['sd'])){
		$sdate= date_create_from_format('Y-m-j',$_REQUEST['sd'] );
		if($sdate===FALSE){
			trigger_error('Wrong start-date parameter: ', E_USER_ERROR);
			redirect('index.php');
		}
	}
	if(isset($_REQUEST['ed'])){
		$edate= date_create_from_format('Y-m-j',$_REQUEST['ed'] );
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

if(!empty($sdate) and !empty($edate) and  checkAvailability($pid,date_format($sdate,'Y-m-d'),date_format($edate,'Y-m-d'))==false){
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
	<?=getTextByCode('INQUIRY_HEADER')?> <span style="font-weight: bold;"><?=$row['id']?> </span> </h4>
<div class="item-description-text" style="font-size:18px;">
	<?=getTextByCode('HEADER_TEXT')?>

</div>
<div class="clear8">&nbsp;</div>
<br>
<!--<span  style="font-size:28px;" > --><?//=$row['title'] ?><!-- (--><?//=$pid?><!--)</span>-->

<br>

<div class="user-label-box" style="border-bottom: 1px solid #004a80;font-weight: bold;color:#004a80">
	<?=getTextByCode('PROPERTY_DETAILS')?></div>
<br>
	<div style="float:right;width: 450;height: 300;Verdana, Arial, Helvetica, sans-serif;">

		<a href="photos/<?php echo ucfirst($row['id']).'/'.$row['main_photo']?>"
		   rel="shadowbox[sbalbum-29];player=img;" title="2053139930_912e04d7c0_b"
			>
			<img src="photos/<?=$row['id'].'/'.$row['main_photo']?>"
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
			<?=getTextByCode('PROPERTY_TITLE')?>: <span style="font-weight: bold;float: right"><?=$row['title'] ?></span>
		</div>

		<div class="item-description">
			<?=getTextByCode('PROPERTY_REGION')?>: <span style="font-weight: bold;float: right"><?=$row['place_text'] ?></span>
		</div>


		<?php if(!empty($row['price'])){?>
			<div class="item-description">
				<?=getTextByCode('PROPERTY_PRICE')?>: <span style="font-weight: bold;float: right"><?=$row['price_text']?></span>
			</div>
		<?php  } ?>

		<?php if(!empty($row['area'])){?>
			<div class="item-description">
				<?=getTextByCode('PROPERTY_AREA')?>: <span style="font-weight: bold;float: right"><?=$row['area_text'] ?></span>
			</div>
		<?php }?>
		<div class="item-description">
			<?=getTextByCode('PROPERTY_CATEGORY')?>: <span style="font-weight: bold;float: right"><?=getTextByCode($row['type']) ?></span>
		</div>

		<?php if(!empty($row['year'])){?>
			<div class="item-description">
				<?=getTextByCode('PROPERTY_YEAR')?>: <span style="font-weight: bold;float: right"><?=$row['year'] ?></span>
			</div>
		<?php }?>

		<?php if(!empty($row['rooms'])){?>
			<div class="item-description">
				<?=getTextByCode('PROPERTY_ROOMS')?>: <span style="font-weight: bold;float: right"><?=$row['rooms'] ?></span>
			</div>
		<?php }?>

		<?php if(!empty($row['wc'])){?>
			<div class="item-description">
				<?=getTextByCode('PROPERTY_BATHS')?>: <span style="font-weight: bold;float: right"><?=$row['wc'] ?></span>
			</div>
		<?php }?>

		<div class="item-description">
			<?=getTextByCode('PROPERTY_VIEW')?>: <span style="font-weight: bold;float: right"><?=$row['view'] ?></span>
		</div>


	</div>
<div class="clear8">&nbsp;</div>

<!--STOIXEIA ENDIAFEROMENOU	-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="inquiry-form" >
	<div id="track-details"   style="float:right;margin-left: 12px;width: 100%;
		font-size: 16px;line-height: 1.8em;" >
	<input type="hidden" name="pid" value="<?=$pid ?>">
	<input type="hidden" name="ptitle" value="<?=$row['title'] ?>">
	<input type="hidden" name="pregion" value="<?=$row['region'] ?>">

		<div class="user-label-box" style="border-bottom: 1px solid #004a80;font-weight: bold;color:#004a80">
			<?=getTextByCode('CUSTOMER_DETAILS')?></div>

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
		<label class="user-label-box"  for="userPhone"><?=getTextByCode('CUSTOMER_PHONE')?> *</label>
			<input type="text" id="userPhone" name="userPhone" required="" class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_PHONE_HINT')?>" >



		</div>



		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userEmail"><?=getTextByCode('CUSTOMER_EMAIL')?> </label>
			<input type="text" id="userEmail" name="userEmail" class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_EMAIL_HINT')?>" >
		</div>


		<div class="clear8">&nbsp;</div>
		<?php 	if($row['status_code']=='Set'and getAvailabilitiesCount($pid)>0){	?>



		<div class="user-label-box"
	     style="border-bottom: 1px dashed #004a80;font-weight: bold;color:#004a80"><?=getTextByCode('BOOKING_DATES')?>
	</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker1" aria-disabled="true"><?=getTextByCode('BOOKING_DATE_FROM')?> *</label>
<!--		<input type="text" required="" pattern="\d{2}\-\d{2}\-\d{4}" id="date0" name="date0"   class="MyDate0" />-->
		<input type="text" id="datepicker1" class="user-input-box" name="datepicker1" value="<?=empty($sdate)?'':date_format($sdate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;"  placeholder="<?=getTextByCode('BOOKING_DATE_FROM_HINT')?>" required="required">
		</div>

		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="datepicker2"><?=getTextByCode('BOOKING_DATE_TILL')?> *</label>
		<input type="text" id="datepicker2" name="datepicker2" class="user-input-box" value="<?=empty($edate)?'':date_format($edate,'Y-m-d')?>"  size="11" readonly="readonly"
		       style="padding:4px;" placeholder="<?=getTextByCode('BOOKING_DATE_TILL_HINT')?>" required="required">

			</div>
		<div style="width: 30%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userFrom"><?=getTextByCode('BOOKING_NUM')?> *</label>
		<select class="user-input-box" style="height: 45px;"  placeholder="<?=getTextByCode('BOOKING_NUM_HINT')?>" name="userNumberOfPersons" required="required" >
			<option value=""><?=getTextByCode('BOOKING_NUM_HINT')?></option>
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
			<?=getTextByCode('BOOKING_COMMENTS')?></div>
		<br>
		<textarea name="userComments" style="width: 99%;height: 400px;border:1px solid #ccc;color:rgb(99, 99, 99);padding: 8px;"
			placeholder="<?=getTextByCode('BOOKING_COMMENTS_HINT')?>"></textarea>


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
		<label for="userEmailNotify"><?=getTextByCode('INQUIRY_PREFER')?></label>



		<br>
		<!--Captcha panel	-->
		<div  style="width: 250px;text-align: center;display: inline-block;white-space: nowrap;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone"><?=getTextByCode('CRITERIA_CAPTCHA')?></label>
			<input type="text" name="captcha" id="captcha"
			       style="display: block;float:left;width:100px;height: 20px;" maxlength="6" size="6"
			       class="user-input-box" required="" />
			&nbsp;<img width="80" height="40" style="margin-left:20px;display: block;float:left;" src="phpcaptcha/captcha.php"/>
		<div id="captcha-error" style="color:red;font-size:11px;display: none;"><?=getTextByCode('CRITERIA_CAPTCHA_WRONG')?></div>
			<div class="clear">&nbsp;</div>
			<img id="loading-icon"  src="images/loading.gif" width="32" height="32" style="display: none;">
		</div>



		<div class="clear">&nbsp;</div>
		<button type="submit" id="submitInquiry" name="submitInquiry"

		        class="large-book-button" style="width:120px;"><?=getTextByCode('INQUIRY_SUBMIT')?></button>
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
