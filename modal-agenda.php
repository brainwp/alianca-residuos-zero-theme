<?php
/* agenda single modal */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-md-12">
		<?php get_template_part('content','agenda-archive');?>
	</div><!-- .col-md-12 -->
	<div class="col-md-12 pull-right entidades-modal-content">
		<?php the_content();?>
	</div><!-- .col-md-7 pull-right -->
<?php endwhile;?>
