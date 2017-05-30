<?php
/*
Template Name: Accueil
*/
?>
<?php get_header();?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="content" style="color:#000;">
	<div class="a-la-une" style="background:#ccc">
	    <?php // remontées articles à la une
	    	$a_la_une = get_field('articles_a_la_une');
	    	foreach($a_la_une as $article_une){
	    		$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($article_une->ID), 'full', false);
				
				//Pour l'affichage du type éditorial de l'article	    		
	    		$types_editoriaux = wp_get_post_terms($article_une->ID, 'type_editorial');
	    		$tableau_types_editoriaux = array();
	    		foreach($types_editoriaux as $type_editorial){
	    			$tableau_types_editoriaux[]=$type_editorial->name;
	    		}
	    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

	    		//Pour l'affichage des thématiques et hashtags de l'article
	    		$thematiques = wp_get_post_terms($article_une->ID, 'thematique');
	    		$tableau_hashtags = array();
	    		foreach($thematiques as $thematique){
	    			$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
	    		}

	    		$hashtags = wp_get_post_terms($article_une->ID);
	    		foreach($hashtags as $hashtag){
	    			$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
	    		}

	    		$chaine_hashtags = implode(' ', $tableau_hashtags);	
	    ?>		
				<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($article_une->ID);?>">
		<?php
			if($chaine_types_editoriaux!=""){
		?>
	    		<p class="types-editoriaux"><?php echo $chaine_types_editoriaux;?></p>
		<?php
			}
		?>

		<?php
			if(get_field('annees_affichees', $article_une->ID)!=""){
		?>
	    		<p class="annees"><?php the_field('annees_affichees', $article_une->ID);?></p>
		<?php
			}
		?>

		<?php
			if($chaine_hashtags!=""){
		?>
	    		<p class="hashtags"><?php echo $chaine_hashtags;?></p>
		<?php
			}
		?>
	    		<h2><?php echo get_the_title($article_une->ID);?></h2>
	    		<a href="<?php echo get_permalink($article_une->ID);?>">Lire l'article</a>
	    <?php
	    	}
	    ?>
	</div>

	<div class="dossiers-thematiques" style="background:#aaa">
	    <?php // remontées articles dossiers thématique
	    	$thematiques_dossiers = get_field('thematiques_dossiers');
	    	foreach($thematiques_dossiers as $thematique_dossier){
	    		$term = get_term($thematique_dossier);
	    		$texte_articles = "article";
	    		if($term->count>1){
	    			$texte_articles = "articles";
	    		}
	   	?>
				<div class="panneau-thematique principal">
					<div class="descriptif-thematique">
						<p class="nb-articles"><?php echo $term->count.' '.$texte_articles;?></p>
						<h3><?php echo "#".$term->name;?></h3>
						<div class="texte-thematique">
							<?php the_field('descriptif_categorie', 'thematique_'.$thematique_dossier);?>
						</div>
					</div>
				</div>
	   	<?php
	   			$args = array(
					        'posts_per_page' => -1,
					        'post_type' => 'post',
					        'tax_query' => array(
					            array(
					                'taxonomy' => 'thematique',
					                'field' => 'term_id',
					                'terms' => $thematique_dossier,
					            )
					        )
					    );
	   			$liste_articles_thematique = get_posts($args);

	   			foreach ($liste_articles_thematique as $article_thematique){
	   				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($article_thematique->ID), 'full', false);
	   				//Pour l'affichage du type éditorial de l'article	    		
		    		$types_editoriaux = wp_get_post_terms($article_thematique->ID, 'type_editorial');
		    		$tableau_types_editoriaux = array();
		    		foreach($types_editoriaux as $type_editorial){
		    			$tableau_types_editoriaux[]=$type_editorial->name;
		    		}
		    		$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

		    		//Pour l'affichage des thématiques et hashtags de l'article
		    		$thematiques = wp_get_post_terms($article_thematique->ID, 'thematique');
		    		$tableau_hashtags = array();
		    		foreach($thematiques as $thematique){
		    			$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
		    		}

		    		$hashtags = wp_get_post_terms($article_thematique->ID);
		    		foreach($hashtags as $hashtag){
		    			$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
		    		}

		    		$chaine_hashtags = implode(' ', $tableau_hashtags);	
	   	?>
					<div class="panneau-thematique principal">
						<div class="image-article">
							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($article_thematique->ID);?>">
						</div>
						<div class="descriptif-article">
							<h3><?php echo get_the_title($article_thematique->ID);?></h3>
		<?php
							if($chaine_types_editoriaux!=""){
		?>
	    						<p class="types-editoriaux"><?php echo $chaine_types_editoriaux;?></p>
		<?php
							}
		?>
						</div>
					</div>
	   	<?php
	   			}
	   		}
	    ?>
	</div>

	<div class="derniers-articles" style="background:#999">
	    <?php
   			$args = array(
				        'posts_per_page' => 5,
				        'post_type' => 'post',
				        'orderby' => 'menu_order',
				        'order' => 'DESC'
				    );

   			$liste_derniers_articles = get_posts($args);

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
	    				<p class="hashtags"><?php echo $chaine_hashtags;?></p>
		<?php
					}
		?>
						<h3><?php echo get_the_title($dernier_article->ID);?></h3>
		<?php
						if($chaine_types_editoriaux!=""){
		?>
	    					<p class="types-editoriaux"><?php echo $chaine_types_editoriaux;?></p>
		<?php
						}
		?>
						<div class="excerpt-article">
							<?php the_excerpt();?>
						</div>
					</div>
				</div>
	   	<?php
	   		}
	    ?>
	</div>

	<div class="dans-le-retro" style="background:#777">
	    <?php // remontées articles selon année
	    	$annees = get_terms('annee');
	    	foreach($annees as $annee){
	    		$texte_articles = "article";
	    		if($annee->count>1){
	    			$texte_articles = "articles";
	    		}
	    		$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_field('image_categorie', 'annee_'.$annee->term_id), 'full', false);
	   	?>
				<div class="panneau-annee">
		<?php
				if($thumbnail_desktop_retina_src[0]!=""){
		?>
					<div class="image-annee">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo $annee->name;?>">
					</div>
		<?php
				}
		?>
					<div class="descriptif-annee">
						<p class="nb-articles"><?php echo $annee->count.' '.$texte_articles;?></p>
						<h3><?php echo "#".$annee->name;?></h3>
		<?php
				if(get_field('descriptif_categorie', 'annee_'.$annee->term_id)!=""){
		?>
						<div class="texte-thematique">
							<?php the_field('descriptif_categorie', 'annee_'.$annee->term_id);?>
						</div>
		<?php
				}
		?>
						<a href="<?php echo get_term_link($annee);?>" title="Lien vers <?php echo $annee->name;?>">Tous les articles</a>
					</div>
				</div>
	   	<?php
	   		}
	    ?>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>



