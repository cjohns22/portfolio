    <div id='front-resume'>
        <h3 id="resume" class='sn-wrap col-md-6 col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-4'>MY R&EacuteSUM&Eacute</h3>
        <span id="toggle-arrow" class="active-arrow glyphicon glyphicon-chevron-up col-xs-12 col-sm-12 col-md-10 col-md-offset-2" aria-hidden="true"></span>
    </div>
        
    <div class="row" id='resume-wrapper'>
        <div class = "col-md-8 col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-3" id="resume-wrap">
            <?php $my_query = new WP_Query( 'category_name=PDF&posts_per_page=1' );
            while ( $my_query->have_posts() ) : $my_query->the_post();
                $do_not_duplicate = $post->ID; ?>
                    <div> <?php the_content(); ?></div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class='footer-wrap row'>
        
        <div class='inner-foot col-md-12 col-sm-12 col-xs-12'></div>
        
        <div class='outter-wrap col-md-12'>
            
            <ul class='contact-me col-md-10 col-sm-12 col-xs-12'>
                <li id='name-footer'>CHAD JOHNSON</li>
                <li>PHONE: 315-283-4417</li>
                <li class='web-dev'>WEB DEVELOPMENT</li>
                <li class='environment'> ENVIRONMENTAL & WATER RESOURCES ENGINEERING</li>
            </ul>

        </div>
    </div>

	<?php wp_footer(); ?>
	</body>
</html>