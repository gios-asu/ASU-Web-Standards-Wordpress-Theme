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
  <div id="main" class="clearfix">
    <?php echo do_shortcode( '[page_feature]' ); ?>

    <div id="content" class="site-content">
      <?php echo do_shortcode( '[asu_breadcrumbs]' ); ?>
      <main id="main" class="site-main space-top-md" role="main">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
						  <header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								<div class="entry-meta">
									<?php wptemplate_gios_v1_posted_on(); ?>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->
							<?php 
								while ( have_posts() ) { 
									the_post(); 

									get_template_part( 'content', 'single' );
									wptemplate_gios_v1_post_nav();
								}
								?>
            </div>
            <div class="col-sm-4 hidden-xs">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </main><!-- #main -->
    </div>
  </div><!-- #main -->
</div><!-- #main-wrapper -->

<?php get_footer(); ?>
