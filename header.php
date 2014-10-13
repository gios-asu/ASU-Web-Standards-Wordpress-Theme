<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wptemplate-gios-v1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<div id="page" class="hfeed site ">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wptemplate-gios-v1' ); ?></a>
  <header id="masthead" class="site-header " role="banner">
    <div class="container site-branding">
    
    
    <div class="row">

    
   <div class="col-sm-6">
      <div class="custom-logo" >
        <?php if ( get_header_image() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
          </a> 
          <?php endif; // End header image check. ?>
      </div>
    </div>
    
  
      <div class="region region-asu-nav col-sm-6">
        <div id="asu_hdr" class="asu_hdr_white chrome">
          <div id="asu_nav_wrapper">
            <span class="asu-sign-in">
              <h2 class="hidden">Sign In / Sign Out</h2>
              <ul id="asu_login_module"><li>User</li><li class="end" id="asu_hdr_sso"><a target="_top" href="https://webapp4.asu.edu/myasu/Signout">SIGN OUT</a></li></ul>
            </span>
            <h2 class="hidden">Navigation: ASU Universal</h2>
            <div id="asu_universal_nav">
              <ul class="asu-nav">
                <li class="first"><a target="_top" href="http://www.asu.edu/">ASU Home</a></li>
                <li><a target="_top" href="https://my.asu.edu/">My ASU</a></li>
                <li class="parent"><a target="_top" href="http://www.asu.edu/colleges/">Colleges &amp; Schools</a>
                  <ul>
                    <li><a target="_top" class="first" href="http://artsandsciences.asu.edu/" title="Arts and Sciences website">Arts and Sciences</a></li>
                    <li><a target="_top" href="http://wpcarey.asu.edu/" title="W. P. Carey School of Business Web  and Morrison School of Agribusiness website">Business</a></li>
                    <li><a target="_top" href="http://herbergerinstitute.asu.edu" title="Herberger Institute for Design and the Arts website">Design and the Arts</a></li>
                    <li><a target="_top" href="http://education.asu.edu/" title="Mary Lou Fulton Teachers College website">Education </a></li>
                    <li><a target="_top" href="http://engineer.asu.edu/" title="Engineering website">Engineering</a></li>
                    <li><a target="_top" href="http://graduate.asu.edu" title="Graduate College website">Graduate</a></li>
                    <li><a target="_top" href="https://chs.asu.edu/" title="Health Solutions website">Health Solutions</a></li>
                    <li><a target="_top" href="http://honors.asu.edu/" title="Barrett, The Honors College website">Honors</a></li>
                    <li><a target="_top" href="http://cronkite.asu.edu" title="Walter Cronkite School of Journalism and Mass Communication website">Journalism</a></li>
                    <li><a target="_top" href="http://www.law.asu.edu/" title="Sandra Day O'Connor College of Law website">Law</a></li>
                    <li><a target="_top" href="http://nursingandhealth.asu.edu/" title="College of Nursing and Health Innovation website">Nursing and Health Innovation</a></li>
                    <li><a target="_top" href="http://copp.asu.edu" title="College of Public Programs website">Public Programs</a></li>
                    <li><a target="_top" href="http://schoolofsustainability.asu.edu" title="School of Sustainability website">Sustainability</a></li>
                    <li><a target="_top" href="http://technology.poly.asu.edu/" title="College of Technology and Innovation website">Technology and Innovation</a></li>
                    <li><a target="_top" href="http://uc.asu.edu/" title="University College website">University (Exploratory)</a></li>
                  </ul>
                </li>
                <li class="parent"><a target="_top" href="http://www.asu.edu/map/">Locations</a>
                  <ul>
                    <li><a target="_top" class="border first" href="http://www.asu.edu/map/">Map</a></li>
                    <li><a target="_top" href="http://campus.asu.edu/tempe/" title="Tempe campus">Tempe</a></li>
                    <li><a target="_top" href="http://campus.asu.edu/west/" title="West campus">West</a></li>
                    <li><a target="_top" href="http://campus.asu.edu/polytechnic/" title="Polytechnic campus">Polytechnic</a></li>
                    <li><a target="_top" href="http://campus.asu.edu/downtown/" title="Downtown Phoenix campus">Downtown Phoenix</a></li>
                    <li><a target="_top" href="http://asuonline.asu.edu/" title="Online and Extended campus">Online and Extended</a></li>
                    <li><a target="_top" class="border" href="http://havasu.asu.edu/">Lake Havasu</a></li>
                    <li><a target="_top" href="http://skysong.asu.edu/">Skysong</a></li>
                    <li><a target="_top" href="http://asuresearchpark.com/">Research Park</a></li>
                    <li><a target="_top" href="http://washingtoncenter.asu.edu/">Washington D.C.</a></li>
                    <li><a target="_top" href="http://wpcarey.asu.edu/mba/china-program/english/">China</a></li>
                  </ul>
                </li>
                <li><a target="_top" href="http://www.asu.edu/contactasu/" title="Directory, Index and other info">Contact ASU</a></li>
              </ul>
            </div>
            <!-- /#asu_universal_nav --> 
          </div>
          <!-- /#asu_nav_wrapper -->
          <h2 class="hidden">Search</h2>
          <div id="asu_search_module">
            <form target="_top" action="https://search.asu.edu/search" method="get" name="gs">
              <label class="hidden" for="asu_search_box">Search</label>
              <input name="site" value="default_collection" type="hidden">
              <input type="text" name="q" size="32" value="Search ASU" id="asu_search_box" class="asu_search_box" onfocus="ASUHeader.searchFocus(this)" onblur="ASUHeader.searchBlur(this)">
              <input type="submit" value="Search" title="Search" class="asu_search_button">
              <input name="sort" value="date:D:L:d1" type="hidden">
              <input name="output" value="xml_no_dtd" type="hidden">
              <input name="ie" value="UTF-8" type="hidden">
              <input name="oe" value="UTF-8" type="hidden">
              <input name="client" value="asu_frontend" type="hidden">
              <input name="proxystylesheet" value="asu_frontend" type="hidden">
            </form>
          </div>
          <!-- /#asu_search_module --> 
        </div>
        <!-- /#asu_hdr --> 
      <script type="text/javascript">
        <!--//--><![CDATA[//><!--
        ASUHeader.default_search_text = "Search ASU";
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
        }if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
          document.getElementById('asu_hdr').className = document.getElementById('asu_hdr').className+" chrome";
        }
        //--><!]]>
      </script> 
      </div>    

      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

</div> <!-- /.row -->

    </div>
    <div id="wrapper-sticky-nav">
      <div id="sticky-nav" class="affix-top">
        <nav class="navbar navbar-default container" role="navigation">
          <div class="">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
              <div class="request-info-toggle">
                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-comment"></span> Contact Us
                </button>
              </div>
             
              <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <span class="glyphicon glyphicon-home"></span>    <span class="navbar-brand-name"> <?php   bloginfo('name'); ?>  </span>
              </a>
            </div>
              <?php
                  wp_nav_menu( array(
                      'menu'              => 'primary',
                      'theme_location'    => 'primary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'bs-example-navbar-collapse-1',
                      'menu_class'        => 'nav navbar-nav',
                      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                      'walker'            => new wp_bootstrap_navwalker())
                      
                  );
              ?>
          </div>
        </nav>
      </div>
    </div>
  </header>
  
  <div id="content" class="site-content container">
 <div class="row row-padding-cancel">