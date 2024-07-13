<?php

function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

function create_custom_taxonomies() {
    register_taxonomy( 'tipo', ['entidades' ], array(
        'label'        => __( 'Tipo', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'tipo' ),
		'show_admin_column' => true,
        'hierarchical' => true,
		'labels'       => array(
			'name'              => _x( 'Tipos', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tipo', 'taxonomy singular name' ),
			'search_items'      => __( 'Buscar Tipos' ),
			'all_items'         => __( 'Todos los Tipos' ),
			'parent_item'       => __( 'Tipo Superior' ), // only needed if hierarchical
			'parent_item_colon' => __( 'Tipo Superior:' ), // only needed if hierarchical
			'edit_item'         => __( 'Editar Tipo' ),
			'update_item'       => __( 'Actualizar Tipo' ),
			'add_new_item'      => __( 'Añadir Nuevo Tipo' ),
			'new_item_name'     => __( 'Nombre del Nuevo Tipo' ),
			'menu_name'         => __( 'Tipo' ),
		)
    ) );
}
add_action( 'init', 'create_custom_taxonomies', 0 );

// -------------------------
// Define custom post types
// -------------------------
function register_custom_types() {
	register_post_type( 'obres',
		array( 
			'labels' => array(
				'name'				=> __( 'Obres', 'maneko_theme' ),
				'singular_name'		=> __( 'Obra', 'maneko_theme' ),
				'all_items'			=> __( 'Todas las Obres', 'maneko_theme' ),
				'add_new'			=> __( 'Añadir nuevo', 'maneko_theme' ),
				'add_new_item'		=> __( 'Añadir nueva Obra', 'maneko_theme' ),
				'edit'				=> __( 'Editar', 'maneko_theme' ),
				'edit_item'			=> __( 'Editar Obra', 'maneko_theme' ),
				'new_item'			=> __( 'Nueva Obra', 'maneko_theme' ),
				'view_item'			=> __( 'Ver Obra', 'maneko_theme' ),
				'search_items'		=> __( 'Buscar Obres', 'maneko_theme' ),
				'parent_item_colon' => ''
			),
			'public'				=> true,
			'publicly_queryable'	=> true,
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'query_var'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> true,
			'supports'				=> array( 'title','thumbnail'),
			'has_archive'			=> false,
			'rewrite'				=> array( 'slug' => 'obres' , 'with_front' => false ),
			'menu_icon'				=> 'dashicons-format-status',
			'taxonomies'			=> array ('featured') // in case you want to add custom taxonomies
		)
	);
}
add_action( 'init', 'register_custom_types');

?>
