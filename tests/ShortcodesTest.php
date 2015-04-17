<?php

class ShortcodesTest extends WP_UnitTestCase {

  function test_shortcode_container_exists() {
    $this->assertTrue( shortcode_exists( 'container' ) );
  }

  function test_shortcode_container_creates_containers() {
    $container = do_shortcode( '[container][/container]' );

    $this->assertContains( '<div class="container', $container );
    $this->assertContains( 'pad-bot-md', $container );
    $this->assertContains( 'pad-top-sm', $container );
    $this->assertContains( '</div>', $container );
  }

  function test_shortcode_container_has_specific_margins() {
    $container = do_shortcode( '[container margin=xl][/container]' );

    $this->assertContains( '<div class="container', $container );
    $this->assertContains( 'space-top-xl', $container );
    $this->assertContains( 'space-bot-xl', $container );
    $this->assertContains( '</div>', $container );
  }

  function test_shortcode_container_creates_gray_containers() {
    $container = do_shortcode( '[container type=gray][/container]' );

    $this->assertContains( '<div class="gray-back', $container );
    $this->assertContains( '<div class="container', $container );
    $this->assertContains( 'pad-bot-md', $container );
    $this->assertContains( 'pad-top-md', $container );
    $this->assertContains( '</div>', $container );
  }

  function test_shortcode_sidebar_exists() {
    $this->assertTrue( shortcode_exists( 'sidebar' ) );
  }

  function test_shortcode_column_exists() {
    $this->assertTrue( shortcode_exists( 'column' ) );
  }

  function test_shortcode_panel_exists() {
    $this->assertTrue( shortcode_exists( 'panel' ) );
  }

  function test_shortcode_button_exists() {
    $this->assertTrue( shortcode_exists( 'button' ) );
  }

  function test_shortcode_asu_breadcrumbs_exists() {
    $this->assertTrue( shortcode_exists( 'asu_breadcrumbs' ) );
  }

  function test_shortcode_page_feature_exists() {
    $this->assertTrue( shortcode_exists( 'page_feature' ) );
  }

  function test_shortcode_related_links_exists() {
    $this->assertTrue( shortcode_exists( 'related-links' ) );
  }
    
}