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
					<div class="image-entete">
						<img src="<?php the_field('image_entete');?>" alt="<?php the_title();?>">
					</div>
<?php
					if(get_field('legende_image_entete')!=""){
?>
	        			<p class="legende-entete txtright size12 tk-utopia-std-display prs mtn pts"><?php the_field('legende_image_entete');?></p>
<?php
					}
				break;

				case 'Diaporama' :
?>

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
			<h1 class="size50 mbs mtn"><?php the_title();?></h1>
			<p class="annee-article typo1 size14 man"><?php the_field('annees_affichees');?></p>
<?php
		if($chaine_hashtags!=""){
?>
		    <p class="hashtags size14 typo1 man"><?php echo $chaine_hashtags;?></p>
<?php
		}
?>
		</div>
<?php
	if( have_rows('page_builder') ):
	    while ( have_rows('page_builder') ) : the_row();
	        if( get_row_layout() == 'bloc_chapo' ):
?>
	        	<div class="bloc-chapo bordures-single bloc-chapo bordures-single size20 typo1 ptl">
	        		<?php the_sub_field('texte_chapo');?>
	        		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.32 19.74">
	        			<g id="Calque_1-2" data-name="Calque 1">
	        				<polygon class="cls-1" points="25.66 19.74 13.69 6.86 3.42 17.9 0 14.72 13.69 0 25.66 12.88 37.63 0 51.31 14.72 47.89 17.9 37.63 6.86 25.66 19.74"/>
	        			</g>
	        		</svg>
	        	</div>
<?php
	        elseif( get_row_layout() == 'bloc_texte_courant' ): 
?>
	        	<div class="bloc-texte-courant bordures-single ptl"><?php the_sub_field('texte_courant');?></div>
<?php
	        elseif( get_row_layout() == 'bloc_citation' ): 
?>
	        	<div class="bloc-citation bordures-single">
	        		<div class="la-citation">
	        			<blockquote>
	        				<?php the_sub_field('texte_citation');?>
	        			</blockquote>
<?php
						if(get_sub_field('legende_citation')!=""){
?>
	        				<p class="legende-citation color7 size12 tk-utopia-std-display man"><?php the_sub_field('legende_citation');?></p>
<?php
						}
?>
					</div>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_video' ): 
?>
	        	<div class="bloc-video bordures-single">
	        		<div class="la-video">
	        			<?php the_sub_field('texte_citation');?>
	        		</div>
<?php
					if(get_sub_field('legende_video')!=""){
?>
	        			<p class="legende-video"><?php the_sub_field('legende_video');?></p>
<?php
					}
?>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_image' ): 
?>
	        	<div class="bloc-image bordures-single">
	        		<div class="l-image">
	        			<?php the_sub_field('texte_citation');?>
	        		</div>
<?php
					if(get_sub_field('legende_image')!=""){
?>
	        			<p class="legende-image"><?php the_sub_field('legende_image');?></p>
<?php
					}
?>
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