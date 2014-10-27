<?php
/**
 * wptemplate-gios-v1 Theme Customizer
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress-web-standards
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wptemplate_gios_v1_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wptemplate_gios_v1_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wptemplate_gios_v1_customize_preview_js() {
	wp_enqueue_script( 'wptemplate_gios_v1_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wptemplate_gios_v1_customize_preview_js' );



/**
 * Custom theme manager.  Special settings for the theme
 * get defined here.
 */
function wordpress_asu_customize_register( $wp_customize ) {

  //  =============================
  //  =                           =
  //  = School Info Section       =
  //  =                           =
  //  =============================

  $wp_customize->add_section(
      'wordpress_asu_theme_section' , 
      array(
        'title'      => __( 'School Information','asu_wordpress' ),
        'priority'   => 30,
      )
  );

  //  =============================
  //  = Organization Text         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[org]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_org_text',
      array(
        'label'      => __( 'Parent Organization', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[org]',
        'priority'   => 0,
      )
  );

  //  =============================
  //  = Organization Link         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[org_link]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_org_link', 
      array(
        'label'      => __( 'Parent Organization URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[org_link]',
        'priority'   => 10,
      )
  );

  //  =============================
  //  = Address                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[address]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_address', 
      array(
        'label'      => __( 'Address', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[address]',
        'type'       => 'textarea',
        'priority'   => 20,
      )
  );

  //  =============================
  //  = Phone                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[phone]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_phone', 
      array(
        'label'      => __( 'Phone Number', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[phone]',
        'priority'   => 30,
      )
  );

  //  =============================
  //  = Fax                       =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[fax]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_fax', 
      array(
        'label'      => __( 'Fax Number', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[fax]',
        'priority'   => 40,
      )
  );

  //  =============================
  //  = Contact Us Email or URL   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact', 
      array(
        'label'      => __( 'Contact Us Email or URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contact]',
        'priority'   => 50,
      )
  );

  //  =============================
  //  = Contact Us Email Subject  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact_subject]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact_subject', 
      array(
        'label'      => __( 'Contact Us Email Subject (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contact_subject]',
        'priority'   => 60,
      )
  );

  //  =============================
  //  = Contact Us Email Body     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contact_body]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contact_body', 
      array(
        'label'      => __( 'Contact Us Email Body (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contact_body]',
        'type'           => 'textarea',
        'priority'   => 70,
      )
  );

  //  =============================
  //  = Contribute URL            =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[contribute]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_contribute', 
      array(
        'label'      => __( 'Contribute URL (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section',
        'settings'   => 'wordpress_asu_theme_options[contribute]',
        'priority'   => 80,
      )
  );

  //  =============================
  //  =                           =
  //  = Social Media Section      =
  //  =                           =
  //  =============================

  $wp_customize->add_section(
      'wordpress_asu_theme_section_social', 
      array(
        'title'      => __( 'Social Media','asu_wordpress' ),
        'priority'   => 31,
      )
  );


  //  =============================
  //  = Facebook                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[facebook]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_facebook', 
      array(
        'label'      => __( 'Facebook URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[facebook]',
      )
  );

  //  =============================
  //  = Twitter                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[twitter]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_twitter', 
      array(
        'label'      => __( 'Twitter URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[twitter]',
      )
  );

  //  =============================
  //  = Google+                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[google_plus]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_google_plus', 
      array(
        'label'      => __( 'Google Plus URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[google_plus]',
      )
  );

  //  =============================
  //  = LinkedIn                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[linkedin]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_linkedin', 
      array(
        'label'      => __( 'Linked In URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[linkedin]',
      )
  );

  //  =============================
  //  = Youtube                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_asu_theme_options[youtube]', 
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
      )
  );

  $wp_customize->add_control(
      'wordpress_asu_youtube', 
      array(
        'label'      => __( 'Youtube URL', 'asu_wordpress' ),
        'section'    => 'wordpress_asu_theme_section_social',
        'settings'   => 'wordpress_asu_theme_options[youtube]',
      )
  );
}
add_action( 'customize_register', 'wordpress_asu_customize_register' );