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
 * [container type="gray" spacing="0"]
 *
 * Containers with gray option
 * - type=gray
 * - spacing=0, sm, md, lg, xl, top-0, top-sm, top-md, top-lg, top-xl, bot-0, bot-sm, bot-md, bot-lg, bot-xl
 *
 * @param atts - associative array.  You can override 'type' to 'gray'
 */
  function asu_wp_container_shortcode( $atts, $content = null ) {
    $margin_class_mapper = [
      'bot-xl' => 'space-bot-xl ',
      'bot-lg' => 'space-bot-lg ',
      'bot-md' => 'space-bot-md ',
      'bot-sm' => 'space-bot-sm ',
      'bot-0' => 'space-bot-0 ',
      'top-xl' => 'space-top-xl ',
      'top-lg' => 'space-top-lg ',
      'top-md' => 'space-top-md ',
      'top-sm' => 'space-top-sm ',
      'top-0' => 'space-top-0 ',
      'xl' => 'space-top-xl space-bot-xl ',
      'lg' => 'space-top-lg space-bot-lg ',
      'md' => 'space-top-md space-bot-md ',
      'sm' => 'space-top-sm space-bot-sm ',
      '0' => 'space-top-0 space-bot-0 ',
    ];

    $padding_class_mapper = [
      'bot-xl' => 'pad-bot-xl ',
      'bot-lg' => 'pad-bot-lg ',
      'bot-md' => 'pad-bot-md ',
      'bot-sm' => 'pad-bot-sm ',
      'bot-0' => 'pad-bot-0 ',
      'top-xl' => 'pad-top-xl ',
      'top-lg' => 'pad-top-lg ',
      'top-md' => 'pad-top-md ',
      'top-sm' => 'pad-top-sm ',
      'top-0' => 'pad-top-0 ',
      'xl' => 'pad-top-xl pad-bot-xl ',
      'lg' => 'pad-top-lg pad-bot-lg ',
      'md' => 'pad-top-md pad-bot-md ',
      'sm' => 'pad-top-sm pad-bot-sm ',
      '0' => 'pad-top-0 pad-bot-0 ',
    ];

    $container = '<div class="container %2$s">%1$s</div>';
    $classes   = '';

    // ==============
    // Gray Container
    // ==============
    if ( $atts != null && array_key_exists( 'type', $atts ) ) {
      if ( 'gray' == $atts['type'] ) {
        $wrap_container = '<div class="gray-back %2$s">%1$s</div>';

        // No extra classes needed
        $container = sprintf( $container, '%1$s', '' );
        // Wrap
        $container = sprintf( $wrap_container, $container, '%2$s' );
      }
    }

    // ======
    // Margin
    // ======
    if ( $atts != null && array_key_exists( 'margin', $atts ) ) {
      // Copy the spacing attributes
      $copy_spacing = (string) $atts['margin'];

      // Work backwards so that the short spacing names are not falsely added
      foreach ( $margin_class_mapper as $key => $item ) {
        // Force teh $key to be a string since '0' ==> 0
        if ( false !== strpos( $copy_spacing, (string) $key ) ) {
          $copy_spacing = str_replace( $key, '', $copy_spacing );
          $classes     .= $item;
        }
      }
    }

    // =======
    // Padding
    // =======
    if ( $atts != null && array_key_exists( 'padding', $atts ) ) {
      // Copy the spacing attributes
      $copy_spacing = (string) $atts['padding'];

      // Work backwards so that the short spacing names are not falsely added
      foreach ( $padding_class_mapper as $key => $item ) {
        // Force teh $key to be a string since '0' ==> 0
        if ( false !== strpos( $copy_spacing, (string) $key ) ) {
          $copy_spacing = str_replace( $key, '', $copy_spacing );
          $classes     .= $item;
        }
      }
    } else {
      // Extra classes
      $classes .= ' pad-bot-md ';

      // If gray:
      if ( $atts != null && array_key_exists( 'type', $atts ) ) {
        if ( 'gray' == $atts['type'] ) {
          $classes .= ' pad-top-md ';
        } else {
          $classes .= ' pad-top-sm ';
        }
      } else {
        $classes .= ' pad-top-sm ';
      }
    }

    // Finish up
    $container = sprintf( $container, '%1$s', $classes );

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

      if ( count( $item_parts ) <= 1 ) {
        continue; }

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

        $classes = $mapper[ $size ];
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

    $classes = 'panel ' . $mapper[ $type ];

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
 * - id (optional)
 *
 * @param $atts - associative array.
 * @param $content - content
 */
  function asu_button_shortcode( $atts, $content = null ) {
    $button = '<button %1$s>%2$s</button>';
    $ahref  = '<a href="%4$s" %1$s %3$s>%2$s</a>';
    $result = '';

    // Check if the attributes contain a link
    if ( array_key_exists( 'link', $atts ) ) {
      $result = sprintf( $ahref, '%1$s', '%2$s', '%3$s', $atts['link'] );
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
        $class .= ' ' . $colorMap[ $atts['color'] ];
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
      if ( array_key_exists( $atts['size'], $sizeMap ) ) {
        $class .= ' ' . $sizeMap[ $atts['size'] ]; }
    }

    $extraMap = array( 'block' => 'btn-block' );

    // Check if we have extras
    if ( array_key_exists( 'extra', $atts ) ) {
      if ( array_key_exists( $atts['extra'], $extraMap ) ) {
        $class .= ' ' . $extraMap[ $atts['extra'] ];
      }
    }

    $class .= '"';

    $id = '';

    if ( array_key_exists( 'id', $atts ) ) {
      $id = ' id="'.$atts['id'].'"';
    }

    return do_shortcode( sprintf( $result, $class, $content, $id ) );
  }
  add_shortcode( 'button', 'asu_button_shortcode' );
endif;


if ( ! function_exists( 'asu_breadcrumbs' ) ) :
  /**
 * Used for internal purposes
 */
  function asu_breadcrumbs() {
    $markup = '';

    // The home page is considered index.php which is used to render the blog.
    // Sometimes the home page is NOT the front page, which is the case with
    // most of the sites that will use this theme.  Since we only want breadcrumbs
    // to not show up on the front page, we will not check for is_home as most
    // online discussions would suggest.
    if ( function_exists( 'yoast_breadcrumb' ) /* && !is_home() */ && ! is_front_page() ) {
      $markup  = '<div class="asu-breadcrumbs">';
      $markup .= '  <div class="container">';
      $markup .= '    <div class="row">';
      $markup .= '      <div class="col-md-12">';
      ob_start();
      yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumb">', '</div>' );
      $markup .= ob_get_contents();
      ob_end_clean();
      $markup .= '      </div>';
      $markup .= '    </div>';
      $markup .= '  </div>';
      $markup .= '</div>';
    }

    return $markup;
  }
  add_shortcode( 'asu_breadcrumbs', 'asu_breadcrumbs' );
endif;

if ( ! function_exists( 'page_feature' ) ) :
  /**
 * Display hero section (page feature)
 */
  function page_feature() {
    $custom_fields = get_post_custom();
    $title         = null;
    $count         = null;
    $image         = null;
    $video         = null;
    $description   = null;
    $type          = 'standard';

    if ( array_key_exists( 'page_feature_title', $custom_fields ) ) {
      $title = $custom_fields['page_feature_title'][0];
    }

    if ( array_key_exists( 'page_feature_image', $custom_fields ) ) {
      $count = count( $custom_fields['page_feature_image'] );

      if ( 0 == $count ) {
        $image = $custom_fields['page_feature_image'][0];
      } else {
        $index = rand( 0, $count - 1 );
        $image = $custom_fields['page_feature_image'][ $index ];
      }
    }

    if ( array_key_exists( 'page_feature_video', $custom_fields ) ) {
      $video = [];

      foreach ( $custom_fields['page_feature_video'] as $_ => $value ) {
        $video[] = $value;
      }
    }

    if ( array_key_exists( 'page_feature_description', $custom_fields ) ) {
      $description = $custom_fields['page_feature_description'][0];
    }

    if ( array_key_exists( 'page_feature_type', $custom_fields ) ) {
      $type = $custom_fields['page_feature_type'][0];
    }

    // Check to see if anyone has overriden the page feature

    $override = apply_filters(
        'page_feature',
        array(
          'title' => $title,
          'description' => $description,
          'image' => $image,
          'video' => $video,
          'type' => $type,
        )
    );

    if ( has_filter( 'page_feature' ) && $override ) {
      return $override;
    }

    // =====================
    // Standard Page Feature
    // =====================

    if ( isset( $title ) ||
       isset( $image ) ||
       isset( $video ) ||
       isset( $description ) ) {
      $html  = '<div class="column">';
      $html .= '  <div class="region region-content">';
      $html .= '    <div class="block block-system">';
      $html .= '      <div class="content">';
      $html .= '        <div class="panel-display clearfix">';

      // Section
      $section_start = '<section class="hero hero-bg-img hero-action-call %2$s" style="%1$s">';

      if ( isset( $video ) ) {
        $section_start = sprintf( $section_start, '%1$s', 'hero-video' );
      } else {
        $section_start = sprintf( $section_start, '%1$s', '' );
      }

      if ( isset( $image ) ) {
        $section_start = sprintf( $section_start, 'background-image:url(' . $image . ')' );
      } else {
        $section_start = sprintf( $section_start, '' );
      }

      $html .= $section_start;

      if ( isset( $video ) ) {
        $video_container = '<video width="100%2$s" height="auto" autoplay muted="true" loop>%1$s</video>';
        $$video_part     = '<source src="%1$s" type="%2$s"/>';
        $parts           = '';

        foreach ( $video as $_ => $value ) {
          $info     = pathinfo( $value );
          $ext      = $info['extension'];
          $mimeType = isset( $mimeTypes[ $ext ] ) ? $mimeTypes[ $ext ] : 'application/octet-stream';

          $parts .= sprintf( $$video_part, $value, $mimeType );
        }

        $html .= sprintf( $video_container, $parts, '%' );
      }

      $html .= '           <div class="container">';
      $html .= '             <div class="row">';
      $html .= '               <div class="fdt-home-container fdt-home-column-content clearfix panel-panel row-fluid container">';
      $html .= '                 <div class="fdt-home-column-content-region fdt-home-row panel-panel span12">';
      $html .= '                   <div class="panel-pane pane-fieldable-panels-pane pane-fpid-12 pane-bundle-text">';

      if ( isset( $title ) ) {
        $html .= '<h1 class="pane-title">';
        $html .= $title;
        $html .= '</h1>';
      }

      if ( isset( $description ) ) {
        $html .= '<div class="pane-content">';
        $html .= '  <div class="fieldable-panels-pane">';
        $html .= '    <div class="field field-name-field-basic-text-text field-type-text-long field-label-hidden">';
        $html .= '      <div class="field-items">';
        $html .= '        <div class="field-item even">';
        $html .= '          <p>';
        $html .= $description;
        $html .= '          </p>';
        $html .= '        </div>';
        $html .= '      </div>';
        $html .= '    </div>';
        $html .= '  </div>';
        $html .= '</div>';
      }

      $html .= '                   </div>';
      $html .= '                 </div>';
      $html .= '               </div>';
      $html .= '             </div>';
      $html .= '           </div>';
      $html .= '         </section>';
      $html .= '        </div>';
      $html .= '      </div>';
      $html .= '    </div>';
      $html .= '  </div>';
      $html .= '</div>';

      return $html;
    }

    return '';
  }
  add_shortcode( 'page_feature', 'page_feature' );
endif;
