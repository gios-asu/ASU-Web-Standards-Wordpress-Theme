<?php
/**
 * Template Name: Full Width
 *
 * @package asu-wordpress-web-standards-theme
 */

get_header(); ?>

	<div id="primary full" class="content-area col-md-12">
		<?php if ( function_exists('yoast_breadcrumb') && !is_home() && !is_front_page() ): ?>
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <?php yoast_breadcrumb('<ul id="breadcrumbs" class="breadcrumb">','</ul>'); ?>
	        </div>
	      </div>
	    </div>
	  <?php endif; ?>
  
		<main id="main" class="site-main" role="main">

			<?php 
				while ( have_posts() ) { 
					the_post();

					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				} // end of the loop. 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
