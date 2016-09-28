<?php
require_once("common.php");
if(isset($_POST['submitContact'])){
	if(empty($_POST['userName']) ||empty($_POST['userSurname'])
		||empty($_POST['userEmail'])||empty($_POST['captcha'])
		){
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
	$data['comments']=empty($_POST['userComments'])?'':$_POST['userComments'];


	if(saveContact($data))
	{
		$data['action']='Contact';
		sendNotifEmail($data);
		require_once("top.php");
		?>
		<div class="item-description" style="height: auto;display:inline-block;width: 100%;height: 200px;padding:6px;margin:0;background: none;">
			<h4 class="black-header"><?=getTextByCode('SUCCESSFUL_ENTRY')?></h4>
			<br>
			<div style="display: block;float:left;width: 48px;height: 48px;">
				<img src="images/user_accept.png" width="64" height="64" >
			</div>
			<div style="display: inline-block;float: left;margin-left: 22px;width: 600px;">
				<?=getTextByCode('SUCCESSFUL_CONTACT_TEXT')?>
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

require_once("top.php");

?>



<div style="width:920px;height:auto;display: inline-block;color:black;line-height: 1.8em;padding:20px;overflow: hidden;">

<!--Display the title of the property  -->
	<h4 class="black-header" align="left"  style="text-decoration: underline; border:none;font-weight: normal;font-size: 32px;">
		<?=getTextByCode('CONTACT_HEADER')?></h4>

<div class="item-description-text" style="font-size:18px;width: 600px;">
	<?=getTextByCode('CONTACT_HEADER_TEXT')?>
</div>


	<div class="clear4">&nbsp;</div>
<div class="item-description-text" style="line-height: 1.6em;width:400px;height:auto;">
	<b><?=getTextByCode('CONTACT_ADDRESS_HEADER')?>:</b> <?=getTextByCode('CONTACT_ADDRESS_TEXT')?><br>
	<b><?=getTextByCode('CONTACT_PHONE_HEADER')?>:</b> 28210-28141 , 27845<br>
	<b><?=getTextByCode('CONTACT_FAX_HEADER')?>:</b> 28210-28141<br>
	<b><?=getTextByCode('CUSTOMER_EMAIL')?>:</b> info@efzin-rentals.gr<br>
	<b>Website:</b> www.efzin-rentals.gr<br>

</div>
<div class="clear4">&nbsp;</div>

<div class="item-description-text" style="float:left;line-height: 1.6em;width:400px;height:auto;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6495.151574932276!2d24.023397395820755!3d35.51476635228703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x149c7dbfaa05ef5b%3A0xcaabec3ac2940f2b!2sArchontaki+3%2C+Chania+731+32!5e0!3m2!1sen!2sgr!4v1439554445986" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="clear8">&nbsp;</div>
<br>
<!--<span  style="font-size:28px;" > --><?//=$row['title'] ?><!-- (--><?//=$pid?><!--)</span>-->

<br>

<!--STOIXEIA ENDIAFEROMENOU	-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="inquiry-form" >
	<div id="track-details"   style="float:right;margin-left: 12px;width: 100%;
		font-size: 16px;line-height: 1.8em;" >


		<div class="item-description-text" style="font-size:18px;">
			<?=getTextByCode('CONTACT_CENTER_TEXT')?>
		</div>

		<div class="clear8">&nbsp;</div>
		<div class="user-label-box"
			 style="display:inline-block;border-bottom: 2px solid #004a80;font-weight: bold;color:#004a80;width:96%;">
			<?=getTextByCode('CONTACT_FORM_HEADER')?></div>
		<div class="clear8">&nbsp;</div>
		<div class="clear8">&nbsp;</div>


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
		<label class="user-label-box"  for="userPhone"><?=getTextByCode('CUSTOMER_PHONE')?></label>
			<input type="text" id="userPhone" name="userPhone"  class="user-input-box"
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_PHONE_HINT')?>" >



		</div>

		<div style="width: 50%;float:left;text-align: left;display: block;">
		<label class="user-label-box" for="userEmail"><?=getTextByCode('CUSTOMER_EMAIL')?> *</label>
			<input type="text" id="userEmail" name="userEmail" class="user-input-box" required=""
			    value=""  placeholder="<?=getTextByCode('CUSTOMER_EMAIL_HINT')?>" >
		</div>

<!-----------------------  Telos proswpikwn stoixeiwn ----------------------->


		<div class="clear8">&nbsp;</div>
<!--------------------------------- SXOLIA--------------------------->
		<legend class="user-label-box"><?=getTextByCode('CONTACT_COMMENTS')?></legend>
		<textarea  placeholder="<?=getTextByCode('CONTACT_COMMENTS_HINT')?>" name="userComments"
		           style="width: 99%;height: 400px;border:1px solid #ccc;color:black;padding: 8px;"></textarea>



		<div class="clear8">&nbsp;</div>
		<br>
		<!--Captcha panel	-->
		<div  style="width: 300px;text-align: left;display: inline-block;white-space: nowrap;">
			<label style="font-size: 12px;" class="user-label-box"  for="userPhone"><?=getTextByCode('CONTACT_CAPTCHA')?></label>
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
		<button type="submit" id="submitContact" name="submitContact"
		        title="πατήστε εδώ για να στήλετε την φόρμα"
		        class="large-book-button" style="width:120px;"><?=getTextByCode('CONTACT_SUBMIT')?></button>
		&nbsp;
			<button type="reset" id="resetRequest" name="resetRequest"
		        title="πατήστε εδώ για να καθαρίσετε την φόρμα"
		        class="large-reset-button" style="width:120px;"><?=getTextByCode('CONTACT_CLEAR')?></button>
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
