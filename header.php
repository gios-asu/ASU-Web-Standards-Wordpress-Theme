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

$home_url  = esc_url( home_url( '/' ) );
$ping_back = get_bloginfo( 'pingback_url' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php if ( ! empty( $ping_back ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>

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
</head>

<body <?php body_class(); ?>>
  <div id="page-wrapper">
    <div id="page">
      <div id="asu_header">
        <?php include 'header-asu.php'; ?>

        <div id="site-name-desktop" class="section site-name-desktop">
          <div class="container">
            <h1 class="site-title" id="asu_school_name">
              <?php
                // Print the parent organization and its link
              $prefix   = '<span class="first-word">%1$s</span>&nbsp;|&nbsp;';
              $cOptions = get_option( 'wordpress_asu_theme_options' );

                // Do we have a parent org?
              if ( isset( $cOptions ) && is_array( $cOptions ) &&
                       array_key_exists( 'org', $cOptions ) &&
                       $cOptions['org'] !== '' ) {
                  // Does the parent org have a link?
                if ( array_key_exists( 'org_link', $cOptions ) &&
                       $cOptions['org_link'] !== '' ) {
                    $wrapper = '<a href="%1$s" id="org-link-site-title">%2$s</a>';

                    $wrapper = sprintf( $wrapper, esc_html( $cOptions['org_link'] ), '%1$s' );
                    $prefix  = sprintf( $prefix, $wrapper );
                }

                echo wp_kses( sprintf( $prefix, esc_html( $cOptions['org'] ) ), wp_kses_allowed_html( 'post' ) );
              }
              ?>
              <a href="<?php echo esc_url( home_url() ); ?>" id="blog-name-site-title"><?php bloginfo( 'name' ); ?></a>
            </h1>
          </div>
        </div>
      </div>

      <!-- Global Navigation -->
      <nav class="navbar navbar-ws" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ws-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
          </div>
          <?php


          $wrapper  = '<ul id="%1$s" class="%2$s">';
          $wrapper .= '<li>';
          $wrapper .= "<a href=\"$home_url\" title=\"Home\"  id=\"home-icon-main-nav\">";
          $wrapper .= '<span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span><span class="hidden-md hidden-lg">Home</span>';
          $wrapper .= '</a>';
          $wrapper .= '</li>';
          $wrapper .= '%3$s';
          $wrapper .= '</ul>';

          wp_nav_menu(
              array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 3,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'ws-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
                'items_wrap'        => $wrapper,
              )
          );
          ?>
          </div><!-- /.navbar-collapse -->
        </nav>
        <!-- End Navigation -->
