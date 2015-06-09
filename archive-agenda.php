<?php
/**
 * The main template file.
 */

get_header(); ?>

	<h1 class="noticias-title"><?php _e( 'Agenda', 'odin' ); ?></h1>

	<div id="primary" class="col-md-12">
		<main id="main-content" class="site-main noticias" role="main">

			<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'agenda-archive' );

					endwhile;

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
get_template_part( 'parts/participe' );
get_footer();
