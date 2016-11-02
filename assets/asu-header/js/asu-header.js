/*
 * *****
 * - ASU HEADER V4.5
 * *****
 */
(function (ASUHeader, undefined) {
  //  console.log('inside');
  (function () {
    if (!document.getElementsByClassName) {
      var indexOf = [].indexOf || function (prop) {
        for (var i = 0; i < this.length; i++) {
          if (this[i] === prop) return i;
        }
        return -1;
      };
      getElementsByClassName = function (className, context) {
        var elems = document.querySelectorAll ? context.querySelectorAll("." + className) : (function () {
          var all = context.getElementsByTagName("*"),
            elements = [],
            i = 0;
          for (; i < all.length; i++) {
            if (all[i].className && (" " + all[i].className + " ").indexOf(" " + className + " ") > -1 && indexOf.call(elements, all[i]) === -1) elements.push(all[i]);
          }
          return elements;
        })();
        return elems;
      };
      document.getElementsByClassName = function (className) {
        return getElementsByClassName(className, document);
      };
      Element.prototype.getElementsByClassName = function (className) {
        return getElementsByClassName(className, this);
      };
    }
  })();
  /*
   * classList.js: Cross-browser full element.classList implementation.
   * 2011-06-15
   *
   * By Eli Grey, http://eligrey.com
   * Public Domain.
   * NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.
   */

  /*global self, document, DOMException */

  /*! @source http://purl.eligrey.com/github/classList.js/blob/master/classList.js*/
  if (typeof document !== "undefined" && !("classList" in document.createElement("a"))) {
    (function (view) {
      "use strict";
      var classListProp = "classList",
        protoProp = "prototype",
        elemCtrProto = (view.HTMLElement || view.Element)[protoProp],
        objCtr = Object,
        strTrim = String[protoProp].trim || function () {
          return this.replace(/^\s+|\s+$/g, "");
        },
        arrIndexOf = Array[protoProp].indexOf || function (item) {
          var
            i = 0,
            len = this.length;
          for (; i < len; i++) {
            if (i in this && this[i] === item) {
              return i;
            }
          }
          return -1;
        }
        // Vendors: please allow content code to instantiate DOMExceptions
        ,
        DOMEx = function (type, message) {
          this.name = type;
          this.code = DOMException[type];
          this.message = message;
        },
        checkTokenAndGetIndex = function (classList, token) {
          if (token === "") {
            throw new DOMEx(
              "SYNTAX_ERR", "An invalid or illegal string was specified"
            );
          }
          if (/\s/.test(token)) {
            throw new DOMEx(
              "INVALID_CHARACTER_ERR", "String contains an invalid character"
            );
          }
          return arrIndexOf.call(classList, token);
        },
        ClassList = function (elem) {
          var trimmedClasses = strTrim.call(elem.className),
            classes = trimmedClasses ? trimmedClasses.split(/\s+/) : [],
            i = 0,
            len = classes.length;
          for (; i < len; i++) {
            this.push(classes[i]);
          }
          this._updateClassName = function () {
            elem.className = this.toString();
          };
        },
        classListProto = ClassList[protoProp] = [],
        classListGetter = function () {
          return new ClassList(this);
        };
      // Most DOMException implementations don't allow calling DOMException's toString()
      // on non-DOMExceptions. Error's toString() is sufficient here.
      DOMEx[protoProp] = Error[protoProp];
      classListProto.item = function (i) {
        return this[i] || null;
      };
      classListProto.contains = function (token) {
        token += "";
        return checkTokenAndGetIndex(this, token) !== -1;
      };
      classListProto.add = function (token) {
        token += "";
        if (checkTokenAndGetIndex(this, token) === -1) {
          this.push(token);
          this._updateClassName();
        }
      };
      classListProto.remove = function (token) {
        token += "";
        var index = checkTokenAndGetIndex(this, token);
        if (index !== -1) {
          this.splice(index, 1);
          this._updateClassName();
        }
      };
      classListProto.toggle = function (token) {
        token += "";
        if (checkTokenAndGetIndex(this, token) === -1) {
          this.add(token);
        } else {
          this.remove(token);
        }
      };
      classListProto.toString = function () {
        return this.join(" ");
      };

      if (objCtr.defineProperty) {
        var classListPropDesc = {
          get: classListGetter,
          enumerable: true,
          configurable: true
        };
        try {
          objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
        } catch (ex) { // IE 8 doesn't support enumerable:true
          if (ex.number === -0x7FF5EC54) {
            classListPropDesc.enumerable = false;
            objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
          }
        }
      } else if (objCtr[protoProp].__defineGetter__) {
        elemCtrProto.__defineGetter__(classListProp, classListGetter);
      }

    }(self));

  }
  /* *---------------------------------------------------------------------------------------------* */
  /*
   * *****
   * - SSO
   * *****
   */
  //public
  ASUHeader.alterLoginHref = function (url) {
      if (ASUHeader.signin_url != '') {
        return ASUHeader.signin_url;
      }
      if (ASUHeader.signin_callback_url == '') {
        ASUHeader.signin_callback_url = window.location.toString();
      }
      url = unescape(url); // Decode the URL just in case
      url = url.replace('/login', '/login?callapp=' + ASUHeader.signin_callback_url); // set the callapp into the url
      ASUHeader.signin_url = url;
      return ASUHeader.signin_url;
    }
    //public
  ASUHeader.checkSSOCookie = function () {
      var cookies = document.cookie.split(";"); // try to parse out the username from SSONAME cookie
      for (var i = 0; i < cookies.length; i++) {
        if (cookies[i].indexOf('SSONAME') > 0) {
          if (cookies[i].substring(9) == "") {
            break;
          }
          ASUHeader.user_displayname = cookies[i].substring(9);
          ASUHeader.user_signedin = true;
          break;
        }
      }
    }
    //public
  ASUHeader.setSSOLink = function () {
    // break out if the correct variables are not set or if the user is not signed in
    if (typeof ASUHeader.user_signedin == "undefined" || ASUHeader.user_signedin == false) {
      return;
    }
    var ul = document.getElementById('asu_login_module');
    while (ul.childNodes[0]) {
      ul.removeChild(ul.childNodes[0]);
    }
    if (ASUHeader.user_displayname) {
      var sso_name = document.createElement('li');
      //sso_name.innerHTML = ASUHeader.user_displayname; --- Security fix suggested by Jason Harper on 5/3/2013
      var ASUHeaderStr;
      if(ASUHeader.user_displayname){
        ASUHeaderStr = ASUHeader.user_displayname;
        ASUHeaderStr.toString();
        ASUHeaderStr = ASUHeaderStr.replace(/[^\w\s]/gi, '');
      }
      sso_name.appendChild(document.createTextNode(ASUHeaderStr));
      ul.appendChild(sso_name);
    }
    var sso_link = document.createElement('li');
    sso_link.innerHTML = '<a target="_top" href="' + ASUHeader.signout_url + '">Sign Out</a>';
    sso_link.className = 'end';
    sso_link.id = 'asu_hdr_sso';
    ul.appendChild(sso_link);
    if (document.getElementById('myasu_bar') != null) {
      document.getElementById('myasu_bar').style.display = "block";
    }
  }
  window.onload = function () {
    //  console.log('onload');
    if (!ASUHeader.browser) {
      //  console.log('asuheader.browser');
      removeEmptyTextNodes(document.getElementById('asu_hdr'));
      /*
       * *****
       * - DO YOU HAVE YOUR THINKING CAP ON?
       * *****
       */
      var bo = document.createElement('div');
      bo.id = 'blackOut';
      document.body.appendChild(bo);
      //create mobile nav from base desktop nav
      //add correct class names
      //organize children 
      var a = document.getElementById('asu_universal_nav');
      //clean copy of desktop nav
      var onav = a.innerHTML;
      //continue with mobile
      var dNav = a.firstChild.children;
      for (var i = 0, len = dNav.length; i < len; i++) {
        if (dNav[i].className === '') {
          dNav[i].classList.add('cb');
        }
        if (dNav[i].className == 'parent') {
          var icn2 = document.createElement('div');
          icn2.classList.add('icn2', 'f-sort-down');
          dNav[i].appendChild(icn2);
          dNav[i].classList.remove('parent');
          dNav[i].classList.add('cb');
          var innerUL = dNav[i].firstChild.nextSibling;
          var innerChild = innerUL.children;
          for (var j = 0, le = innerChild.length; j < le; j++) {
            if (innerChild[j].className === '') {
              innerChild[j].classList.add('ccb');
            }
          }
          var newLI = document.createElement('li');
          newLI.appendChild(innerUL);
          newLI.classList.add('clb', 'closed', 'parent');
          dNav[i].appendChild(newLI);
        }
      }
      //  console.log('test');
      //get newly built html
      var a = document.getElementById('asu_universal_nav');
      var nav = a.innerHTML;
      //create new div for mobile
      var divTag = document.createElement("div");
      divTag.id = "asu_universal_nav";
      divTag.innerHTML = onav;
      //add mobile specific tags
      a.id = 'asu_universal_nav_new';
      a.innerHTML = '';
      var ul = document.createElement('ul');
      if (typeof ASUHeader.site_menu !== "undefined" && typeof ASUHeader.site_menu.site_name !== 'undefined') {
        addLi(ul, 'tlb site_title', '<span>' + ASUHeader.site_menu.site_name + '</span>');
      }
      if (typeof ASUHeader.user_signedin == "undefined" || ASUHeader.user_signedin === false) {
        //signin
        addLi(ul, 'tlb', '<div class="text"><a href="https://weblogin.asu.edu/cgi-bin/login" onclick="this.href=ASUHeader.alterLoginHref(this.href);" onfocus="this.href=ASUHeader.alterLoginHref(this.href);" onmouseover="this.href=ASUHeader.alterLoginHref(this.href);" target="_top">Sign In</a></div><div id="f-user" class="icn f-user"></div>');
      } else {
        //signout
        var ASUHeaderStr;
        if(ASUHeader.user_displayname){
          ASUHeaderStr = ASUHeader.user_displayname;
          ASUHeaderStr.toString();
          ASUHeaderStr = ASUHeaderStr.replace(/[^\w\s]/gi, '');
        }
        addLi(ul, 'tlb', '<div class="text"><a target="_top" href="' + ASUHeader.signout_url + '">' + ASUHeaderStr + ' Sign Out</a></div><div id="f-user" class="icn f-user"></div>');
      }

      addLi(ul, 'tlb', '<div class="text"><a>ASU Info</a></div><div class="icn f-sort-down"></div>');
      addLi(ul, 'clb closed', nav);
      /* SITE MENU JSON
       */
      if (typeof ASUHeader.site_menu !== 'undefined' && typeof ASUHeader.site_menu.json !== 'undefined') {
        var json = JSON.parse(ASUHeader.site_menu.json);
        for (var key in json) {
          if (json.hasOwnProperty(key)) {
            var icon = '<div class="icn f-share-square-o"></div>';
            if (json[key].children) {
              icon = '<div class="icn f-sort-down"></div>';
              if (json[key].path) {
                addLi(ul, 'tlb', '<div class="text"><a href="' + json[key].path + '">' + json[key].title + '</a></div>' + icon);
              } else {
                addLi(ul, 'tlb', '<div class="text"><a href="#">' + json[key].title + '</a></div>' + icon);
              }
              var ul2 = document.createElement('ul');
              for (var key2 in json[key].children) {
                icon = '<div class="icn2 f-sort-down"></div>';
                if (json[key].children[key2].children) {
                  if (json[key].children[key2].path) {
                    addLi(ul2, 'cb', '<a href="' + json[key].children[key2].path + '">' + json[key].children[key2].title + '</a>' + icon);
                  } else {
                    addLi(ul2, 'cb', '<a href="#">' + json[key].children[key2].title + '</a>' + icon);
                  }
                } else {
                  if (json[key].children[key2].path) {
                    addLi(ul2, 'cb', '<a href="' + json[key].children[key2].path + '">' + json[key].children[key2].title + '</a>');
                  } else {
                    addLi(ul2, 'cb', '<a href="#">' + json[key].children[key2].title + '</a>');
                  }
                }
                var ul3 = document.createElement('ul');
                for (var key3 in json[key].children[key2].children) {
                  if (json[key].children[key2].children[key3].path) {
                    addLi(ul3, 'ccb', '<a href="' + json[key].children[key2].children[key3].path + '">' + json[key].children[key2].children[key3].title + '</a>');
                  } else {
                    addLi(ul3, 'ccb', '<a href="#">' + json[key].children[key2].children[key3].title + '</a>');
                  }
                }
                addLi(ul2, 'clb closed', ul3);
                ul3 = '';
              }
              addLi(ul, 'clb closed', ul2);
              ul2 = '';
            } else {
              addLi(ul, 'tlb', '<div class="text"><a href="' + json[key].path + '">' + json[key].title + '</a></div>' + icon);
            }
          }
        }
      }
      a.insertBefore(ul, a.firstChild);
      //  console.log(a.firstChild);
      document.getElementById('asu_nav_menu').appendChild(divTag);
      
      /*
        **
        - Accessibility
        **
        Class Name - asu_head_hover
      */
      
      (function applyAccessibility(){
        var navTop = document.querySelectorAll("#asu_universal_nav>ul>li>a");
        var navInner = document.querySelectorAll("#asu_universal_nav ul li.parent>ul>li>a");
        
        document.body.addEventListener("click", function(){
          removeHover();
        }, true);
        
        for(var j=0;j<navTop.length;j++){
          if(navTop[j] && navTop[j].parentNode){
            
            
            navTop[j].addEventListener("focus", function(){
              removeHover();
              if(this.parentNode.classList.contains("parent")){
                this.nextSibling.classList.add("asu_head_hover");
              }
            });
            navTop[j].addEventListener("mouseover", function(){
//              this.focus();
              document.activeElement.blur();
            });
          }         
        }
        for(var k=0;k<navInner.length;k++){
          if(navInner[k]){
            navInner[k].addEventListener("focus", function(){
              if(!this.parentNode.parentNode.classList.contains("asu_head_hover")){
                removeHover();
                this.parentNode.parentNode.classList.add("asu_head_hover");
              }
            });
          }
        }
        function removeHover(){
          var hovering = document.querySelectorAll(".asu_head_hover");
          for(var i = 0; i < hovering.length; i++){
            hovering[i].classList.remove("asu_head_hover");
          }
        }
        //  console.log("accessible!");
      })();

      // END Accessibility

      //create search [GSA | COLLECTION]
      createSearch('main-search');
      /*
       * *****
       * - MOBILE NAVIGATION
       * *****
       */
      //parent management
      var g = document.querySelectorAll('#asu_hdr .icn');
      for (var i = 0, len = g.length; i < len; i++) {
        (function (i) {
          g[i].onclick = function () {
            for (var k = 0, len = g.length; k < len; k++) {
              if (g[k].classList.contains('f-sort-up')) {
                g[k].classList.remove('f-sort-up');
                g[k].classList.add('f-sort-down');
              }
            }
            var a = [];
            var a = document.getElementsByClassName('xa');
            var x = g[i].parentNode.nextSibling;
            if (x !== null) {
              if (x.classList.contains('closed')) {
                if (a[0]) {
                  a[0].classList.add('closed');
                  a[0].classList.remove('opened', 'xa');
                }
                x.classList.remove('closed');
                x.classList.add('opened', 'xa');
                g[i].classList.remove('f-sort-down');
                g[i].classList.add('f-sort-up');
              } else if (x.classList.contains('opened', 'xa')) {
                x.classList.remove('opened', 'xa');
                x.classList.add('closed');
                g[i].classList.remove('f-sort-up')
                g[i].classList.add('f-sort-down');
                var z = x.firstChild.children;
                for (var l = 0, len = z.length; l < len; l++) {
                  if (z[l].classList.contains('opened')) {
                    z[l].classList.remove('opened');
                    z[l].classList.add('closed');
                    z[l].previousSibling.firstChild.nextSibling.classList.remove('f-sort-up');
                    z[l].previousSibling.firstChild.nextSibling.classList.add('f-sort-down');
                  }
                }
              }
            }
          }
        })(i);
      }
      //child management
      var h = document.querySelectorAll('#asu_hdr .icn2'); //child icon object
      for (var i = 0, len = h.length; i < len; i++) { //iterate
        (function (i) { //create a function for each icon
          h[i].onclick = function () { //on click
            var x = h[i].parentNode.nextSibling; //set x equal to the next li
            for (var k = 0, len = h.length; k < len; k++) { //iterater
              if (h[k].classList.contains('f-sort-up') && h[k] != h[i]) {
                var y = h[k].parentNode.nextSibling;
                h[k].classList.remove('f-sort-up');
                h[k].classList.add('f-sort-down');
                y.classList.remove('opened');
                y.classList.add('closed');
              }
            }
            if (x.classList.contains('closed')) {
              x.classList.remove('closed');
              x.classList.add('opened');
              h[i].classList.remove('f-sort-down');
              h[i].classList.add('f-sort-up');
            } else {
              x.classList.remove('opened');
              x.classList.add('closed');
              h[i].classList.remove('f-sort-up');
              h[i].classList.add('f-sort-down');
            }
          }
        })(i);
      }
      /*
       * *****
       * - LINK OUT BTN
       * *****
       */
      var n = document.getElementsByClassName('f-share-square-o');
      for (var i = 0, len = n.length; i < len; i++) { //iterate
        (function (i) { //create a function for each icon
          n[i].onclick = function () { //on click
            window.location.href = n[i].parentNode.firstChild.firstChild.getAttribute("href");
          }
        })(i);
      }
      document.getElementById('f-user').onclick = function () {
        window.location.href = this.parentNode.firstChild.firstChild.getAttribute("href");
      }
    }
    createSearch('asu_search_module');
  }

  //check mobile search | if open > close
  var a = document.getElementById('main-search');
  if (typeof a != 'undefined' && a != null) {
    window.onresize = function () {
      if (window.innerWidth > 991) {
        //check mobile search | if open > close
        //close if open
        if (a.classList.contains('opened')) {
          ASUHeader.toggleASU('main-search');
        }
        //check mobile nav | if open > close
        var a = document.getElementById('asu_mobile_menu');
        if (a.classList.contains('opened')) {
          closeMenuItems();
          ASUHeader.toggleASU(false);
        }
      }
    }
  }
  /*
   * *****
   * - CREATE SEARCH FUNCTION
   * *****
   */
  //private
  function createSearch(parent) {
        var boxid = '';
        if(parent == "asu_search_module"){
            boxid = "masu_search_box";
        } else{
            boxid = "asu_search_box";
        }
    var label = document.createElement("label");
    label.htmlFor = boxid;
    label.textContent = "Search";
    label.style.cssText = 'display:none !important';
    var parent = document.getElementById(parent);
    var form = document.createElement('form');
    var inpt = document.createElement('input');
    var a = document.getElementById('search_new');
    var url = document.location.pathname;
    url = url.split('/');
    url = url[1];
    if (url == 'global' || url == 'search') {
      a.style.cssText = 'display:none !important'
      return;
    } else {
      a.style.cssText = 'display:inherit !important'
    }
    if (typeof ASUHeader !== 'undefined' && ASUHeader.gsa) {
      form.id = 'google/appliance/block/form';
      form.method = 'post';
      //form,type,name,class,id,value,place holder
      addInpt(form, 'text', 'search_header', 'asu_search_box', 'asu_search_box', '', 'Search');
      addInpt(form, 'submit', '', 'asu_search_button', '', 'Search', '');
    } else {
      form.target = '_top';
      form.action = 'https://search.asu.edu/search';
      form.method = 'get';
      form.name = 'gs';
      //form,type,name,class,id,value,place holder
      addInpt(form, 'hidden', 'site', '', '', 'default_collection', '');
      addInpt(form, 'hidden', 'sort', '', '', 'date:D:L:d1', '');
      addInpt(form, 'hidden', 'output', '', '', 'xml_no_dtd', '');
      addInpt(form, 'hidden', 'proxystylesheet', '', '', 'asu_frontend', '');
      addInpt(form, 'hidden', 'ie', '', '', 'UTF-8', '');
      addInpt(form, 'hidden', 'oe', '', '', 'UTF-8', '');
      addInpt(form, 'hidden', 'client', '', '', 'asu_frontend', '');
      addInpt(form, 'submit', '', 'asu_search_button', '', 'Search', '');
      addInpt(form, 'text', 'q', boxid, 'asu_search_box', '', 'Search');
    }
    
    form.insertBefore(label, form.firstChild);
    parent.innerHtml = '';
    parent.appendChild(form);
    form = '';
  }
  /*
   * *****
   * - ADD INPUT 2 FORM FUNCTION
   * *****
   */
  //private
  function addInpt(form, typ, nam, cl, id, val, plh) {
    var inpt = document.createElement('input');
    if (nam) {
      inpt.name = nam;
    }
    if (cl) {
      inpt.className = cl;
    }
    if (id) {
      inpt.id = id;
    }
    if (plh) {
      inpt.placeholder = plh;
      inpt.autocomplete = "off";
    } else if (val) {
      inpt.value = val;
    }
    inpt.type = typ;
    form.appendChild(inpt);
  }
  /*
   * *****
   * - ADD LI 2 UL FUNCTION
   * *****
   */
  //private
  function addLi(ul, cl, html) {
    var li = document.createElement("li");
    li.className = cl;
    if (typeof html === 'object') {
      li.innerHTML = html.outerHTML;
    } else {
      li.innerHTML = html;
    }
    ul.appendChild(li);
  }
  /*
   * *****
   * - DYNAMIC TOGGLE FUNCTION
   * *****
   */
  //public
  ASUHeader.toggleASU = function (id) {
      if (!id) {
        var id = 'asu_mobile_menu';
      }
      var el = document.getElementById(id);
      if (id == 'asu_mobile_menu') {
        var m = document.getElementById('asu_mobile_button');
        var blackOut = document.getElementById('blackOut');
      }
      if (id == 'main-search') {
        var a = document.getElementById('search_new');
        var b = document.getElementById('asu_search_box');
        a.classList.toggle('clicked');
        if (a.classList.contains('clicked')) {
          b.focus();
        } else {
          b.blur();
        }
      }
      if (typeof el != 'undefined' && el != null) {
        if (el.classList.contains('closed')) {
          if (m) {
            m.classList.remove('f-navicon');
            m.classList.add('f-times');
            blackOut.style.display = 'inherit';
            var body = document.body,
              html = document.documentElement;
            var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            blackOut.style.height = height + 'px';
          }
          el.classList.remove('closed');
          el.classList.add('opened');
        } else {
          if (m) {
            m.classList.remove('f-times');
            m.classList.add('f-navicon');
            blackOut.style.display = 'none';
            blackOut.style.height = '0px';
          }
          closeMenuItems();
          el.classList.remove('opened');
          el.classList.add('closed');
        }
      }
    }
    /*
     * *****
     * - CLOSE ALL OPEN MENU ITEMS
     * *****
     */
    //private
  function closeMenuItems() {
    var a = [];
    a = document.getElementsByClassName('f-sort-up');
    closeTheStuff(a);
  }

  function closeTheStuff(a) {
    for (var i = 0, len = a.length; i < len; i++) {
      var x = a[i].parentNode.nextSibling;
      if (x != null && x.classList.contains('opened')) {
        x.classList.remove('opened');
        x.classList.add('closed');
      }
      a[i].classList.add('f-sort-down');
      a[i].classList.remove('f-sort-up');
    }
  }
  /* *****
   * - REMOVE WHITE SPACE
   * *****
   */
  //private
  function removeEmptyTextNodes(elem) {
    var children = elem.childNodes;
    var child;
    var len = children.length;
    var i = 0;
    var whitespace = /^\s*$/;
    for (; i < len; i++) {
      child = children[i];
      if (child.nodeType == 3) {
        if (whitespace.test(child.nodeValue)) {
          elem.removeChild(child);
          i--;
          len--;
        }
      } else if (child.nodeType == 1) {
        removeEmptyTextNodes(child);
      }
    }
  }
})(window.ASUHeader = window.ASUHeader || {});