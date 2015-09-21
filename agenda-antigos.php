<?php
/**
 * The main template file.
 * Template Name: Agenda Antigos
*/

get_header(); ?>

	<h1 class="noticias-title"><?php _e( 'Agenda - Eventos Passados', 'odin' ); ?></h1>

	<div id="primary" class="col-md-12">
		<main id="main-content" class="site-main agenda" role="main">
			<?php $args = array(
					'post_type'			=> 'agenda',
					'posts_per_page' 	=> get_option('posts_per_page'),
					'paged'				=> get_query_var( 'paged', 1 )
				);
			$agenda = new WP_Query( $args );
			?>
			<?php
				if ( $agenda->have_posts() ) :
					// Start the Loop.
					while ( $agenda->have_posts() ) : $agenda->the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'agenda-archive' );

					endwhile;


					// Post navigation.
					echo odin_pagination( 2, 1, false, $agenda );


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
