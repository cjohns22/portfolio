<!DOCTYPE html>

<!--Filter for IE selectors-->
<!--[if IE 8]><html lang="en-US" class="ie-8 ie-lte-8 ie-lte-9"><![endif]-->
<!--[if IE 9]><html lang="en-US" class="ie-9 ie-lte-9"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->
	<head>
		<meta charset = "UTF-8" />	
		<title> Chad's Portfolio Site</title>
	
		<?php wp_head(); ?> 
		<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	<div id='pagewrap'>
		<div id="left">
			<div id='sticky' class=''>
				<div class='logo'>CFJ</div>
				<div id='name-wrap'> 
					<div id='name'><?php is_front_page() ? bloginfo('name') : wp_title(''); ?></div>
				</div>
				<button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="glyphicon glyphicon-align-right fa-3x" aria-hidden="true"></span>
				</button>
				<div id='mobile-navigation'>
					<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
				</div>
				<div id='navigation-wrap'>
					<?php wp_nav_menu( array( 'theme_location' => 'nav-menu-left' ) ); ?>
				</div>
				<div id="hide-nav-btn">
					<i class="fa fa-angle-left fa-5x" title="Hide Navigation Menu" alt="Hide Navigation Menu"></i>
				</div>
			</div>
		</div>
		<div id="show-nav-btn" class="out-of-sight">
			<i class="fa fa-angle-right fa-5x" title="Show Navigation Menu" alt="Show Navigation Menu"></i>
		</div>	

		
		