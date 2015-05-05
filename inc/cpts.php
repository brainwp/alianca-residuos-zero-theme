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
        'supports' => array( 'title', 'editor', 'thumbnail' )
    )
);