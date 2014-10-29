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
 * Containers
 * ==========
 * 
 * Containers with gray option
 * - type=gray
 * - spacing=none
 * 
 * @param atts - associative array.  You can override 'type' to 'gray'
 */
function asu_wp_container_shortcode( $atts, $content = null ) {
  $container = '<div class="container"><div class="row %2$s">%1$s</div></div>';

  // gray container
  if ( $atts != null && array_key_exists( 'type', $atts ) ) {
    if ( $atts['type'] == 'gray' ) {
      $wrap_container = '<div class="gray-back">%1$s</div>';

      // No extra classes needed
      $container = sprintf( $container, '%1$s', '' );
      // Wrap
      $container = sprintf( $wrap_container, $container );
    }
  } else {
    if ( $atts != null &&
         array_key_exists( 'spacing', $atts ) &&
         $atts['spacing'] === 'none' ) 
    {
      // No extra classes needed
      $container = sprintf( $container, '%1$s', '' );
    } else {
      // Extra classes
      $container = sprintf( $container, '%1$s', 'space-top-xl space-bot-xl' );
    }
  
  }

  return do_shortcode( sprintf( $container, $content ) );
}
add_shortcode( 'container', 'asu_wp_container_shortcode' );
endif;


if ( ! function_exists( 'asu_wp_sidebar_shortcode' ) ) :
/**
 * Sidebar Nav
 * ===========
 * 
 * Navbar with group parameters
 * 
 * @param $atts - associative array. You can override 'title'.
 * @param $content - content should be of the form 'text|#id' with one on each line.
 */
function asu_wp_sidebar_shortcode( $atts, $content = null ) {
  $container = '<div id="sidebarNav" class="sidebar-nav affix-top"><h4>%1$s</h4>%2$s</div>';
  $list      = '<div class="list-group">%s</div>';
  $list_item = '<a class="list-group-item" data-scroll="" href="%1$s">%2$s</a>';
  $title     = 'Navigate this Doc';

  if ( $atts != null && array_key_exists( 'title', $atts ) ) {
    $title = $atts['title'];
  }

  $cleaned = str_replace( '<br />', "\n", $content );
  $cleaned = str_replace( '<br/>', "\n", $cleaned );
  $cleaned = str_replace( '<br>', "\n", $cleaned );

  $user_list_items = explode( "\n", $cleaned );
  $user_list_items_inst = '';
  foreach ( $user_list_items as $_ => $value ) {
    // [0] => Text, [1] => link
    $item_parts = explode( '|', $value );

    if ( count( $item_parts ) <= 1)
      continue;

    $user_list_item_inst   = sprintf( $list_item, trim( $item_parts[1] ), trim( $item_parts[0] ) );
    $user_list_items_inst .= $user_list_item_inst;
  }

  $list = sprintf( $list, $user_list_items_inst );

  return do_shortcode( sprintf( $container, $title, $list ) );
}
add_shortcode( 'sidebar', 'asu_wp_sidebar_shortcode' );
endif;


if ( ! function_exists( 'asu_wp_column_shortcode' ) ) :
/**
 * Columns
 * =======
 * 
 * Columns for rows
 * 
 * @param $atts - associative array. You can override 'size'.
 * @param $content - content 
 */
function asu_wp_column_shortcode( $atts, $content = null ) {
  $wrapper = '<div class="%1$s">%2$s</div>';

  if ( ! isset( $atts['size'] ) ) {
    $classes = '';
  } else {
    if ( is_numeric( $atts['size'] ) ) {
      $size = $atts['size'];  

      $mapper = array(
          '1'  => 'col-md-1',
          '2'  => 'col-md-2',
          '3'  => 'col-md-3',
          '4'  => 'col-sm-6 col-md-4',
          '5'  => 'col-sm-6 col-md-5 col-lg-4',
          '6'  => 'col-md-6',
          '7'  => 'col-sm-12 col-md-7 col-lg-8',
          '8'  => 'col-md-8',
          '9'  => 'col-md-9',
          '10' => 'col-md-10',
          '11' => 'col-md-11',
          '12' => 'col-md-12',
      );

      $classes = $mapper[$size];
    } else {
      $classes = $atts['size'];
    }
  }

  

  return do_shortcode( sprintf( $wrapper, $classes, $content ) );
}
add_shortcode( 'column', 'asu_wp_column_shortcode' );
endif;

if ( ! function_exists( 'asu_wp_panel_shortcode' ) ) :
/**
 * Panel
 * =====
 * 
 * @param $atts - associative array. You can override 'type'.
 * @param $content - content 
 */
function asu_wp_panel_shortcode( $atts, $content = null ) {
  $wrapper = '<div class="%1$s"><div class="panel-body">%2$s</div></div>';

  if ( ! isset( $atts['type'] ) ) {
    $type = '';
    $prefix_content = '';
  } else {
    $type = $atts['type'];
    $prefix_content = '<h3>Explore Our Programs</h3>';
  }

  $mapper = array(
      ''  => '',
      'explore-programs'  => 'explore-programs',
  );

  $classes = 'panel ' . $mapper[$type];

  return do_shortcode( sprintf( $wrapper, $classes, $prefix_content . $content ) );
}
add_shortcode( 'panel', 'asu_wp_panel_shortcode' );
endif;

if ( ! function_exists( 'asu_button_shortcode' ) ) :
/**
 * Buttons.
 * 
 * Attributes:
 * - Link (optional)
 * - Color (optional, defaults "default")
 * - Extra (block)
 * 
 * @param $atts - associative array.
 * @param $content - content 
 */
function asu_button_shortcode( $atts, $content = null ) {
  $button = '<button %1$s>%2$s</button>';
  $ahref  = '<a href="%3$s" %1$s>%2$s</a>';
  $result = '';

  // Check if the attributes contain a link
  if ( array_key_exists( 'link', $atts ) ) {
    $result = sprintf( $ahref, '%1$s', '%2$s', $atts['link'] );
  } else {
    $result = $button;
  }

  $class = 'class="btn ';

  $colorMap = array(
      'default'   => 'btn-default',
      'primary'   => 'btn-primary',
      'secondary' => 'btn-secondary',
      'gold'      => 'btn-gold',
      'blue'      => 'btn-blue',
      'success'   => 'btn-success',
      'info'      => 'btn-info',
      'warning'   => 'btn-warning',
      'danger'    => 'btn-danger',
      'link'      => 'btn-link',
  );

  // Check if the attributes contain a color
  if ( array_key_exists( 'color', $atts ) ) {
    if ( array_key_exists( $atts['color'], $colorMap ) ) {
      $class .= ' ' . $colorMap[$atts['color']];
    }
  } 

  $sizeMap = array(
      'large'       => 'btn-lg',
      'medium'      => '',
      'small'       => 'btn-sm',
      'extra-small' => 'btn-xs',
  );

  // Check if the attributes contain a size
  if ( array_key_exists( 'size', $atts ) ) {
    if ( array_key_exists( $atts['size'], $sizeMap ) ) 
      $class .= ' ' . $sizeMap[$atts['size']];
  } 

  $extraMap = array( 'block' => 'btn-block' );

  // Check if we have extras
  if ( array_key_exists( 'extra', $atts ) ) {
    if ( array_key_exists( $atts['extra'], $extraMap ) ) {
      $class .= ' ' . $extraMap[$atts['extra']];
    }
  } 

  $class .= '"';

  return do_shortcode( sprintf( $result, $class, $content ) );
}
add_shortcode( 'button', 'asu_button_shortcode' );
endif;


?>
