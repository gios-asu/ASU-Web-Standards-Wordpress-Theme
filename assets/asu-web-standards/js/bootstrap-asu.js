/**========================================================================
 * Web Standards: bootstrap-asu.js v0.0.8
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * @license MIT
 * ======================================================================== */

/* ========================================================================
 * Web Standards: modernizr.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function () {
  'use strict';

  if ( typeof Modernizr == 'undefined' ) throw new Error( 'Modernizr is required!' )

  Modernizr.load( {
    text: Modernizr.touch,
    yep : '/js/lightningtouch.js'
  } )

} ();

/* ========================================================================
 * Web Standards: iframe-overlay.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function ($) {
  'use strict';

  $(document).ready(function () {
    /*
     * iframes with content like google maps will take control of mouse scrolling
     * and cause unwanted interaction when scrolling through a page.
     * There is an invisible div over the visit our campus map to stop this behavior.
     * This script will disable the overlay div and allow map interaction after a click.
     */
    $('.iframe-overlay').on( 'click', function () {
      $(this).css( 'pointerEvents', 'none' )
    } )
  })

} (jQuery);

/* ========================================================================
 * Web Standards: smoothscroll.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function () {
  'use strict';

  if ( typeof smoothScroll == 'undefined' ) throw new Error( 'SmoothScroll is required!' )

  smoothScroll.init()

} ();

/* ========================================================================
 * Web Standards: smartresize.js v0.0.2
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

/*
 * Throttle the window resize event for performance and smoothness.
 */
+function ($) {
  'use strict';

  // SMARTRESIZE PUBLIC CLASS DEFINITION
  // ===================================

  var Smartresize = function (element, options) {
    this.element = element
    this.options = options
    this._bounce = []
  }

  Smartresize.VERSION = '0.0.2'

  Smartresize.prototype = {}

  Smartresize.prototype.constructor = Smartresize

  /**
   * Debounce function
   * @author John Hann
   * @source http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
   */
  Smartresize.prototype.debounce = function ( func, threshold, execAsap ) {
    var timeout
    var outer = function () {
      var obj = this
      var args = arguments

      function delayed () {
        if ( ! execAsap ) {
          func.apply ( obj, args )
        }

        timeout = null
      }

      if ( timeout )
        clearTimeout( timeout )
      else if ( execAsap )
        func.apply( obj, args )

      timeout = setTimeout( delayed, threshold || 500 )
    }

    this._bounce.push({
      bounce : outer,
      callback : func
    })

    return outer
  }

  /**
   * Unbinds specific handlers or if handler is null or undefined, will
   * unbind ALL handlers
   *
   * @param  {function} handler the callback
   * @return {$}         returns the element for chainability
   */
  Smartresize.prototype.unbind = function (handler) {
    for (var i = 0; i < this._bounce.length; i++ ) {
      if (handler == null || handler == this._bounce[i].callback) {
        $(this.element).unbind( 'resize', this._bounce[i].bounce )
      }
    }
    return $(this.element)
  }

  // SMARTRESIZE POPOVER PLUGIN DEFINITION
  // ==================================

  function Plugin(option, handler) {
    var $this    = $(this)
    var data     = $this.data('bs.smartresize')
    var options  = typeof option == 'object' && option
    var selector = options && options.selector

    if (! data && option == 'destroy')
        return
    if (selector) {
      if (! data)
        $this.data('bs.smartresize', (data = {}))
      if (! data[selector])
        data[selector] = new Smartresize(this, options)
    } else {
      if (! data)
        $this.data('bs.smartresize', (data = new Smartresize(this, options)))
    }

    if (typeof option == 'string')
      data[option](handler)
    else {
      return option ? this.bind( 'resize', data.debounce( option ) ) : this.trigger( 'smartresize' )
    }
  }

  var old = $.fn.smartresize

  $.fn.smartresize             = Plugin
  $.fn.smartresize.Constructor = Smartresize

  // SMARTRESIZE POPOVER NO CONFLICT
  // ============================

  $.fn.smartresize.noConflict = function () {
    $.fn.smartresize = old
    return this
  }

} (jQuery)

/* ========================================================================
 * Web Standards: calendar.js v0.0.3
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

/* global moment */

