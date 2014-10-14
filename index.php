<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * 
 * 
 * @author Global Insititue of Sustainability
 * @author Ivan Montiel
 * 
 * @package asu-wordpress-web-standards
 */

get_header(); ?>

<div id="content" class="site-content container">
  <div class="row row-padding-cancel">
		<div id="primary" class="content-area col-sm-9">
			<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php wptemplate_gios_v1_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
