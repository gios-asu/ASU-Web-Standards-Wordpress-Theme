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
 * @package wptemplate-gios-v1
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-9">
	
	
	
		<main id="main" class="site-main" role="main">
			<!-- <p>Testing Index Content </p>

			
			<nav id="test-nav" role="navigation">
		    <a href="#test-nav" title="Show navigation">Show navigation</a>
		    <a href="#" title="Hide navigation">Hide navigation</a>
		    <ul>
		        <li><a href="/">Home</a></li>
		        <li>
		            <a href="/" aria-haspopup="true">Blog</a>
		            <ul>
		                <li><a href="/">Design</a></li>
		                <li><a href="/">HTML</a></li>
		                <li><a href="/">CSS</a></li>
		                <li><a href="/">JavaScript</a></li>
		            </ul>
		        </li>
		        <li>
		            <a href="/" aria-haspopup="true">Work</a>
		            <ul>
		                <li><a href="/">Web Design</a></li>
		                <li><a href="/">Typography</a></li>
		                <li><a href="/">Front-End</a></li>
		            </ul>
		        </li>
		        <li><a href="/">About</a></li>
		    </ul>
			</nav> -->

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
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
<?php get_footer(); ?>