/*
 * Calendar Documentation
 *
 * Allows you to add calendar popups and downloads
 * to elements.  Calendar dropdowns will get
 * automatically added to `.calendarPopover` elements
 * on page ready.
 *
 * If you do not override the content option, the plugin
 * will automatically generate a data-uri for your calendar
 * markup as an ICS file.  The examples demonstrate the
 * proper markup for a calendar icon.
 *
 * Definition:
 *
 * $( selector ).calendarPopover( [options] )
 *
 * Options:
 *
 * ```js
 * {
 *   "animation": Boolean [true],
 *   "html": Boolean [true],
 *   "placement": ("bottom", "top", "left", "right") ["bottom"],
 *   "trigger": String ["click"],
 *   "content": Function [Add To Calendar Function]
 * }
 * ```
 *
 * Example:
 *
 * Calendar invite for the School of Sustainability at 1:00pm on
 * December 1st of 2016.
 *
 * ```html
 * <div class="calendar-date calendarPopover"
 *     data-timezone="Z"
 *     data-description="Example"
 *     data-mailto="user-email@asu.edu"
 *     data-date-end="2016-12-01 2:00 pm"
 *     data-location="School of Sustainability"
 *     data-summary="Just an Example" title="">
 * <time datetime="2016-12-01 1:00 pm">
 * <span class="weekday">Thr</span>
 * <span class="date">1</span>
 * <span class="month">Dec</span>
 * </time>
 * </div>
 * ```
 */

+function ($) {
  'use strict';

  if ( typeof moment == 'undefined' ) throw new Error( 'Moment is required!' )

  // POPOVER PUBLIC CLASS DEFINITION
  // ===============================

  var CalendarPopover = function (element, options) {
    this.options = $.extend({}, CalendarPopover.DEFAULTS, options)
    this.init('calendarPopover', element, this.options)
  }

  if (! $.fn.popover) throw new Error('Calendar Popover requires popover')

  CalendarPopover.VERSION = '0.0.1'

  CalendarPopover.DEFAULTS = $.extend({}, $.fn.popover.Constructor.DEFAULTS, {
    animation: true,
    html: true,
    placement: 'bottom',
    trigger: 'click',
    content: function () {
      var $this = $( this )
      var $time = $this.find( 'time' )

      // Grab the datetime from the content
      var dateStart   = $time.attr('datetime') || ''
      var timeZone    = $time.attr('data-timezone') || 'Z'
      var dateEnd     = $this.attr('data-date-end') || ''
      var eventName   = $this.attr('title') || ''
      var filename    = $this.attr('data-filename') || 'invite.ics'
      var subject     = $this.attr('data-subject') || ''
      var description = $this.attr('data-description') || ''
      var location    = $this.attr('data-location') || ''
      var mailto      = $this.attr('data-mailto') || 'me@email.com'

      // TODO test
      var ics = CalendarPopover.ICS( {
        timeZone : timeZone,
        message : description,
        mailto : mailto,
        dateStart : dateStart,
        dateEnd : dateEnd,
        location : location,
        summary : eventName + ( subject === '' ? '' : ' : ' + subject )
      } )

      return '<a download="' + filename + '" href="' + 'data:text/plain;charset=utf-8,' + encodeURIComponent(ics) + '">Add this event to your calendar<\/a>';
    }
  })

  CalendarPopover.ICS = function ( data ) {
    var outputFormat = 'YYYYMMDD\\THHmmss'
    var inputFormat = 'YYYY-MM-DD HH:mm a'

    // dateEnd first so that we can add 1 hour to dateStart
    // if necessary
    if ( typeof data.dateEnd == 'string' ) {
      if ( data.dateEnd === '' ) {
        data.dateEnd = moment( data.dateStart, inputFormat ).add( 1, 'hour' ).format( outputFormat )
      } else {
        data.dateEnd = moment( data.dateEnd, inputFormat ).format( outputFormat )
      }
    }

    if ( typeof data.dateStart == 'string' ) {
      data.dateStart = moment( data.dateStart, inputFormat ).format( outputFormat )
    }

    var icsMessage = 'BEGIN:VCALENDAR\nVERSION:2.0\nPRODID:-//'
    icsMessage += 'ASU'
    icsMessage += '//NONSGML v1.0//EN\nBEGIN:VEVENT\nUID:'
    icsMessage += CalendarPopover.UID()
    icsMessage += '\nDTSTAMP:'
    icsMessage += Date.now() + data.timeZone
    icsMessage += '\nATTENDEE;CN='
    icsMessage += data.message + ' '
    icsMessage += ';RSVP=TRUE:MAILTO:'
    icsMessage += data.mailto
    icsMessage += '\nORGANIZER;CN=Me:MAILTO::'
    icsMessage += data.mailto
    icsMessage += '\nDTSTART:'
    icsMessage += data.dateStart
    icsMessage += '\nDTEND:'
    icsMessage += data.dateEnd
    icsMessage += '\nLOCATION:'
    icsMessage += data.location
    icsMessage += '\nSUMMARY:'
    icsMessage += data.summary
    icsMessage += '\nEND:VEVENT\nEND:VCALENDAR';

    return icsMessage
  }

  CalendarPopover.UID = function () {
    // Quick, short uid
    return ('0000' + (Math.random() * Math.pow(36,4) << 0).toString(36)).slice(-4)
  }

  // NOTE: POPOVER EXTENDS popover.js
  // ================================

  CalendarPopover.prototype = $.extend({}, $.fn.popover.Constructor.prototype)

  CalendarPopover.prototype.constructor = CalendarPopover

  CalendarPopover.prototype.getDefault = function () {
    return CalendarPopover.DEFAULTS
  }

  // CALENDAR POPOVER PLUGIN DEFINITION
  // ==================================

  function Plugin(option) {
    return this.each(function () {
      var $this    = $(this)
      var data     = $this.data('bs.calendarPopover')
      var options  = typeof option == 'object' && option

      if (! data && option == 'destroy')
        return
      else {
        if (! option)
          option = CalendarPopover.prototype.getDefault()

        if (! data)
          $this.data('bs.calendarPopover', (data = new CalendarPopover(this, options)))
      }

      if (typeof option == 'string')
        data[option]()
    })
  }

  var old = $.fn.calendarPopover

  $.fn.calendarPopover             = Plugin
  $.fn.calendarPopover.Constructor = CalendarPopover

  // CALENDAR POPOVER NO CONFLICT
  // ============================

  $.fn.calendarPopover.noConflict = function () {
    $.fn.calendarPopover = old
    return this
  }

  /*
   * Run on page load (bootstrap it)
   */
  $(document).ready( function () {
    $('.calendarPopover').calendarPopover()
  } )
} (jQuery);

