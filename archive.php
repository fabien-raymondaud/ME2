<?php get_header();?>
<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$taxo =  get_query_var( 'taxonomy' );

$texte_articles = "article";
if($term->count>1){
	$texte_articles = "articles";
}
?>

<div class="header-cat txtcenter" style="margin-top:83px;">
	<h1 class="txtcenter size30">
<?php 
	if($taxo=="thematique"){
		echo '"'.$term->name.'"';
	}
	else{
		echo '"'.$term->name.'" dans le rétro';
	}
?>
	</h1>
	<p class="nb-articles size18 txtcenter tk-utopia-std-display"><?php echo $term->count.' '.$texte_articles;?></p>
<?php 
	if($taxo=="annee"){
		echo 'slider années';
	}
	else{
		echo 'moteur de recherche + filtres';
	}
?>
</div>
<?php
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => $taxo,
            'field' => 'term_id',
            'terms' => $term->term_id,
        )
    )
);

$liste_derniers_articles = get_posts($args);

if($liste_derniers_articles!=""){
?>
	<div class="derniers-articles flex-container-h">
		<div class="dernier-article flex-container-h">
<?php
}			
			foreach ($liste_derniers_articles as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
	    		$tableau_types_editoriaux = array();
	    		foreach($types_editoriaux as $type_editorial){
	    			$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
					</div>
<?php
				}
?>
					<div class="descriptif-article">
<?php
					if($chaine_hashtags!=""){
?>
    					<p class="hashtags size14 typo1"><?php echo $chaine_hashtags;?></p>
<?php
					}
?>
						<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
					if($chaine_types_editoriaux!=""){
?>
    					<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
					}
?>
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_field('resume_remontee', $dernier_article->ID);?>
						</div>
					</div>
				</div>
<?php
   			}
if($liste_derniers_articles!=""){	
?>
    	</div>
<?php
}
$args = array(
    'posts_per_page' => 4,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'offset' => 1,
    'tax_query' => array(
        array(
            'taxonomy' => $taxo,
            'field' => 'term_id',
            'terms' => $term->term_id,
        )
    )
);

$liste_derniers_articles_bis = get_posts($args);

if($liste_derniers_articles_bis!=""){
?>
		<div class="autres-articles flex-container-h">
<?php
}
			foreach ($liste_derniers_articles_bis as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
    			$tableau_types_editoriaux = array();
    			foreach($types_editoriaux as $type_editorial){
    				$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
					</div>
<?php
				}
?>
					<div class="descriptif-article">
<?php
					if($chaine_hashtags!=""){
?>
    					<p class="hashtags typo1 size14"><?php echo $chaine_hashtags;?></p>
<?php
					}
?>
						<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
					if($chaine_types_editoriaux!=""){
?>
    					<p class="types-editoriaux size14 uppercase typo2 color3"><?php echo $chaine_types_editoriaux;?></p>
<?php
					}
?>
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_field('resume_remontee', $dernier_article->ID);?>
						</div>
					</div>
				</div>
   	<?php
   			}
if($liste_derniers_articles_bis!=""){
?>
    	</div>
<?php
}
if($liste_derniers_articles!=""){
?>
	</div>
<?php
}
?>



<?php
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'offset' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => $taxo,
            'field' => 'term_id',
            'terms' => $term->term_id,
        )
    )
);

$liste_derniers_articles = get_posts($args);

if($liste_derniers_articles!=""){
?>
	<div class="derniers-articles flex-container-h derniers-articles-bis">
		<div class="dernier-article flex-container-h">
<?php
}			
			foreach ($liste_derniers_articles as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
	    		$tableau_types_editoriaux = array();
	    		foreach($types_editoriaux as $type_editorial){
	    			$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
					</div>
<?php
				}
?>
					<div class="descriptif-article">
<?php
					if($chaine_hashtags!=""){
?>
    					<p class="hashtags size14 typo1"><?php echo $chaine_hashtags;?></p>
<?php
					}
?>
						<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
					if($chaine_types_editoriaux!=""){
?>
    					<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
					}
?>
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_field('resume_remontee', $dernier_article->ID);?>
						</div>
					</div>
				</div>
<?php
   			}
if($liste_derniers_articles!=""){	
?>
    	</div>
<?php
}
$args = array(
    'posts_per_page' => 4,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'offset' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => $taxo,
            'field' => 'term_id',
            'terms' => $term->term_id,
        )
    )
);

$liste_derniers_articles_bis = get_posts($args);

if($liste_derniers_articles_bis!=""){
?>
		<div class="autres-articles flex-container-h">
<?php
}
			foreach ($liste_derniers_articles_bis as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
    			$tableau_types_editoriaux = array();
    			foreach($types_editoriaux as $type_editorial){
    				$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
					</div>
<?php
				}
?>
					<div class="descriptif-article">
<?php
					if($chaine_hashtags!=""){
?>
    					<p class="hashtags typo1 size14"><?php echo $chaine_hashtags;?></p>
<?php
					}
?>
						<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
					if($chaine_types_editoriaux!=""){
?>
    					<p class="types-editoriaux size14 uppercase typo2 color3"><?php echo $chaine_types_editoriaux;?></p>
<?php
					}
?>
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_field('resume_remontee', $dernier_article->ID);?>
						</div>
					</div>
				</div>
   	<?php
   			}
if($liste_derniers_articles_bis!=""){
?>
    	</div>
<?php
}
if($liste_derniers_articles!=""){
?>
	</div>
<?php
}
?>
<?php get_footer();?>