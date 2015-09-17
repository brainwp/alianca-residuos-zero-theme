<?php
/*
 * Esse arquivo organiza os CPTs e Taxonomias do tema,
 * para mais informações acesse: https://github.com/wpbrasil/odin/wiki/Classe-Odin_Post_Type
 */

/* Agenda */

/* Biblioteca */
$biblioteca = new Odin_Post_Type(
    'Biblioteca',
    'biblioteca' // Slug do Post Type.
);
$biblioteca->set_labels(
    array(
        'menu_name' => __( 'Biblioteca', 'odin' )
    )
);
$biblioteca->set_arguments(
    array(
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon' => 'dashicons-book-alt'
    )
);

/* entidades */
$entidades = new Odin_Post_Type(
    'Entidade',
    'entidades' // Slug do Post Type.
);
$entidades->set_labels(
    array(
        'menu_name' => __( 'Entidades', 'odin' )
    )
);
$entidades->set_arguments(
    array(
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon' => 'dashicons-building'
    )
);

$boas_praticas = new Odin_Post_Type(
    'Boas Praticas',
    'boas-praticas' // Slug do Post Type.
);
$boas_praticas->set_labels(
    array(
        'menu_name' => __( 'Boas Práticas', 'odin' ),
        'name' => _x( 'Boas Práticas', 'Post Type General Name', 'odin' ),
        'singular_name' => _x( 'Boas Práticas', 'Post Type Singular Name', 'odin' ),
        'all_items' => __( 'Ver todos', 'odin' ),
    )
);
$boas_praticas->set_arguments(
    array(
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon' => 'dashicons-visibility'
    )
);

$links = new Odin_Post_Type(
    'Links',
    'links' // Slug do Post Type.
);
$links->set_labels(
    array(
        'menu_name' => __( 'Links', 'odin' ),
        'name' => _x( 'Links', 'Post Type General Name', 'odin' ),
        'singular_name' => _x( 'Links', 'Post Type Singular Name', 'odin' ),
        'all_items' => __( 'Ver todos Links', 'odin' ),
    )
);
$links->set_arguments(
    array(
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon' => 'dashicons-admin-links'
    )
);
if ( ! function_exists('brasa_custom_types') ) {

// Register Custom Post Type
function brasa_custom_types() {

	$labels = array(
		'name'                => _x( 'Agenda', 'Post Type General Name', 'odin' ),
		'singular_name'       => _x( 'Agenda', 'Post Type Singular Name', 'odin' ),
		'menu_name'           => __( 'Agenda', 'odin' ),
		'name_admin_bar'      => __( 'Agenda', 'odin' ),
		'parent_item_colon'   => __( 'Evento parente', 'odin' ),
		'all_items'           => __( 'Todos eventos', 'odin' ),
		'add_new_item'        => __( 'Adicionar novo Evento', 'odin' ),
		'add_new'             => __( 'Adicionar novo', 'odin' ),
		'new_item'            => __( 'Novo evento', 'odin' ),
		'edit_item'           => __( 'Editar evento', 'odin' ),
		'update_item'         => __( 'Atualizar Evento', 'odin' ),
		'view_item'           => __( 'Ver evento', 'odin' ),
		'search_items'        => __( 'Buscar Evento', 'odin' ),
		'not_found'           => __( 'Não encontrado', 'odin' ),
		'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'odin' ),
	);
	$args = array(
		'label'               => __( 'agenda', 'odin' ),
		'description'         => __( 'Agenda de Eventos', 'odin' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-calendar-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'agenda', $args );

}

// Hook into the 'init' action
add_action( 'init', 'brasa_custom_types', 0 );

}

function filter_query_agenda($query){
	if( is_admin() )
		return;

    if ( $query->is_main_query() && is_post_type_archive('agenda') ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'agenda_data' );
        $query->set( 'order', 'DESC' );

        $current = current_time('Ymd');
        $meta = array();
        $meta[] = array(
			'key' => 'agenda_data',
			'compare' => '>=',
			'value' => $current
		);

		$query->set('meta_query', $meta);

    }
    if ( is_page() && is_page_template('agenda-antigos.php') && $query->get('post_type') == 'agenda' && $query->get('posts_per_page') == get_option('posts_per_page') ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'agenda_data' );
        $query->set( 'order', 'DESC' );

        $current = current_time('Ymd');
        $meta = array();
        $meta[] = array(
			'key' => 'agenda_data',
			'compare' => '<',
			'value' => $current
		);

		$query->set('meta_query', $meta);

    }
    if ( $query->is_main_query() && is_post_type_archive('links') ) {
    	$query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'filter_query_agenda' );

if ( ! function_exists( 'register_taxs' ) ) {

// Register Custom Taxonomy
function register_taxs() {

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria Parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria Parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar categoria', 'odin' ),
		'view_item'                  => __( 'Ver Categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categoria', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_biblioteca', array( 'biblioteca' ), $args );

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria Parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria Parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar categoria', 'odin' ),
		'view_item'                  => __( 'Ver Categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categoria', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_entidades', array( 'entidades' ), $args );

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria Parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria Parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar categoria', 'odin' ),
		'view_item'                  => __( 'Ver Categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categoria', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_boas_praticas', array( 'boas-praticas' ), $args );

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria Parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria Parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar categoria', 'odin' ),
		'view_item'                  => __( 'Ver Categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categoria', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_agenda', array( 'agenda' ), $args );

}
add_action( 'init', 'register_taxs', 0 );

}
