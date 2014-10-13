// ADD SLIDEDOWN ANIMATION TO NAV DROPDOWN //

(function ($) {

var screen_width = $( window ).width();
$(window).resize(function() {
	screen_width = $( window ).width();
});

$('ul.nav li.dropdown').hover(function() {
		if(screen_width > 768) {
			$(this).find('.dropdown-menu').stop(true, true).delay(80).slideDown();
		}
	}, function() {
		if(screen_width > 768) {
  		$(this).find('.dropdown-menu').stop(true, true).delay(80).slideUp();
  	}
	}
);

// Sticky nav to main menu
$(function () {
	$('#wrapper-sticky-nav').css("min-height", function(){
		return $('#sticky-nav').outerHeight(true);
	});

	if( $('#wpadminbar').length ) {
			$("#sticky-nav").css({top: 32});
	}
});
$('#sticky-nav').affix({
    offset: {
	    top: $('.site-branding').outerHeight(true)
    }
});

// Affix for side bar 
var side_bar_right = ($('body').width() - $('#content .row').width())/2;

function get_side_bar_width(){
	var content_row_width = $(".row-padding-cancel").outerWidth(true);
	var side_bar_width = (content_row_width * 25)/100 ;
	return side_bar_width;
}

var side_bar_width = get_side_bar_width();

if (($('#primary').outerHeight(true)+20) < $('#secondary').outerHeight(true)) {
  $('#secondary').attr('id', 'secondary-nofix');
} else {
  console.log("false");
}
$('#secondary').affix({
	offset: {
  	top: 0,
  	bottom: function () {return (this.bottom = $('.site-footer').outerHeight(true) + 20)}
	}
}).on('affix.bs.affix', function(){
	$('#secondary').css({width: side_bar_width, right: side_bar_right});
});

$('#secondary').on('affix-top.bs.affix', function(){
	$('#secondary').css({width: side_bar_width, right: 0});
});

$('#secondary').on('affix-bottom.bs.affix', function(){
  $('#secondary').css({width: side_bar_width, right: 0, bottom: $('.site-footer').outerHeight(true) + 20 });
});


// To see if affix class is already set and browser is refreshed (as the affix won't be triggered)
//Set the side bar width and right offset on browser load after refresh
$('#secondary.affix').css({width: side_bar_width, right: side_bar_right});
$('#secondary.affix-bottom').css({width: side_bar_width, right: 0});

// Check and resize right offset and width of side_bar_right
$(window).resize(function() {
	side_bar_right = ($('body').width() - $('#content .row').width())/2;
	side_bar_width = get_side_bar_width();
	$('#secondary.affix').css({width: side_bar_width, right: side_bar_right});
	$('#secondary.affix-top').css({width: side_bar_width, right: 0, "margin-top": ""});
  $('#secondary.affix-bottom').css({width: side_bar_width, right: 0});

  if(screen_width < 768) {
    $('#secondary').css("display", "none");
  } else {
    $('#secondary').css("display", "block");
  }
});
}(jQuery));
