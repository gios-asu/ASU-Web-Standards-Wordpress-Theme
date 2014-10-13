<?php
/**
 * The Header for the ASU Wordpress theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'wptemplate-gios-v1' ); ?></a>

  <!-- ASU Global Navigation -->
  <header id="asu_header" role="banner">
    <div id="block-asu-brand-asu-brand-header" class="block block-asu-brand">
      <div class="content container">
        <div id="asu_hdr" class="asu_hdr_white chrome">
         <div id="asu_mobile_hdr">
           <div id="asu_logo">
             <a target="_top" href="//www.asu.edu/" title="Arizona State University">
               <img src="//www.asu.edu/asuthemes/4.0-rsp.1/images/logos/asu_logo_white.png" alt="Arizona State University" height="32" width="203" style="margin-top:11px" title="Arizona State University">
             </a>
           </div><!-- /#asu_logo  -->
           <img src="<?php header_image(); ?>" alt="Arizona State University" height="32" width="203" id="asu_print_logo" />
           <div id="asu_school_name"><?php bloginfo( 'name' ); ?></div>
           <div id="asu_mobile_button" class="asushow"><a href="javascript:toggleASU();">Menu</a></div>
          </div><!-- /#asu_mobile_hdr  -->
          <div id="asu_mobile_menu" class="asutoggle_off">
            <div id="asu_nav_wrapper">
              <span class="asu-sign-in">
                <h2 class="hidden">Sign In / Sign Out</h2>
                <ul id="asu_login_module"><li>User</li><li class="end" id="asu_hdr_sso"><a target="_top" href="https://webapp4.asu.edu/myasu/Signout">SIGN OUT</a></li></ul>
              </span>
              <div id="asu_nav_menu">
                <h2 class="hidden">Menu</h2>
                <div id="asu_universal_nav">
                  <ul>
                    <li><a target="_top" href="//www.asu.edu/">ASU Home</a></li>
                    <li><a target="_top" href="https://my.asu.edu/">My ASU</a></li>
                    <li class="parent"><a target="_top" href="//www.asu.edu/colleges/">Colleges &amp; Schools</a>
                      <ul>
                        <li><a target="_top" class="first" href="//artsandsciences.asu.edu/" title="Arts and Sciences website">Arts and Sciences</a></li>
                        <li><a target="_top" href="//wpcarey.asu.edu/" title="W. P. Carey School of Business Web  and Morrison School of Agribusiness website">Business</a></li>
                        <li><a target="_top" href="//herbergerinstitute.asu.edu" title="Herberger Institute for Design and the Arts website">Design and the Arts</a></li>
                        <li><a target="_top" href="//education.asu.edu/" title="Mary Lou Fulton Teachers College website">Education </a></li>
                        <li><a target="_top" href="//engineer.asu.edu/" title="Engineering website">Engineering</a></li>
                        <li><a target="_top" href="//graduate.asu.edu" title="Graduate College website">Graduate</a></li>
                        <li><a target="_top" href="https://chs.asu.edu/" title="Health Solutions website">Health Solutions</a></li>
                        <li><a target="_top" href="//honors.asu.edu/" title="Barrett, The Honors College website">Honors</a></li>
                        <li><a target="_top" href="//cronkite.asu.edu" title="Walter Cronkite School of Journalism and Mass Communication website">Journalism</a></li>
                        <li><a target="_top" href="//www.law.asu.edu/" title="Sandra Day O' Connor College of Law website">Law</a></li>
                        <li><a target="_top" href="//nursingandhealth.asu.edu/" title="College of Nursing and Health Innovation website">Nursing and Health Innovation</a></li>
                        <!-- li><a href="//nursingandhealth.asu.edu/nutrition" title="School of Nutrition and Health Promotion website">Nutrition and Health Promotion</a></li -->
                        <li><a target="_top" href="//copp.asu.edu" title="College of Public Programs website">Public Programs</a></li>
                        <li><a target="_top" href="//schoolofsustainability.asu.edu" title="School of Sustainability website">Sustainability</a></li>
                        <li><a target="_top" href="//technology.poly.asu.edu/" title="College of Technology and Innovation website">Technology and Innovation</a></li>
                        <li><a target="_top" href="//uc.asu.edu/" title="University College website">University College</a></li>
                      </ul>
                    </li>
                    <li class="parent"><a target="_top" href="//www.asu.edu/map/">Map &amp; Locations</a>
                      <ul>
                        <li><a target="_top" class="border first" href="//www.asu.edu/map/">Map</a></li>
                        <li><a target="_top" href="//campus.asu.edu/tempe/" title="Tempe campus">Tempe</a></li>
                        <li><a target="_top" href="//campus.asu.edu/west/" title="West campus">West</a></li>
                        <li><a target="_top" href="//campus.asu.edu/polytechnic/" title="Polytechnic campus">Polytechnic</a></li>
                        <li><a target="_top" href="//campus.asu.edu/downtown/" title="Downtown Phoenix campus">Downtown Phoenix</a></li>
                        <li><a target="_top" href="//asuonline.asu.edu/" title="Online and Extended campus">Online and Extended</a></li>
                        <li><a target="_top" class="border" href="//havasu.asu.edu/">Lake Havasu</a></li>
                        <li><a target="_top" href="//skysong.asu.edu/">Skysong</a></li>
                        <li><a target="_top" href="//asuresearchpark.com/">Research Park</a></li>
                        <li><a target="_top" href="//washingtoncenter.asu.edu/">Washington D.C.</a></li>
                        <li><a target="_top" href="//wpcarey.asu.edu/mba/china-program/english/">China</a></li>
                      </ul>
                    </li>
                    <li><a target="_top" href="//www.asu.edu/contactasu/" title="Directory, Index and other info">Directory</a></li>
                  </ul>
                  <img class="asu_touch" src="//www.asu.edu/asuthemes/4.0-rsp.1/images/ipad_close.gif" alt="">
                </div><!-- /#asu_universal_nav -->
              </div><!-- /#asu_nav_menu -->
            </div><!-- /#asu_nav_wrapper -->
            <div id="asu_search">
              <h2 class="hidden">Search</h2>
              <div id="asu_search_module">
                <form target="_top" action="https://search.asu.edu/search" method="get" name="gs">
                  <label class="hidden" for="asu_search_box">Search</label>
                  <input name="site" value="default_collection" type="hidden">
                  <input type="text" name="q" size="32" value="Search ASU" id="asu_search_box" class="asu_search_box">
                  <input type="submit" value="Search" title="Search" class="asu_search_button">
                  <input name="sort" value="date:D:L:d1" type="hidden">
                  <input name="output" value="xml_no_dtd" type="hidden">
                  <input name="ie" value="UTF-8" type="hidden">
                  <input name="oe" value="UTF-8" type="hidden">
                  <input name="client" value="asu_frontend" type="hidden">
                  <input name="proxystylesheet" value="asu_frontend" type="hidden">
                </form>
              </div><!-- /#asu_search_module -->
            </div><!-- /#asu_search -->
          </div><!-- /#asu_mobile_menu -->
        </div><!-- /#asu_hdr -->
        <div style="clear:both;"></div>
      </div><!-- /.content -->
    </div><!-- /#block-asu-brand-asu-brand-header -->
  </header>
  <script type="text/javascript">
    <!--//--><![CDATA[//><!--
    ASUHeader.default_search_text = "Search ASU's Cats";
    ASUHeader.default_search_alttext = "Search ASU's Cats";
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
    }
    //--><!]]>
  </script> 
  <!-- /#asu_hdr --> 

  <!-- Global Navigation -->
  <nav class="navbar navbar-ws" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-example">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
      </div>
      <?php

      $homeUrl = esc_url( home_url( '/' ) ); 
      $wrapper = '<ul id="%1$s" class="%2$s">';
      $wrapper .= '<li>';
      $wrapper .= "<a href=\"$homeUrl\" title=\"Home\">";
      $wrapper .= '<span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span><span class="hidden-md hidden-lg">Home</span>';
      $wrapper .= '</a>';
      $wrapper .= '</li>';
      $wrapper .= '%3$s';
      $wrapper .= '</ul>';
      
        wp_nav_menu( array(
          'menu'              => 'primary',
          'theme_location'    => 'primary',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'bs-example-navbar-collapse-1',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker(),
          'items_wrap'        => $wrapper)
        );
      ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>

  <!-- Page content -->
  <div id="page" class="hfeed site ">
    <div id="content" class="site-content container">
      <div class="row row-padding-cancel">