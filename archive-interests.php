<?php get_header(); ?>	

<div class='col-md-11 col-xs-11 col-sm-11 int-page clear' id='right'>
	<div class='wrapper'>
		<?php
		$count = 0;
		$is_professional_new=true;
		$is_personal_new=true;
		$first_run_through=true;
			while ( have_posts() ) : the_post(); 	
				$count++;?>


				<div class='inner-wrap'>
					<?php
					if($first_run_through){?>
						<!--html structure for sorting buttons-->
						<div class='toggle-btn-wrap'>
							<div class='toggle-btn-grp joint-toggle row'>
								<div class='toggle-btn-interests' id='by-prof'>Professional</div>
								<div class='toggle-btn-interests' id='by-pers'>Personal</div>
							</div>
						</div>
						<?php
									
						//Get professional interests then personal
						$professional_args = array('post_type'=>'interests','tax_query' => array( array('taxonomy' => 'interest-type','field' => 'slug','terms'=> array('Professional'))));

						$professional_query = new WP_Query($professional_args);						

						while ( $professional_query->have_posts() ) :
							$professional_query->the_post();
							if($is_professional_new) { ?>
								<?php										
								$is_professional_new=false;
							} ?>
						
							<div class='post professional-post'>
								<div class='skill-image image-<?php echo $count; ?>'><?php the_post_thumbnail('large');?></div>
								<div class='post-cover'><h3><?php the_title(); ?></h3><p><?php the_content();?></p></div>
							</div>
							<div class='post-content'>
								<h1 class='col-xs-12 col-md-12 col-sm-12 content-title'><?php the_title(); ?> </h1>
								<div class='post-content col-xs-10 col-md-10 col-sm-10 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 content'><?php the_content();?></div>
							</div>
							<?php
						endwhile; //professional query
						?>

						<div class="clearfix"></div>

						<?php
						$personal_args = array('post_type'=>'interests','tax_query' => array( array('taxonomy' => 'interest-type','field' => 'slug','terms'=> array('Personal'))));

						$personal_query = new WP_Query($personal_args);

						while ( $personal_query->have_posts() ) :
							$personal_query->the_post();
							if($is_personal_new) { ?>
								<?php $is_personal_new=false;
							} ?>
							<div class='post personal-post'>
								<div class='skill-image image-<?php echo $count; ?>'><?php the_post_thumbnail();?></div>
								<div class='post-cover'><h3><?php the_title(); ?></h3><p><?php the_content();?></p></div>
							</div>
							<div class='post-content'>
								<h1 class='col-xs-12 col-md-12 col-sm-12 content-title'><?php the_title(); ?> </h1>
								<div class='post-content col-xs-10 col-md-10 col-sm-10 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 content'><?php the_content();?></div>
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
</div>

<?php get_footer(); ?>
