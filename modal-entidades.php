<?php
/* entidades single modal */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="pull-left col-md-4 entidades-modal-img">
		<?php the_post_thumbnail('large');?>
	</div><!-- .pull-left col-md-4 -->
	<div class="col-md-8 pull-right entidades-modal-content">
		<h3 class="post-title">
			<?php the_title();?>
		</h3><!-- .post-title -->
		<?php the_content();?>
	</div><!-- .col-md-7 pull-right -->
<?php endwhile;?>
