<?php 
/*
 Plugin Name: Casper's Flyin' Call-to-Action
 Plugin URI: https://www.ironistic.com
 Description: Lightweight, highly customizable call-to-action plugin. Go to Appearance -> Fly-in CTA to manage.
 Version: 1.4
 Author: Casey James Perno @ Ironistic
 Author URI: https://www.ironistic.com/team/casey-james-perno/
 License: GPL2
*/

/******* enqueue scripts, styles, and theme/common plugin support *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/scripts-and-support.php' );
/******* create db options/settings *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/options.php' );
/******* create the admin page and menu item *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/admin/admin-page.php' );

/* Display Fly-in CTA! */  
 if( get_option('cpcta-enabled') ) { // is the cta enabled?
	$displayOn = get_option('cpcta-display-on'); // what pages do you want to display on?
	//display only on homepage
	if($displayOn == 'home'){
		add_action('template_redirect','display_on_home');
		function display_on_home() {
			if( is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on interior pages
	} elseif($displayOn == 'pages'){
		add_action('template_redirect','display_on_pages');
		function display_on_pages() {
			if( is_page() && !is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on posts
	} elseif($displayOn == 'posts'){
		add_action('template_redirect','display_on_posts');
		function display_on_posts() {
			if( is_single() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display on a custom post type
	} elseif(strpos($displayOn, 'cpt-') !== false){	
		function display_on_cpt(){
			$displayOn = get_option('cpcta-display-on'); //apparently unable to pass this variable through the function? forced to requery
			//remove the cpt- prefix passed from the admin page value
			$selected_post_type = str_replace("cpt-", "", $displayOn);
			//check if the current page is a post of the selected post type
			if( get_post_type() == $selected_post_type ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
		add_action('template_redirect','display_on_cpt');
	//display only on a specific page
	} elseif($displayOn == 'specific-page'){
		add_action('template_redirect','display_specific_page');
		function display_specific_page() {
			if( is_page( get_option('cpcta-display-page') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on a specific post
	} elseif($displayOn == 'specific-post'){
		add_action('template_redirect','display_specific_post');
		function display_specific_post() {
			if( is_single( get_option('cpcta-display-post') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display everywhere
	} else {
		add_action('wp_footer','cpcta_display_slider');
	}
	
	function cpcta_display_slider() {
		if( get_option('cpcta-slider-type') == 'vertical' ) {
			include('css/bottom-flyin.css.php');
			include('js/bottom-flyin.js.php');
		} else if( get_option('cpcta-slider-type') == 'horizontal' ) {
			include('css/side-flyin.css.php');
			include('js/side-flyin.js.php');	
		}
	?>     
	<div class="cpcta-flyin">
        <div class="cpcta-top-bar"><?php echo get_option('cpcta-top-bar-text') ?></div>
        <div class="cpcta-content-panel">
            <span class="cpcta-close">X</span>
            <?php echo do_shortcode( get_option('cpcta-slider-body-content') ); ?>
	    </div>
	</div>
    <?php
	} //end cpcta_display_slider();
 } //end if cta_enabled
 
?>||||||| .r0
=======
<?php 
/*
 Plugin Name: Casper's Flyin' Call-to-Action
 Plugin URI: https://www.ironistic.com
 Description: Lightweight, highly customizable call-to-action plugin. Go to Appearance -> Fly-in CTA to manage.
 Version: 1.3.1
 Author: Casey James Perno @ Ironistic
 Author URI: https://www.ironistic.com/team/casey-james-perno/
 License: GPL2
*/

/******* enqueue scripts, styles, and theme/common plugin support *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/scripts-and-support.php' );
/******* create db options/settings *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/options.php' );
/******* create the admin page and menu item *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/admin/admin-page.php' );

/* Display Fly-in CTA! */  
 if( get_option('cpcta-enabled') ) { // is the cta enabled?
	$displayOn = get_option('cpcta-display-on'); // what pages do you want to display on?
	//display only on homepage
	if($displayOn == 'home'){
		add_action('template_redirect','display_on_home');
		function display_on_home() {
			if( is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on interior pages
	} elseif($displayOn == 'pages'){
		add_action('template_redirect','display_on_pages');
		function display_on_pages() {
			if( is_page() && !is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on posts
	} elseif($displayOn == 'posts'){
		add_action('template_redirect','display_on_posts');
		function display_on_posts() {
			if( is_single() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display on a custom post type
	} elseif(strpos($displayOn, 'cpt-') !== false){	
		function display_on_cpt(){
			$displayOn = get_option('cpcta-display-on'); //apparently unable to pass this variable through the function? forced to requery
			//remove the cpt- prefix passed from the admin page value
			$selected_post_type = str_replace("cpt-", "", $displayOn);
			//check if the current page is a post of the selected post type
			if( get_post_type() == $selected_post_type ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
		add_action('template_redirect','display_on_cpt');
	//display only on a specific page
	} elseif($displayOn == 'specific-page'){
		add_action('template_redirect','display_specific_page');
		function display_specific_page() {
			if( is_page( get_option('cpcta-display-page') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on a specific post
	} elseif($displayOn == 'specific-post'){
		add_action('template_redirect','display_specific_post');
		function display_specific_post() {
			if( is_single( get_option('cpcta-display-post') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display everywhere
	} else {
		add_action('wp_footer','cpcta_display_slider');
	}
	
	function cpcta_display_slider() {
		if( get_option('cpcta-slider-type') == 'vertical' ) {
			include('css/bottom-flyin.css.php');
			include('js/bottom-flyin.js.php');
		} else if( get_option('cpcta-slider-type') == 'horizontal' ) {
			include('css/side-flyin.css.php');
			include('js/side-flyin.js.php');	
		}
	?>     
	<div class="cpcta-flyin">
        <div class="cpcta-top-bar"><?php echo get_option('cpcta-top-bar-text') ?></div>
        <div class="cpcta-content-panel">
            <span class="cpcta-close">X</span>
            <?php echo do_shortcode( get_option('cpcta-slider-body-content') ); ?>
	    </div>
	</div>
    <?php
	} //end cpcta_display_slider();
 } //end if cta_enabled
 
?>>>>>>>> .r1459666
