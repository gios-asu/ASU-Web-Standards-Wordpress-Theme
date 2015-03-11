<?php

class ShortcodesTest extends WP_UnitTestCase {
  function test_shortcode_container_creates_containers() {
    $container = do_shortcode('[container][/container]');

    $this->assertEquals('<div class="container  pad-bot-md  pad-top-sm "></div>', $container);
  }

  function test_shortcode_container_creates_gray_containers() {
    // TODO
  }
}