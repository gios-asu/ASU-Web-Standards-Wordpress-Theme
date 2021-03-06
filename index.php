<?php
/**
 * The main template file.
 *
 * The template for displaying blog pages.
 *
 * This is the template that displays blog pages.
 *
 *
 *
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 *
 * @package asu-wordpress-web-standards
 */

include_theme_file( 'helpers/mime-types-helper.php' );

get_header();

$custom_fields = get_post_custom();
?>
<div id="main-wrapper" class="clearfix">
  <div class="clearfix">
    <?php echo do_shortcode( '[page_feature]' ); ?>

    <div id="content" class="site-content">
      <?php echo do_shortcode( '[asu_breadcrumbs]' ); ?>
      <main id="main" class="site-main space-top-md" role="main">
        <div class="container">
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
            if ( ! is_active_sidebar( 'sidebar-1' ) ) {
                $content_class = 'col-sm-12';
                $sidebar_class = 'hidden-xs';
            }
            ?>

            <div class="<?php echo esc_attr( $content_class ); ?>">
              <?php
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
              <div>
            </div>
          </div>
        </div>
      </main><!-- #main -->
    </div>
  </div><!-- #main -->
</div><!-- #main-wrapper -->

<?php get_footer(); ?>
