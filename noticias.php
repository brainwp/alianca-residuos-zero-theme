<?php
/**
 * The main template file.
 * Template Name: Notícias
 */

get_header(); ?>

	<div id="primary" class="<?php echo odin_classes_page_sidebar(); ?>">
		<main id="main-content" class="site-main" role="main">

			<?php
				$noticias = new WP_Query('posts_per_page=10');
				if ( have_posts() ) :
					// Start the Loop.
					while ( $noticias->have_posts() ) : $noticias->the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'posts' );

					endwhile;
					wp_reset_postdata();

					// Post navigation.
					odin_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
