<?php

	$file_E = '';

	// storing data taken from session cookie to var
	$garment =	$_SESSION['g-type'] ;
	$garment_colour = $_SESSION['g-colour'] ;
	$is_garment_supplied =	$_SESSION['g-supply'] ;
	$garment_total_quantity = 	$_SESSION['qty'] ;
	$garment_sizes_qty = $_SESSION['sizes-qty'] ;
	$print_location = $_SESSION['print-location'] ;
	$labels_and_packaging = $_SESSION['labels_and_packaging'];
	$user_name = $_SESSION['name'] ;
	$user_email = $_SESSION['email'] ;
	$user_tel = $_SESSION['tel'] ;
	isset($_SESSION['note']) ? $note = $_SESSION['note'] : '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	file upload
	if (empty($_FILES['file'])) {
		$file_E = 'Please input a file';
	}else {
		$uploadName = $_FILES['file']['name'];
		$uploadName = date("Y.m.d").".".mt_rand(1, 999).".".$uploadName;
		$uploadTmp = $_FILES['file']['tmp_name'];
		$uploadType = $_FILES['file']['type'];	
		$uploadName = preg_replace("#[^a-z0-9.]#i", "" , $uploadName);
		$fileSize = $_FILES['file']['size'];
		$fileExtension = array('jpg','png','pdf','ai','psd','eps','jpeg');
		// checks if the user has actually uploaded something.
		if (!$uploadTmp) {
			$file_E = 'No files selected, please upload again.';
		}else {
			// checking if the image uploaded contain extensions stored in the array.
			if(!in_array(pathinfo($uploadName, PATHINFO_EXTENSION), $fileExtension)){
				$file_E = "Accepeted files (jpeg,png,pdf,ai,psd,eps,jpeg)";
			}else{
				// checking if the size is less than 3gb in kilobits
				if ($fileSize > 3145728) {
					$file_E = 'File to big. Maximum 3GB';
				}else {
					// because everything including the image is working here a function is set to store the data into a database and send it to our email inbox. if that is successfull then the image is uploaded.
					// if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
					// 	$key = '6LdVEg4UAAAAADvdRqRsI0GGJE7TVGPbjCkoU2Yg';
					// 	$verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$_POST['g-recaptcha-response']);

					// 	$responseData = json_decode($verify_response);
						
					// 	if($responseData->success){
							move_uploaded_file($uploadTmp, "artwork-upload/$uploadName"); 
							 		//connect to mysql and add all relevant content into the database
									require_once('model/db_con/connect-mysql.php');
									// checks for connection
									if ($mysqli->connect_error) {
							           // for not nothing happens if the connection fails
										die('DB ERROR');
									}
									// inserting the data into the database	
									$sql = "INSERT INTO quoteEnquiry (name,email,tel,garment_type,
											garment_colour,garment_provided,size_qty,total_qty,print_location,labels_and_packaging,notes,day) "; 
							        $sql .= " VALUES ( ";
							        $sql .=	" 	'{$mysqli->real_escape_string($user_name)}',
												'{$mysqli->real_escape_string($user_email)}',
												'{$mysqli->real_escape_string($user_tel)}',
												'{$mysqli->real_escape_string($garment)}',
												'{$mysqli->real_escape_string($garment_colour)}',
												'{$mysqli->real_escape_string($is_garment_supplied)}',
												'{$mysqli->real_escape_string(json_encode($garment_sizes_qty))}',
												'{$mysqli->real_escape_string($garment_total_quantity)}',
												'{$mysqli->real_escape_string(json_encode($print_location))}',
												'{$mysqli->real_escape_string($labels_and_packaging)}',
												'{$mysqli->real_escape_string($note)}',
												'{$mysqli->real_escape_string(date('D'))}'
											)";
							
									$insert = $mysqli->query($sql);
									// close connection
									$mysqli->close();
									
									// sending email 
									require_once('model/PHPMailer/PHPMailerAutoload.php');

									$email = new PHPMailer;
									$email->From = "info@sianiprint.co.uk";
									$email->FromName  = $user_name;
									$email->addAddress('info@sianiprint.co.uk','Siani Print');
									$email->addReplyTo($user_email);
									$email->addCC('sylvester@sianiprint.co.uk');
									$email->Subject = 'IMPORTANT! Quote Enquiry on' . $garment .'!';

									// HTML EMAIL SET UP
									$message = '<div style="max-width:550px; min-width:320px;  background-color: white; border: 1px solid #DDDDDD; margin-right: auto; margin-left: auto;"><div style="margin-left:30px;margin-right:30px">';

									$message .=  '<hr style="margin-top:10px;margin-bottom:5px;border:none;border-bottom:1px solid fff"/> '; 

									$message .= '<h1 style="font-family: Tahoma, Geneva, sans-serif; font-weight: normal; color: #2A2A2A; text-align: center; margin-bottom: 45px;font-size: 20px; letter-spacing: 6px;font-weight: bold; border: 4px solid black; padding: 15px;">NEW QUOTE FROM '.$user_name.'!</h1>';

									$message .=  '<h3 style="font-family:Palatino Linotype, Book Antiqua, Palatino, serif;font-style:italic;font-weight:500">See order details below: </h3> ';

									$message .=   '<p style="font-family:Tahoma, Geneva, sans-serif;font-size: 15px; margin-left: auto; margin-right: auto; text-align: justify;color: #000;line-height:1.5;margin-bottom:120px">';

									$message .= '<b>Cutomers Name : </b>' . ucfirst($user_name).'<br>'; 
									$message .= '<b>Customers Email : </b>' . $user_email .'<br>'; 
									$message .= '<b>Customers Tel : </b>' . $user_tel  .'<br>';

									$message .= "- <br> ";

									$message .=  '<b>Garment Type : </b>' .  ucfirst($garment).'<br>'; 
									$message .=  '<b>Garment Colour : </b>' . ucfirst($garment_colour).'<br> '; 
									$message .=  '<b>Is the garment supplied by customer? : </b>' . ucfirst($is_garment_supplied).'<br>'; 

									foreach ($garment_sizes_qty as $size => $qty) {
									    $message .= '<b style="margin-left: 40px;" >'. ucfirst($size) . ' : </b>' . $qty . '<br>';
									}
									$message .=  '<b>Total Quantity : </b>' . $garment_total_quantity .'<br> ';

									foreach ($print_location as $location) {
									    $message .=  '<b> Print Position : </b>' . $location . '<br>' ;
									}

									$message .= "- <br>";
									isset($note)? $message .=   '<b> Extra note : </b>' . $note . '<br>' : '';

									$message .= '</p> ';
									
									$message .= '<hr style="margin-top:10px;margin-top:75px"/> ';

									$message .= ' <p style="text-align:center;margin-bottom:15px"><small style="text-align:center;font-family:Courier New, Courier, monospace;font-size:10px;color#666;">Siani Print London | <a href="http://www.sianiprint.co.uk/login.php" style="color:#666">Staff Login</a> <b>|</b> Submited : '. date('D d/m/y') .'</small></p>
									    <p>&nbsp;</p>
									  </div>
									</div>';
									///
									$email->Body = $message; 
									$email->AltBody = strip_tags($message); //altBody is simply a plain text copy of the standard body
									$email->addAttachment("../artwork-upload/$uploadName"); // to attache multiple files simply copy the object and pass the file into the object.
									
									if($email->send()){
										// currently processing the format to the screen but ultimatly if the email is succesfuly sent the user will be redirected to a new page.
										header('location: quote.php?quote-success');
									} else {$warning = 'There was an error somewhere.';}						
					// 	}else {
					// 		$errorMsg = 'Robot verification failed, please try again.';
					// 		$file_E = 'Due to failed identification, please upload artwork again.';
					// 	}
					// }else {
					// 	$errorMsg = 'Please click on the reCAPTCHA box.';
					// 	$file_E = 'Due to failed identification, please upload artwork again.';
					// }
				}
			}			
		}				
	}
}

?>