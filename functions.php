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
   * NNote that this function is hooked into the after_setup_theme hook, which
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
     *  Not to be confused with the page_feature_image custom fields for pages and posts!
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

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
        'name'          => __( 'footer', 'asu-wordpress-web-standards-theme' ),
        'id'            => 'footer-sidebar',
        'description'   => 'Footer aligned left',
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
  // Upversion this number when you include a new version of the web standards
  // This is not necessarily the version of the web standards you are using,
  // but rather a local version number of the web standards assets for WordPress
  $asu_web_standards_version = '1.1.5';

  // dependency versions
  $bootstrap_version = '3.3.8';
  $asu_header_version = '4.0.2';

  $the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/style.css' );

  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ), $bootstrap_version, true );
  wp_register_script( 'bootstrap-asu-js', get_template_directory_uri() . '/assets/asu-web-standards/js/bootstrap-asu.min.js', array(), $asu_web_standards_version, true );
  wp_enqueue_script( 'asu-wordpress-web-standards-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
  wp_enqueue_script( 'asu-wordpress-web-standards-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_register_script( 'asu-header', get_template_directory_uri() . '/assets/asu-header/js/asu-header.min.js', array() , $asu_header_version, true );
  wp_register_script( 'asu-header-config', get_template_directory_uri() . '/assets/asu-header/js/asu-header-config.js', array( 'asu-header' ) , $asu_header_version, true );

  wp_register_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,700', array(), '1' );
  wp_register_style( 'roboto-mono-font', 'https://fonts.googleapis.com/css?family=Roboto+Mono:300', array(), '1' );
  wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), $bootstrap_version, 'all' );
  wp_register_style( 'bootstrap-asu', get_template_directory_uri() . '/assets/asu-web-standards/css/bootstrap-asu.min.css', array(), $asu_web_standards_version, 'all' );
  wp_register_style( 'base-wordpress-theme', get_template_directory_uri() . '/style.css', array(), false, 'all' );
  wp_register_style( 'asu-header-css', get_template_directory_uri() . '/assets/asu-header/css/asu-nav.css', array(), $asu_header_version, 'all' );

  wp_enqueue_script( 'bootstrap-js' );
  wp_enqueue_script( 'bootstrap-asu-js' );
  wp_enqueue_script( 'asu-header-config' );
  wp_enqueue_script( 'asu-header' );

  wp_enqueue_style( 'roboto-font' );
  wp_enqueue_style( 'roboto-mono-font' );
  wp_enqueue_style( 'bootstrap-css' );
  wp_enqueue_style( 'bootstrap-asu' );
  wp_enqueue_style( 'base-wordpress-theme' );
  wp_enqueue_style( 'addon-wordpress-theme' );
  wp_enqueue_style( 'child-style', get_stylesheet_uri(), array(), $css_version );
  wp_enqueue_style( 'asu-header-css' );

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
 *  See:  https://stackoverflow.com/questions/5940854/disable-automatic-formatting-inside-wordpress-shortcodes
 */
remove_filter( 'the_content', 'wpautop' );
// add_filter( 'the_content', 'wpautop' , 99 );
// add_filter( 'the_content', 'shortcode_unautop', 100 );

/**
 * This reenables wpautop for specific post types only
 * For now, we just want to enable wpautop on Posts,
 * leaving Pages unfiltered, since wpautop causes issues
 * with Bootstrap. Posts should be fine with wpautop.
 */
function asu_webstandards_apply_wpautop_formatting( $content ) {
  if ( 'post' === get_post_type() ) {
    return wpautop( $content );
  } else {
    return $content; //no autop
  }
}
add_filter( 'the_content', 'asu_webstandards_apply_wpautop_formatting' );

/**
 * This disables the Visual Editor for Pages only
 * This allows Posts to be able to use the Visual Editor, where it is less
 * likely to cause formatting problems with our Bootstrap styling.
 */
function asu_webstandards_disable_wyswyg_for_pages( $default ) {
  global $post;
  if ( 'page' == get_post_type( $post ) ) {
    return false;
  } else {
    return $default; //no autop
  }
}
add_filter( 'user_can_richedit', 'asu_webstandards_disable_wyswyg_for_pages' );

/**
 * This adds shortcode processing to category/term descriptions
 */
add_filter( 'term_description', 'do_shortcode' );

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
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Filters
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Register custom navigation walker
 */
require_once( 'wp-bootstrap-navwalker.php' );
require_once( 'wp-bootstrap-footer-navwalker.php' );
require_once( 'wp-bootstrap-dropdown-navwalker.php' );

function add_first_and_last( $output ) {
  // $output       = preg_replace( '/menu-item/', 'first-menu-item menu-item', $output, 1 );
  // $class_pos    = strripos( $output, 'class="menu-item' );
  // $class_length = strlen( 'class="menu-item' );

  // $output = substr_replace( $output, 'class="last-menu-item menu-item', $class_pos,  $class_length );
  return $output;
}

add_filter( 'wp_nav_menu', 'add_first_and_last' );


