<?php
/* Template part: Acoes */
?>
<section id="acoes-section" class="col-md-12">
	<div class="row">
		<div class="container">
			<h2 class="section-title">
				<?php _e('Ações (Projetos)','odin');?>
			</h2><!-- .section-title -->
			<div class="col-md-12" style="clear:both;height:1px"></div><!-- .col-md-12 -->
			<div class="col-md-6 pull-left section-content">
				<?php if(kirki_get_option('acoes_content')):?>
					<?php $content = kirki_get_option('acoes_content');?>
				    <?php echo apply_filters('the_content',$content);?>
			    <?php endif;?>
			    <a href="<?php echo home_url('category/projetos/'); ?>" class="btn btn-leia">
			    	<?php _e('Veja todos Projetos','odin');?>
			    </a>
			</div><!-- .col-md-6 pull-left section-content -->
			<div class="col-md-5 pull-right img-container">

				<?php wp_reset_query();

				    $images = array();
				    
				    $args = array( 
				        'orderby' => 'rand',
				        'post_type' => 'post', 
				        'cat' => 4, /* Set category to get images */
				        'posts_per_page' => -1,
				     );

				    $wp_query = new WP_Query( $args );                

				    foreach ( $wp_query->posts as $single_post) {
				        $single_post_ID = $single_post->ID;

				        $args = array(
				            'orderby' => 'rand',
				            'post_type'      => 'attachment',
				            'post_parent'    => $single_post_ID,
				            'post_mime_type' => 'image',
				            'post_status'    => null,
				            'numberposts'    => -1,
				        );

				        $attachments = get_posts($args);
				        if ($attachments) {
				            foreach ($attachments as $attachment) {
				               
				                $images[] = wp_get_attachment_image_src( $attachment->ID, 'square_thumb' );
				               
				            }
				        } 
				    }

				    $count = 0;

				    foreach ( $images as $image ) {
				    	if ( $count <= 3 ) {
				    		echo '<div class="col-md-5">';
				    		echo '<img src= "'. $image[0] .'" alt="Aliança Resíduo Zero">';
				    		echo '</div>';
				    		$count++;
				    	}
				    }

				?>

			</div><!-- .col-md-6 pull-right img-container -->
		</div><!-- .container -->
	</div><!-- .row -->
</section><!-- #acoes-section -->
