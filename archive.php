<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wptemplate-gios-v1
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-9 ">
		<main id="main" class="site-main" role="main">


   <h1>News &amp; Events </h1>

   <img class="alignleft size-full wp-image-404" src="//sustainability.asu.edu/images/headers/ASU-Sustainability-News.jpg" alt="header5" width="1140" height="285">


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title">
				Category: 
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'wptemplate-gios-v1' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'wptemplate-gios-v1' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'wptemplate-gios-v1' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wptemplate-gios-v1' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'wptemplate-gios-v1' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wptemplate-gios-v1' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'wptemplate-gios-v1');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'wptemplate-gios-v1');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'wptemplate-gios-v1' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'wptemplate-gios-v1' );

						else :
							_e( 'Archives', 'wptemplate-gios-v1' );

						endif;
					?>
				</h3>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

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

			<?php  wptemplate_gios_v1_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
