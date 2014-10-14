<?php
/**
 * asu-wordpress-web-standards functions and definitions
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress-web-standards
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'asu_wordpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function asu_wordpress_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wptemplate-gios-v1, use a find and replace
	 * to change 'wptemplate-gios-v1' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wptemplate-gios-v1', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'asu_wordpress' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wptemplate_gios_v1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

  $custom_header_defaults = array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );
  add_theme_support( 'custom-header', $custom_header_defaults );

}
endif; // end asu_wordpress_setup
add_action( 'after_setup_theme', 'asu_wordpress_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wptemplate_gios_v1_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wptemplate-gios-v1' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'left footer', 'wptemplate-gios-v1' ),
		'id'            => 'left-footer-sidebar',
		'description'   => 'Footer aligned left',
		'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'right footer', 'wptemplate-gios-v1' ),
		'id'            => 'right-footer-sidebar',
		'description'   => 'Footer aligned right',
		'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'center footer', 'wptemplate-gios-v1' ),
		'id'            => 'center-footer-sidebar',
		'description'   => 'Footer centered',
		'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
} 
add_action( 'widgets_init', 'wptemplate_gios_v1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wptemplate_gios_v1_scripts() {
  wp_register_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.min.js', array(), '4.8.2', true );
  wp_enqueue_script( 'smoothscroll' );

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap-3.1.1-dist/	js/bootstrap.min.js', array( 'jquery' ), '3.1.1', true );
  wp_enqueue_script( 'bootstrap-js' );
  wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap-3.1.1-dist/css/bootstrap.min.css', array(), '3.1.1', 'all' );
  wp_register_style( 'bootstrap-theme-css', get_template_directory_uri() . '/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css', array(), '3.1.1', 'all' );
  wp_register_style( 'bootstrap-asu', get_template_directory_uri() . '/asu-web-standards/css/bootstrap-asu.css', array(), '0.0.1', 'all' );
  wp_register_style( 'bootstrap-asu-theme-base', get_template_directory_uri() . '/asu-web-standards/css/bootstrap-asu-theme-base.css', array(), '0.0.1', 'all' );
  
  wp_enqueue_style( 'bootstrap-css' );
  wp_enqueue_style( 'bootstrap-asu' );
  wp_enqueue_style( 'bootstrap-asu-theme-base' );
  wp_enqueue_style( 'bootstrap-asu-theme' );
  //wp_enqueue_style( 'bootstrap-theme-css' );

  wp_register_style( 'font-awesome-css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), false, 'all' );
  wp_enqueue_style( 'font-awesome-css');
    
  wp_enqueue_style( 'child-style', get_stylesheet_uri() ); 
	wp_enqueue_script( 'wptemplate-gios-v1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'wptemplate-gios-v1-sticky-nav', get_template_directory_uri() . '/js/sticky-nav-custom.js', array(), false, true );
	// wp_enqueue_script( 'wptemplate-gios-v1-stickUp', get_template_directory_uri() . '/js/stickUp.min.js', array(), false, true );
	wp_enqueue_script( 'wptemplate-gios-v1-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  /** asu header*/
  wp_register_script( 'asu-header', get_template_directory_uri() . '/asu-header/js/asu-header.js', array() , '4.0', false );
  wp_enqueue_script( 'asu-header' );
  wp_register_style( 'asu-header-css', get_template_directory_uri() . '/asu-header/css/asu-nav.css', array(), false, 'all' );
  wp_enqueue_style( 'asu-header-css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wptemplate_gios_v1_scripts' );

/**
 *   This line will prevent WordPress from automatically inserting HTML line breaks in your posts. If you dont do this, some of the Bootstrap snippets that we are going to add will probably not display correctly.
 */
//remove_filter ('the_content', 'wpautop');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Register custom navigation walker
 */
require_once ('wp_bootstrap_navwalker.php');

function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');
 

/**
 * Custom theme manager
 */
function wordpress_asu_customize_register( $wp_customize ) {
  // Special theme settings
  // - Site Title & Tagline
  // -- Parent Org (if Applicable)
  // -- Parent Org Link (if Applicable)

  $wp_customize->add_section( 'wordpress_asu_theme_section' , array(
    'title'      => __('School Information','asu_wordpress'),
    'priority'   => 30,
  ));

  //  =============================
  //  = Organization Input Text   =
  //  =============================
  $wp_customize->add_setting('wordpress_asu_theme_options[org]', array(
      'default'        => '',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

  ));

  $wp_customize->add_control('wordpress_asu_org_text', array(
      'label'      => __('Parent Organization', 'asu_wordpress'),
      'section'    => 'wordpress_asu_theme_section',
      'settings'   => 'wordpress_asu_theme_options[org]',
  ));

  //  =============================
  //  = Organization Input Link   =
  //  =============================
  $wp_customize->add_setting('wordpress_asu_theme_options[org_link]', array(
      'default'        => '',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

  ));

  $wp_customize->add_control('wordpress_asu_org_link', array(
      'label'      => __('Parent Organization Link', 'asu_wordpress'),
      'section'    => 'wordpress_asu_theme_section',
      'settings'   => 'wordpress_asu_theme_options[org_link]',
  ));

  //  =============================
  //  = Address                   =
  //  =============================
  $wp_customize->add_setting('wordpress_asu_theme_options[address]', array(
      'default'        => '',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

  ));

  $wp_customize->add_control('wordpress_asu_address', array(
      'label'      => __('Address', 'asu_wordpress'),
      'section'    => 'wordpress_asu_theme_section',
      'settings'   => 'wordpress_asu_theme_options[address]',
      'type'       => 'textarea',
  ));

  //  =============================
  //  = Phone                     =
  //  =============================
  $wp_customize->add_setting('wordpress_asu_theme_options[phone]', array(
      'default'        => '',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

  ));

  $wp_customize->add_control('wordpress_asu_phone', array(
      'label'      => __('Phone Number', 'asu_wordpress'),
      'section'    => 'wordpress_asu_theme_section',
      'settings'   => 'wordpress_asu_theme_options[phone]',
  ));

  //  =============================
  //  = Fax                       =
  //  =============================
  $wp_customize->add_setting('wordpress_asu_theme_options[fax]', array(
      'default'        => '',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',

  ));

  $wp_customize->add_control('wordpress_asu_fax', array(
      'label'      => __('Phone Number', 'asu_wordpress'),
      'section'    => 'wordpress_asu_theme_section',
      'settings'   => 'wordpress_asu_theme_options[fax]',
  ));
}
add_action( 'customize_register', 'wordpress_asu_customize_register' );