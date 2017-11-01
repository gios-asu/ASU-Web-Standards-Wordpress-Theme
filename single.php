<?php
/**
 * The Template for displaying all single posts.
 *
 * @package asu-wordpress-web-standards-theme
 */

get_header();

$custom_fields = get_post_custom();
?>
<div id="main-wrapper" class="clearfix">
  <div class="clearfix">
    <?php echo do_shortcode( '[page_feature]' ); ?>

    <div id="content" class="site-content">
      <?php echo do_shortcode( '[asu_breadcrumbs]' ); ?>
      <main id="main" class="site-main space-top-md">
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
            <header class="entry-header">
              <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
              <div class="entry-meta">
                <?php asu_webstandards_posted_on(); ?>
              </div><!-- .entry-meta -->
            </header><!-- .entry-header -->

            <div class="single">
              <?php
              while ( have_posts() ) {
                the_post();
                get_template_part( 'content', 'single' );
                asu_webstandards_post_nav();
              }
              ?>
            </div>

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
