<?php ob_start(); // ob flushed to hold back container as session is starting in this page 
	require_once '../control/functions.php'; 
	render_template('header', 'Get a Quote');
	isset($error_message['error'])? print $error_message['error'] : '';
	include'../view/template/menu2.php';


//checking for uri, if set to a certain param different html syntax are triggered. 

	// checking uri if requesting image upload
	if(isset($_GET['img-upload'])){
		render_template('quote2', 'Image upload');
	}elseif (isset($_GET['quote-success'])) {
		 // checking if the quote input was successfull
		render_template('quote-success', 'Success');
	} else{
		// checking if original quote page
		render_template('quote1', 'Get a Quote');
	}	
	render_template('footer');
	ob_flush();
?>