<?php

//setting up the theme
function portfolio_setup() {
  if(function_exists('ss_register_slider')){
    ss_register_slider('about', 'About Me');
  }
}
add_action('after_setup_theme', 'portfolio_setup' );

/**
 * Admin menus
 */
function wp_bootstrap_admin_menu() {
  //add cobalt theme options
  add_theme_page( 'WP-Bootstrap Theme Options', 'Theme Options', 'edit_theme_options', 'wp-bootstrap-theme-options', 'wp_bootstrap_theme_options' );
}
add_action( 'admin_menu', 'wp_bootstrap_admin_menu' );

/**
* Theme Options
*/
if( !function_exists( 'wp_bootstrap_theme_options' ) ) {
function wp_bootstrap_theme_options() { ?>
  <div id="wp-bootstrap-theme-options-wrap" class="wrap">
    <div class="icon32" id="icon-tools"><br /></div>
    <h2>Theme Options</h2>
    <p><i>From here you can modify different settings for this theme.</i></p>
    <div id="wp-bootstrap-theme-options">     
      <!--footer options-->
      <section class="postbox">
        <?php $option = get_option( 'wpb_footer', array('wpb_title'=>'', 'wpb_address'=>'', 'wpb_phone'=>'', 'wpb_fax'=>'', 'wpb_email'=>'', 'wpb_copyright'=>'') ); ?>
        <h3>Footer Options</h3>
        <div class="inside">
          <h4>Title</h4>
          <input id="title" name="Title" type="text" style="width:50%;" value="<?php echo $option['wpb_title']; ?>" />
            <h4>Address</h4>
            <input id="address" name="Address" type="text" style="width:50%;" value="<?php echo $option['wpb_address']; ?>" />
            <h4>Phone</h4>
            <input id="phone_number" name="phone_Number" type="tel" style="width:50%;" value="<?php echo $option['wpb_phone']; ?>" />
            <h4>Fax</h4>
          <input id="fax_number" name="fax_Number" type="tel" style="width:50%;" value="<?php echo $option['wpb_fax']; ?>" />
          <h4>Email</h4>
          <input id="email" name="email" type="email" style="width:50%;" value="<?php echo $option['wpb_email']; ?>" />
            <h4>Copyright Notice</h4>
          <input id="copyright" name="copyright" style="width:50%;" value="<?php echo esc_attr(stripcslashes($option['wpb_copyright'])); ?>" />
        </div>
      </section>
    </div>

    <!--slideshow taxonomy-->
    <section class="postbox">
      <h3>Slideshow Gallery</h3>
      <div class="inside">
    <i>Choose a gallery to appear in the front page slideshow</i>
      <form>
        <label for="wpb_gallery">Select which category you want displayed: </label>
          <?php wp_dropdown_categories( array(
            'selected'=> get_option('wpb_gallery'),
            'name' => 'wpb_gallery',
            'show_option_none' => 'None',
            'class' => 'postform wp-bootstrap-dropdown',
            'hide_empty' => false,
            'taxonomy' => 'gallery'
          ) ); ?>
        <script type="text/javascript">
          jQuery(document).ready(function($){
            $(".wp-bootstrap-dropdown").change(function(){
              if( $(this).val()!=-1 ) {
                $(this).siblings().each(function(){
                  $(this).val(-1);
                });
              }
            });
          });
        </script>
      </form>
      </div>
    </section>

    <div>
      <p class="submit">
        <input id="save-changes-btn" name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>">
      </p>
    </div>
  </div>

  <script>
    jQuery(function($){
      $("#save-changes-btn").click(function(){
        $(this).val('Saving...');
        var values = {
          "wpb_gallery": $("#wpb_gallery option:selected").val(),
          "wpb_footer"  :{ 
            "wpb_title"   : $('#title').val(),
            "wpb_address"   : $('#address').val(),
            "wpb_phone"   : $('#phone_number').val(),
            "wpb_fax"     : $('#fax_number').val(),
            "wpb_email"   : $('#email').val(),
            "wpb_copyright" : $('#copyright').val()
            }
          };
        var data = {
          action: 'wp_bootstrap_theme_options_ajax_action',
          options: values
        };
        $.post(ajaxurl, data, function( msg ) {
          if( msg == 'reload' ) {
            location.reload();
          } else {
            $("#save-changes-btn").val( msg );
          }
        });
      });
    });
  </script>

<?php } 
}

