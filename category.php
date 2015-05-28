<?php
/**
 * The template for displaying Category pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<?php the_archive_title( '<h1 class="noticias-title">', '</h1>' ); ?>

	<section id="primary" class="col-md-12">
		<main id="main-content" class="site-main noticias" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'posts' );

						endwhile;

						// Page navigation.
						odin_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

				endif;
			?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_template_part( 'parts/participe' );
get_footer();