/* ========================================================================
 * Web Standards: sidebar.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function ($) {
  'use strict';

  $(document).ready(function () {
    var affixed = $('#sidebarNav').each(function () {
      var $this = $(this);

      $this.affix( {
        offset: {
          top : $this.offset().top,
          bottom : function () {
            var fix = parseInt($this.css('margin-bottom'), 10)
            fix += parseInt($this.css('padding-top'), 10)
            fix += parseInt($this.css('padding-bottom'), 10)
            return $('.footer').outerHeight(true) + fix
          }
        }
      } )

      // Hacky fix for responsive width
      var responsiveFix = function () {
        $this.width( $this.parent().width() )
      }

      $(window).smartresize( responsiveFix )

      responsiveFix()
    })

    /*
     * Fix the pushed column affix bug in safari. Applies to the
     * sticky sidebar.
     *
     * @sourcehttps://github.com/twbs/bootstrap/issues/12126
     */
    if ( navigator.userAgent.indexOf('Safari') != -1 &&
         navigator.userAgent.indexOf('Chrome') == -1 ) {

      var explicitlySetAffixPosition = function () {
        if ( $(window).innerWidth() >= 992 ) {
          affixed.css('left', affixed.offset().left + 'px')
        }
      }

      /*
       * Before the element becomes affixed, add left CSS that is equal
       * to the distance of the element from the left of the screen
       */
      affixed.on('affix.bs.affix', function () {
        explicitlySetAffixPosition()
      })
    }

    /*
     * Remove left position when affix-top class is applied
     */
    affixed.on('affix-top.bs.affix', function () {
      affixed.css('left', 'auto')
    })

    /**
     * On resize, un-affix the affixed widget to measure where it
     * should be located, then set the left CSS accordingly, re-affix
     * it
     */
    $(window).smartresize(function () {
      if ( affixed.hasClass('affix') ) {
        affixed.removeClass('affix')
        affixed.css('left','auto')
        explicitlySetAffixPosition()
        affixed.addClass('affix')
      }
    })

    /**
     * Now we have to remove the left positioning of get affix-bottom
     * to work properly
     */
    affixed.on('affix-bottom.bs.affix', function () {
      affixed.css('left','auto')
    })
  })

} (jQuery);

