<!--CONTACT PAGE-->

<?php get_header(); 

	$banner_query = new WP_Query( 'category_name=Banner&posts_per_page=1' );						

	if ( $banner_query->have_posts() ) {
    	while ( $banner_query->have_posts() ) {
    		$banner_query->the_post();
	    	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			$url = $thumb['0']; ?>

	        <div id='top' class='row' style="background-image: url('<?php echo $url; ?>')">
				<p id="get-in-touch">GET IN TOUCH</p>
			</div> <?php
		}
	} else{
		echo "No banner image has been set.";
	}?>


	<div id='center' class='row'>
		<div class='row'>
			<div class='contact-wrap col-md-8 col-sm-10 col-xs-10'>
				<h1 class='contact-ideas'>GENERAL INQUIRIES AND PROJECT PROPOSALS</h1>
					
				<form action="<?php echo get_stylesheet_directory_uri(); ?>/email.php" name='contactform' method='POST'>
			  		<div class ='row'>
				  		<label class='col-md-8 col-sm-8 col-xs-10 col-sm-offset-1 col-xs-offset-1 contact-inputs col-md-offset-2' id='name-contact'>Name:</label> <br />
						<input name="username" type="text" placeholder='Name' class='col-md-8  col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1 col-md-offset-2' />

						<label class='col-md-8 col-sm-8 col-xs-10 col-sm-offset-1 col-xs-offset-1 contact-inputs col-md-offset-2' id='phone-number'>Phone Number: </label><br />
						<input name="phone" type="text" placeholder='123-456-7890' class='col-md-8 col-md-offset-2 col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1 col-xs-offset-2' />
					</div> 

					<div class='row'>
						<label class='col-md-5 col-sm-8 col-xs-10 col-sm-offset-1 col-xs-offset-1 contact-inputs col-md-offset-2' id='email-wrap'>Email: </label><br />
						<input name="email" id="email" type="text" placeholder='yourname@example.com' class='col-md-8 col-md-offset-2 col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1 col-xs-offset-2'/>

						<label class='col-md-5 col-sm-8 col-xs-10 col-sm-offset-1 col-xs-offset-1 contact-inputs col-md-offset-2' id='email-wrap'>2 + 2 = </label><br />
						<input name="validation" id="validation" type="text" placeholder='Spam Prevention' class='col-md-8 col-md-offset-2 col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1'/>
					</div>
						
					<div class='row'>
						<label class='col-md-5 col-sm-8 col-xs-10 col-sm-offset-1 col-xs-offset-1 contact-inputs col-md-offset-2' id='message-title'>Message:</label><br />
						<textarea name="message" id="message" class='col-md-8 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1' rows="15" cols="40" placeholder=''></textarea>
					</div>
					
					<div class='row'><div id='submit-wrap'><input type="submit" value="Send" id='submit' /></div></div>

				</form>
			</div>
		</div>
		
	</div>

	<div id="bottom" class='row'>
		<div class='row'>
			<ul class='sn-wrap col-md-6 col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-4'>
				<li class='col-xs-3 col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-2 col-xs-offset-1' title='Email me about more general information'><a class='connect' href="mailto:cjohns22@syr.edu?Subject="> <i class="fa fa-envelope-square fa-5x"></i></a></li>
				<li class='col-xs-3 col-md-2 col-sm-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-1' title='Find me on Facebook'><a class='connect' href='http://facebook.com' target='_blank'><i class="fa fa-facebook fa-5x"></i></a></li>
				<li class='col-xs-3 col-md-2 col-sm-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-1' title='Connect with me on Linkedin'><a class='connect' href='https://www.linkedin.com/pub/chadwick-johnson/77/363/a05' target='_blank'><i class="fa fa-linkedin fa-5x"></i></a></li>
			</ul>
		</div>
	</div>


<?php get_footer(); ?>