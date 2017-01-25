<?php
/**
 * cjc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cjc
 */

if ( ! function_exists( 'cairo_jazz_club_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cairo_jazz_club_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cjc, use a find and replace
	 * to change 'cairo-jazz-club' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cairo-jazz-club', get_template_directory() . '/languages' );

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

	// Add Image Sizes
	add_image_size('blog',960,500, true);
	add_image_size('event-calendar', 163, 125, true);
	add_image_size('circle', 280, 280, true);
	add_image_size('hero-mfp', 728, 9999);
	add_image_size('modal-bleed', 560, 250, true);
	add_image_size('night-logo', 260, 185, true);
	add_image_size('product', 200, 250, true);
	add_image_size('album', 720, 500, true);
	add_image_size('footer-ad', 800, 481, true);
	add_image_size('icon', 52, 52, true);

	// This theme uses wp_nav_menu() in 3 locations.
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Primary', 'cairo-jazz-club' ),
		'footer-menu'=> esc_html__( 'Footer Menu', 'cairo-jazz-club' ),
		'copyrights-menu' => esc_html__( 'Copyrights Menu', 'cairo-jazz-club' ),
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

	/*// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cairo_jazz_club_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme Support
	add_theme_support( 'menus' );
}
endif;
add_action( 'after_setup_theme', 'cairo_jazz_club_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cairo_jazz_club_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cairo_jazz_club_content_width', 640 );
}
add_action( 'after_setup_theme', 'cairo_jazz_club_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cairo_jazz_club_widgets_init() {
	/*
	register_sidebar( array(
		'name'		  => esc_html__( 'Sidebar', 'cairo-jazz-club' ),
		'id'			=> 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cairo-jazz-club' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	*/
	register_sidebar( array(
		'name'		  => esc_html__( 'Footer Widget area Right (small)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-right',
		'description'   => esc_html__( 'a widget area in the footer on the right side , size small', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'		  => esc_html__( 'Footer Widget area Center (large)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-center',
		'description'   => esc_html__( 'a widget area in the footer in center , size large', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'		  => esc_html__( 'Footer Widget area left (small)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-left',
		'description'   => esc_html__( 'a widget area in the footer on the left side , size small', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cairo_jazz_club_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cairo_jazz_club_scripts() {
	// jquery
 	wp_enqueue_script( 'jquery' );

	wp_enqueue_style( 'cairo-jazz-club-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cairo-jazz-club-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cairo-jazz-club-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//google fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700' );
	// Skrollr
	wp_enqueue_style( 'skrollr-style', get_template_directory_uri().'/css/skrollr.css' );
	// Bootstrap
	wp_enqueue_style( "bootstrap", 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
	wp_enqueue_style( "bootstrap-theme", 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );

	// sprites
	wp_enqueue_style("sprites",get_template_directory_uri()."/css/sprites.css");

	if(is_rtl()){
		// Load Bootstrap RTL theme from RawGit
		// Bootstrap RTL Layer, requires bootstrap and bootstrap-theme
		wp_enqueue_style( "bootstrap-rtl", '//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css',array( 'bootstrap' , 'bootstrap-theme' ) );
		// Main styles rtl
		wp_enqueue_style( "main-ltr", get_template_directory_uri()."/css/main-rtl.css", array( 'bootstrap', 'bootstrap-theme' ) );
	}else{
		// Main styles ltr
		wp_enqueue_style( "main-ltr", get_template_directory_uri()."/css/main-ltr.css", array( 'bootstrap', 'bootstrap-theme' ) );
	}
	// Bootstrap js
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true );
	// Modernizer, feature detection library
	wp_enqueue_script( 'modernizr', get_template_directory_uri()."/js/vendor/modernizr-2.8.0.min.js", array(), null );
	// custom scripts
	wp_enqueue_script( 'cjc-plugins', get_template_directory_uri().'/js/min/plugins.min.js', array('jquery'), null, true);
	wp_enqueue_script( 'cjc-main', get_template_directory_uri().'/js/min/main.min.js', array('jquery'), null, true);
}
add_action( 'wp_enqueue_scripts', 'cairo_jazz_club_scripts' );

/**
 * add editor styles.
 */
add_editor_style(array(
	get_stylesheet_uri(),
	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
	'https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700',
	get_template_directory_uri().'/css/skrollr.css',
	get_template_directory_uri()."/css/sprites.css",
	get_template_directory_uri()."/css/main-ltr.css",
	get_template_directory_uri()."/css/editor-style.css"
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

/**
 * Load mcustomizer class.
 */
require get_template_directory() . '/inc/mcustomizer.php';

/**
 * Load advanced search liberary
 */
require_once get_template_directory() . '/inc/wp-advanced-search/wpas.php';

/**
 * Load cjc widgets
 */
require_once get_template_directory() . '/widgets/register-widgets.php';

/**
 * Load cjc shortcodes
 */
require_once get_template_directory() . '/short-codes/load-shortcodes.php';