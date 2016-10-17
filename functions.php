<?php
/**
 * Broden functions and definitions
 *
 * @package Broden
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1070; /* pixels */
}

if ( ! function_exists( 'broden_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function broden_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Broden, use a find and replace
	 * to change 'Broden' to the name of your theme in all the template files
	 */
	load_theme_textdomain('broden', get_template_directory() . '/languages');

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support('automatic-feed-links');

	/* Add theme support for title tag (since wp 4.1) */
	add_theme_support( 'title-tag' );

	/*
	 * Background Support
	 */
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff') );
	

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video', 'audio', 'gallery'
	) );

	/**
	 * Theme resize image
	 */
	add_theme_support('post-thumbnails');
	add_image_size( 'broden-featured-style-1', 550, 605, true);
	add_image_size( 'broden-featured-style-2', 650, 650, true);
	add_image_size( 'broden-featured-style-3', 1200, 700, true);
	add_image_size( 'broden-trending-style-1', 750, 632, true);
	add_image_size( 'broden-trending-style-2', 570, 370, true);
	add_image_size( 'broden-menu-thumb', 300, 180, true);
	add_image_size( 'broden-grid-small', 150, 150, true);
	add_image_size( 'broden-grid-medium', 670, 670, true);
	add_image_size( 'broden-grid-large', 980, 660, true);
	add_image_size( 'broden-post-type-thumb', 770, 560, true);
	add_image_size( 'broden-post-type-single', 1280, 768, true);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
            'primary' => esc_html__('Header Menu', 'broden'),
            'secondary' => esc_html__('Mobile Menu', 'broden'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	  * Woocommerce
	  */
	 add_theme_support('woocommerce');

}
endif;
add_action('after_setup_theme', 'broden_setup');


/**
 * Enqueue scripts and styles
 */
function broden_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awsome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/css/jquery.scrollbar.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'mobile-app', get_template_directory_uri() . '/css/mobile-app.css' );

	wp_register_script('ajax-app', get_template_directory_uri() . '/js/ajax.js', array('jquery'), null, TRUE);
	wp_localize_script( 'ajax-app', 'themeajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script('ajax-app');

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'scrollbar-js', get_template_directory_uri() . '/js/jquery.scrollbar.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'sticky-sidebar-js', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'justifiedGallery-js', get_template_directory_uri() . '/js/jquery.justifiedGallery.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'hoverIntent' );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom-app.js', array( 'jquery' ), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action('wp_enqueue_scripts', 'broden_scripts');


/**
 * Authors Social Links
 */
function broden_contactmethods( $contactmethods ) {

	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['pinterest'] = 'Pinterest Username';
	$contactmethods['tumblr']    = 'Tumblr Username';

	return $contactmethods;
}
add_filter('user_contactmethods','broden_contactmethods',10,1);


/**
 * Custom The Excpert
 */
function broden_custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'broden_custom_excerpt_length', 999 );

function broden_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

/**
 * Post Views
 */
function broden_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

function broden_set_post_views($postID) {
	if (is_single()) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
* Sidebars % Widgets
*/
require get_template_directory() . '/inc/sidebars.php';
require get_template_directory() . '/inc/widgets.php';

/**
* Custom Walker Menu
*/
require get_template_directory() . '/inc/custom-walker-menu.php';

/**
* Theme Plugins
*/
require get_template_directory() . '/inc/theme-metaboxes.php';
require get_template_directory() . '/plugins/plugin-list.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer_style.php';