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
			    <a href="<?php echo get_post_type_archive_link('acoes');?>" class="btn btn-lg btn-leia">
			    	<?php _e('Veja todos Projetos','odin');?>
			    </a>
			</div><!-- .col-md-6 pull-left section-content -->
			<div class="col-md-5 pull-right img-container">
				<img src="<?php echo kirki_get_option('acoes_img');?>" />
			</div><!-- .col-md-5 pull-right img-container -->
		</div><!-- .container -->
	</div><!-- .row -->
</section><!-- #acoes-section -->
