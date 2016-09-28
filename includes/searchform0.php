﻿<form name="search-form" id="search-form" action="search.php" method="post">
	<div id="sidebar" style="width: 300px;margin: 0;margin-left: 5px;line-height: 1.2em;
	padding-left: 10px;padding-bottom: 5px;float: left;z-index: 50; display: block;padding-bottom: 10px;


	background-position: 0 0;background-repeat: repeat-x;-moz-border-radius: 9px;-webkit-border-radius: 9px;
	-khtml-border-radius: 9px;border-radius: 9px;position: relative;

	/*background-color:#5481b4;*/
	/*background-color:#3275BC;*/
	/*background-color:#d0ebfe;*/
	background-color:white;
	color:black;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+9,7db9e8+10,7db9e8+100&amp;1+0,0.46+50,1+100 */
background: -moz-linear-gradient(top,  rgba(30,87,153,1) 0%, rgba(30,87,153,0.9) 9%, rgba(125,185,232,0.89) 10%, rgba(125,185,232,0.46) 50%, rgba(125,185,232,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(9%,rgba(30,87,153,0.9)), color-stop(10%,rgba(125,185,232,0.89)), color-stop(50%,rgba(125,185,232,0.46)), color-stop(100%,rgba(125,185,232,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(30,87,153,1) 0%,rgba(30,87,153,0.9) 9%,rgba(125,185,232,0.89) 10%,rgba(125,185,232,0.46) 50%,rgba(125,185,232,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(30,87,153,1) 0%,rgba(30,87,153,0.9) 9%,rgba(125,185,232,0.89) 10%,rgba(125,185,232,0.46) 50%,rgba(125,185,232,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(30,87,153,1) 0%,rgba(30,87,153,0.9) 9%,rgba(125,185,232,0.89) 10%,rgba(125,185,232,0.46) 50%,rgba(125,185,232,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(30,87,153,1) 0%,rgba(30,87,153,0.9) 9%,rgba(125,185,232,0.89) 10%,rgba(125,185,232,0.46) 50%,rgba(125,185,232,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */

	/*border:1px solid #3275BC;*/
	">

		<div class="Appheader fakos" style="
	background-image: url(images/fakos.png);
    background-position: top right;
    background-repeat: no-repeat;
	color: white;

	">


			<div style="margin-top: 5px;line-height:normal;background-color:none;
		 margin-right:5px;
		 ">
                <span style="font-size: 20px;font-weight: bold;">
                    Αναζήτηση</span><br>
                <span style="font-size: 11px;font-weight: bold">
                    Ορίστε τα δικά σας κριτήρια αναζήτησης</span>
				<div class="clear4">&nbsp;</div>
			</div>

		</div>

		<div class="clear8">&nbsp;</div>
		<input type="hidden" name="action" value="search">

		<label for="region" >Νομός:&nbsp;&nbsp;&nbsp;</label>
		<select  name="region" id="region" style="border:none;color:rgb(102, 102, 102);padding:2px;">
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
		<label for="property_place" >Περιοχή: </label>
		<div class="clear">&nbsp;</div>
		<input type="text" name="property_place"
		       id="property_place" style="border:none;padding:4px;width:240px;" placeholder="Πληκτρολογήστε μια περιοχή.."
			<?php 	if(isset($_POST['property_place'])) echo "value='$_POST[property_place]'";?>

			>
		<div class="clear">&nbsp;</div>
		<fieldset style="border:1px solid #fff;padding: 8px;width:190px;" id="property_kind" >
			<legend>&nbsp;* Είδος Ακινήτου&nbsp;</legend>

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

		<table cellpadding="5" STYLE="color: inherit;">
			<tr>
				<td><label for="" >Τιμή(&euro;) </label></td>
				<td><input type="text" size="2" name="price_from"
				           <?php if(!empty($_POST['price_from'])) echo "value='$_POST[price_from]'" ?>
				           style="border:none;padding:4px;color:rgb(102, 102, 102);"> έως <input style="padding:4px;border:none;color:rgb(102, 102, 102);" type="text" size="2" name="price_to"      <?php if(!empty($_POST['price_to'])) echo "value='$_POST[price_to]'" ?>></td>
			</tr>

			<tr>
				<td><label for="property_charge_period" > Χρέωση: </label></td>
				<td><select name="property_charge_period" id="property_charge_period" style="color:rgb(102, 102, 102);border:none;padding:2px;">

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
				<td><label for="">Εμβαδό(τ.μ.) </label></td><td>
					<input
						<?php if(!empty($_POST['area_from'])) echo "value='$_POST[area_from]'" ?>
						style="border:none;padding:4px;color:rgb(102, 102, 102);" type="text" size="2" name="area_from"> έως <input
						<?php if(!empty($_POST['area_to'])) echo "value='$_POST[area_to]'" ?>
						style="border:none;padding:4px;color:rgb(102, 102, 102);" type="text" size="2" name="area_to"></td>
			</tr>
		</table>

		<div class="clear">&nbsp;</div>

		<fieldset style="border:1px solid #fff;padding: 8px;width:190px;" >
			<legend>&nbsp;Χαρακτηριστικά:&nbsp;</legend>
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

		<input type='submit' name='' value="Αναζήτηση" id="search-button" class="search-button-white" />


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