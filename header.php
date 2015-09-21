<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="col-md-12 bg-menu"></div>

	<div class="container">
		<?php $class = '';?>
		<?php if(is_page_template('page-embed.php')): ?>
		    <?php $class = 'container';?>
		    <base target="_parent" />
	    <?php endif;?>
		<header id="header" role="banner" class="<?php echo $class;?>">

			<nav id="main-navigation" class="navbar navbar-top" role="navigation">
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'odin' ); ?>"><?php _e( 'Skip to content', 'odin' ); ?></a>
				<div class="navbar-header">
					<?php /*

					<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

					*/ ?>
				</div>

				<div class="collapse navbar-collapse navbar-main-navigation">

					<?php
					if(!is_page_template('page-embed.php' )):
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					else :
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu-embed',
								'depth'          => -1,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);

					endif;
					?>

					<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
						<label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?></label>
						<div class="form-group">
						    <?php $attrs = '';?>
							<?php if(is_page_template('page-embed.php')) $attrs = 'placeholder="'.__('Pesquisar no site principal','odin').'"';?>
							<input type="search" class="form-control" name="s" id="navbar-search" <?php echo $attrs;?> />
						</div>
						<button type="submit" class="btn btn-default"><?php _e( 'Search', 'odin' ); ?></button>
					</form>
				</div><!-- .navbar-collapse -->
			</nav><!-- #main-menu -->

			<?php if ( is_home() || is_page_template( 'page-home-alternativa.php' )) : ?>

				<?php
					$header_image = get_header_image();
					if ( ! empty( $header_image ) ) :
				?>
					<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( $header_image ); ?>" height="<?php esc_attr_e( $header_image->height ); ?>" width="<?php esc_attr_e( $header_image->width ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php else: ?>

					<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-home.png" alt="<?php bloginfo( 'name' ); ?>"></a>

				<?php endif; ?>
			    <?php if(is_page() && is_page_template('page-home-alternativa.php')): ?>
			        <div class="col-md-12" id="slider-novidades-container">
			            <?php echo do_shortcode('[brasa_slider name="Novidades"]');?>
			        </div><!-- #slider-novidades.col-md-12 -->
			    <?php endif;?>

			<?php else : ?>
			<?php if(!is_page_template('page-embed.php')):?>
				</div><!-- .container -->

					<div class="sub-header">

						<div class="container">

							<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-interna"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-internas.png" alt="<?php bloginfo( 'name' ); ?>"></a>
							<?php if(!is_page_template('page-embed.php')): ?>
							    <a class="click conceito" id="conceito-click" data-open="false"><?php _e( 'Entenda o Conceito', 'odin' ); ?></a>
			                <?php endif;?>
			                <?php $conceito = get_page_by_path( 'o-conceito', OBJECT, 'page' ); ?>
			                <?php if($conceito):?>
			                    <div class="col-md-12" id="conceito-content">
			                    	<?php echo apply_filters('the_content', $conceito->post_content); ?>
			                    </div><!-- #conceito-content.col-md-12 -->
			                <?php endif;?>
						</div><!-- .container -->

					</div><!-- sub-header -->
				<div class="container">
			<?php endif;?>
			<?php endif; ?>



		</header><!-- #header -->
		<?php if ( is_post_type_archive() && get_post_type() != 'links') : ?>
			<?php get_template_part( 'parts/filtros' ); ?>
		<?php endif;?>
		<?php if ( is_page() && is_page_template( 'noticias.php' ) ) : ?>
			<?php get_template_part( 'parts/filtros' ); ?>
		<?php endif;?>
		<div id="main" class="site-main row">
