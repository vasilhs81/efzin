﻿<form name="search-form" id="search-form" action="search.php" method="post">
	<div id="sidebar" style="width: 300px;margin: 0;margin-left: 5px;line-height: 1.2em;
	padding-left: 10px;padding-bottom: 5px;float: left;z-index: 50; display: block;padding-bottom: 10px;

border-radius:8px ;-moz-border-radius:8px; -webkit-border-radius:8px;
	position: relative;
	/*border-right:1px solid #ccc;*/
	/*background-color:#5481b4;*/
	/*background-color:#3275BC;*/
	/*background-color:#d0ebfe;*/
	background-color:#ddf1ff;
	color:black;
box-shadow: #ccc;
	/*border-right:1px solid #1e5799;*/
	">

		<div class="Appheader fakos" style="
	background-image: url(images/fakos.png);
    background-position: top right;
    background-repeat: no-repeat;
	color: white;

	">


			<div style="margin-top: 5px;color:black;
			line-height:normal;background-color:none;
		 margin-right:5px;border-bottom:1px solid #ccc;
		 ">
                <span style="font-size: 20px;font-weight: bold;">
                    <?=getTextByCode('SEARCH_TITLE')?></span><br>
                <span style="font-size: 11px;font-weight: bold">
                    <?=getTextByCode('SEARCH_DEFINE')?></span>
				<div class="clear4">&nbsp;</div>
			</div>

		</div>
<div class="clear">&nbsp;</div>
		<input type="hidden" name="action" value="search">

		<legend style="font-weight: bold;margin-bottom: 8px;"><?=getTextByCode('SEARCH_PLACE')?>&nbsp;</legend>
		<input type="text" name="property_place" style="width:180px;padding:4px;
		height:22px;border:none;"
		       id="property_place" style="border:none;padding:4px;width:240px;"
			   placeholder="<?=getTextByCode('SEARCH_GIVE_PLACE')?>"
			<?php 	if(isset($_POST['property_place'])) echo "value='$_POST[property_place]'";?>

			>
		<select  name="region" id="region" required="" style="border:none;
		color:rgb(102, 102, 102);padding:4px;height:30px;">
			<option value=""><?=getTextByCode('SEARCH_REGION')?></option>
			<?php
			$regions=getTextByCategory('REGION');
			foreach($regions as $region =>$region_text) {
				$checked='';
				if(isset($_POST['region']) and $_POST['region']==$region)
					$checked='selected';

				echo "<option value='$region' $checked>$region_text</option>\n";
			}
			?>

		</select>

		<div class="clear">&nbsp;</div>
		<fieldset style="text-align: left;padding:4px;" id="property_kind" >
			<legend style="font-weight: bold;"><?=getTextByCode('SEARCH_KIND')?> *</legend>
			<?php
			$types=getTextByCategory('PROPERTY_TYPE');
			$post_types=array();
			if(isset($_POST['property_kind']) and is_array($_POST['property_kind']))
				$post_types=array_keys($_POST['property_kind']);
			foreach($types as $type =>$type_text) {
				echo "<input type='checkbox'
                name='property_kind[$type]'".
				     (in_array($type,$post_types)?' checked ':'')
                ."id='property_$type'><label for='property_$type'>$type_text</label>\n <br>";
			}
			?>

		</fieldset>
		<div class="clear">&nbsp;</div>

		<table cellpadding="5" STYLE="color: inherit;width:90%;">
			<tr>
				<td><label style="font-weight: bold;" for="" ><?=getTextByCode('SEARCH_PRICE')?> (&euro;) </label></td></tr>
			<tr>
				<td >
					<input type="text"  name="price_from"
 <?php if(!empty($_POST['price_from'])) echo "value='$_POST[price_from]'" ?>
					placeholder="<?=getTextByCode('SEARCH_PRICE_FROM')?>"
				           style="
				           border:none;width:60px;padding:4px;height:22px;color:rgb(102, 102, 102);">
					</td>
				<td >
					<input placeholder="<?=getTextByCode('SEARCH_PRICE_TO')?>" style="padding:4px;width:60px;height:22px;border:none;color:rgb(102, 102, 102);" type="text" size="2" name="price_to"      <?php if(!empty($_POST['price_to'])) echo "value='$_POST[price_to]'" ?>>
</td>
				<td>
					<select name="property_charge_period"
							id="property_charge_period"
							style="color:rgb(102, 102, 102);
							border:none;padding:4px;height:30px;">
					<option value="" ><?=getTextByCode('SEARCH_CHARGE')?> *</option>
						<?php
						$types=getTextByCategory('PRICE_PERIOD');
						foreach($types as $type =>$type_text) {
							?>
							<option value="<?=$type?>" <?php if(!empty($_POST['property_charge_period']) and $_POST['property_charge_period']==$type)
								echo 'selected'?>><?=$type_text?></option>
						<?php }?>
					</select></td>

			</tr>
			<tr>
				<td colspan="2"><label style="font-weight: bold;" for=""><?=getTextByCode('SEARCH_AREA')?> </label></td></tr>
			<tr><td>
					<input
						<?php if(!empty($_POST['area_from'])) echo "value='$_POST[area_from]'" ?>
						style="border:none;padding:4px;
						color:rgb(102, 102, 102);height:22px;width:60px;"
						type="text" size="2" name="area_from" placeholder="<?=getTextByCode('SEARCH_AREA_FROM')?>"></td>
				<td>
					<input
						<?php if(!empty($_POST['area_to'])) echo "value='$_POST[area_to]'" ?>
						placeholder="<?=getTextByCode('SEARCH_AREA_TO')?>"
						style="border:none;padding:4px;height:22px;width:60px;color:rgb(102, 102, 102);" type="text" size="2" name="area_to"></td>
			</tr>
		</table>

		<div class="clear">&nbsp;</div>

		<fieldset style="border:0px solid #fff;padding: 8px;width:190px;" >
			<legend style="font-weight: bold;"><?=getTextByCode('SEARCH_FEATURES')?>&nbsp;</legend>
			<?php
			$types=getTextByCategory('AMENITIES');
			$amenities=array();
			if(isset($_POST['amenity']) and is_array($_POST['amenity']))
				$amenities=array_keys($_POST['amenity']);
			foreach($types as $type =>$type_text) {
			?>

			<input type="checkbox" name="amenity[<?=$type?>]" id="amenity_<?=$type?>"
				<?php if(in_array($type,$amenities)) echo 'checked'; ?>
				> <label for="amenity_<?=$type?>"><?=$type_text?></label>
			<br>
			<?php }?>
		</fieldset>
		<div class="clear">&nbsp;</div>

		<input type='submit' name='' value="<?=getTextByCode('SEARCH_SUBMIT')?>"
			   id="search-button"
			   class="buttonBlue" />
		<a href="javascript:document.getElementById('search-form').reset();
		" class="top-right-links"
		   style="text-decoration: underline;display:inline-block;
		   width:60px;height:20px;
		   font-size:12px;"><?=getTextByCode('SEARCH_RESET')?></a>



		<div class="clear" style="height:5px;">&nbsp;</div>

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

	</div>
	<!--End of search form container-->
</form>