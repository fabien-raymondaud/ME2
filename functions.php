<?php
add_action( 'after_setup_theme', 'memoires_setup' );

if ( ! function_exists( 'memoires_setup' ) ){

	function memoires_setup() {
		add_theme_support('nav-menus');
		add_theme_support( 'post-thumbnails' );
			
		if ( function_exists('register_sidebar') )
			register_sidebar();
			
		if ( function_exists('my_register_post_types') )
			add_action( 'init', 'my_register_post_types' );
			
		if ( function_exists('my_register_taxonomies') )
			add_action( 'init', 'my_register_taxonomies' );

    	register_nav_menus( array( 'principal' => "Menu Principal" ) );
    	register_nav_menus( array( 'responsive' => "Menu mobile" ) );

    	add_image_size('image-slider-a-la-une', 1792, 800, true);
	}
}

if( ! function_exists ('my_register_post_types')) {
	function my_register_post_types() {
		$labels = array(
			'name'               => __( 'Brèves installation'),
			'singular_name'      => __( 'Brève installation'),
			'menu_name'          => __( 'Brèves installation'),
			'name_admin_bar'     => __( 'Brève installation'),
			'add_new'            => __( 'Ajouter une nouvelle brève installation'),
			'add_new_item'       => __( 'Ajouter une nouvelle brève installation'),
			'new_item'           => __( 'Nouvelle brève installation'),
			'edit_item'          => __( 'Modifier une brève installation'),
			'view_item'          => __( 'Voir une brève installation'),
			'all_items'          => __( 'Toutes les brèves installation'),
			'search_items'       => __( 'Chercher une brève installation'),
			'parent_item_colon'  => __( 'Parent de la brève installation:'),
			'not_found'          => __( 'Aucune brève installation trouvée.'),
			'not_found_in_trash' => __( 'Aucune brève installation trouvée dans la corbeille.')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus'=> false,
			'capability_type' => 'post',
			'rewrite' => array("slug" => "breve_installation"),
			'hierarchical' => false,
			'query_var' => false,
			'supports' => array('title'),
		);
		register_post_type( 'breve_installation', $args );
	}
}

if( ! function_exists ('my_register_taxonomies')) {
	function my_register_taxonomies() {
		$labels = array(
			'name' => _x( 'Thématiques', 'taxonomy general name' ),
			'singular_name' => _x( 'Thématique', 'taxonomy singular name' ),
			'search_items'      => __( 'Chercher les thématiques' ),
            'all_items'         => __( 'Toutes les thématiques' ),
            'edit_item'         => __( 'Editer une thématique' ),
            'update_item'       => __( 'Mettre à jour une thématique' ),
            'add_new_item'      => __( 'Ajouter une thématique' ),
            'new_item_name'     => __( 'Nouveau nom de thématique' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'menu_name' => __( 'Thématiques' ),
		); 
	
		register_taxonomy('thematique',array( 'post' ),array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array( 'slug' => 'thematique' ),
		));

		$labels = array(
			'name' => _x( 'Années', 'taxonomy general name' ),
			'singular_name' => _x( 'Année', 'taxonomy singular name' ),
			'search_items'      => __( 'Chercher les années' ),
            'all_items'         => __( 'Toutes les années' ),
            'edit_item'         => __( 'Editer une année' ),
            'update_item'       => __( 'Mettre à jour une année' ),
            'add_new_item'      => __( 'Ajouter une année' ),
            'new_item_name'     => __( 'Nouveau nom de année' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'menu_name' => __( 'Années' ),
		); 
	
		register_taxonomy('annee',array( 'post' ),array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array( 'slug' => 'annee' ),
		));

		$labels = array(
			'name' => _x( 'Types éditoriaux', 'taxonomy general name' ),
			'singular_name' => _x( 'Type éditorial', 'taxonomy singular name' ),
			'search_items'      => __( 'Chercher les types éditoriaux' ),
            'all_items'         => __( 'Tous les types éditoriaux' ),
            'edit_item'         => __( 'Editer un type éditorial' ),
            'update_item'       => __( 'Mettre à jour un type éditorial' ),
            'add_new_item'      => __( 'Ajouter un type éditorial' ),
            'new_item_name'     => __( 'Nouveau nom de type éditorial' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'menu_name' => __( 'Types éditoriaux' ),
		); 
	
		register_taxonomy('type_editorial',array( 'post' ),array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array( 'slug' => 'type_editorial' ),
		));
	}
}

function wpc_show_admin_bar() {
	return false;
}
add_filter('show_admin_bar' , 'wpc_show_admin_bar');
?>