/* ========================================================================
 * Web Standards: collapse-footer.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function ($) {
  'use strict';

  var mobileWidth = 768

  function collapseFooter () {
    // Adjust footer classes so they are only collapsed on mobile
    if ( $(window).innerWidth() >= mobileWidth ) {
      // Add collapse open class
      $('.big-foot-nav').not('.in').addClass('in')
    } else {
      // Remove collapse open class
      $('.big-foot-nav').removeClass('in')
    }
  }

  $(document).ready(function () {
    // Keep all window resize scripts within the throttling function
    $(window).smartresize( collapseFooter )

    // Run collapse footer right off the bat
    collapseFooter()
  });
} (jQuery);

/* ========================================================================
 * Web Standards: wait-for.js v0.0.1
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

/*
 * Wait For Documentation
 *
 * Allows you to wait for when a given element is
 * a given selector and run a callback.  The callback
 * is only run once.  If the condition is true, then
 * the callback will be run immediately; i.e. it does
 * not wait for the condition to be false and then wait
 * for the condition to be true.
 *
 * Definition:
 *
 * $( selector ).waitFor( selector, callback [, options] )
 *
 * Options:
 *
 * ```js
 * {
 *   "rate" : Number [200]
 * }
 * ```
 *
 * Example:
 *
 * Run a function when $('body') has the class 'done'
 *
 * ```js
 * $( 'body' ).waitFor( '.done', function () {
 *   console.log( 'body is done!' )
 * } );
 * ```
 *
 * Example 2:
 *
 * Run a function when $('body') does not have the class 'done'.
 * This will run immediately once run
 *
 * ```js
 * $( 'body' ).waitFor( ':not(.done)', function () {
 *   console.log( 'body is not done!' )
 * } );
 * ```
 */

+function ($) {
  'use strict';

  // WAITFOR PUBLIC CLASS DEFINITION
  // ===============================

  var WaitFor = function (element, options) {
    this.options = $.extend({}, options)
  }

  WaitFor.VERSION = '0.0.1'

  WaitFor.DEFAULTS = {
    rate : 100
  }

  WaitFor.prototype = {}

  WaitFor.prototype.constructor = WaitFor

  // WAITFOR PLUGIN DEFINITION
  // =========================

  function Plugin( selector, callback, option ) {
    var $self   = $( this )
    var options = typeof option == 'object' && option

    options = $.extend( WaitFor.DEFAULTS, options )

    var interval = setInterval( function () {
      if ( $self.is( selector ) ) {
        clearInterval( interval )

        callback.call( $self )
      }
    }, options.rate )
  }

  var old = $.fn.WaitFor

  $.fn.waitFor             = Plugin
  $.fn.waitFor.Constructor = WaitFor

  // WAITFOR NO CONFLICT
  // ===================

  $.fn.waitFor.noConflict = function () {
    $.fn.waitFor = old
    return this
  }

} (jQuery);

