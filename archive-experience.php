<?php get_header(); ?>	

<div class='col-md-11 col-xs-11 col-sm-11 exp-page clear' id='experience-page'>
	<div class='wrapper'>
		<?php
		$count = 0;
			while ( have_posts() ) : the_post(); 	
				$count++;?>

				<div class='inner-wrap'>
					<div class='post'>
						<div class='skill-image image-<?php echo $count; ?>'><?php the_post_thumbnail();?></div>
						<div class='post-cover'><h3><?php the_title(); ?></h3><p><?php the_content();?></p></div>	
					</div>
					

					<div class='post-content'>
						<h1 class='col-xs-12 col-md-12 col-sm-12 content-title'><?php the_title(); ?> </h1>
						<div class='post-content col-xs-10 col-md-10 col-sm-10 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 content'><?php the_content();?></div>
					</div>
				</div>
			<?php endwhile;?>
	</div> <!--Skill wrap-->


	<div id='dummy-content-wrap' class='content-wrap'>
		<div class='welcome-wrap'>
			<h1 id='welcome'>Click To Begin!</h1> <!-- Message on loading --> 
			<i class="fa fa-hand-o-left fa-5x"></i>
		</div>
	</div>
</div>

<?php get_footer(); ?>