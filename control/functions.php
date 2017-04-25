<?php 
		// function rendering templates 
		function render_template($template, $title='Siani Print &trade;'){
			require_once '../view/template/'.$template.'.php';
		}

		function render_page($page, $title='Siani Print &trade;'){
			require_once $page.'.php';
		}
		// checking data inout but this is useless avoid using this.
		function check_data($pattern, $data){
			if (!preg_match($pattern, $data)) {
				return true;
			}else{ return false;}
		}










		// cleaning all basic data input
		function clean_data($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = stripslashes($data);
			return $data;
		}
		// keeping selected input selected - handy if form validation fails
		function selected_option($set_var, $input_name){
			if (isset($set_var) && $set_var == $input_name) {
				return 'selected="selected"';
			}
		}
		// refer to comment above.  
		function checked_option($set_var, $input_name){
			if (isset($set_var) && $set_var == $input_name) {
				return 'Checked="Checked"';
			}
		} 
		// checking for multiple checkbox
		function multiple_selection($set_var,$value){	  		           	
			for($i = 0; $i < count($set_var); $i++){
				if ($set_var[$i] == $value) {
					return 'Checked="Checked"';
				}
			}
		}

?>