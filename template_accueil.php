<?php
/*
Template Name: Accueil
*/
?>
<?php get_header();?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<div class="a-la-une flexslider">
		<ul class="slides">
	    <?php // remontées articles à la une
	    	$a_la_une = get_field('articles_a_la_une');
	    	foreach($a_la_une as $article_une){
	    		$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($article_une->ID), 'image-slider-a-la-une', false);
				
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
	    		<li>
					<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($article_une->ID);?>">
					<div class="contenu-slide">
		<?php
					if($chaine_types_editoriaux!=""){
		?>
	    				<p class="types-editoriaux size14 typo1"><?php echo $chaine_types_editoriaux;?></p>
		<?php
					}
		?>

		<?php
					if(get_field('annees_affichees', $article_une->ID)!=""){
		?>
	    				<p class="annees size14 typo1"><?php the_field('annees_affichees', $article_une->ID);?></p>
		<?php
					}
		?>

		<?php
					if($chaine_hashtags!=""){
		?>
	    				<p class="hashtags size14 typo1"><?php echo $chaine_hashtags;?></p>
		<?php
					}
		?>
		    			<h2 class="size50"><?php echo get_the_title($article_une->ID);?></h2>
		    			<a href="<?php echo get_permalink($article_une->ID);?>" class="typo1 lire-article">Lire l'article</a>
	    			</div>
	    		</li>
	    <?php
	    	}
	    ?>
		</ul>
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
						<div class="texte-thematique tk-utopia-std-display">
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
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_excerpt();?>
						</div>
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



