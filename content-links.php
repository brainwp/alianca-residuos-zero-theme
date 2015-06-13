<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php if($link = get_field('link')):?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 each-link' ); ?>>
	<a href="<?php echo esc_url($link);?>" class="content" target="_blank">
		<div class="col-md-12 desc">
			<h2 class="the-title"><?php the_title();?></h2><!-- .the-title -->
			<h4 class="the-link"><?php echo $link;?></h4><!-- .the-link -->
		</div><!-- desc -->
	</a><!--.content-->

</article><!-- #post-## -->
<?php endif;?>
