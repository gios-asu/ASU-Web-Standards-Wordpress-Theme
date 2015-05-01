<?php
/**
 * Page Feature Shortcode used for simplifying Bootstrap code
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 *
 * @package asu-wordpress-web-standards
 */
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

    if ( $custom_fields ) {
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