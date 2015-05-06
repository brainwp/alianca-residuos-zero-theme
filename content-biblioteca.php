<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4 each' ); ?>>
	
	<div class="content">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="thumb">
				<?php the_post_thumbnail( 'noticias-thumbnail' ); ?>
			</div><!-- thumb -->
		<?php else: ?>
			<div class="thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/noticias-default.jpg" alt="<?php the_title(); ?>">
			</div><!-- thumb -->
		<?php endif ?>

		<div class="col-md-12 desc">
			<div class="fadein"></div>
			<span class="meta"></span><!-- .meta -->
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="mais">Leia mais</a>
		</div><!-- desc -->
	</div>

</article><!-- #post-## -->
