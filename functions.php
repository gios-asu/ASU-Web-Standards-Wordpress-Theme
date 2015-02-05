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
   * If you're building a theme based on asu-wordpress-web-standards-theme, use a find and replace
   * to change 'asu-wordpress-web-standards-theme' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'asu-wordpress-web-standards-theme', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
      array(
        'primary' => __( 'Primary Menu', 'asu_wordpress' ),
        'secondary' => __( 'Footer Menu', 'asu_wordpress' ),
      ) 
  );
  
  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
      'html5', 
      array(
          'search-form',
          'comment-form',
          'comment-list',
          'gallery',
          'caption',
      )
  );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support(
      'post-formats', 
      array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
      )
  );

  // Setup the WordPress core custom background feature.
  add_theme_support(
      'custom-background',
      apply_filters(
          'asu_webstandards_custom_background_args', 
          array(
            'default-color' => 'ffffff',
            'default-image' => '',
          )
      )
  );

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
function asu_webstandards_widgets_init() {
  register_sidebar(
      array(
        'name'          => __( 'Sidebar', 'asu-wordpress-web-standards-theme' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      )
  );
  register_sidebar(
      array(
        'name'          => __( 'left footer', 'asu-wordpress-web-standards-theme' ),
        'id'            => 'left-footer-sidebar',
        'description'   => 'Footer aligned left',
        'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      )
  );
  register_sidebar(
      array(
        'name'          => __( 'right footer', 'asu-wordpress-web-standards-theme' ),
        'id'            => 'right-footer-sidebar',
        'description'   => 'Footer aligned right',
        'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      )
  );
  register_sidebar(
      array(
        'name'          => __( 'center footer', 'asu-wordpress-web-standards-theme' ),
        'id'            => 'center-footer-sidebar',
        'description'   => 'Footer centered',
        'before_widget' => '<div id="%1$s" class="widget %2$s  ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      )
  );
} 
add_action( 'widgets_init', 'asu_webstandards_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asu_webstandards_scripts() {
  wp_register_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array(), '4.8.2', true );
  wp_enqueue_script( 'smoothscroll' );

  // Wordpress provides jquery, but we enque our own mainly so we include it in the footer and control the version. 
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', array(), '1.11.2', true );
  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-3.1.1-dist/ js/bootstrap.min.js', array( 'jquery' ), '3.1.1', true );
  wp_enqueue_script( 'bootstrap-js' );
  wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap-3.1.1-dist/css/bootstrap.min.css', array(), '3.1.1', 'all' );
  wp_register_style( 'bootstrap-theme-css', get_template_directory_uri() . '/assets/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css', array(), '3.1.1', 'all' );
  wp_register_style( 'bootstrap-asu', get_template_directory_uri() . '/assets/asu-web-standards/css/bootstrap-asu.css', array(), '0.0.7', 'all' );
  wp_register_style( 'bootstrap-asu-theme-base', get_template_directory_uri() . '/assets/asu-web-standards/css/bootstrap-asu-theme-base.css', array(), '0.0.7', 'all' );
  wp_register_script( 'bootstrap-asu-js', get_template_directory_uri() . '/assets/asu-web-standards/js/bootstrap-asu.js', array(), '0.0.7', true );
  wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.custom.js', array(), '2.8.3', true );
  wp_register_script( 'moment-js', get_template_directory_uri() . '/assets/js/moment-with-locales.min.js', array(), '2.8.4', true );
  
  wp_enqueue_style( 'bootstrap-css' );
  wp_enqueue_style( 'bootstrap-asu' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'modernizr' );
  wp_enqueue_script( 'moment-js' );
  wp_enqueue_script( 'bootstrap-asu-js' );
  wp_enqueue_style( 'bootstrap-asu-theme-base' );
  wp_enqueue_style( 'bootstrap-asu-theme' );
  //wp_enqueue_style( 'bootstrap-theme-css' );

  wp_register_style( 'font-awesome-css', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), false, 'all' );
  wp_enqueue_style( 'font-awesome-css' );

  wp_register_style( 'base-wordpress-theme', get_template_directory_uri() . '/style.css', array(), false, 'all' );
  wp_enqueue_style( 'base-wordpress-theme' );
    
  wp_enqueue_style( 'child-style', get_stylesheet_uri() ); 
  wp_enqueue_script( 'asu-wordpress-web-standards-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
  wp_enqueue_script( 'asu-wordpress-web-standards-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

  /** asu header*/
  wp_register_script( 'asu-header', get_template_directory_uri() . '/assets/asu-header/js/asu-header.js', array() , '4.0', true );
  wp_enqueue_script( 'asu-header' );
  wp_register_style( 'asu-header-css', get_template_directory_uri() . '/assets/asu-header/css/asu-nav.css', array(), false, 'all' );
  wp_enqueue_style( 'asu-header-css' );

  /** ie 8 respondsive */
  /** @see https://github.com/scottjehl/Respond */
  wp_enqueue_script( 'asu-wordpress-web-standards-respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '20150115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'asu_webstandards_scripts' );

/**
 * This line will prevent WordPress from automatically inserting HTML 
 * line breaks in your posts. If you dont do this, some of the 
 * Bootstrap snippets that we are going to add will 
 * probably not display correctly.
 */
remove_filter( 'the_content', 'wpautop' );
//add_filter( 'the_content', 'wpautop' , 99 );
//add_filter( 'the_content', 'shortcode_unautop', 100 );
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
 * Customizer additions.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Register custom navigation walker
 */
require_once ( 'wp-bootstrap-navwalker.php' );
require_once ( 'wp-bootstrap-footer-navwalker.php' );

function add_first_and_last( $output ) {
  // $output       = preg_replace( '/menu-item/', 'first-menu-item menu-item', $output, 1 );
  // $class_pos    = strripos( $output, 'class="menu-item' );
  // $class_length = strlen( 'class="menu-item' );

  // $output = substr_replace( $output, 'class="last-menu-item menu-item', $class_pos,  $class_length );
  return $output;
}

add_filter( 'wp_nav_menu', 'add_first_and_last' );


function change_default_template_name( $translation, $text, $domain ) {
    if ( $text == 'Default Template' ) {
        return __( 'Containered Template', 'asu-wordpress-web-standards-theme' );
    }
    return $translation;
}
add_filter( 'gettext', 'change_default_template_name', 10, 3 );


add_action( 'wp_head', 'asu_webstandards_favicons' );

/** 
 * asu_webstandards_favicons header hook, provides links to the favicons from the asu-web-standards
 */
function asu_webstandards_favicons() {
  ?>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="<?php echo bloginfo('name'); ?>"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-310x310.png" />
  <?php
}


