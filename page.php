<?php
/**
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 *
 * @package asu-wordpress-web-standards-theme
 */

include_theme_file( 'helpers/mime-types-helper.php' );

get_header();

$custom_fields = get_post_custom();
?>
<div id="main-wrapper" class="clearfix">
  <div class="clearfix">


  <style type="text/css">
.alertbody{background-color: #78BE20; color:#000; display: none;}
.alertcontainer{padding:27px 0;text-align:inherit;max-width:1170px;margin:0 auto;width:100%;}
.alerticon{float:left;padding: 0px;font-size: 64px;margin: 0px 20px 0px 20px;background:none;}
.alerticon .fa{background: radial-gradient(white 50%, transparent 50%);}
.alertbody h2{font-size:30px;letter-spacing:0px;margin:6px 0 2px 0;font-weight:bolder;}
.alertbody p{font-weight:bold;margin-top:0px;}
.alertbody a{color:#000; border-bottom: 1px solid black; font-weight: bold;}
    /* Medium devices (landscape tablets, 768px and up) */
@media screen and (max-width: 768px){
.alerticon{display:none;float:none;background:none;margin: 0px 20px 0px 20px;}
.alertcontainer{padding:12px 7px 11px 18px;text-align:left;}
.alertbody h2{margin:0px 0 6px 0;font-size:26px;line-height:23px;}
.alertbody p{font-size:13px;margin-bottom:4px;}
}
</style>
    <div class="alertbody">
      <div class="alertcontainer">
        <div class="alerticon"><i aria-hidden="true" class="fa fa-exclamation-circle">&zwnj;</i></div>
        <div class="alertbody">
          <h2>Novel coronavirus information</h2>
          <p><a href="https://www.asu.edu/about/spring-2021">Spring&nbsp;2021&nbsp;update</a>&nbsp;|&nbsp;<a href="http://eoss.asu.edu/health/announcements/coronavirus/faqs">FAQ&nbsp;page</a> &nbsp;|&nbsp; <a href="https://www.asu.edu/about/spring-2021#class-flexibility">Class flexibility for students</a> &nbsp;|&nbsp; <a href="https://eoss.asu.edu/health/announcements/coronavirus">Novel coronavirus updates</a></p>
        </div>
      </div>
    </div>




    <?php echo do_shortcode( '[page_feature]' ); ?>

    <div id="content" class="site-content">
      <?php echo do_shortcode( '[asu_breadcrumbs]' ); ?>
      <main id="main" class="site-main">
        <div class="container">
          <?php
          while ( have_posts() ) {
            the_post();
            get_template_part( 'content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() ) {
              comments_template();
            }
          } // end of the loop.
          ?>
        </div>

      </main><!-- #main -->
    </div>
  </div><!-- #main -->
</div><!-- #main-wrapper -->
    <?php
      get_footer();
