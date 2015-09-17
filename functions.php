<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'main-menu-embed' => __( 'Main Menu Comunidade', 'odin' ),
				'about-menu' => __( 'About Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'noticias-thumbnail', '360', '280', array( 'center', 'center' ) );
		add_image_size( 'thumb-600-400', '600', '400', array( 'center', 'center' ) );
		add_image_size( 'square_thumb', '400', '400', array( 'center', 'center' ) );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	wp_enqueue_style( 'lato-google-font', 'http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic', array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
	// Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'bootstrap-tabs', $template_url . '/assets/js/bootstrap/tab.js', array(), null, true );

	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	wp_localize_script( 'odin-main', 'odin', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'sub_level_select' => __('Escolha uma Sub-Categoria', 'odin')  ) );

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}

/**
 * Custom Post Types.
 */
require_once get_template_directory() . '/inc/cpts.php';

/**
 * ACF and fields.
 */
require_once get_template_directory() . '/inc/acf/acf.php';
require_once get_template_directory() . '/inc/fields.php';
/**
 * Kirki Customizer.
 */
require_once get_template_directory() . '/inc/customizer.php';
/**
 * Brasa Slider Novidades.
 */
function content_brasa_slider_loop_before_image($html){
	global $brasa_slider_item_id;
	if(get_post_type($brasa_slider_item_id) == 'attachment')
		return $html;

    $html .= '<div class="col-md-6 pull-left img-container">';
    return $html;
}
add_filter('brasa_slider_loop_before_link_container','content_brasa_slider_loop_before_image');
function content_brasa_slider_loop_after_image($html){
	global $brasa_slider_item_id, $brasa_slider_id;
	if(get_post_type($brasa_slider_item_id) == 'attachment')
		return $html;

	$html .= '</div>';
    $html .= '<div class="col-md-6 pull-right text-container">';
    $html .= '<a href="'.esc_url(get_post_meta($brasa_slider_id, 'brasa_slider_id'.$brasa_slider_item_id, true )).'">';
    $slider_post = get_post($brasa_slider_item_id);
    $html .= '<h3 class="slider-title">'.apply_filters('the_tite',$slider_post->post_title) . '</h3>';
    $html .= apply_filters('the_content', get_excerpt($slider_post->post_content));
    $html .= '<span class="btn btn-primary btn-leia">';
    $html .= __('Leia Mais','odin');
    $html .= '</span>';
    $html .= '</a>';
    $html .= '</div>';
    return $html;
}
add_filter('brasa_slider_loop_after_image','content_brasa_slider_loop_after_image');

/**
 * Function get_excerpt
 *
 * @since  0.1
 *
 * @param  string $content with text to excerpt.
 * @param  string $limit number of the limit.
 * @param  string $after with element to print in end excerpt.
 *
 * @return string
 */

function get_excerpt( $content = '', $limit = '', $after = '' ){

	if ( $limit ) {
		$l = $limit;
	} else {
		$l = '140';
	}

	if ( $content ) {
		$excerpt = $content;
	} else {
		$excerpt = get_the_content();
	}

	$excerpt = preg_replace( " (\[.*?\])",'',$excerpt );
	$excerpt = strip_shortcodes( $excerpt );
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, $l );
	$excerpt = substr( $excerpt, 0, strripos($excerpt, " " ) );
	$excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );

	if ( $after ) {
		$a = $after;
	} else {
		$a = '...';
	}

	$excerpt = $excerpt . $a;
	return $excerpt;
}

/* Class Brasa Social Feed */
require_once get_template_directory() . '/inc/youtube-api-class.php';
global $brasa_social_feed;
$brasa_social_feed = new Brasa_Social_Feed(
	array(
		'youtube_auth'     => 'AIzaSyC5UL0Us0mOCh2wx_kkCi6JjEQ0niM_YiM',
		'youtube_playlist' => kirki_get_option('youtube_playlist'),
	)
);

/* Redireciona single Links para listagem */
add_action( 'template_redirect', 'redirect_links' );
function redirect_links() {
    if ( ! is_singular( 'links' ) )
        return;

    wp_redirect( get_post_type_archive_link( 'links' ), 301 );
    exit;
}

/* Redireciona single Agenda para listagem */
add_action( 'template_redirect', 'redirect_agenda' );
function redirect_agenda() {
    if ( ! is_singular( 'agenda' ) )
        return;

    wp_redirect( get_post_type_archive_link( 'agenda' ), 301 );
    exit;
}

//ajax filtros cpts
function ajax_brasa_filters_sub_level() {
	$first_level_term = get_term_by( 'slug', $_POST['category'], $_POST['taxonomy'], OBJECT, false );
	$terms = get_terms( array($_POST['taxonomy']), array('parent' => $first_level_term->term_id ) );
 	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
 		foreach ( $terms as $term ) {
 			printf( '<option value="%s">%s</option>', $term->slug, $term->name );
       	}
    }
    else{
    	echo 'false';
    }
    die();
}
add_action( 'wp_ajax_brasa_filters_sub_level', 'ajax_brasa_filters_sub_level' );
add_action( 'wp_ajax_nopriv_brasa_filters_sub_level', 'ajax_brasa_filters_sub_level' );

function brasa_advanced_search_query_key( $query ) {
    if ( $query->is_main_query() ) {
    	if ( isset( $_GET['advanced_search'] ) && !empty( $_GET['advanced_search'] ) ) {
        	$query->set( 's', $_GET['advanced_search'] );
        }
    }
    if ( is_page() && is_page_template( 'noticias.php' ) && $query->get( 'post_type' ) == 'post' ) {
    	if ( isset( $_GET['advanced_search'] ) && !empty( $_GET['advanced_search'] ) ) {
        	$query->set( 's', $_GET['advanced_search'] );
    	}
       	if ( isset( $_GET['category'] ) && !empty( $_GET['category'] ) ) {
       		$query->set( 'category_name', $_GET['category'] );
       	}
    }
}
add_action( 'pre_get_posts', 'brasa_advanced_search_query_key' );
