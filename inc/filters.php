<?php

function asu_ws_search_form () {
  $form = '<form target="_top" action="https://search.asu.edu/search" method="get" name="gs">
            <label class="hidden" for="asu_search_box">Search</label>
            <input name="site" value="default_collection" type="hidden">
            <div class="input-group">
              <input class="form-control" value="' . get_search_query() . '" type="text" name="q" size="32" placeholder="Search ASU" id="asu_search_box" class="asu_search_box" onfocus="ASUHeader.searchFocus(this)" onblur="ASUHeader.searchBlur(this)"> 
              <span class="input-group-btn">
                <input type="submit" value="Search" title="Search" class="asu_search_button btn">
              </span>
            </div>
            <input name="sort" value="date:D:L:d1" type="hidden"> 
            <input name="output" value="xml_no_dtd" type="hidden"> 
            <input name="ie" value="UTF-8" type="hidden"> 
            <input name="oe" value="UTF-8" type="hidden"> 
            <input name="client" value="asu_frontend" type="hidden"> 
            <input name="proxystylesheet" value="asu_frontend" type="hidden">
          </form>';
  return $form;
}

if ( is_array( get_option( 'wordpress_asu_theme_options' ) ) ) {
  $c_options = get_option( 'wordpress_asu_theme_options' );


  // Do we have an asu_search setting?
  if ( array_key_exists( 'asu_search', $c_options ) && $c_options['asu_search'] !== '' ) {
    $asu_search = $c_options['asu_search'];
  }

  // Is ASU Search enabled? Then replace vanilla WP Search with ASU Search
  if ( $asu_search ) {
    if ( $asu_search <> 'disable' ) {
      add_filter( 'get_search_form', 'asu_ws_search_form' );
    } // else: ASU Search is disabled.
  }
  else { // If customize option is not present, enable tracking by default.
    add_filter( 'get_search_form', 'asu_ws_search_form' );
  }
}
