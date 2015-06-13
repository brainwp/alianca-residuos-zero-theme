<?php
/* Agenda Single Modal */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="row modal-agenda">
		<?php get_template_part('content','agenda-archive');?>
	</div><!-- .col-md-12 -->
	<div class="col-md-9 pull-right agenda-modal-content">
		<?php the_content();?>
	</div><!-- .col-md-7 pull-right -->
<?php endwhile;?>
