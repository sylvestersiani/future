<?php require_once '../control/img-upload.php'; ?>
<!-- section allocated to uploading artwork -->
	<section class="main">
		<div class="quote-form">
			<h1> One more thing!</h1>
			<div class="get-quote">
				<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
				enctype="multipart/form-data">

					<span class="warning"><?php isset($file_E)? print $file_E : ''; ?></span>
					<div><input type="file" name="file" value="" /></div>

					<span><?php isset($errorMsg)? print($errorMsg): null; ?></span>
					<div class="g-recaptcha" data-sitekey="6LdVEg4UAAAAAPcfNwXOe3UFMkXt0Gk6CwsV9_5I"></div>
					
					<button type="submit">Upload image</button>
				</form>
			</div>
		</div>
	</section>