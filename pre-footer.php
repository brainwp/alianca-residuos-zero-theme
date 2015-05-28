<?php
/**
 * The template for displaying the pre footer.
 *
 * @package Odin
 * @since 0.1
 */
?>

		</div><!-- #main -->
		</div><!-- container -->

		<div class="col-md-12 atuacao">

		<div class="container">
			<h2><?php _e('Frentes de Atuação','odin');?></h2>
			<?php $page = get_page_by_path( 'frentes-de-atuacao', OBJECT, 'page' ); ?>
			<?php if ( $page ): ?>
			<div class="col-md-12 abas">
				<ul class="odin-tabs nav nav-tabs">
					<?php
			        $args = array(
				        'post_type'      => 'page',
				        'posts_per_page' => -1,
				        'post_parent'    => $page->ID,
				        'orderby'        => 'menu_order',
				        'order'          => 'ASC'
				    );
				    $parent = new WP_Query( $args );
				    if ( $parent->have_posts() ) : ?>
				        <?php $i = 0;?>
				        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
				            <?php global $post;?>
				            <?php if($i == 0): ?>
				                <li role="presentation" class="active">
				                	<a href="#<?php echo $post->post_name; ?>" aria-controls="<?php echo $post->post_name; ?>">
				                		<?php the_title();?>
				                	</a>
				                </li>
				            <?php endif; ?>
				            <?php if($i > 0): ?>
				                <li role="presentation">
				                	<a href="#<?php echo $post->post_name; ?>" aria-controls="<?php echo $post->post_name; ?>">
				                		<?php the_title();?>
				                	</a>
				                </li>
				            <?php endif;?>
				            <?php $i++;?>
		                <?php endwhile; ?>
		            <?php wp_reset_postdata(); ?>
		            <?php endif;?>
				</ul>
				<div class="tab-content">
					<?php
				    $parent = new WP_Query( $args );
				    if ( $parent->have_posts() ) : ?>
				        <?php $i = 0;?>
				        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
				        	<?php global $post;?>
				            <?php if($i == 0): ?>
				                <div role="tabpanel" class="tab-pane col-md-12 active" id="<?php echo $post->post_name;?>">

					                	<?php if (has_post_thumbnail()): ?>

						                	<div class="col-md-4 image-container">
						                		<?php the_post_thumbnail( 'medium' );?>
						                	</div><!-- .col-md-4 -->

						                	<div class="col-md-8 pull-left content">

						                <?php else: ?>

						                	<div class="col-md-12 pull-left content">
					                		
					                	<?php endif ?>
				                	
				                		<?php the_content();?>
				                	</div><!-- .pull-left .content -->
				                </div>
				            <?php endif; ?>
				            <?php if($i > 0): ?>
				                <div role="tabpanel" class="tab-pane col-md-12" id="<?php echo $post->post_name;?>">
				                	
				                	<div class="col-md-4 thumbnail">
				                		<?php the_post_thumbnail( 'medium' );?>
				                	</div><!-- .col-md-4 -->
				                	<div class="col-md-8 pull-left content">
				                		<?php the_content();?>
				                	</div><!-- .col-md-8 pull-left content -->

				                </div>
				            <?php endif;?>
				            <?php $i++;?>
		                <?php endwhile; ?>
		            <?php wp_reset_postdata(); ?>
		            <?php endif;?>
				</div>
			</div>
		    <?php endif;?>
			<div class="clear"></div>
			<a class="col-md-3 btn" href="<?php echo home_url( '/adesao' ); ?>">Quer aderir?</a>
		</div><!-- container -->

		</div><!-- atuacao -->


		<div class="container">
		<div id="main" class="site-main row">
