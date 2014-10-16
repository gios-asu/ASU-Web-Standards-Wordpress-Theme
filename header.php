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

$homeUrl = esc_url( home_url( '/' ) ); 
$customFields = get_post_custom();


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page-wrapper">
    <div id="page">
      <?php include "header-asu.php"; ?>


      <div class="">
        <div class="section" id="site-name-desktop">
          <div class="container">
            <h1 class="site-title">
              <?php
                // Print the parent organization and its link
                $prefix = '<span class="first-word">%1$s</span>&nbsp;|&nbsp;';
                $cOptions = get_option( 'wordpress_asu_theme_options' );

                // Do we have a parent org?
                if (isset($cOptions) && 
                    array_key_exists('org', $cOptions) &&
                    $cOptions['org'] !== '') {

                  // Does the parent org have a link?
                  if (array_key_exists('org_link', $cOptions) &&
                      $cOptions['org_link'] !== '') {

                    $wrapper = '<a href="%1$s">%2$s</a>';

                    $wrapper = sprintf($wrapper, $cOptions['org_link'], '%1$s');
                    $prefix = sprintf($prefix, $wrapper);
                  }


                  echo sprintf($prefix, $cOptions['org']);
                }
              ?>
              <a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
            </h1>
          </div>
        </div>

        <!-- Global Navigation -->
        <nav class="navbar navbar-ws" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
            <?php

            
            $wrapper = '<ul id="%1$s" class="%2$s">';
            $wrapper .= '<li>';
            $wrapper .= "<a href=\"$homeUrl\" title=\"Home\">";
            $wrapper .= '<span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span><span class="hidden-md hidden-lg">Home</span>';
            $wrapper .= '</a>';
            $wrapper .= '</li>';
            $wrapper .= '%3$s';
            $wrapper .= '</ul>';
            
            wp_nav_menu( array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'bs-example-navbar-collapse-1',
              'menu_class'        => 'nav navbar-nav',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker(),
              'items_wrap'        => $wrapper)
            );
            ?>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>
        <!-- End Navigation -->
