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
 * Web Standards: calendar.js v0.0.2
 * ========================================================================
 * Copyright 2014 ASU
 * Licensed under MIT (https://github.com/gios-asu/ASU-Bootstrap-Addon/blob/master/LICENSE)
 * ======================================================================== */

+function ($) {
  'use strict';

  // POPOVER PUBLIC CLASS DEFINITION
  // ===============================

  var CalendarPopover = function (element, options) {
    this.init('calendarPopover', element, options)
  }

  if (! $.fn.popover) throw new Error('Calendar Popover requires popover')

  CalendarPopover.VERSION = '0.0.1'

  CalendarPopover.DEFAULTS = $.extend({}, $.fn.popover.Constructor.DEFAULTS, {
    animation: true,
    html: true,
    placement: 'bottom',
    trigger: 'click',
    content: function () {

      // Grab the datetime from the content
      var dateTime = $(this).find('time').attr('datetime') || ''
      var eventName = $(this).attr('title') || ''
      var timeZone = $(this).find('time').attr('data-timezone') || ''
      var filename = $(this).attr('data-filename') || 'invite.ics'

      // TODO test
      var ics = this.generateICS( {
        dateTime : dateTime,
        eventName : eventName,
        timeZone : timeZone
      } )

      return '<a download="' + filename + '" href="' + 'data:text/plain;charset=utf-8,' + encodeURIComponent(ics) + '">Add this event to your calendar<\/a>';
    }
  })

  // NOTE: POPOVER EXTENDS popover.js
  // ================================

  CalendarPopover.prototype = $.extend({}, $.fn.popover.Constructor.prototype)

  CalendarPopover.prototype.constructor = CalendarPopover

  CalendarPopover.prototype.getDefault = function () {
    return CalendarPopover.DEFAULTS
  }

  CalendarPopover.prototype.generateICS = function ( data ) {
    // TODO issue #9
    return '' + data
  }


  // CALENDAR POPOVER PLUGIN DEFINITION
  // ==================================

  function Plugin(option) {
    return this.each(function () {
      var $this    = $(this)
      var data     = $this.data('bs.calendarPopover')
      var options  = typeof option == 'object' && option
      var selector = options && options.selector

      if (! data && option == 'destroy')
        return
      if (selector) {
        if (! data)
          $this.data('bs.calendarPopover', (data = {}))
        if (! data[selector])
          data[selector] = new CalendarPopover(this, options)
      } else {
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
    }
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
