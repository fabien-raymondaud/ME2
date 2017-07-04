<?php
add_action( 'after_setup_theme', 'memoires_setup' );

if ( ! function_exists( 'memoires_setup' ) ){

	function memoires_setup() {
		add_theme_support('nav-menus');
		add_theme_support( 'post-thumbnails' );
		add_theme_support('auto-load-next-post');
			
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
    	add_image_size('image-poster-installation', 767, 400, true);
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
			        'order' => 'ASC',
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
			        'order' => 'ASC'
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
			        'order' => 'ASC',
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
	$type = $_POST['type'];
	$recherche = $_POST['recherche'];
	
	$args=array();

	$args['post_type']='post';
	$args['orderby']='menu_order';
	$args['order']=$order;
	$args['offset']=$offset;
	$args['posts_per_page']=1;
	$args['post_status']='publish';

	if($type!=-1 || $recherche!=""){
		if($type!=-1){
			if($recherche!=""){
				$args['tax_query']=array(
					array('taxonomy' => 'thematique', 'field' => 'name', 'terms' => $recherche),
					array('taxonomy' => 'type_editorial', 'field' => 'term_id', 'terms' => $type)
				);
			}
			else{
				$args['tax_query']=array(
					array('taxonomy' => 'type_editorial', 'field' => 'term_id', 'terms' => $type)
				);
			}
		}
		else{
			if($recherche!=""){
				$args['tax_query']=array(
					array('taxonomy' => 'thematique', 'field' => 'name', 'terms' => $recherche)
				);
			}
		}
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

/* Filtre articles archive */
add_action( 'wp_ajax_filtre_articles', 'filtre_articles' );
add_action( 'wp_ajax_nopriv_filtre_articles', 'filtre_articles' );

function filtre_articles(){
	$offset = $_POST['offset'];
	$order = $_POST['ordre'];
	$type = $_POST['type'];
	$recherche = $_POST['recherche'];
	
	$args=array();

	$args['post_type']='post';
	$args['orderby']='menu_order';
	$args['order']=$order;
	$args['offset']=$offset;
	$args['posts_per_page']=1;
	$args['post_status']='publish';

	if($type!=-1 || $recherche!=""){
		if($type!=-1){
			if($recherche!=""){
				$args['tax_query']=array(
					array('taxonomy' => 'thematique', 'field' => 'name', 'terms' => $recherche),
					array('taxonomy' => 'type_editorial', 'field' => 'term_id', 'terms' => $type)
				);
			}
			else{
				$args['tax_query']=array(
					array('taxonomy' => 'type_editorial', 'field' => 'term_id', 'terms' => $type)
				);
			}
		}
		else{
			if($recherche!=""){
				$args['tax_query']=array(
					array('taxonomy' => 'thematique', 'field' => 'name', 'terms' => $recherche)
				);
			}
		}
	}
	
	//Premier bloc

	$liste_derniers_articles = get_posts($args);

	//Pour le nouveau compteur d'articles
	$args['posts_per_page'] = -1;
	$nb_derniers_articles = get_posts($args);
?>
		<span class="new-compteur-post invisible" data-nb-posts="<?php echo count($nb_derniers_articles);?>"></span>
<?php

	//Fin Pour le nouveau compteur d'articles

	if(count($liste_derniers_articles)==0){
		include(locate_template('no-article.php'));
	}

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
/* /Filtre articles archive */


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

/* Load vidéo installation */
add_action( 'wp_ajax_load_video_background', 'load_video_background' );
add_action( 'wp_ajax_nopriv_load_video_background', 'load_video_background' );

function load_video_background() {
	$poster_bloc = get_field('poster_video_installation', 2);
	$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-poster-installation', false);
?>
	<h1 class="color2 size50">Promesse de l'installation</h1>

	<div class="conteneur-video-background">
		<video autoplay loop poster="<?php echo $poster_src[0];?>" class="bgvid">
			<source src="<?php the_field('video_installation', 2); ;?>" type="video/mp4">
		</video>
	</div>
	
<?php
	die();
}

add_action( 'wp_ajax_load_video_installation', 'load_video_installation' );
add_action( 'wp_ajax_nopriv_load_video_installation', 'load_video_installation' );

function load_video_installation() {
	$poster_bloc = get_field('poster_video_installation', 2);
	$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-poster-installation', false);

	$chaine_video = '
	<video class="video-js vjs-default-skin" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'896:400\'}">
		<source src="'.get_field('video_installation', 2).'" type="video/mp4">
		<p class="vjs-no-js">
		  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
		  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
		</p>
	</video>';
?>
	<div class="video-installation">
		<?php echo $chaine_video;?>
	</div>

	<h1 class="color2 size50">Promesse de l'installation</h1>
<?php
	die();
}
/* /Load vidéo installation */

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

/* Load next article */
add_action( 'wp_ajax_load_next_article', 'load_next_article' );
add_action( 'wp_ajax_nopriv_load_next_article', 'load_next_article' );

function load_next_article() {
	$identifiant = $_POST['identifiant'];

	$avecblocvideo=false;
	$compteur_video = 0;
	//Pour l'affichage du type éditorial de l'article	    		
	$types_editoriaux = wp_get_post_terms($identifiant, 'type_editorial');
	$tableau_types_editoriaux = array();
	foreach($types_editoriaux as $type_editorial){
		$tableau_types_editoriaux[]=$type_editorial->name;
	}
	$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

	//Pour l'affichage des thématiques et hashtags de l'article
	$thematiques = wp_get_post_terms($identifiant, 'thematique');
	$tableau_hashtags = array();
	$tableau_pour_liens = array();
	foreach($thematiques as $thematique){
		$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
		$tableau_pour_liens[]=$thematique->slug;
	}

	$hashtags = wp_get_post_terms($identifiant);
	foreach($hashtags as $hashtag){
		$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
	}

	$chaine_hashtags = implode(' ', $tableau_hashtags);

?>
		<span class="hashs actif" data-new-url="<?php the_permalink($identifiant);?>" data-new-title="<?php echo get_the_title($identifiant);?>"></span>
		<div class="media-entete media-entete-suite">
<?php
			switch(get_field('type_dentête', $identifiant)){
				case 'Vidéo' :
					$avecblocvideo = true;
					$compteur_video++;
					$poster_bloc = get_field('poster_video_entete', $identifiant);
					$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-slider-a-la-une', false);

					$chaine_video = '
								<video class="video-js" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'896:400\'}">
									<source src="'.get_field('video_entete', $identifiant).'" type="video/mp4">
									<p class="vjs-no-js">
									  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
									  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
									</p>
								</video>';

					$classeVideo = "heberge";
					if(get_field('source_youtube', $identifiant)==true){
						$chaine_video = '<div class="poster" style="background-image:url(\''.$poster_src[0].'\');"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.48 66.48"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-1" cx="33.24" cy="33.24" r="31.11"/><path class="cls-2" d="M33.24,0A33.24,33.24,0,1,0,66.48,33.24,33.27,33.27,0,0,0,33.24,0Zm0,3.33A29.92,29.92,0,1,1,3.32,33.24,29.89,29.89,0,0,1,33.24,3.33Zm-8.31,15V48.2l26.59-15Z"/></g></svg><span class="size16 typo1 color2">Lancer la vidéo</span></div></div><div class="video-container"><iframe width="100%" src="http://www.youtube.com/embed/'.get_field('video_entete', $identifiant).'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
						$classeVideo = "";
					}
					
?>
					<div class="video-entete <?php echo $classeVideo;?>">
						<?php echo $chaine_video;?>
	        		</div>
<?php
				break;

				case 'Image fixe' :
?>
					<div class="image-entete">
						<img src="<?php the_field('image_entete', $identifiant);?>" alt="<?php the_title();?>">
					</div>
<?php
					if(get_field('legende_image_entete', $identifiant)!=""){
?>
	        			<p class="legende-entete txtright size12 tk-utopia-std-display prs mtn pts"><?php the_field('legende_image_entete', $identifiant);?></p>
<?php
					}
				break;

				case 'Diaporama' :
?>
					<div class="image-entete">
						<img src="<?php the_field('image_entete', $identifiant);?>" alt="<?php echo get_the_title($identifiant);?>">
						<div class="texte-lancement">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.72 55.07">
								<g id="Calque_1-2" data-name="Calque 1">
									<path class="cls-1" d="M14.09.76a2.6,2.6,0,0,0-3.68,0L.76,10.42a2.6,2.6,0,0,0,0,3.68l9.66,9.66a2.6,2.6,0,0,0,3.68,0l9.66-9.65a2.6,2.6,0,0,0,0-3.68ZM12.26,21.91,2.6,12.25,12.25,2.6h0l9.65,9.66Zm29.37,1.84a2.6,2.6,0,0,0,3.68,0L55,14.09a2.6,2.6,0,0,0,0-3.68L45.3.76a2.6,2.6,0,0,0-3.68,0L32,10.42a2.6,2.6,0,0,0,0,3.68ZM43.46,2.6h0l9.66,9.66-9.66,9.65-9.65-9.66ZM14.09,31.32a2.6,2.6,0,0,0-3.68,0L.76,41a2.6,2.6,0,0,0,0,3.68l9.66,9.66a2.6,2.6,0,0,0,3.68,0l9.66-9.66a2.6,2.6,0,0,0,0-3.68ZM12.26,52.47,2.6,42.81l9.65-9.65h0l9.65,9.66Zm33-21.15a2.6,2.6,0,0,0-3.68,0L32,41a2.6,2.6,0,0,0,0,3.68l9.65,9.66a2.6,2.6,0,0,0,3.68,0L55,44.65A2.6,2.6,0,0,0,55,41ZM43.46,52.47l-9.65-9.65,9.65-9.65h0l9.66,9.66Z"/>
								</g>
							</svg>
							<a href="#" class="lancer-diapo typo1 lire-article">Lancer le diaporama</a>
						</div>
					</div>

					<div class="diaporama-entete flexslider-diapo">
						<span class="fermer-diapo">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.48 18.1">
								<g id="Calque_1-2" data-name="Calque 1">
									<path class="cls-1" d="M15.24,1.64,1.77,17.75A1,1,0,1,1,.23,16.46L13.71.36a1,1,0,1,1,1.53,1.28Z"/><path class="cls-1" d="M.23,1.64l13.48,16.1a1,1,0,1,0,1.53-1.28L1.77.36A1,1,0,1,0,.23,1.64Z"/>
								</g>
							</svg>
						</span>
						<ul class="slides unstyled">
<?php
						$compteur_diapo = 1;
						$rows = get_field('diaporama_entete', $identifiant);
						$nb_diapo = count($rows);
						if( have_rows('diaporama_entete', $identifiant) ):
						    while ( have_rows('diaporama_entete', $identifiant) ) : the_row();
?>
								<li>
									<div class="diapo flex-container-h color2">
										<div class="image-diapo">
											<img src="<?php the_sub_field('image_diapo_entete', $identifiant);?>" alt="<?php the_sub_field('titre_diapo_entete', $identifiant);?>">
										</div>
										<div class="texte-diapo">
											<p class="numero-diapo typo1 size14"><?php echo $compteur_diapo." / ".$nb_diapo;?></p>
											<h3 class="typo2 size36 man"><?php the_sub_field('titre_diapo_entete', $identifiant);?></h3>
<?php
											if(get_sub_field('sous_titre_diapo_entete', $identifiant)!=""){
?>
												<h4 class="typo1 size36 man"><?php the_sub_field('sous_titre_diapo_entete', $identifiant);?></h4>
<?php
											}

											if(get_sub_field('texte_diapo_entete', $identifiant)!=""){
?>
												<div class="tk-utopia-std-display size16"><?php the_sub_field('texte_diapo_entete', $identifiant);?></div>
<?php
											}
?>
										</div>
									</div>
								</li>
<?php				
								$compteur_diapo++;		        
							endwhile;
						endif;
?>
						</ul>
					</div>
<?php
				break;
			}
?>
		</div>

		<div class="entete-article bordures-single">
<?php
		if($chaine_types_editoriaux!=""){
?>
		    <h2 class="uppercase color3 typo2 size14 mbn"><?php echo $chaine_types_editoriaux;?></h2>
<?php
		}
?>
			<h1 class="size50 mbs mtn"><?php echo get_the_title($identifiant);?></h1>
			<p class="annee-article typo1 size14 man"><?php the_field('annees_affichees', $identifiant);?></p>
<?php
		if($chaine_hashtags!=""){
?>
		    <p class="hashtags size14 typo1 man"><?php echo $chaine_hashtags;?></p>
<?php
		}
?>
		</div>
<?php
	if( have_rows('page_builder', $identifiant) ):
	    while ( have_rows('page_builder', $identifiant) ) : the_row();
	        if( get_row_layout() == 'bloc_chapo' ):
?>
	        	<div class="bloc-chapo bordures-single bloc-chapo bordures-single size20 typo1 ptl">
	        		<?php the_sub_field('texte_chapo', $identifiant);?>
	        		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.32 19.74">
	        			<g id="Calque_1-2" data-name="Calque 1">
	        				<polygon class="cls-1" points="25.66 19.74 13.69 6.86 3.42 17.9 0 14.72 13.69 0 25.66 12.88 37.63 0 51.31 14.72 47.89 17.9 37.63 6.86 25.66 19.74"/>
	        			</g>
	        		</svg>
	        	</div>
<?php
	        elseif( get_row_layout() == 'bloc_texte_courant' ): 
?>
	        	<div class="bloc-texte-courant bordures-single ptl"><?php the_sub_field('texte_courant', $identifiant);?></div>
<?php
	        elseif( get_row_layout() == 'bloc_citation' ): 
?>
	        	<div class="bloc-citation bordures-single">
	        		<div class="la-citation">
	        			<blockquote>
	        				<?php the_sub_field('texte_citation', $identifiant);?>
	        			</blockquote>
<?php
						if(get_sub_field('legende_citation', $identifiant)!=""){
?>
	        				<p class="legende-citation color7 size12 tk-utopia-std-display man"><?php the_sub_field('legende_citation', $identifiant);?></p>
<?php
						}
?>
					</div>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_video' ): 
				$avecblocvideo = true;
				$compteur_video = 0;
				$poster_bloc = get_sub_field('poster_video', $identifiant);
				$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-poster-video', false);
				$par_youtube = "";
				/*$chaine_video = '<video class="video-js" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'683:375\'}">
									<source src="'.get_sub_field('source_video', $identifiant).'" type="video/mp4">
									<p class="vjs-no-js">
									  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
									  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
									</p>
								</video>';*/

				//if(get_sub_field('source_youtube_bloc_video', $identifiant)==true){
					$chaine_video = '<div class="poster" style="background-image:url(\''.$poster_src[0].'\');"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.48 66.48"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-1" cx="33.24" cy="33.24" r="31.11"/><path class="cls-2" d="M33.24,0A33.24,33.24,0,1,0,66.48,33.24,33.27,33.27,0,0,0,33.24,0Zm0,3.33A29.92,29.92,0,1,1,3.32,33.24,29.89,29.89,0,0,1,33.24,3.33Zm-8.31,15V48.2l26.59-15Z"/></g></svg><span class="size16 typo1 color2">Lancer la vidéo</span></div></div><div class="video-container"><iframe width="100%" src="http://www.youtube.com/embed/'.get_sub_field('source_video', $identifiant).'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
				//}
?>
	        	<div class="bloc-video bordures-single">
	        		<div class="la-video">
						<?php echo $chaine_video;?>	        			
	        		</div>
<?php
					if(get_sub_field('legende_video', $identifiant)!=""){
?>
	        			<p class="legende-video size12 tk-utopia-std-display man"><?php the_sub_field('legende_video', $identifiant);?></p>
<?php
					}
?>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_image' ): 
?>
	        	<div class="bloc-image bordures-single">
	        		<div class="l-image">
	        			<img src="<?php the_sub_field('source_image', $identifiant);?>" alt="<?php the_sub_field('legende_image', $identifiant);?>">
	        		</div>
<?php
					if(get_sub_field('legende_image', $identifiant)!=""){
?>
	        			<p class="legende-image size12 tk-utopia-std-display man"><?php the_sub_field('legende_image', $identifiant);?></p>
<?php
					}
?>
	        	</div>
<?php
	        endif;
	    endwhile;
	endif;
?>
		<div class="articles-en-liens bordures-single flex-container-h">
			<h4 class="size24 man txtcenter ptl pbl">Articles en lien</h4>
<?php
			$articles_en_lien = array();
			if(get_field('articles_en_lien', $identifiant)!=""){
				$articles_en_lien = get_field('articles_en_lien', $identifiant);
			}
			else{
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 2,
					'order' => 'ASC',
					'orderby' => 'rand',
					'tax_query' => array(
						array(
							'taxonomy' => 'thematique',
							'field'    => 'slug',
							'terms'    => $tableau_pour_liens
						)
					)
				);
				$query_articles_lies = new WP_Query( $args );

				if($query_articles_lies->have_posts()) : 
					while($query_articles_lies->have_posts()) : 
						$query_articles_lies->the_post();
						$articles_en_lien[]=$post->ID;
					endwhile;
				endif;
			}

			foreach($articles_en_lien as $article_lie){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($article_lie), 'full', false);
   				//Pour l'affichage du type éditorial de l'article	    		
	    		$types_editoriaux = wp_get_post_terms($article_lie, 'type_editorial');
	    		$tableau_types_editoriaux = array();
	    		foreach($types_editoriaux as $type_editorial){
	    			$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

?>
				<div class="article-en-lien" style="background-image:url('<?php echo $thumbnail_desktop_retina_src[0];?>')">
					<a href="<?php the_permalink($article_lie);?>" title="Aller à <?php echo get_the_title($article_lie);?>" class="color2">
						<div class="descriptif-article flex-container-v">
							<h3 class="size24"><?php echo get_the_title($article_lie);?></h3>
<?php
							if($chaine_types_editoriaux!=""){
?>
    							<p class="types-editoriaux typo2 uppercase size14 mtn"><?php echo $chaine_types_editoriaux;?></p>
<?php
							}
?>
						</div>
					</a>
				</div>
<?php
			}
?>
		</div>	
<?php
	die();
}
/* /Load next article */
?>