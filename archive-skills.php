<?php get_header(); ?>	

<div class='col-md-11 col-xs-11 col-sm-11 skill-page clear' id='right'>
	<!--<div class='wrapper'>
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
						<div class='post-content col-xs-10 col-md-10 col-sm-10 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 content'><?php the_content();?></div>
					</div>
				</div>
			<?php endwhile;?>
	</div> <!--Skill wrap-->

	<div class='wrapper'>
		<?php
		$count = 0;
		$is_environmental_new=true;
		$is_webdev_new=true;
		$first_run_through=true;
			while ( have_posts() ) : the_post(); 	
				$count++;?>


				<div class='inner-wrap'>
					<?php
					if($first_run_through){?>
						<!--html structure for sorting buttons-->
						<div class='toggle-btn-wrap'>
							<div class='toggle-btn-grp joint-toggle row'>
								<div class='toggle-btn-skills' id='by-environ'>Environmental</div>
								<div class='toggle-btn-skills' id='by-webdev'>Web Development</div>
							</div>
						</div>
						<?php
									
						//Get environmental then web development
						$environmental_args = array('post_type'=>'skills','tax_query' => array( array('taxonomy' => 'skills-type','field' => 'slug','terms'=> array('Environmental'))));

						$environmental_query = new WP_Query($environmental_args);						

						while ( $environmental_query->have_posts() ) :
							$environmental_query->the_post();
							if($is_environmental_new) { ?>
								<?php										
								$is_environmental_new=false;
							} ?>
						
							<div class='post environmental-post'>
								<div class='skill-image image-<?php echo $count; ?>'><?php the_post_thumbnail();?></div>
								<div class='post-cover'><h3><?php the_title(); ?></h3><p><?php the_content();?></p></div>
							</div>
							<div class='post-content'>
								<h1 class='col-xs-12 col-md-12 col-sm-12 content-title'><?php the_title(); ?> </h1>
								<div class='post-content col-xs-12 col-md-12 col-sm-12 content'><?php the_content();?></div>
							</div>
							<?php
						endwhile; //environmental query
						?>

						<div class="clearfix"></div>

						<?php
						$webdev_args = array('post_type'=>'skills','tax_query' => array( array('taxonomy' => 'skills-type','field' => 'slug','terms'=> array('Web Development'))));

						$webdev_query = new WP_Query($webdev_args);

						while ( $webdev_query->have_posts() ) :
							$webdev_query->the_post();
							if($is_webdev_new) { ?>
								<?php $is_webdev_new=false;
							} ?>
							<div class='post webdev-post'>
								<div class='skill-image image-<?php echo $count; ?>'><?php the_post_thumbnail();?></div>
								<div class='post-cover'><h3><?php the_title(); ?></h3><p><?php the_content();?></p></div>
							</div>
							<div class='post-content'>
								<h1 class='col-xs-12 col-md-12 col-sm-12 content-title'><?php the_title(); ?> </h1>
								<div class='post-content col-xs-12 col-md-12 col-sm-12 content'><?php the_content();?></div>
							</div>

						<?php
						endwhile; // personal query

						//otherwise code will run based off number of current posts
						$first_run_through=false;
						?>

						
						<?php
					}?>	

					
				</div>
			<?php endwhile;?>
		</div> <!--Skill wrap-->




	<div id='dummy-content-wrap' class='content-wrap'>
		<div class='welcome-wrap'>
			<h1 id='welcome'>Click To Begin!</h1> <!-- Message on loading -->
			<i class="fa fa-hand-o-left fa-5x"></i>
		</div>
	</div>
</div><!--right-->

<?php get_footer(); ?>

