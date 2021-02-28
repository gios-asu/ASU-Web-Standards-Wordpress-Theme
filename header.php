<?php
/**
 * The Header for the ASU Wordpress theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 *
 * @package asu-wordpress-web-standards
 */

$home_url         = esc_url( home_url( '/' ) );
$theme_color      = false;
$subsite_menu     = false;
$parent_blog_name = false;
$site_title_attr  = '';
$menu_item_attr   = '';
$asu_analytics    = false;

// Check if we have options set
if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
  $c_options = get_option( 'wordpress_asu_theme_options' );

  //  =============================
  //  = Title Font Size           =
  //  =============================
  // Do we have an title_font_size?
  if ( array_key_exists( 'title_font_size', $c_options ) &&
         $c_options['title_font_size'] !== '' ) {
    $title_font_size = $c_options['title_font_size'];

    if ( is_numeric( $title_font_size ) ) {
      // TODO refactor these constants
      if ( $title_font_size >= 21 && $title_font_size <= 24 ) {
        $site_title_attr .= 'font-size: ' . intval( $title_font_size ) . 'px;';
      }
    }
  }

  //  =============================
  //  = Menu Padding Size         =
  //  =============================
  // Do we have an menu_item_padding?
  if ( array_key_exists( 'menu_item_padding', $c_options ) &&
         $c_options['menu_item_padding'] !== '' ) {
    $menu_item_padding = $c_options['menu_item_padding'];

    if ( is_numeric( $menu_item_padding ) ) {
      $menu_item_attr .= '
        padding-left: ' . intval( $menu_item_padding ) . 'px !important;
        padding-right: ' . intval( $menu_item_padding ) . 'px !important;
      ';
    }
  }


  // Do we have a 404 image?
  if ( isset( $c_options ) &&
       array_key_exists( 'theme_color', $c_options ) &&
       $c_options['theme_color'] !== '' ) {
    $theme_color = $c_options['theme_color'];
  }

  // Are we a subsite?
  if ( isset( $c_options ) &&
       array_key_exists( 'subsite', $c_options ) &&
       false !== $c_options['subsite'] ) {

    // Is the parent blog id set?
    if ( array_key_exists( 'parent_blog_id', $c_options ) &&
         '' !== $c_options['parent_blog_id'] ) {
      // ====================
      // Create Subnavigation
      // ====================
      $subsite_menu = intval( $c_options['parent_blog_id'] );

      // Do we have a custom blog name?
      if ( array_key_exists( 'parent_blog_name', $c_options ) &&
         '' !== $c_options['parent_blog_name'] ) {
        $parent_blog_name = $c_options['parent_blog_name'];
      }

      // ===============
      // Switching Blogs
      // ===============
      // @codingStandardsIgnoreStart
      if ( is_multisite() ) {
        global $blog_id;
        $current_blog_id = $blog_id;
        // the switch_to_blog function is only defined if we're running on multisite
        switch_to_blog( $subsite_menu );

        if ( false === $parent_blog_name ) {
          $parent_blog_name = get_bloginfo( 'name' );
        }

        ob_start();

        $wrapper  = <<<HTML
          <li class="dropdown" id="%s" class="%s">
            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
              <i class="fa fa-bars"></i>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li class="dropdown-title">{$parent_blog_name}</li>
              %s
            </ul>
          </li>
HTML;

        wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'depth'             => 1,
              'container'         => null,
              'walker'            => new WP_Bootstrap_Dropdown_Navwalker(),
              'items_wrap'        => $wrapper,
            )
        );
        $subsite_menu = ob_get_contents();
        ob_end_clean();
        switch_to_blog( $current_blog_id );
      }
      // @codingStandardsIgnoreEnd
      // ==============
      // Switching Back
      // ==============
    }
  }

  // Do we have an asu_analytics setting?
  if ( array_key_exists( 'asu_analytics', $c_options ) && $c_options['asu_analytics'] !== '' ) {
    $asu_analytics = $c_options['asu_analytics'];
  }
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <?php if ( is_user_logged_in() ) { ?>
    <style  type="text/css" media="screen">
      .navbar-ws.affix {
        top: 32px !important;
      }

      #wpadminbar {
        z-index: 999999 !important;
      }
    </style>
  <?php } ?>

  <?php if ( false !== $theme_color ) : ?>
    <style type="text/css" media="screen">
    .theme-color-background {
      background: <?php echo esc_attr( $theme_color ); ?>;
    }

    figure[class^="effect-"] {
      background: <?php echo esc_attr( $theme_color ); ?>;
    }
    </style>
  <?php endif; ?>

  <style>
    @media (max-width: 1200px) {
      .navbar-ws .navbar-nav>li>a {
        <?php echo esc_attr( $menu_item_attr ); ?>
      }
    }
  </style>
</head>

<body <?php body_class(); ?>>
  <a href="#skippy" class="sr-only sr-only-focusable" tabindex="0">Skip to Content</a>

  <?php
  // Do we have asu_analytics?
  if ( $asu_analytics ) {
    if ( $asu_analytics <> 'disable' ) {
      // Include the 'analytics-body-tracking-codes.php' file to run script for running analytics. If not, the
      // file containing the script isn't included and it does not run.
      include_theme_file( 'analytics-body-tracking-codes.php' );
    } // else: ASU Analytics is disabled.
  }
  else { // If customize option is not present, enable tracking by default.
      include_theme_file( 'analytics-body-tracking-codes.php' );
  }
  ?>

  <div id="page-wrapper">
    <div id="page">
        <?php
            include_theme_file( 'assets/asu-header/component.html' );
        ?>
        <span id="skippy" class="sr-only"></span>
