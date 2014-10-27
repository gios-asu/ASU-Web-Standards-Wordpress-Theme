<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package wptemplate-gios-v1
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function wptemplate_gios_v1_jetpack_setup() {
  add_theme_support(
      'infinite-scroll', 
      array(
        'container' => 'main',
        'footer'    => 'page',
      ) 
  );
}
add_action( 'after_setup_theme', 'wptemplate_gios_v1_jetpack_setup' );
