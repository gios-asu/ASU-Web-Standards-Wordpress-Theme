<?php
/**
 * Template Name: Full Width
 *
 * @package asu-wordpress-web-standards-theme
 */

get_header(); ?>

	<div id="primary full" class="content-area col-md-12">
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
