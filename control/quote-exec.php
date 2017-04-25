<?php 
	//pre-defined error array. 
	// $error_message = array( 'garment error' => '', 
	// 						'colour error' => '', 
	// 						'garment supply' => '',
	// 						'garment qty'=>'', 
	// 						'print position'=> '' , 
	// 						'labels-packaging'=>'',
	// 						'name error'=>'', 
	// 						'email error'=>'', 
	// 						'tel error'=>'', 
	// 						'warning'=> '');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once 'functions.php';	

		// validating garment input
		if (empty($_POST['garment-type'])) {
			$error_message['garment error'] = 'Please Select Garment Type.';
		}else{$garment_type = clean_data($_POST['garment-type']); }

		///////// validating garment input
		if (empty($_POST['garment-colour'])) {
			$error_message['colour error'] = 'Do not forget to enter garment colour';
		}else{
			if (!preg_match('/^[0-9]+$/', $_POST['garment-colour'])){
				$garment_colour = clean_data($_POST['garment-colour']);
			}else{$error_message['colour error'] = 'No numbers. ';}
		}
		////// validating whether garment will be supplied by customer or us
		if (empty($_POST['garment-supply'])) {
			$error_message[ 'garment supply'] = 'Don\' forget to let us know wether you will be supplying the garment';
		}else{$garment_supply = $_POST['garment-supply'];}
		///// validating and storing sizes into an array which is later used. 
		if (isset($_POST['small']) || 
			isset($_POST['medium']) ||
			isset($_POST['large']) ||
			isset($_POST['xl']) ||
			isset($_POST['2xl'])) {
			$garment_qty = array('small' => clean_data($_POST['small']),
								 'medium' => clean_data($_POST['medium']),
								 'large' => clean_data($_POST['large']),
								 'xl'=> clean_data($_POST['xl']),
								 '2xl'=> clean_data($_POST['2xl']));
			if (array_sum($garment_qty) <= 0) {
				$error_message['garment qty'] = 'input quantity';
			}else{$total_qty = array_sum($garment_qty);}
		}
		///// validating print podisiton 
		if(empty($_POST['print-position'])){
			$error_message['print position'] = 'select a print position';
		}else{$print_position = $_POST['print-position'];}
		///// validating labels & packing
		if (empty($_POST['labels-packaging'])) {
			$error_message[ 'labels-packaging'] = 'do you require labels and packaging?';
		}else{$labels_and_packaging = clean_data($_POST['labels-packaging']);}
		// validating user name
		if (empty($_POST['name'])) {
			$error_message['name error'] = 'Do not forget to enter your name';
		}else{
			if (check_data('/^[0-9]+$/', $_POST['name']) === true) {
				$name = clean_data($_POST['name']);
			}else{$error_message['name error'] = 'We\'re sure your name doesn\'t have a number.';}
		}
		// validating user email
		if (empty($_POST['email'])) {
			$error_message['email error'] = 'email required';
		}else{
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$email = clean_data($_POST['email']);
			}else{$error_message['email error'] = 'valid email required';}
		}
		/////// validating tel [need to detail down to uk numbers]

		// trimming data due to it being necesarry for seeing the first 2 data input.
		// either 44 or 07 considering we're after uk mobile numbers to be used for order tracking process.
		$tel_input = clean_data($_POST['tel']);

		if (empty($tel_input)){
			$error_message['tel error'] = 'We\'ll need your number for a faster communication.';
		}else{	
			if (!preg_match('/^[0-9]+$/', $tel_input)) {
				$error_message['tel error'] = 'Please enter a valid number.';
			}else {
				if (strlen($tel_input) < 10) {
					$error_message['tel error'] = 'A minimum of 11 digits is required.';
				}else{
					$first_2_digits = substr($tel_input, 0,2);
					// var_dump($first_2_digits);

					switch ($first_2_digits) {
						case '07':
						case '44':
							$tel = $tel_input;
							break;
						default:
							$error_message['tel error'] = 'valid uk mobile number required';
					}

				}	
			}	
		}

		////// validating notes.
		if (!empty($_POST['note'])) { $note = clean_data($_POST['note']);}
		//// 
		if (!empty($garment_type) && !empty($garment_colour) && !empty($garment_supply) && 
			!empty($total_qty) && !empty($print_position) && !empty($labels_and_packaging) && 
			!empty($name) && !empty($email) && !empty($tel) && $tel >= 11) {
					// passing all data input from the customer into a session (although the data has previesly been cleaned, ive decided to give it another clean up).
					$_SESSION['g-type'] = clean_data($garment_type);
					$_SESSION['g-colour'] = clean_data($garment_colour);
					$_SESSION['g-supply'] = clean_data($garment_supply);
					$_SESSION['qty'] = $total_qty;
					$_SESSION['sizes-qty'] = $garment_qty;
					$_SESSION['print-location'] = $print_position;
					$_SESSION['labels_and_packaging'] = $labels_and_packaging;
					$_SESSION['name'] = clean_data($name);
					$_SESSION['email'] = clean_data($email);
					$_SESSION['tel'] = clean_data($tel);
					isset($note)? $_SESSION['note'] = clean_data($note) : '';
					// checking if the sessions above are set to redirect to the new page. if not, the user will be required to go over the details again.
					if(isset($_SESSION['g-type']) && isset($_SESSION['g-colour']) && isset($_SESSION['g-supply']) && isset($_SESSION['qty']) && isset($_SESSION['sizes-qty']) && isset($_SESSION['print-location']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['tel'])){
								header("Location: quote.php?img-upload");
								exit;
					}else{ $error_message['error'] = 'Something went wrong somewhere please try again';}
		}
		$error_message['error'] = 'Please fill in all required fields.';
	}