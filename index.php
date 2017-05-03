<?php ob_start(); // ob flushed to hold back container as session is starting in this page 
	require_once 'control/functions.php';  
	render_template('header', 'Siani Print');
?>
<!-- menu segment -->
<?php 
	include'view/template/menu.php';
?>


<!-- gradient overlay containing image -->
<div class="gradiant-overlay">
	<div class="overlay-img" style="background-image: url(view/img/siani-print-landing.jpg);" ></div>
</div>

<!-- main home page segment -->
<div class="main" style="" >
	<!-- div class slider segment -->
	<div class="slider" style="">
		<!-- slider input segment -->
	  <input class="slider__nav" type="radio" name="slider" title="slide1" checked="checked"/>
	  <input class="slider__nav" type="radio" name="slider" title="slide2"/>
	  <input class="slider__nav" type="radio" name="slider" title="slide3"/>
	  <input class="slider__nav" type="radio" name="slider" title="slide4"/>
	 <!--  <input class="slider__nav" type="radio" name="slider" title="slide4"/> -->

	  <div class="slider__inner" >
	  	<!-- slider 1-->
	    <div class="slider__contents">
	      <h2 class="slider__caption"><img width="120px" height="auto" src=""></h2>
	      <p class="slider__txt">We take pride in working collaboratively with our customers, educating them on the different methods of printing and guiding with our forward thinking approach to garment printing.</p>
	    </div>
	    <!-- slider 2-->
	    <div class="slider__contents">
	      <h2 class="slider__caption"><img src="#"></h2>
	      <p class="slider__txt">Our focus is on durability, customer service and a unique experience. We will always suggest the best possible printing methods for your designs and help you achieve the best possible outcome.</p>
	    </div>
	    <!-- slider 3-->
	    <div class="slider__contents">
	      <h2 class="slider__caption"><img src="#"></h2>
	      <p class="slider__txt">We also work with fashion brands helping you Build and strategies on marketing your products and generating sales. This service is provided to all our customers free of charge.</p>
	    </div>
	    <!-- slider 4-->
	    <div class="slider__contents">
	      <h2 class="slider__caption"><img src="#"></h2>
	      <p class="slider__txt">Siani Print is used to short lead times depending on the size and complecity of the job, we have a range of delivery options avilable including same day and express delivery.</p>
	    </div>
	    <!-- <div class="slider__contents"><i class="slider__image fa fa-#{val}"></i>
	      <h2 class="slider__caption">5</h2>
	      <p class="slider__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, officia sunt voluptas? Praesentium aliquam laudantium.</p>
	    </div> -->
	  </div>
	</div>

	<div class="call-for-action">
		<div class="quote-button">
			<a href="quote.php"><button>Get a Quote</button></a>
		</div>
	</div>
</div>







<?php

	render_template('footer');
	ob_flush();
?>