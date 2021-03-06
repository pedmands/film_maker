<?php
/**
 * Lance functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lance
 */

if ( ! function_exists( 'lance_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lance_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lance, use a find and replace
	 * to change 'lance' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lance', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lance' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lance_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lance_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lance_content_width', 640 );
}
add_action( 'after_setup_theme', 'lance_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lance_widgets_init() {
	 register_sidebar( array(
		'name'          => __( 'Social Widgets', 'lance' ),
        'description'   => __( 'Drop your social media links here.', 'lance'),
		'id'            => 'social-widgets',
		'before_widget' => '<aside id="%1$s" class="social %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="social-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'lance_widgets_init' );

//** Social Menu
function register_social_menu() {
  register_nav_menu('social-menu',__( 'Social Media Menu' ));
}
add_action( 'init', 'register_social_menu' );


// Custom Image Thumbnail Size
add_image_size('project-thumb', 320, 190, true);
add_image_size('billboard', 1010, 450, array( 'left', 'bottom' ));

/**
 * Enqueue scripts and styles.
 */
function lance_scripts() {
	wp_enqueue_style( 'lance-style', get_stylesheet_uri() );

	wp_enqueue_style('lance-new-styles', get_stylesheet_directory_uri() . '/css/style.css');

	wp_enqueue_style('lance-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

	wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');

	wp_enqueue_script( 'lance-custom-script', get_template_directory_uri() . '/js/lancescript.js', array('jQuery'), '20161001', true );

	wp_enqueue_script( 'lance-masonry', get_template_directory_uri() . '/js/masonry.min.js', array('jQuery'), '20161002', true );

	wp_enqueue_script( 'lance-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array('jQuery'), '20161002', true );

	wp_enqueue_script( 'lance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lance-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lance_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
