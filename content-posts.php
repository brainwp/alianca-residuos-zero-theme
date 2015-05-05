<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'each' ); ?>>
	
	<div class="row">
		<?php if (has_post_thumbnail()): ?>
			<div class="col-md-4 thumb">
				<?php the_post_thumbnail( 'noticias-thumbnail' ); ?>
			</div><!-- thumb -->
		<?php endif ?>

		<div class="col-md-8 desc">
			<div class="fadein"></div>
			<span class="meta"><?php odin_posted_on(); ?></span><!-- .meta -->
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php echo get_excerpt( get_the_content(), '700', ' ...' ); ?>
			<a href="<?php echo get_permalink( $rede->ID ); ?>" class="mais">Leia mais</a>
		</div><!-- desc -->
	</div>

</article><!-- #post-## -->
