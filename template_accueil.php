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

	    		//Pour l'affichage des thamétiques et hashtags de l'article
	    		$thematiques = wp_get_post_terms($article_une->ID, 'thematique');
	    		$tableau_hashtags = array();
	    		foreach($thematiques as $thematique){
	    			$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
	    			var_dump();
	    		}

	    		$hashtags = wp_get_post_terms($article_une->ID);
	    		foreach($hashtags as $hashtag){
	    			$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
	    		}

	    		$chaine_hashtags = implode(' ', $tableau_hashtags);
	    ?>		
				<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($article_une->ID);?>">
	    		<p class="types-editoriaux"><?php echo $chaine_types_editoriaux;?></p>
	    		<p class="hashtags"><?php echo $chaine_hashtags;?></p>
	    		<h2><?php echo get_the_title($article_une->ID);?></h2>
	    		<a href="<?php echo get_permalink($article_une->ID);?>">Lire l'article</a>
	    <?php
	    	}
	    ?>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>



