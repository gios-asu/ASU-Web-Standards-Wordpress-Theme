<?php
/**
 * The Template for displaying all single posts.
 *
 * @package wptemplate-gios-v1
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-9">
		<main id="main" class="site-main" role="main">



   <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php wptemplate_gios_v1_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

   


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php wptemplate_gios_v1_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				// if ( comments_open() || '0' != get_comments_number() ) :
				//	comments_template();
				// endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>