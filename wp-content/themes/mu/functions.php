<?php
/**
 * MusicUnites functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MusicUnites
 */

if ( ! function_exists( 'mu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mu_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MusicUnites, use a find and replace
	 * to change 'mu' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mu', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'mu' ),
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
	add_theme_support( 'custom-background', apply_filters( 'mu_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mu_content_width', 900 );
}
add_action( 'after_setup_theme', 'mu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mu_scripts() {
	wp_enqueue_style( 'mu-style', get_stylesheet_uri() );

	if (is_page_template('page-templates/page-home.php')) {
		wp_enqueue_style( 'mu-homepage-style' , get_template_directory_uri() . '/layouts/content.css');
	}

	wp_enqueue_script( 'mu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mu_scripts' );

//Add Google Fonts
function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Playfair+Display|Roboto');
            wp_enqueue_style( 'googleFonts');
        }

add_action('wp_print_styles', 'load_fonts');

//Add Font-Awesome
function enqueue_fa(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts','enqueue_fa');

//Removing extra p & br tags on upload from editor
remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );

register_sidebar(array(
'name' => 'Footer Widget 1',
'id'        => 'footer-1',
'description' => 'First footer widget area',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 2',
'id'        => 'footer-2',
'description' => 'Second footer widget area',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'Footer Widget 3',
'id'        => 'footer-3',
'description' => 'Third footer widget area',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
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
