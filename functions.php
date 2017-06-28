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
    	add_image_size('image-poster-video', 1366, 750, true);
	}
}

function remove_menu_pages() {
	remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'remove_menu_pages' );



function my_remove_meta_boxes() {
	remove_meta_box( 'categorydiv', 'post', 'side' );
	remove_meta_box( 'slugdiv', 'post', 'normal' );
	remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	remove_meta_box( 'commentsdiv', 'post', 'advanced' );
	remove_meta_box( 'authordiv', 'post', 'normal' );
	remove_meta_box( 'revisionsdiv', 'post', 'advanced' );
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );

add_filter( 'sanitize_file_name', 'remove_accents' );

function add_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'add_mime_types' );

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



function add_js_scripts() {
	wp_enqueue_script( 'script', get_template_directory_uri().'/dist/js/script.js', array('jquery'), '1.0', true );
	wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action('wp_enqueue_scripts', 'add_js_scripts');


/* Load slider articles home */
add_action( 'wp_ajax_load_slider_articles', 'load_slider_articles' );
add_action( 'wp_ajax_nopriv_load_slider_articles', 'load_slider_articles' );

function load_slider_articles() {
?>
	<div class="flexslider-articles-mobile">
		<ul class="slides">
<?php
			$args = array(
			        'posts_per_page' => 5,
			        'post_type' => 'post',
			        'orderby' => 'menu_order',
			        'order' => 'DESC',
			        'offset' => 1
			    );

			$liste_derniers_articles = get_posts($args);

			foreach ($liste_derniers_articles as $dernier_article){
				include(locate_template('article-remontee-home-slider.php'));
			}
?>
		</ul>
	</div>
<?php
	die();
}
/* /Load slider articles home */

/* Load liste articles home */
add_action( 'wp_ajax_load_liste_articles', 'load_liste_articles' );
add_action( 'wp_ajax_nopriv_load_liste_articles', 'load_liste_articles' );

function load_liste_articles() {
?>
	<div class="dernier-article flex-container-h">
    <?php
			$args = array(
			        'posts_per_page' => 1,
			        'post_type' => 'post',
			        'orderby' => 'menu_order',
			        'order' => 'DESC'
			    );

			$liste_derniers_articles = get_posts($args);

			foreach ($liste_derniers_articles as $dernier_article){
    		include(locate_template('article-remontee-home.php'));
   		}
    ?>
    	<h3 class="uppercase size16"><span>Les derniers articles</span></h3>
    </div>

    <div class="autres-articles flex-container-h">
	<?php
			$args = array(
			        'posts_per_page' => 4,
			        'post_type' => 'post',
			        'orderby' => 'menu_order',
			        'order' => 'DESC',
			        'offset' => 1
			    );

			$liste_derniers_articles = get_posts($args);

			foreach ($liste_derniers_articles as $dernier_article){
    		include(locate_template('article-remontee-home.php'));
   		}
    ?>
    </div>
<?php
	die();
}
/* /Load liste articles home */

/* Load more articles archive */
add_action( 'wp_ajax_load_more_articles', 'load_more_articles' );
add_action( 'wp_ajax_nopriv_load_more_articles', 'load_more_articles' );

function load_more_articles(){
	$offset = $_POST['offset'];
	$order = $_POST['ordre'];
	$thematique = $_POST['thematique'];
	
	$args=array();

	$args['post_type']='post';
	$args['orderby']='menu_order';
	$args['order']=$order;
	$args['offset']=$offset;
	$args['posts_per_page']=1;
	$args['suppress_filters']=true;
	$args['post_status']='publish';

	$ajax_query = new WP_Query($args);

	if($thematique!="Tous"){
		$args['tax_query']=array(
			'relation' => 'OR',
			array('taxonomy' => 'post_tag', 'field' => 'name', 'terms' => $thematique),
			array('taxonomy' => 'thematique', 'field' => 'name', 'terms' => $thematique),
			array('taxonomy' => 'annee', 'field' => 'name', 'terms' => $thematique),
			array('taxonomy' => 'type_editorial', 'field' => 'name', 'terms' => $thematique),
		);
	}

	//Premier bloc

	$liste_derniers_articles = get_posts($args);

	if(count($liste_derniers_articles)>0){
?>
	<div class="derniers-articles flex-container-h">
		<div class="dernier-article flex-container-h">
	    <?php
	}
			foreach ($liste_derniers_articles as $dernier_article){
				include(locate_template('article-remontee-home.php'));
			}
	    ?>
<?php
	if(count($liste_derniers_articles)>0){	
?>
    	</div>
<?php
	}

	$args['offset']=$offset + 1;
	$args['posts_per_page']=4;

	$liste_derniers_articles_bis = get_posts($args);

	if(count($liste_derniers_articles_bis)>0){
?>
	    <div class="autres-articles flex-container-h">
<?php
	}
			foreach ($liste_derniers_articles_bis as $dernier_article){
				include(locate_template('article-remontee-home.php'));
			}
	if(count($liste_derniers_articles_bis)>0){
?>
    	</div>
<?php
	}
	if(count($liste_derniers_articles)>0){
?>
	</div>
<?php
	}


	//Deuxième bloc
	$args['offset']=$offset + 5;
	$args['posts_per_page']=1;

	$liste_derniers_articles = get_posts($args);
	if(count($liste_derniers_articles)>0){
?>
	<div class="derniers-articles flex-container-h derniers-articles-bis">
		<div class="dernier-article flex-container-h">
	    <?php
	}
			foreach ($liste_derniers_articles as $dernier_article){
				include(locate_template('article-remontee-home.php'));
			}
	    ?>
<?php
	if(count($liste_derniers_articles)>0){	
?>
    	</div>
<?php
	}
	
	$args['offset']=$offset + 6;
	$args['posts_per_page']=4;

	$liste_derniers_articles_bis = get_posts($args);

	if(count($liste_derniers_articles_bis)>0){
?>
	    <div class="autres-articles flex-container-h">
<?php
	}
			foreach ($liste_derniers_articles_bis as $dernier_article){
				include(locate_template('article-remontee-home.php'));
			}
	if(count($liste_derniers_articles_bis)>0){
?>
    	</div>
<?php
	}
	if(count($liste_derniers_articles)>0){
?>
	</div>
<?php
	}

	die();
}
/* /Load more articles archive */


/* Load slider installation */
add_action( 'wp_ajax_load_gros_slider', 'load_gros_slider' );
add_action( 'wp_ajax_nopriv_load_gros_slider', 'load_gros_slider' );

function load_gros_slider() {
?>
	<div class="slider-installation flexslider-installation">
		<ul class="slides">
	<?php
		if( have_rows('slide_installation', 2) ):
		    while ( have_rows('slide_installation', 2) ) : the_row();
	?>
				<li class="flex-container-h">
					<div class="image-unique dispo-<?php the_sub_field('disposition_slide', 2);?>" style="background-image:url('<?php echo get_sub_field('image1_slide_installation', 2)?>');">
					</div>

					<div class="image-double flex-container-v">
						<div style="background-image:url('<?php echo get_sub_field('image2_slide_installation', 2)?>');"></div>
						<div style="background-image:url('<?php echo get_sub_field('image3_slide_installation', 2)?>');"></div>
					</div>
				</li>
	<?php				
			endwhile;
		endif;
	?>
		</ul>
	</div>
<?php
	die();
}

add_action( 'wp_ajax_load_petit_slider', 'load_petit_slider' );
add_action( 'wp_ajax_nopriv_load_petit_slider', 'load_petit_slider' );

function load_petit_slider() {
?>
	<div class="slider-installation flexslider-installation">
		<ul class="slides">
	<?php
		if( have_rows('slide_installation', 2) ):
		    while ( have_rows('slide_installation', 2) ) : the_row();
	?>
				<li class="slide-installation-mobile" style="background-image:url('<?php echo get_sub_field('image1_slide_installation', 2)?>');"></li>
				<li class="slide-installation-mobile" style="background-image:url('<?php echo get_sub_field('image2_slide_installation', 2)?>');"></li>
				<li class="slide-installation-mobile" style="background-image:url('<?php echo get_sub_field('image3_slide_installation', 2)?>');"></li>
	<?php				
			endwhile;
		endif;
	?>
		</ul>
	</div>
<?php
	die();
}
/* /Load slider installation */

/* Load playlist */
add_action( 'wp_ajax_load_playlist', 'load_playlist' );
add_action( 'wp_ajax_nopriv_load_playlist', 'load_playlist' );

function load_playlist() {
	$playlist = $_POST['playlist'];
?>
	<h2 class="man typo2 size24"><?php echo get_the_title($playlist);?></h2>

<?php
	cue_playlist( $playlist );
?>
    <a href="#" class="display-all-playlists typo1 size16 color2">Toutes les playlists</a>
<?php
	die();
}
/* /Load playlist */
?>