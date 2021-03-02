// headerMenuVars are set in functions.php
console.log(headerMenuVars);

var navTree = [
  {
    href: "/",
    text: "Home",
    type: "icon",
    class: "home"

  },
  {
    text: "One Column",
    href: "/",
    items: [
      [
        {
          href: "https://www.asu.edu/",
          text: "A test navigation item"
        },
        {
          href: "https://www.asu.edu/",
          text: "Mauris viverra, sem nec"
        },
        {
          href: "https://www.asu.edu/?feature=athletics",
          text: "Massa nunc dictum nam venenatis"
        },
        {
          href: "https://www.asu.edu/?feature=alumni",
          text: "Alumni"
        },
        {
          href: "https://www.asu.edu/?feature=giving",
          text: "Giving"
        },
        {
          href: "https://www.asu.edu/?feature=president",
          text: "President"
        },
        {
          href: "https://www.asu.edu/about",
          text: "About ASU"
        }
      ]
    ]
  },
  {
    text: "Two Column",
    href: "/",
    items: [
      [
        {
          type: "heading",
          text: "Column 1"
        },
        {
          href: "https://www.asu.edu/",
          text: "Pellentesque ornare"
        },
        {
          href: "https://www.asu.edu/",
          text: "Curabitur viverra arcu nisl"
        },
        {
          href: "https://www.asu.edu/?feature=athletics",
          text: "Aenean pharetra"
        },
        {
          href: "https://www.asu.edu/?feature=alumni",
          text: "Pellentesque"
        },
        {
          href: "https://www.asu.edu/?feature=giving",
          text: "Donec sagittis nulla"
        },
        {
          href: "https://www.asu.edu/?feature=president",
          text: "Quisque fringilla"
        },
        {
          href: "https://www.asu.edu/about",
          text: "Integer vel gravida lectus"
        }
      ],
      [
        {
          type: "heading",
          href: "https://www.asu.edu/?feature=newsevents",
          text: "Ut quis"
        },
        {
          href: "https://www.asu.edu/?feature=academics",
          text: "Nunc in libero odio"
        },
        {
          href: "https://www.asu.edu/?feature=research",
          text: "Maecenas quam elit"
        },
        {
          href: "https://www.asu.edu/?feature=academics",
          text: "Ut at vehicula neque"
        },
        {
          type: "button",
          href: "https://www.asu.edu/?feature=athletics",
          text: "Sed molestie"
        }
      ]
    ]
  },
  {
    text: "Mega Menu (3 Col)",
    href: "#",
    items: [
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Maecenas lacinia"
        },
        {
          href: "https://havasu.asu.edu/",
          text: "Curabitur viverra arcu nisl"
        },
        {
          href: "https://www.thunderbird.edu/about-thunderbird/locations/phoenix-arizona",
          text: "Thunderbird"
        },
        {
          href: "https://skysong.asu.edu/",
          text: "Skysong"
        },
        {
          href: "https://asuresearchpark.com/",
          text: "Research Park"
        },
        {
          href: "https://washingtoncenter.asu.edu/",
          text: "Washington D.C."
        },
        {
          href: "https://wpcarey.asu.edu/mba/china-program/english/",
          text: "China"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 2"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Phasellus egestas nec est "
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Pellentesque et mollis"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Cras congue"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Cras ut malesuada nisl"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Downtown Phoenix"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 3 Heading"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Map"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Tempe"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "West"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Polytechnic"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Downtown Phoenix"
        }
      ]
    ]
  },
  {
    text: "Mega Menu (4 Col)",
    href: "#",
    items: [
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Header Column 1"
        },
        {
          href: "https://havasu.asu.edu/",
          text: "Lake Havasu"
        },
        {
          href: "https://www.thunderbird.edu/about-thunderbird/locations/phoenix-arizona",
          text: "Thunderbird"
        },
        {
          href: "https://skysong.asu.edu/",
          text: "Skysong"
        },
        {
          href: "https://asuresearchpark.com/",
          text: "Research Park"
        },
        {
          href: "https://washingtoncenter.asu.edu/",
          text: "Washington D.C."
        },
        {
          href: "https://wpcarey.asu.edu/mba/china-program/english/",
          text: "China"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 2"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Faculty and Staff Directory"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "The Tempe Campus"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Sun Devils and Things"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Another nav link"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Action"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 3"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "University Technology Office"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Sun Devil Football"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "The School of Something"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Polytechnic"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Another Button"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 4"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Maps and Directions"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Office of the technology"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Office of the business"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Some longer text office of longtext"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Downtown Phoenix"
        }
      ]
    ]
  },
  {
    text: "Mega Menu (5 Col)",
    href: "#",
    items: [
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column One Heading Text"
        },
        {
          href: "https://havasu.asu.edu/",
          text: "The Lake Havasu Campus"
        },
        {
          href: "https://www.thunderbird.edu/about-thunderbird/locations/phoenix-arizona",
          text: "Thunderbird"
        },
        {
          href: "https://skysong.asu.edu/",
          text: "Skysong"
        },
        {
          href: "https://asuresearchpark.com/",
          text: "Research Park"
        },
        {
          href: "https://washingtoncenter.asu.edu/",
          text: "Washington D.C."
        },
        {
          href: "https://wpcarey.asu.edu/mba/china-program/english/",
          text: "China"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 2"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Faculty and Staff Directory"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "The Tempe Campus"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Sun Devils and Things"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Another nav link"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Action Button"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 3"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "University Technology Office"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Sun Devil Football"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "The School of Something"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Polytechnic"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Another Button"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column 4"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Maps and Directions"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Office of the technology"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Office of the business"
        },
        {
          href: "https://campus.asu.edu/polytechnic/",
          text: "Some longer text office of longtext"
        },
        {
          type: "button",
          href: "https://campus.asu.edu/downtown/",
          text: "Downtown Phoenix"
        }
      ],
      [
        {
          type: "heading",
          href: "https://asuonline.asu.edu/",
          text: "Column Five"
        },
        {
          href: "https://www.asu.edu/map/",
          text: "Buildings and directory"
        },
        {
          href: "https://campus.asu.edu/tempe/",
          text: "Some good news"
        },
        {
          href: "https://campus.asu.edu/west/",
          text: "Directory Admin Tools"
        }
      ]
    ]
  }
];

var buttons = [
  {
    text: "Apply Now",
    type: "button",
    color: "gold",
    href: "https://admissions.asu.edu",
    target: "_top"
  },
        {
    text: "CTA Button",
    type: "button",
    color: "maroon",
    href: "https://asu.edu",
    target: "_top"
  }
];

var props = {
  title: headerMenuVars.title,
  parentOrg: headerMenuVars.parentOrg,
  parentOrgUrl: headerMenuVars.parentOrgUrl,
  loggedIn: headerMenuVars.loggedIn,
  userName: headerMenuVars.userName,
  logoutLink: headerMenuVars.logoutLink,
  loginLink: headerMenuVars.loginLink,
  navTree: navTree,

};

componentsLibrary.initHeader(props);

// Initialize cookie consent banner if needed
AsuCookieConsent.init();
