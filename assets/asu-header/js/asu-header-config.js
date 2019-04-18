// asu-header-config.js
//  to be included after asu-header.js

/* This is redundant code, as it is included in the header.php file itself
ASUHeader.default_search_text    = "Search ASU";
ASUHeader.default_search_alttext = "Search ASU";
if (typeof ASUHeader.signin_callback_url == "undefined") {
  ASUHeader.signin_callback_url = '';
}
if (typeof ASUHeader.signin_url == "undefined") {
  ASUHeader.signin_url = '';
}
if (typeof ASUHeader.signout_url == "undefined") {
  ASUHeader.signout_url = 'https://webapp4.asu.edu/myasu/Signout';
}
if (typeof ASUHeader.user_signedin == "undefined" ||
    (ASUHeader.user_signedin != false && typeof ASUHeader.user_displayname == "undefined")) {
  ASUHeader.checkSSOCookie();
}
if (ASUHeader.user_signedin == true) {
  ASUHeader.setSSOLink();
}
if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
    document.getElementById('asu_hdr').className = document.getElementById('asu_hdr').className+" chrome";
}*/

// Add our site menu, per the README file
giosMenu = [
  {
    "title": "GIOS Home",
    "path": "/"
  },
  {
    "title": "People",
    "path": "/people"
  },
  {
    "title": "Programs",
    "path": "/programs"
  },
  {
    "title": "Research",
    "path": "/research"
  },
  {
    "title": "Education",
    "path": "/education"
  },
  {
    "title": "Campus",
    "path": "/campus"
  },
  {
    "title": "Partnerships",
    "path": "/partnerships"
  },
  {
    "title": "News",
    "path": "/news"
  },
  {
    "title": "Events",
    "path": "/events"
  },
  {
    "title": "About",
    "path": "/about"
  },
  {
    "title": "Contact",
    "path": "/contact"
  },
];

ASUHeader.site_menu = {
  "json": JSON.stringify(giosMenu)
}