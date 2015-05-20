<?php
/* content agenda */
$date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'agenda_data', true ) );
?>
<a href="<?php the_permalink();?>" class="col-sm-12 each">
	<div class="data">
		<span>
			<?php echo $date->format('d');?>
		</span>
		<span>
			<?php echo date_i18n( 'M', $date->getTimestamp(), false );?>
		</span>
	</div>
	<div class="infos">
	    <h3><?php the_title();?></h3>
	    <span>
	    	<?php echo apply_filters('the_content', get_post_meta( get_the_ID(), 'agenda_local', true));?>
	    </span>
	    <span>
	    	<?php echo sprintf(__('A partir das %s','odin'), get_post_meta( get_the_ID(), 'agenda_hora', true));?>
	    </span>
	</div>
</a><!-- .each -->
