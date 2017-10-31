<?php
/**
 * The template for displaying Category pages.
 *
 * Sidebar region is disabled when no sidebar content is available,
 * the main content region is then formatted full-width. (Sidebar
 * functionality taken from single.php)
 *
 * @see http://codex.wordpress.org/Template_Hierarchy
 *
 * @author The Julie Ann Wrigley Global Institute of Sustainability
 * @author Ivan Montiel
 *
 * @copyright 2014-2015 Arizona State University
 *
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 *
 * @package asu-wordpress-web-standards-theme
 */

get_header(); ?>

<div id="main-wrapper" class="clearfix">
  <div class="clearfix">
    <?php
    $hero_rendered = ( false !== strpos( category_description(), 'section class="hero' ) );
    // Render category description here if hero/page_feature shortcode processed
    if ( $hero_rendered ) {
      echo category_description();
    }
    ?>

    <div id="content" class="site-content">
      <?php echo do_shortcode( '[asu_breadcrumbs]' ); ?>
      <main id="main" class="site-main" role="main">
        <div class="container pad-bot-md pad-top-sm">
          <?php
          // Do not render title here if hero shortcode processed
          if ( ! $hero_rendered ) : ?>
          <div class="row">
            <div class="col-sm-12">
              <h2 class="space-top-0"><?php single_cat_title(); ?></h2>
            </div>
          </div>
          <?php
          endif; ?>


          <div class="row">
            <?php
              // Set up our default layout: 8 columns for content, 4 for the sidebar
            $content_class = 'col-sm-8';
            $sidebar_class = 'col-sm-4 hidden-xs';
            
            /**
             * Here we check to see if our sidebar is NOT active, or if it has no
             * widgets to render. In that case, we don't need a sidebar - so we give
             * the content the full 12 columns.
             * 
             * https://codex.wordpress.org/Function_Reference/is_active_sidebar
             */
            if( ! is_active_sidebar( 'sidebar-1' ) ) {
                $content_class = 'col-sm-12';
                $sidebar_class = 'hidden-xs';
                }   
            ?>
            <div class="<?php echo esc_attr( $content_class ); ?>">
              <?php
              // Render category description here if no hero/page_feature shortcode processed
              if ( ! $hero_rendered ) {
                echo category_description();
              }

              while ( have_posts() ) {
                the_post();
                get_template_part( 'content', get_post_format() );

                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) {
                  comments_template();
                }
              } // end of the loop.
              ?>
            </div>
            <div class="<?php echo esc_attr( $sidebar_class ); ?>">
              <div id="secondary" class="widget-area row" role="complementary">
                <?php get_sidebar(); ?>
               </div>
            </div>
          </div>
        </div>
      </main><!-- #main -->
    </div>
  </div><!-- #main -->
</div><!-- #main-wrapper -->

<?php get_footer(); ?>
