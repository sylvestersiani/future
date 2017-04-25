<!--print location-->
<div class="opt-selection">
	<h3 class="form-title">Select Print location(s)</h3>
	<span>
		<?php 
			isset($error_message['print position'])? 
			print $error_message['print position'] : '';  
		?>
	</span>

	<div id="segment-2">
		<ul>
			<div class="opt">
				<li>
  		        	<label class="garment-type">
  		        		<h4>Chest</h4>
  		           		<input type="checkbox" name="print-position[]" value="central-chest"
  		           			<?php 
	  		           			isset($print_position)? print multiple_selection($print_position, 'central-chest'): '';
  		           			?>
  		           		>
  		           		<img src="../view/img/chest.jpg">
  		        	</label>
  		        </li>
  		    </div>
  		    <div class="opt">
  		         <li>
  		        	<label class="garment-type">
  		        		<h4>Back</h4>
  		           		<input type="checkbox" name="print-position[]" value="central-back"
  		           			<?php 
  		           				isset($print_position)? print multiple_selection($print_position, 'central-back'): '';
  		           			?>
  		           		>
  		           		<img src="../view/img/back.jpg">
  		        	</label>
  		        </li>
  		    </div>
  		    <div class="opt">
	  		    <li>
  		        	<label class="garment-type">
  		        		<h4>Left Chest</h4>
  		           		<input type="checkbox" name="print-position[]" value="left-chest"
  		           			<?php 
  		           				isset($print_position)? print multiple_selection($print_position, 'left-chest'): '';
  		           			?>
  		           		>
  		           		<img src="../view/img/left-chest.jpg">
  		        	</label>
  		        </li>			  		  
		        </div>
		        <!-- second print location set-->
		        <div class="opt">			  		        
  		        <li>
					<label class="garment-type">	
						<h4>Left Sleeve</h4>
  		           		<input type="checkbox" name="print-position[]" value="left-sleeve"
  		           			<?php 
  		           				isset($print_position)? print multiple_selection($print_position, 'left-sleeve'): '';
  		           			?>
  		           		>
  		           		<img src="../view/img/sleeve.jpg">
		  		    </label>
	  		    </li>
	  		</div>
	  		<div class="opt">
  		        <li>
  		        	<label class="garment-type">
  		        		<h4>Right Sleeve</h4>
  		           		<input type="checkbox" name="print-position[]" value="right-sleeve"
  		           			<?php 
  		           				isset($print_position)? print multiple_selection($print_position, 'right-sleeve'): '';
  		           			?>
  		           		>
  		           		<img src="../view/img/sleeve.jpg">
  		        	</label>
  		        </li>
  		    </div>
  		    <div class="opt">
  		        <li>
  		        	<label class="garment-type">
  		        		<h4>Other</h4>
  		           		<input type="checkbox" name="print-position[]" value="other"
	  		           		<?php 
	  		           			isset($print_position)? print multiple_selection($print_position, 'other'): '';
	  		           		?>
  		           		>
  		           		<img src="../view/img/placeholder.png">
  		        	</label>
  		        </li>
		        </div>
		    </ul>
	</div>
</div>

<!--extra detail-->

	<div class="radio-input">
		<h3 class="form-title">Include label &amp; Packaging?</h3>
		<span>
			<?php isset($error_message['labels-packaging'])? print $error_message['labels-packaging'] : '';  ?>
		</span>
		<div class="radio-wrapper">
      <div>
  			<label>NO</label>
  			<input type="radio" name="labels-packaging" value="no"
  				<?php 
  					isset($labels_and_packaging)? print checked_option($labels_and_packaging, 'no'): print 'checked="checked"'
  				?>
  			>
      </div>

      <div>
  			<label>YES</label>
  			<input type="radio" name="labels-packaging" value="yes"
  				<?php isset($labels_and_packaging)? print checked_option($labels_and_packaging, 'yes'): ''?>
  			>
        </div>
		</div>
	</div>
