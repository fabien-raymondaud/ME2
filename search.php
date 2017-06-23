<?php get_header();?>
<?php if ( have_posts() ) : ?>
<?php
global $wp_query;
echo $wp_query->found_posts.' results found.';

$nb_resultats = $wp_query->found_posts;
$texte_articles = "article";
$compteur_articles = 0;
if($nb_resultats>1){
	$texte_articles="articles";
}
?>
<div class="header-cat txtcenter">
	<h1 class="txtcenter size30"><?php echo '"'.get_search_query().'"';?></h1>
	<p class="nb-articles size18 txtcenter tk-utopia-std-display"><?php echo $nb_resultats.' '.$texte_articles;?></p>
</div>

	<div class="derniers-articles flex-container-h">

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
	<?php
		$compteur_articles++;
		if($compteur_articles%5==1){
	?>
			<div class="dernier-article flex-container-h">

	<?php		
				$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
				//Pour l'affichage du type éditorial de l'article	    		
    			$types_editoriaux = wp_get_post_terms($post->ID, 'type_editorial');
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
						<a href="<?php the_permalink();?>" title="Aller à <?php the_title();?>">
							<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php the_title();?>">
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
						<a href="<?php the_permalink();?>" title="Aller à <?php the_title();?>">
							<h3 class="size24"><?php the_title();?></h3>
<?php
						if($chaine_types_editoriaux!=""){
?>
    						<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
						}
?>
							<div class="excerpt-article tk-utopia-std-display">
								<?php the_field('resume_remontee');?>
							</div>
						</a>
					</div>
				</div>
    	</div>
<?php
		}
		else{
			if($compteur_articles%5==2){
?>
				<div class="autres-articles flex-container-h">
<?php
			}

			$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
			//Pour l'affichage du type éditorial de l'article	    		
			$types_editoriaux = wp_get_post_terms($post->ID, 'type_editorial');
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
					<a href="<?php the_permalink();?>" title="Aller à <?php the_title();?>">
						<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php the_title();?>">
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
					<a href="<?php the_permalink();?>" title="Aller à <?php the_title();?>">
						<h3 class="size24"><?php the_title();?></h3>
<?php
					if($chaine_types_editoriaux!=""){
?>
    					<p class="types-editoriaux size14 uppercase typo2 color3"><?php echo $chaine_types_editoriaux;?></p>
<?php
					}
?>
						<div class="excerpt-article tk-utopia-std-display">
							<?php the_field('resume_remontee');?>
						</div>
					</a>
				</div>
			</div>
<?php
			if($compteur_articles%5==0 || $compteur_articles==$nb_resultats){
?>
				</div>
<?php
			}
		}
?>
    <?php endwhile; ?>

	</div>
<?php else : ?>


<?php endif; ?>
<?php get_footer();?>