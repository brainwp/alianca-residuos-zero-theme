<?php
/* Novidades */
?>
<section id="novidades" class="col-md-12">
	<div class="container">
		<div class="row">
			<div class="col-md-4 acoes">
				<h2 class="section-title">
					<?php _e('Ações','odin');?>
				</h2><!-- .section-title -->
				<div class="section-content">
					<?php if(kirki_get_option('acoes_content')):?>
					    <?php $content = kirki_get_option('acoes_content');?>
				        <?php echo apply_filters('the_content',$content);?>
			        <?php endif;?>
				</div><!-- .col-md-12 section-content -->
			</div><!-- .col-md-4 acoes -->
			<div class="col-md-8 pull-right noticias query-novidades">
				<h2 class="section-title col-md-4">
					<?php _e('Notícias','odin');?>
				</h2><!-- .section-title -->
				<a href="<?php echo home_url('/noticias');?>" class="btn btn-primary btn-leia">
					<?php _e('Veja mais','odin');?>
				</a>
				<?php
				// WP_Query arguments
				$args = array (
					'post_type'              => 'post',
					'posts_per_page'         => 2,
				);
				// The Query
				$query = new WP_Query( $args );
				?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				    <?php get_template_part('content','posts');?>
			    <?php endwhile;?>
			    <h2 class="section-title col-md-4">
					<?php _e('Biblioteca','odin');?>
				</h2><!-- .section-title -->
				<a href="<?php echo home_url('/biblioteca');?>" class="btn btn-primary btn-leia">
					<?php _e('Veja mais','odin');?>
				</a>
				<?php
				// WP_Query arguments
				$args = array (
					'post_type'              => 'biblioteca',
					'posts_per_page'         => 2,
				);
				// The Query
				$query = new WP_Query( $args );
				?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				    <?php get_template_part('content','posts');?>
			    <?php endwhile;?>
			</div><!-- .col-md-8 pull-right query-novidades -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #novidades.col-md-12 -->
