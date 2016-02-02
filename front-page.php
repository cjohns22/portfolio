<!--// ABOUT ME TAB //-->
<?php get_header(); ?>	
	
	<div id='wpb-slider-wrapper'>
		<?php
		$gallery = get_option('wpb_gallery');
		$slides = new WP_query(array( 
    		'post_type' => 'attachment',
    		'post_status' => 'any',
    		'tax_query' => array(
	            array(
	                'taxonomy' => 'gallery',
	                'terms' => $gallery,
	                'field' => 'term_id',
	                )
        	)
		));
		if ($slides->have_posts()) {
			$num_slides = $slides->post_count; $first = true; ?>
			<section id="carousel-media" class="carousel row slide" data-ride="carousel" data-interval='5000'>
		        <ol class="carousel-indicators"><?php
		            for ($i=0; $i < $num_slides; $i++) { ?>
		                <li data-target="#carousel-media" data-slide-to="<?php echo $i; ?>" class="<?php echo $i==0 ? 'active' : ''; ?>"></li><?php
		            } ?>
    			</ol><!--/.carousel-indicators-->
       			 <div class="carousel-inner"><?php
		            while ($slides->have_posts()) { $slides->the_post(); 
		                $image_id = get_the_ID();
		                $image_src = wp_get_attachment_image_src($image_id, 'full');?>
		                <div class="item <?php if($first){ echo 'active'; $first=false; } ?>">
		                    <img src="<?php echo $image_src[0]; ?>" alt="<?php echo the_title(); ?>" id='gallery-image'>
		                    <div class="carousel-caption"></div><!--/.carousel-caption-->
		                    <div class='wpb-slider-caption'>
		                    	<h3><?php the_title() ; ?></h3>
		                    	<p><?php the_excerpt(); ?></p>
		                    	
		                    </div>
		               	</div><!--/.item--><?php
		            } ?>
           		 </div><!--/.carousel-inner-->
   			</section><?php 
		} ?>
	</div>



<?php get_footer(); ?>
