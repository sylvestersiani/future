

<div class="user-input">
	<h3 class="form-title">Basic Details</h3>
		<span><?php isset($error_message['name error'])? print $error_message['name error'] : '';  ?></span>
		<div>
			<input placeholder="name" type="text" name="name" value="<?php isset($name)? print $name: '' ;?>"  >
		</div>
	</div>

<!--personal details-->

<div class="user-input">
		<span><?php isset($error_message['email error'])? print $error_message['email error'] : '';  ?></span>
		<div>
			<input placeholder="name@email.com" type="email" name="email" value="<?php isset($email)? print $email: '' ;?>"  > 
		</div>
</div>



<div class="user-input">
		<span><?php isset($error_message['tel error'])? print $error_message['tel error'] : '';  ?></span>
		<div>
			<input placeholder="Mobile" type="tel" name="tel" value="<?php isset($tel)? print $tel: '' ;?>"  >
		</div>
	</div>



<div class="user-input">

		<textarea placeholder="Extra notes" name="note"><?php isset($note)? print $note: '' ;?></textarea>
	</div>
