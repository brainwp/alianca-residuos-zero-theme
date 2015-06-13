<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
$date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'agenda_data', true ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'each archive-agenda' ); ?>>

	<div class="row">
		<div class="col-sm-4 col-md-3 data-content">
			<span class="col-md-12 dia-mes">
				<?php echo $date->format('d');?>
			</span>
			<span class="col-md-12 mes">
				<?php echo date_i18n( 'M', $date->getTimestamp(), false );?>
			</span>
		</div><!-- .col-md-2 -->
		<div class="col-sm-8 col-md-4 thumb">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( 'thumb-600-400' ); ?>
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/noticias-default.jpg" alt="<?php the_title(); ?>">
				<?php endif ?>
			</a>
		</div><!-- thumb -->

		<div class="col-sm-12 col-md-5 desc">
		    <h3 class="the-title"><?php the_title();?></h3><!-- .the-title -->
		    <h4 class="the-infos">
		    	<?php echo apply_filters('the_content', get_post_meta( get_the_ID(), 'agenda_local', true));?>
		    </h4><!-- .the-infos -->
		    <h4 class="the-infos">
		    	<?php echo sprintf(__('A partir das %s','odin'), get_post_meta( get_the_ID(), 'agenda_hora', true));?>
		    </h4><!-- .the-infos -->
		    <?php if(!is_single()): ?>
		        <a href="<?php echo get_permalink(); ?>" class="mais"><?php _e( 'Leia mais', 'odin' ); ?></a>
		    <?php endif;?>
		</div><!-- desc -->
	</div>

</article><!-- #post-## -->
