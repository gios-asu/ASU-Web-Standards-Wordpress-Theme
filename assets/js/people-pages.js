/**
 * File people-pages.js.
 *
 */
( function( $ ) {

  $( document ).ready( function() {

    // Hides the disclosure triangle when a person record has no additional details
    $('.additional-info').each( function( index ) {
      if( $.trim( $(this).text() ).length == 0) {
        $(this).siblings('.show-details').css('display', 'none');
      }
    });

    // Toggles the additional details section when the disclosure triangle is clicked
    $('.show-details').click( function() {

      $( this ).siblings( '.additional-info' ).slideToggle();

      if( $(this).hasClass( 'fa-caret-left' )) {
        $( this ).removeClass( 'fa-caret-left' );
        $( this ).addClass( 'fa-caret-down' );
      }else{
        $( this ).removeClass( 'fa-caret-down' );
        $( this ).addClass( 'fa-caret-left' );
      }
    });

    // Jumps to a named anchor when selected in the dropdown (mobile only)
    $( '#faculty-dropdown' ).click( function( e ) {
      window.location = $( '#faculty-dropdown' ).val();

    });
  });

} )( jQuery );
