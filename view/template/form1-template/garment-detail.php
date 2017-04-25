

<!-- garment colour segment-->
<div class="user-input">
	<div>
		<span>
			<?php 
				isset($error_message['colour error'])? 
				print $error_message['colour error'] : '';  
			?>
		</span>
		<div>
			<input placeholder="Garment Colour" type="text" name="garment-colour" value="<?php isset($garment_colour)? print $garment_colour: '' ;?>" >
		</div>
	</div>
</div>

	<!--garment supply segment-->


<div class="radio-input">
	<h3 class="form-title">Will you be supplying the clothes?</h3>
	<span>
		<?php 
			isset($error_message['garment supply'])? 
			print $error_message['garment supply'] : '';  
		?>
	</span>
	<div class="radio-wrapper">
		<div>
			<label>NO</label>
			<input type="radio" name="garment-supply" value="no"
				<?php 
					isset($garment_supply)? 
					print checked_option($garment_supply, 'no'): 
					print 'checked="checked"'?>
			  	>
		</div>
		<div>
			<label>YES</label>
			<input type="radio" name="garment-supply" value="yes" 
				<?php 
					isset($garment_supply)? 
					print checked_option($garment_supply, 'yes'):''
				?>
			>
		</div>
	</div>
</div>

	<!--qauntity input-->

	<div class="radio-input">
		<h3 class="form-title">Quantity</h3>
		<span>
			<?php 
				isset($error_message['garment qty'])? 
				print $error_message['garment qty'] : '';  
			?>
		</span>
		<!--small-->
		<div>
			<label>S</label>
			<input type="text" maxlength="3" size="3" name="small" value="<?php isset($garment_qty['small'])? print $garment_qty['small']: '' ;?>" >
		</div>
		<!--Medium-->
		<div>
			<label>M</label>
			<input type="text" maxlength="3" size="3" name="medium" value="<?php isset($garment_qty['medium'])? print $garment_qty['medium']: '' ;?>" >
		</div>
		<!--large-->
		<div>
			<label>L</label>
			<input type="text" maxlength="3" size="3" name="large" value="<?php isset($garment_qty['large'])? print $garment_qty['large']: '' ;?>" >
		</div>
		<!--xl-->
		<div>
			<label>XL</label>
			<input type="text" maxlength="3" size="3" name="xl" value="<?php isset($garment_qty['xl'])? print $garment_qty['xl']: '' ;?>" >
		</div>
		<!--2xl-->
		<div>
			<label>2XL</label>
			<input type="text" maxlength="3" size="3" name="2xl"  value="<?php isset($garment_qty['2xl'])? print $garment_qty['2xl']: '' ;?>" >
		</div>
	</div>
</div>