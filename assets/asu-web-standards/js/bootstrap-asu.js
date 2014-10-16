Modernizr.load({
  test: Modernizr.touch,
  yep : '/js/lightningtouch.js'
});

// Document Loaded
jQuery(document).ready(function($) {

  // Smooth scrolling
  smoothScroll.init();

  // Prevent default behavior on hash links
  $('a[href="#"]').click(function(e) {
    e.preventDefault();
  });

  

  // Init popover for calendar dates
  $('.calendarPopover').popover({
    animation: true,
    html: true,
    placement: 'bottom',
    trigger: 'click',
    content: function () {
      return '<a href="#">Add this event to your calendar<\/a>';
    }
  });

  // Init tooltip for date of birth on forms
  $('.dobTooltip').popover({
    placement: 'top',
    trigger: 'hover focus',
    content: 'Your birthday is important. Not only will we send you a birthday message, it helps us keep your information secure and serves as a unique identifier for your online submission.'
  });

  // Throttle window resize event for performance and smoothness
  (function($,sr) {
    // Debounce function
    // by John Hann
    // //unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 500);
        };
    }
    // Smart Resize function
    // by Paul Irish
    // //www.paulirish.com/2009/throttled-smartresize-jquery-event-handler/
    jQuery.fn[sr] = function(fn) { return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

  })(jQuery,'smartresize');

  // Keep all window resize scripts within the throttling function
  $(window).smartresize(function() {

    // Adjust footer classes so the are only collapsed on mobile
    if ($(window).innerWidth() >= 768) {
      // Add collapse open class
      $('.big-foot-nav').not('.in').addClass('in');
    }
    else {
      // Remove collapse open class
      $('.big-foot-nav').removeClass('in');
    }
  });

  // Sticky sidebar nav
  var affixed = $('#sidebarNav').each(function (i, e) {
    $this = $(this);
    $this.affix({
      offset: {
        top: $this.offset().top,
        bottom: $('.footer').outerHeight(true) + 94
      }
    });
  });

    // Fix the pushed column affix bug in safari, applies to sticky sidebar
    // https://github.com/twbs/bootstrap/issues/12126
    // Check if we are in safari
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
      var explicitlySetAffixPosition = function() {
        if ($(window).innerWidth() >= 992) {
          affixed.css('left',affixed.offset().left+'px');
        }
      };
      // Before the element becomes affixed, add left CSS that is equal
      // to the distance of the element from the left of the screen
      affixed.on('affix.bs.affix',function(){
        explicitlySetAffixPosition();
      });
      // Remove left position when affix-top class is applied
      affixed.on('affix-top.bs.affix',function(){
        affixed.css('left','auto');
      });
      // On resize of window, un-affix affixed widget to measure where it should be located,
      // set the left CSS accordingly, re-affix it
      // Keep all window resize scripts within the throttling function
      $(window).smartresize(function() {
        if (affixed.hasClass('affix')) {
          affixed.removeClass('affix');
          affixed.css('left','auto');
          explicitlySetAffixPosition();
          affixed.addClass('affix');
        }
      });
      // Now we have to remove the left positioning to get affix-bottom to work properly
      affixed.on('affix-bottom.bs.affix',function(){
        affixed.css('left','auto');
      });
    }


  // Check window size on loading to remove collapsable footer nav class on large screens
  if ($(window).innerWidth() >= 768) {
    $('.big-foot-nav').not('.in').addClass('in');
  }

  // iframes with content like google maps will take control of mouse scrolling
  // and cause unwanted interaction when scrolling through a page.
  // There is an invisible div over the visit our campus map to stop this behavior.
  // This script will disable the overlay div and allow map interaction after a click.
  $('.iframe-overlay').on('click', function() {
    $(this).css('pointerEvents','none');
  });

  
}); // End document ready function