/**
 * Saves all options
 *
 */
if( !function_exists( 'wp_bootstrap_theme_options_ajax_callback' ) ) {
  function wp_bootstrap_theme_options_ajax_callback() {
    $return = 'Changes Saved';
    //update options
    foreach( $_POST['options'] as $key => $value ) {
        $changed = update_option( $key, $value );
        if( $changed ) {
          $return = 'reload';
        }
    }
    echo $return; 
    die();
  }
  add_action( 'wp_ajax_wp_bootstrap_theme_options_ajax_action', 'wp_bootstrap_theme_options_ajax_callback' );
}

//Registering scripts and styles
function theme_name_scripts() {
	/*Styles*/
  wp_enqueue_style( 'main-css', get_stylesheet_uri() );
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/chad/css/bootstrap.min.css', '3.1.0' );
  wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/chad/css/font-awesome.min.css', '4.1.0' );
  wp_enqueue_style( 'mobile-css', get_template_directory_uri() . '/mobile.css', '1.0' );
  wp_enqueue_style( 'tablet-css', get_template_directory_uri() . '/tablet.css', '1.0' );
  /*Scripts*/
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/chad/js/bootstrap.min.js', array('jquery'), '3.1.0' );
  wp_enqueue_script( 'fastclick-js', get_template_directory_uri() . '/chad/js/fastclick.js', array('jquery'), '3.1.0' );
  wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/chad/js/carousel.js', array('jquery'), '1.0' );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/chad/js/main.js');
  wp_enqueue_script( 'underscore-js', get_template_directory_uri() . '/chad/js/underscore.js', '1.7.0' );
  wp_enqueue_script( 'respond-js', get_template_directory_uri() . '/chad/js/respond.min.js', '1.0' );

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

//google fonts
function load_google_fonts() {
  wp_register_style('googleFontsPaytoneOne','http://fonts.googleapis.com/css?family=Paytone+One');
  wp_enqueue_style( 'googleFontsPaytoneOne');
  wp_register_style('googleFontsLemon','http://fonts.googleapis.com/css?family=Montserrat');
  wp_enqueue_style( 'googleFontsMontserrat');
  wp_register_style('googleFontsLobster','http://fonts.googleapis.com/css?family=Lobster');
  wp_enqueue_style( 'googleLobster');
  wp_register_style('googleFontsCantataOne','http://fonts.googleapis.com/css?family=Monoton');
  wp_enqueue_style( 'googleMonoton');

}
add_action('wp_print_styles', 'load_google_fonts');


//registering wordpress menus
register_nav_menu( "nav-menu-left", "Left Side" ); 
register_nav_menu("mobile-menu", "Mobile Dropdown Menu");

//enable post thumbnails
add_theme_support( 'post-thumbnails');

