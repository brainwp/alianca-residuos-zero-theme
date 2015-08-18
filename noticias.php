<?php
/**
 * The main template file.
 * Template Name: Notícias
 */

get_header(); ?>

	<h1 class="noticias-title"><?php _e( 'Notícias', 'odin' ); ?></h1>

	<div id="primary" class="col-md-12">
		<main id="main-content" class="site-main noticias" role="main">

			<?php
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page' 	=> get_option('posts_per_page'),
					'paged'				=> get_query_var( 'paged', 1 )
				);
				$noticias = new WP_Query( $args );
				if ( $noticias->have_posts() ) :
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
					echo odin_pagination( 2, 1, false, $noticias );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php
get_template_part( 'parts/participe' );
get_footer();
