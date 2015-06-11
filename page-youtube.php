<?php
/**
 * Template Name: Youtube
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
			<div id="youtube-video" class="col-md-12">
				<p style="text-align:center">
					<iframe width="560" height="315" frameborder="0" allowfullscreen></iframe>
				</p>
			</div><!-- #youtube-video.col-md-12 -->
			<div id="youtube-feed"></div><!-- #youtube-feed -->
			<div class="col-md-12 clear" style="height:1px"></div><!-- .col-md-12 clear -->
			<a href="#" id="youtube-feed-btn" class="btn btn-primary" data-loading="<?php _e('Carregando..','odin');?>">
				<?php _e('Carregar +','odin');?>
			</a>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
