/**
 * File people-pages.js.
 *
 */
( function( $ ) {

  $( document ).ready( function() {

    // Jumps to a named anchor when selected in the dropdown (mobile only)
    $( '#faculty-dropdown' ).change( function( e ) {
      window.location = $( '#faculty-dropdown' ).val();

    });
  });

} )( jQuery );