/* ========================================================================
 * Web Standards: mobile_menu.js v0.0.2
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function ($) {
  'use strict';

  // TODO refactor this constant
  var mobileWidth = 975

  var desktopElements = [
    '.navbar-ws .navbar-toggle'
  ].join( ',' )
  var mobileElements = [
    '.asu_mobile_nav_item',
    '#main-search',
    '#asu_mobile_menu_button',
    '#asu_mobile_search_button'
  ].join( ',' )


  /**
   * Create nagivation, search, and icons
   * if they do not already exist
   *
   * Don't use #main-search id for anything else!
   */
  function generateMarkup() {
    var mainSearch = document.getElementById( 'main-search' )
    if ( mainSearch === null ) {
      // ==========
      // Navigation
      // ==========
      var $menuHiddenButton = $( '.navbar-ws .navbar-toggle' )
      $menuHiddenButton.hide()

      // add asu menu items
      $( '#asu_universal_nav>ul>li' ).each( function ( i, e ) {
        var $clone = $( e ).clone().addClass( 'asu_mobile_nav_item' )

        // Transform nested ul li's into dropdowns
        if ( $clone.find( 'ul' ).length > 0 ) {
          $clone.find( '>a' )
            .addClass( 'dropdown-toggle' )
            .attr( 'data-toggle', 'dropdown' )
            .append( '&nbsp;<span class="caret"></span>' )

          $clone.find( 'ul' )
            .addClass( 'dropdown-menu' )
            .attr( 'role', 'menu' )
            .find( 'li' )
              .addClass( 'external-link' )
        } else {
          // Add extrenal link
          $clone.addClass( 'external-link' )
        }

        $clone.appendTo( '.navbar-ws .nav.navbar-nav' )
      } )


      // ======
      // Search
      // ======

      // Prepended to '#block-asu-brand-asu-brand-header .content'
      // Will get an '.opened' class added to it when opened
      var searchMarkUp = ''

      searchMarkUp += '<div id="main-search" class="main-search">'
      searchMarkUp += '  <form target="_top" action="https://search.asu.edu/search" method="get" name="gs">'
      searchMarkUp += '    <input class="asu_search_box" name="q" id="asu_search_box" placeholder="Search" autocomplete="off" type="text">'
      searchMarkUp += '    <input class="asu_search_button" type="submit" value="Search">'
      searchMarkUp += '    <input name="site" value="default_collection" type="hidden">'
      searchMarkUp += '    <input name="sort" value="date:D:L:d1" type="hidden">'
      searchMarkUp += '    <input name="output" value="xml_no_dtd" type="hidden">'
      searchMarkUp += '    <input name="ie" value="UTF-8" type="hidden">'
      searchMarkUp += '    <input name="oe" value="UTF-8" type="hidden">'
      searchMarkUp += '    <input name="client" value="asu_frontend" type="hidden">'
      searchMarkUp += '    <input name="proxystylesheet" value="asu_frontend" type="hidden">'
      searchMarkUp += '  </form>'
      searchMarkUp += '</div>'

      var $search = $( searchMarkUp ).prependTo( '#block-asu-brand-asu-brand-header .content' )

      // =====
      // Icons
      // =====

      // Appended to .asu_mobile_hdr_wrapper
      var mobileMenuMarkup = ''

      mobileMenuMarkup += '<div class="fa fa-navicon" id="asu_mobile_menu_button">'
      mobileMenuMarkup += '  <a href="#">Menu</a>'
      mobileMenuMarkup += '</div>'

      var searchMenuMarkup = '<div class="fa fa-search" id="asu_mobile_search_button"></div>'

      // TODO We should be appending to .asu_mobile_hdr_wrapper but
      // our markup does not have a .asu_mobile_hdr_wrapper nested in
      // the #asu_mobile_hdr like webspark does.
      // For now, we will append to #asu_mobile_hdr, but we should look into
      // this again in the future.
      var $mobileMenuButton = $( mobileMenuMarkup ).appendTo( '#asu_mobile_hdr' )
      var $searchButton = $( searchMenuMarkup ).appendTo( '#asu_mobile_hdr' )

      // ===========
      // Icon Events
      // ===========

      $searchButton.click( function ( e ) {
        e.preventDefault();

        if ( $( this ).is( '.clicked' ) ) {
          // Close the search
          $( this ).removeClass( 'clicked' )

          $search.removeClass( 'opened' )
        } else {
          // Open (and focus on) the search
          $( this ).addClass( 'clicked' )
          $search.addClass( 'opened' )
          $search.find('input[type=text]').focus()
        }
      } )

      $mobileMenuButton.click( function ( e ) {
        e.preventDefault();
        var $self = $( this )
        if ( $self.is( '.fa-close' ) ) {
          // Close the menu
          $( '.navbar-ws .navbar-collapse' ).waitFor( ':not(.in)', function () {
            $self.removeClass( 'fa-close' )
            $self.addClass( 'fa-navicon' )
          } )

          $menuHiddenButton.click()
        } else {
          // Open the menu
          $( '.navbar-ws .navbar-collapse' ).waitFor( '.in', function () {
            $self.addClass( 'fa-close' )
            $self.removeClass( 'fa-navicon' )
          } )

          $menuHiddenButton.click()
        }
      } )
    }
  }

  /**
   * Hide and show elements depending on viewport size.
   */
  function collapseHeader () {
    if ( $( window ).innerWidth() >= mobileWidth ) {
      $( desktopElements ).show()
      $( mobileElements ).hide()
    } else {
      $( desktopElements ).hide()
      $( mobileElements ).show()
    }
  }

  /**
   * Bootstrap the markup.
   */
  $(document).ready(function () {
    // Re-check viewport size on resize
    $(window).resize( collapseHeader )

    // Run collapse header right off the bat
    generateMarkup()
    collapseHeader()
  } );
} (jQuery);
