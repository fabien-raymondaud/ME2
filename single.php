<?php get_header();?>
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<?php
	//Pour l'affichage du type éditorial de l'article	    		
	$types_editoriaux = wp_get_post_terms($post->ID, 'type_editorial');
	$tableau_types_editoriaux = array();
	foreach($types_editoriaux as $type_editorial){
		$tableau_types_editoriaux[]=$type_editorial->name;
	}
	$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

	//Pour l'affichage des thématiques et hashtags de l'article
	$thematiques = wp_get_post_terms($post->ID, 'thematique');
	$tableau_hashtags = array();
	foreach($thematiques as $thematique){
		$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
	}

	$hashtags = wp_get_post_terms($post->ID);
	foreach($hashtags as $hashtag){
		$tableau_hashtags[]='<a href="'.get_term_link($hashtag).'" title="Lien vers '.$hashtag->name.'">#'.$hashtag->name.'</a>';
	}

	$chaine_hashtags = implode(' ', $tableau_hashtags);
?>
	<div class="single-central">
		<div class="media-entete">
<?php
			switch(get_field('type_dentête')){
				case 'Vidéo' :
?>

<?php
				break;

				case 'Image fixe' :
?>
					<div class="image-entete"><img src="<?php the_field('image_entete');?>" alt="<?php the_title();?>"></div>
<?php
				break;

				case 'Diaporama' :
?>

<?php
				break;
			}
?>
		</div>

		<div class="entete-article">
<?php
		if($chaine_types_editoriaux!=""){
?>
		    <h2 class="uppercase color3 typo2 size14"><?php echo $chaine_types_editoriaux;?></h2>
<?php
		}
?>
			<h1 class="size50"><?php the_title();?></h1>
			<p class="annee-article typo1 size14"><?php the_field('annees_affichees');?></p>
<?php
		if($chaine_hashtags!=""){
?>
		    <p class="hashtags size14 typo1"><?php echo $chaine_hashtags;?></p>
<?php
		}
?>
		</div>
<?php
	if( have_rows('page_builder') ):
	    while ( have_rows('page_builder') ) : the_row();
	        if( get_row_layout() == 'bloc_chapo' ):
?>
	        	<div class="bloc-chapo"><?php the_sub_field('texte_chapo');?></div>
<?php
	        elseif( get_row_layout() == 'bloc_texte_courant' ): 
?>
	        	<div class="bloc-texte-courant"><?php the_sub_field('texte_courant');?></div>
<?php
	        elseif( get_row_layout() == 'bloc_citation' ): 
?>
	        	<div class="bloc-citation">
	        		<div class="la-citation">
	        			<?php the_sub_field('texte_citation');?>
	        		</div>
	        		<p class="legende-citation"><?php the_sub_field('legende_citation');?></p>
	        	</div>
<?php
	        endif;
	    endwhile;
	endif;
?>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>