function change_default_template_name( $translation, $text, $domain ) {
  if ( 'Default Template' == $text ) {
      return __( 'Containered Template', 'asu-wordpress-web-standards-theme' );
  }
    return $translation;
}
add_filter( 'gettext', 'change_default_template_name', 10, 3 );


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
  <meta name="application-name" content="<?php echo bloginfo( 'name' ); ?>"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/assets/asu-web-standards/img/favicon/mstile-310x310.png" />
  <?php
}
add_action( 'wp_head', 'asu_webstandards_favicons' );

/**
 * Add any additional attributes to the nav menu links.
 *  id's are nice for google in page analytics so we can see which items get clicked and under
 *  which sub-heading if a link appears in multiple places in the nav.
 * @param atts - HTML attributes in an associative array
 * @param item - Object containing item details. E.G: If the link is to a page $item will be a WP_Post object
 * @param args - Array containing config with desired markup of nav item
 * @return atts - array
 */
function asu_webstandards_custom_nav_menu_link_attributes( $atts, $item, $args ) {
  $atts['id'] = 'nav-item_'.$item->post_name;
  if ( ! empty( $item->menu_item_parent ) ) {
    // if a link to a particular page appears multiple times then we should qualifiy it with its parent menu item
    $atts['id'] .= '_under_'.$item->menu_item_parent;
  }
  $atts['class'] = 'menu-item';
  return $atts;
}

add_filter( 'nav_menu_link_attributes', 'asu_webstandards_custom_nav_menu_link_attributes', 10, 3 );


function custom_edit_post_link( $output ) {
    $output = str_replace( 'class="post-edit-link"', 'class="post-edit-link btn btn-lg btn-primary"', $output );
    return $output;
}
add_filter( 'edit_post_link', 'custom_edit_post_link' );

// Yoast Breadcrumb fix
function bybe_crumb_v_fix( $link_output ) {
  $link_output = preg_replace(
      array(
        '#<span xmlns:v="http://rdf.data-vocabulary.org/\#">#',
        '#<span typeof="v:Breadcrumb"><a href="(.*?)" .*?'.'>(.*?)</a></span>#',
        '#<span typeof="v:Breadcrumb">(.*?)</span>#',
        '# property=".*?"#','#</span>$#',
      ),
      array(
        '',
        '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>',
        '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">$1</span></span>',
        '',
        '',
      ),
      $link_output
  );

  return $link_output;
}
add_filter( 'wpseo_breadcrumb_output', 'bybe_crumb_v_fix' );

function bybe_crumb_fix( $output, $crumb ) {
  if ( is_array( $crumb ) && $crumb !== array() ) {
    if ( false !== strpos( $output, '<span class="breadcrumb_last"' ) ||
         false !== strpos( $output, '<strong class="breadcrumb_last"' ) ) {
      $output  = '<span property="v:title" rel="v:url" href="'. $crumb['url']. '" >';
      $output .= $crumb['text'];
      $output .= '</span>';
    }
  }

  return $output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'bybe_crumb_fix' , 10, 2 );


/**
 * Prevent iframing except when we are in the WordPress Admin interface.
 */
function prevent_iframes() {
  // the page is not being rendered in the
  // customizer which is a legit iframe for a site
  if ( ! is_customize_preview() ) {
    // prevent pages from being iframed
    ?>
      <style id="antiClickjack">body{display:none !important;}</style>
      <script type="text/javascript">
       if (self === top) {
           var antiClickjack = document.getElementById("antiClickjack");
           antiClickjack.parentNode.removeChild(antiClickjack);
       } else {
           top.location = self.location;
       }
      </script>
    <?php
  }
}
add_action( 'wp_head', 'prevent_iframes' );

/**
 * Prevent iframes by adding response header
 * This is a recommended primary layer of protection, with the anti-clickjack script
 * used as a reliable failback for legacy browsers.
 *
 * TODO: Review in future to replace deprecated X-Frame-Options header with
 * frame-ancestors directive (https://www.owasp.org/index.php/Clickjacking_Defense_Cheat_Sheet)
 */
function add_x_frame_options_header() {
  if ( ! is_customize_preview() ) {
    // prevent pages from being iframed
    header( 'X-Frame-Options: DENY' );
  }
}
add_action( 'send_headers', 'add_x_frame_options_header' );

/**
 * Remove oembed <link> tags from <head> so that LinkedIn previews will work
 */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');


if ( ! function_exists( 'include_theme_file' ) ) {
  /** Include a file in this theme or child theme if its present in the child theme. We can't just
   * always call include with get_stylesheet_directory()."filename" because that will require that the
   * child theme always define that file. Instead we want the child theme to optionally override files
   * that they want to change.
   */
  function include_theme_file( $filename ) {
    // error_log( get_stylesheet_directory() . DIRECTORY_SEPARATOR . $filename );
    if ( file_exists( get_stylesheet_directory() . DIRECTORY_SEPARATOR . $filename ) ) {
      include( get_stylesheet_directory() . DIRECTORY_SEPARATOR . $filename );

    } else {
      include( $filename );
      // include will throw warnings if the file isn't found
    }

  }
}
