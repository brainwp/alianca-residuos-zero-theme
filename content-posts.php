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

	<div class="col-md-12">
		<div class="col-sm-12 col-md-4 thumb nopadding">
			<?php if (has_post_thumbnail()): ?>
				<?php the_post_thumbnail( 'thumb-600-400' ); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/noticias-default.jpg" alt="<?php the_title(); ?>">
			<?php endif ?>
		</div><!-- thumb -->

		<div class="col-sm-12 col-md-8 desc">
			<div class="fadein"></div>
			<span class="meta"><?php odin_posted_on(); ?></span><!-- .meta -->
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php if(!is_page_template('page-home-alternativa.php')):?>
			    <?php echo get_excerpt( get_the_content(), '700', ' ...' ); ?>
		    <?php endif;?>
		</div><!-- desc -->
		<a href="<?php echo get_permalink(); ?>" class="mais"><?php _e( 'Leia mais', 'odin' ); ?></a>
	</div><!-- row -->

</article><!-- #post-## -->
