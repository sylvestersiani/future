<?php require_once '../control/quote-exec.php'; ?>

<div class="main">
	<div class="quote-form">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
			<div class="form-input">
				<?php 
					require '../view/template/form1-template/garment-selection.php'; 
					require '../view/template/form1-template/garment-detail.php';
					require '../view/template/form1-template/print-location.php';
					require '../view/template/form1-template/basic-detail.php';	
				?>
				<div><button type="submit">Get in touch</button>
			</div>
		</form>
	</div>
</div>
