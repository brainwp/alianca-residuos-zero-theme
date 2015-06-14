<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- #main -->

	</div><!-- .container -->

	<footer id="footer" role="contentinfo">

		<div class="container">

			<div class="col-md-8 site-info">
				<a class="site-name" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
				<span class="desc"><?php echo get_bloginfo( 'description' ); ?></span>
				<?php if ( $endereco = get_option( 'endereco' ) ): ?>
					<?php echo $endereco; ?>
					<?php if ( $telefone = get_option( 'telefone' ) ): ?>
					 	<?php echo " - Tel. " . $telefone; ?>
					 <?php endif ?>
				<?php endif ?>
			</div><!-- .site-info -->
			<div class="col-sm-12 col-md-4 creditos">
				<a href="http://brasa.art.br/" target="_blank"><span class="brasa"></span></a><span class="copy">Todos os Direitos Reservados &copy;</span>
			</div>

		</div><!-- .container -->

	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
