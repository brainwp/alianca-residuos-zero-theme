<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4 each entidades-content' ); ?>>

	<a href="<?php the_permalink();?>" class="content">
		<?php if ( has_post_thumbnail() ): ?>
		    <div class="thumb">
		    	<?php the_post_thumbnail( 'noticias-thumbnail' ); ?>
		    </div><!-- .thumb -->
		<?php else: ?>
		    <div class="thumb">
		    	<img src="<?php echo get_template_directory_uri();?>/assets/images/noticias-default.jpg" alt="<?php the_title(); ?>">
		    </div><!-- .thumb -->
		<?php endif ?>

		<div class="col-md-12 desc">
			<?php the_title();?>
		</div><!-- desc -->
	</a><!--.content-->

</article><!-- #post-## -->
