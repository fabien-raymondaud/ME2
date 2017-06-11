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
	$tableau_pour_liens = array();
	foreach($thematiques as $thematique){
		$tableau_hashtags[]='<a href="'.get_term_link($thematique).'" title="Lien vers '.$thematique->name.'">#'.$thematique->name.'</a>';
		$tableau_pour_liens[]=$thematique->slug;
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
					<div class="image-entete">
						<img src="<?php the_field('image_entete');?>" alt="<?php the_title();?>">
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
						$rows = get_field('diaporama_entete' );
						$nb_diapo = count($rows);
						if( have_rows('diaporama_entete') ):
						    while ( have_rows('diaporama_entete') ) : the_row();
?>
								<li>
									<div class="diapo flex-container-h color2">
										<div class="image-diapo">
											<img src="<?php the_sub_field('image_diapo_entete');?>" alt="<?php the_sub_field('titre_diapo_entete');?>">
										</div>
										<div class="texte-diapo">
											<p class="numero-diapo typo1 size14"><?php echo $compteur_diapo." / ".$nb_diapo;?></p>
											<h3 class="typo2 size36 man"><?php the_sub_field('titre_diapo_entete');?></h3>
<?php
											if(get_sub_field('sous_titre_diapo_entete')!=""){
?>
												<h4 class="typo1 size36 man"><?php the_sub_field('sous_titre_diapo_entete');?></h4>
<?php
											}

											if(get_sub_field('texte_diapo_entete')!=""){
?>
												<div class="tk-utopia-std-display size16"><?php the_sub_field('texte_diapo_entete');?></div>
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
		<div class="articles-en-liens bordures-single flex-container-h">
			<h4 class="size24 man txtcenter ptl pbl">Articles en lien</h4>
<?php
			$articles_en_lien = array();
			if(get_field('articles_en_lien')!=""){
				$articles_en_lien = get_field('articles_en_lien');
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
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>