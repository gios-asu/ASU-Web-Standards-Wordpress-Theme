<?php

class ShortcodesTest extends WP_UnitTestCase {
  function test_shortcode_container_creates_containers() {
    $container = do_shortcode('[container][/container]');

    $this->assertContains('<div class="container', $container);
    $this->assertContains('pad-bot-md', $container);
    $this->assertContains('pad-top-sm', $container);
    $this->assertContains('</div>', $container);
  }

  function test_shortcode_container_creates_gray_containers() {
    $container = do_shortcode('[container type=gray][/container]');

    $this->assertContains('<div class="gray-back', $container);
    $this->assertContains('<div class="container', $container);
    $this->assertContains('pad-bot-md', $container);
    $this->assertContains('pad-top-md', $container);
    $this->assertContains('</div>', $container);
  }

  
}