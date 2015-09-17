<?php
/* Template Part: Filtros */
/* Verificar quais são os CPTs que devem ter esses filtros */
?>

</div><!-- .container -->

<section class="filtros">

	<header id="open-search-advanced" data-open="false"><h1>Clique aqui e faça uma pesquisa avançada</h1></header>

	<div class="container">
		<div class="col-md-12 animated" id="toggle-search">
			<div class="col-md-4">
				<span>Use esses campos para filtrar os conteúdos que deseja.</span>
				<span>Selecione uma Categoria, e se quiser também uma Sub-categoria.</span>
				<span>E a qualquer momento pode preencher o campo de busca com uma palavra chave e clique "Enter".</span>
			</div>
			<?php $type = get_post_type();?>
			<?php if ( is_page() && is_page_template( 'noticias.php' ) ) $type = 'post';?>
			<form action="<?php echo get_post_type_archive_link( $type );?>" method="get" class="col-md-8">
				<div class="col-md-5">
					<?php $tax = get_filter_taxonomy_slug();?>
					<input type="hidden" id="filter-hidden-tax" name="<?php echo $tax;?>">
					<select id="filter-first-level">
						<option value=""><?php _e('Escolha uma Categoria','odin');?></option>
						<?php $terms = get_terms( array($tax), array('parent' => 0) );?>
						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
							<?php foreach ( $terms as $term ) :	?>
								<option value="<?php echo $term->slug;?>">
									<?php echo $term->name;?>
								</option>
							<?php endforeach;?>
						<?php endif;?>
					</select>
					<p id="loading-sub-level"><?php _e('Carregando Sub-Categorias..','odin');?></p>
					<p id="ajaxerror-sub-level"><?php _e('Essa categoria não possui sub-categorias','odin');?></p>
					<select id="filter-sub-level">
					</select>
				</div>
				<div class="col-md-5">
					<input type="search" name="advanced_search" placeholder="<?php _e( 'Digite um termo para buscar', 'odin' );?>">
					<input class="input-search" type="submit" value="Pesquisar">
				</div>
			</form><!-- .col-md-8 -->
		</div><!-- #toggle-search.col-md-12 -->
	</div><!-- .container -->
</section><!-- filtros -->

<div class="container">
