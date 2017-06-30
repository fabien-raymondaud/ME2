<?php
/*
Template Name: Tous les articles
*/
?>
<?php get_header();?>
<?php wp_reset_postdata(); ?>


<div class="header-cat txtcenter">
	<h1 class="txtcenter size30">Tous les articles</h1>
	<p class="nb-articles size18 txtcenter tk-utopia-std-display"><?php echo wp_count_posts('post')->publish.' articles';?></p>

	<div class="flex-container-h filtres filtres-categorie">
		<span class="invisible filtre-categorie" data-filtre-categorie="<?php echo $term->term_id; ?>"></span>
		<select name="select_categorie" class="select_categorie">
			<option selected="selected" value="-1">Toutes les catégories</option>
<?php
			$termsFiltre = get_terms( array(
			    'taxonomy' => 'type_editorial'
			));
			foreach($termsFiltre as $termFiltre){
?>
				<option value="<?php echo $termFiltre->term_id?>"><?php echo $termFiltre->name?></option>
<?php
			}
?>
		</select>

		<select name="select_categorie" class="select_categorie">
			<option selected="selected" value="ASC">Du plus récent au plus ancien</option>
			<option value="DESC">Du plus ancien au plus récent</option>
		</select>
	</div>
</div>

<div class="conteneur-liste-articles">

<?php
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'ASC'
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

	    		//Pour l'affichage des thématiques et hashtags de l'article
				$thematiques = wp_get_post_terms($dernier_article->ID, 'thematique');
				$tableau_hashtags = array();
				foreach($thematiques as $thematique){
					$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
				}

				$hashtags = wp_get_post_terms($dernier_article->ID);
				foreach($hashtags as $hashtag){
					$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
				}

				$chaine_hashtags = implode(' ', $tableau_hashtags);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">
							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
						</a>
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
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
						if($chaine_types_editoriaux!=""){
?>
    						<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
						}
						if(get_field('resume_remontee', $dernier_article->ID)!=""){
?>
							<div class="excerpt-article tk-utopia-std-display">
								<?php the_field('resume_remontee', $dernier_article->ID);?>
							</div>
<?php
						}
?>
						</a>
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
    'order' => 'ASC',
    'offset' => 1
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

	    		//Pour l'affichage des thématiques et hashtags de l'article
				$thematiques = wp_get_post_terms($dernier_article->ID, 'thematique');
				$tableau_hashtags = array();
				foreach($thematiques as $thematique){
					$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
				}

				$hashtags = wp_get_post_terms($dernier_article->ID);
				foreach($hashtags as $hashtag){
					$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
				}

				$chaine_hashtags = implode(' ', $tableau_hashtags);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
						</a>
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
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
						if($chaine_types_editoriaux!=""){
?>
    						<p class="types-editoriaux size14 uppercase typo2 color3"><?php echo $chaine_types_editoriaux;?></p>
<?php
						}

						if(get_field('resume_remontee', $dernier_article->ID)!=""){
?>
							<div class="excerpt-article tk-utopia-std-display">
								<?php the_field('resume_remontee', $dernier_article->ID);?>
							</div>
<?php
						}
?>
						</a>
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

$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'offset' => 5
);

$liste_derniers_articles2 = get_posts($args);

if($liste_derniers_articles2!=""){
?>
	<div class="derniers-articles flex-container-h derniers-articles-bis">
		<div class="dernier-article flex-container-h">
<?php
}			
			foreach ($liste_derniers_articles2 as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
	    		$tableau_types_editoriaux = array();
	    		foreach($types_editoriaux as $type_editorial){
	    			$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

	    		//Pour l'affichage des thématiques et hashtags de l'article
				$thematiques = wp_get_post_terms($dernier_article->ID, 'thematique');
				$tableau_hashtags = array();
				foreach($thematiques as $thematique){
					$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
				}

				$hashtags = wp_get_post_terms($dernier_article->ID);
				foreach($hashtags as $hashtag){
					$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
				}

				$chaine_hashtags = implode(' ', $tableau_hashtags);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
						</a>
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
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
						if($chaine_types_editoriaux!=""){
?>
    						<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
						}

						if(get_field('resume_remontee', $dernier_article->ID)!=""){
?>
							<div class="excerpt-article tk-utopia-std-display">
								<?php the_field('resume_remontee', $dernier_article->ID);?>
							</div>
<?php
						}
?>
						</a>
					</div>
				</div>
<?php
   			}
if($liste_derniers_articles2!=""){	
?>
    	</div>
<?php
}

$args = array(
    'posts_per_page' => 4,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'offset' => 6
);

$liste_derniers_articles_bis2 = get_posts($args);

if($liste_derniers_articles_bis2!=""){
?>
		<div class="autres-articles flex-container-h">
<?php
}
			foreach ($liste_derniers_articles_bis2 as $dernier_article){
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
    			$tableau_types_editoriaux = array();
    			foreach($types_editoriaux as $type_editorial){
    				$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

	    		//Pour l'affichage des thématiques et hashtags de l'article
				$thematiques = wp_get_post_terms($dernier_article->ID, 'thematique');
				$tableau_hashtags = array();
				foreach($thematiques as $thematique){
					$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
				}

				$hashtags = wp_get_post_terms($dernier_article->ID);
				foreach($hashtags as $hashtag){
					$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
				}

				$chaine_hashtags = implode(' ', $tableau_hashtags);
?>
				<div class="panneau-article">
<?php
				if($thumbnail_desktop_retina_src[0]!=""){
?>
					<div class="image-article">
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
						</a>
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
						<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">

							<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
						if($chaine_types_editoriaux!=""){
?>
    						<p class="types-editoriaux size14 uppercase typo2 color3"><?php echo $chaine_types_editoriaux;?></p>
<?php
						}

						if(get_field('resume_remontee', $dernier_article->ID)!=""){
?>
							<div class="excerpt-article tk-utopia-std-display">
								<?php the_field('resume_remontee', $dernier_article->ID);?>
							</div>
<?php
						}
?>
						</a>
					</div>
				</div>
   	<?php
   			}
if($liste_derniers_articles_bis2!=""){
?>
    	</div>
<?php
}
if($liste_derniers_articles2!=""){
?>
	</div>
<?php
}
?>
</div>

<?php 
	$compteur_posts = wp_count_posts('post')->publish;
?>
<input type="hidden" name="compteur-posts" id="compteur-posts" value="<?php echo $compteur_posts; ?>"/>

<?php 
	if($compteur_posts>10){
?>
		<div class="afficher-plus mtl mbm txtcenter">
			<a href="#" class="color2 size16 typo1 afficher-plus-articles" data-cat="" data-ordre="">Charger plus d’articles</a>
    	</div>
<?php
	}
?>
<?php get_footer();?>
