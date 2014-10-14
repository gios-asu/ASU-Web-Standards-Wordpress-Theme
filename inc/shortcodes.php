<?php
/**
 * Shortcodes used for simplifying Bootstrap code
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress-web-standards
 */


if ( ! function_exists( 'asu_wp_container_shortcode' ) ) :
/**
 * Containers with gray option
 * 
 * @param atts - associative array.  Only checks for the existance of gray key
 */
function asu_wp_container_shortcode( $atts, $content = null ) {
  $container = '<div class="container"><div class="row">%1$s</div></div>';

  if ( $atts != null && array_key_exists( 'gray', $atts ) ) {
    $wrap_container = '<div class="gray-back">%1$s</div>';

    $container = sprintf( $wrap_container, $container );
  }

  return do_shortcode( sprintf( $container, $content ) );
}
add_shortcode( 'container', 'asu_wp_container_shortcode' );
endif;

if ( ! function_exists( 'asu_wp_sidebar_shortcode' ) ) :
/**
 * Navbar with group parameters
 * 
 * @param $atts - associative array. You can override 'title'.
 * @param $content - content should be of the form 'text|#id' with one on each line.
 */
function asu_wp_sidebar_shortcode( $atts, $content = null ) {
  $container = '<div id="sidebarNav" class="sidebar-nav affix-top"><h4>%1$s</h4>%2$s</div>';
  $list = '<div class="list-group">%s</div>';
  $list_item = '<a class="list-group-item" data-scroll="" href="%1$s">%2$s</a>';
  $title = 'Navigate this Doc';

  if ( $atts != null && array_key_exists( 'title', $atts ) ) {
    $title = $atts['title'];
  }

  $user_list_items = explode( '\n', str_replace( '<br />', '\n', $content ) );
  $user_list_items_inst = '';
  foreach ($user_list_items as $_ => $value) {
    // [0] => Text, [1] => link
    $item_parts = explode( '|', $value );

    if ( count( $item_parts ) <= 1)
      continue;

    $user_list_item_inst = sprintf ($list_item, trim( $item_parts[1] ), trim( $item_parts[0] ) );
    $user_list_items_inst .= $user_list_item_inst;
  }

  $list = sprintf($list, $user_list_items_inst);

  return do_shortcode( sprintf( $container, $title, $list ) );
}
add_shortcode( 'sidebar', 'asu_wp_sidebar_shortcode' );
endif;

?>