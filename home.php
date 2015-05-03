<?php
/**
 * The home template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 0.1
 */

get_header(); ?>

	<div id="primary" class="col-md-12">
		<main id="main-content" class="site-main" role="main">

			<div class="col-md-8 conceito">
				<div class="col-md-3">

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'about-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav about-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>

				</div>
				
				<?php $conceito = get_page_by_path( 'o-conceito', OBJECT, 'page' ); ?>
				<?php if ( $conceito ): ?>
					<div class="col-md-9 desc">
						<div class="border"></div>
						<h2><?php echo $conceito->post_title; ?></h2>
						<span><?php echo get_excerpt( $conceito->post_content, '450', ' ...' ); ?></span>
					</div><!-- conceito -->
				<?php endif ?>
			</div><!-- conceito -->

		</main><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
