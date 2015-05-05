<?php
/**
 * The template for displaying all pages.
 * Template Name: With Participe
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<h1 class="noticias-title"><?php the_title(); ?></h1>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<main id="main-content" class="site-main" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );
				endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_template_part( 'parts/participe' );
get_footer();