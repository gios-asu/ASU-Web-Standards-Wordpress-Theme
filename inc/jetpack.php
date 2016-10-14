<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.com/
 *
 * @package asu-wordpress-web-standards-theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.com/support/infinite-scroll/
 */
function asu_webstandards_jetpack_setup() {
  add_theme_support(
      'infinite-scroll',
      array(
        'container' => 'main',
        'footer'    => 'page',
      )
  );
}
add_action( 'after_setup_theme', 'asu_webstandards_jetpack_setup' );
