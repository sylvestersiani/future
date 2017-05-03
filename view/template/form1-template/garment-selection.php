<!-- garment selection segment -->



<div class="opt-selection">
	<h3 class="form-title">Select Garment?</h3>
	<span class="form-error">
		<?php 
			isset($error_message['garment error'])? 
			print $error_message['garment error']:'';
		?>
	</span>
	<div id="segment-1">
		<ul>
			<div class="opt">
				<li>
					<label class="garment-type">
						<h4>T-shirt</h4>
		           			<input type="radio" name="garment-type" value="tshirt"  
		           				<?php isset($garment_type)? print checked_option($garment_type, 'tshirt'): ''?>
		           			 >
		           			<img src="view/img/placeholder.png">
  		    		</label>
  		    	</li>
  		    </div>
  		    <div class="opt">
  		   		<li>
	        		<label class="garment-type">
	        			<h4>Hoodie</h4>
	           			<input type="radio" name="garment-type" value="hoodie"
	           			<?php isset($garment_type)? print checked_option($garment_type, 'hoodie'):''?>
	           			>
	           			<img src="view/img/placeholder.png">
	        		</label>
	        	</li>
	        </div>
	        <div class="opt">
	       	    <li>
	        		<label class="garment-type">
	        			<h4>Sweatshirt</h4>
	           			<input type="radio" name="garment-type" value="sweatshirt"
	           			<?php isset($garment_type)? print checked_option($garment_type,'sweatshirt'):''?>
	           			>
	           			<img src="view/img/placeholder.png">
	        		</label>
	        	</li>
	        </div>
	        <!--second garment set-->
	       	<div class="opt">
	        	<li>
					<label class="garment-type">	
						<h4>Tote bag</h4>
  		           		<input type="radio" name="garment-type" value="tote-bag"
  		           			<?php isset($garment_type)? print checked_option($garment_type, 'tote-bag'): ''?>
  		           		>
  		           		<img src="view/img/placeholder.png">
	  		    	</label>
  		    	</li>
  		    </div>
  		    <div class="opt">
  		    	<li>
  		        	<label class="garment-type">
  		        		<h4>cap</h4>
  		           		<input type="radio" name="garment-type" value="cap"
  		           			<?php isset($garment_type)? print checked_option($garment_type, 'cap'): ''?>
  		           		>
  		           		<img src="view/img/placeholder.png">
  		        	</label>
		        </li>
		    </div>
		    <div class="opt">
		        <li>
  		        	<label class="garment-type">
  		        		<h4>Other</h4>
  		           		<input type="radio" name="garment-type" value="other"
  		           			<?php isset($garment_type)? print checked_option($garment_type, 'other'): ''?>
  		           		>
  		           		<img src="view/img/placeholder.png">
  		        	</label>
		        </li>
	        <div>
		</ul>
	</div>
</div>


