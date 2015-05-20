</div><!-- #main -->

	</div><!-- .container -->

		<div class="sub-footer participe">

			<div class="container">

				<h1 class="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php _e( 'Participe', 'odin' ); ?></a></h1>

				<div class="col-sm-6 agenda">
					<?php
					// WP_Query argument
					$current = current_time('Ymd');
					$args = array (
						'post_type'              => 'agenda',
						'posts_per_page'         => '3',
						'orderby'                => 'meta_value',
						'meta_key'               => 'agenda_data',
						'order'                  => 'DESC',
						'meta_query' => array(
							array(
							'key' => 'agenda_data',
							'compare' => '>=',
							'value' => $current
							),
						),
					);
					// The Query
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ): $query->the_post();
						    get_template_part( 'content','agenda' );
						endwhile;
					else :
						echo '<span class="no-event">';
						_e( 'No registered event', 'odin' );
						echo '<span>';
					endif;
					// Restore original Post Data
					wp_reset_postdata();
				    ?>
				</div><!-- .agenda -->

				<div class="col-sm-6 btns">
					<a class="link-comunidade" href="<?php echo home_url( '/comunidade' ); ?>" class="comunidade"></a>
					<a class="link-fale" href="<?php echo home_url( '/contato' ); ?>" class="fale-conosco"></a>
				</div>

			</div><!-- .container -->

		</div><!-- .sub-footer -->

	<div class="container">

<div class="site-main row">