//register custom post types
function custom_interests() {
  $args = array(
    'public' => true,
    'label'  => 'Interests',
    'has_archive' => true,
    'show_in_nav_menus' => true,
    'show_ui'=> true,
    'show_in_menu'=> true,
    'show_in_nav_menus'=> true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type( 'interests', $args );
}
add_action( 'init', 'custom_interests' );

//Differentiate between professional and personal interests
$labels = array(
 'name' => _x( 'Interest Classification', 'taxonomy general name' ),
 'singular_name' => _x( 'Interest', 'taxonomy singular name' ),
 'search_items' =>  __( 'Search Interests' ),
 'popular_items' => __( 'Popular Interests' ),
 'all_items' => __( 'All Interests' ),
 'parent_item' => __( 'Parent Interests' ),
 'parent_item_colon' => __( 'Parent Interests:' ),
 'edit_item' => __( 'Edit Interests' ),
 'update_item' => __( 'Update Interests' ),
 'add_new_item' => __( 'Add New Interest' ),
 'new_item_name' => __( 'New Interest' ),
);


register_taxonomy('interest-type', array('interests'), array(
 'hierarchical' => true,
 'labels' => $labels,
 'show_ui' => true,
 'query_var' => true,
 'rewrite' => array( 'slug' => 'interests' ),
));

//Add default terms to interest-type taxonomy 
wp_insert_term( "Personal", "interest-type");
wp_insert_term( "Professional", "interest-type");

function custom_skills() {
	$args_skills = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Skills',
    'show_in_nav_menus' => true,
    'show_ui'=> true,
    'show_in_menu'=> true,
    'show_in_nav_menus'=> true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type( 'skills', $args_skills );
}
add_action( 'init', 'custom_skills' );

//Differentiate between different skill types
$labels = array(
 'name' => _x( 'Skills Classification', 'taxonomy general name' ),
 'singular_name' => _x( 'Skills', 'taxonomy singular name' ),
 'search_items' =>  __( 'Search Skills' ),
 'popular_items' => __( 'Popular Skills' ),
 'all_items' => __( 'All Skills' ),
 'parent_item' => __( 'Parent Skills' ),
 'parent_item_colon' => __( 'Parent Skills:' ),
 'edit_item' => __( 'Edit Skills' ),
 'update_item' => __( 'Update Skills' ),
 'add_new_item' => __( 'Add New Skills' ),
 'new_item_name' => __( 'New Skills' ),
);

register_taxonomy('skills-type', array('skills'), array(
 'hierarchical' => true,
 'labels' => $labels,
 'show_ui' => true,
 'query_var' => true,
 'rewrite' => array( 'slug' => 'skills' ),
));

//Add default terms to skill-type taxonomy 
wp_insert_term( "Web Development", "skills-type");
wp_insert_term( "Environmental", "skills-type");

//About posts
function custom_about() {
	$args_about = array(
    'public' => true,
    'label'  => 'About',
    'show_in_nav_menus' => true,
    'show_ui'=> true,
    'show_in_menu'=> true,
    'show_in_nav_menus'=> true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type( 'about', $args_about );
}
add_action( 'init', 'custom_about' );

function custom_exp() {
	$args_exp = array(
    'public' => true,
    'label'  => 'Experience',
    'show_in_nav_menus' => true,
    'has_archive' => true,
    'show_ui'=> true,
    'show_in_menu'=> true,
    'show_in_nav_menus'=> true,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );
  register_post_type( 'experience', $args_exp );
}
add_action( 'init', 'custom_exp' );


/**Register post types for intersts filter*/
function interest_custom_environment() {
    $args = array(
      'public' => true,
      'label'  => 'Environment'
    );
    register_post_type( 'environment', $args );
}
add_action( 'init', 'interest_custom_environment' );

/*--------Register PDF taxonomy for PDJ.js--------*/
add_action( 'init', 'create_pdf_taxonomy' );

function create_pdf_taxonomy() {
    wp_insert_term( 'PDF', 'category', array('slug' => 'pdf' ) );
}

/*--------Register taxonomy for banner of contact page--------*/
add_action( 'init', 'banner_image_taxonomy' );

function banner_image_taxonomy() {
    wp_insert_term( 'Banner', 'category', array('slug' => 'banner' ) );
}

/*
 * Register Bootstrap Slider taxonomy
 */
function wp_bootstrap_init() {
  $labels = array(
    'name' => 'Galleries',
    'singular_name' => 'Gallery',
    'search_items' => 'Search Galleries',
    'all_items' => 'All Galleries',
    'parent_item' => 'Parent Gallery',
    'parent_item_colon' => 'Parent Gallery:',
    'edit_item' => 'Edit Gallery', 
    'update_item' => 'Update Gallery',
    'add_new_item' => 'Add New Gallery',
    'new_item_name' => 'New Gallery Name',
    'menu_name' => 'Galleries'
  );
  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gallery' )
  );
  register_taxonomy( 'gallery', array( 'attachment' ), $args );
}
add_action( 'init', 'wp_bootstrap_init' );

?>