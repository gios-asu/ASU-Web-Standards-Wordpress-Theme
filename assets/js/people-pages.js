/**
 * File people-pages.js.
 *
 */
( function( $ ) {

  $( document ).ready( function() {

    $('.additional-info').each( function( index ) {
      if( $.trim( $(this).text() ).length == 0) {

      }
    });

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

    $('.letter-toggle').click( function(event) {
      alert('You clicked me!');
    });

  });

} )( jQuery );
