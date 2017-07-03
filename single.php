<?php get_header();?>
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<?php
	$sauv_id = $post->ID;
	$avecblocvideo=false;
	$compteur_video = 0;
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
	<span class="hashs actif" data-new-url="<?php the_permalink($post->ID);?>" data-new-title="<?php echo get_the_title($post->ID);?>"></span>
	<div class="single-central">
		<div class="media-entete">
<?php
			switch(get_field('type_dentête')){
				case 'Vidéo' :
					$avecblocvideo = true;
					$compteur_video++;
					$poster_bloc = get_field('poster_video_entete');
					$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-slider-a-la-une', false);

					/*$chaine_video = '
								<video class="video-js vjs-default-skin" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'896:400\'}">
									<source src="'.get_field('video_entete').'" type="video/mp4">
									<p class="vjs-no-js">
									  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
									  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
									</p>
								</video>';*/
					
					$classeVideo = "heberge";
					if(get_field('source_youtube')==true){
						$chaine_video = '<div class="poster" style="background-image:url(\''.$poster_src[0].'\');"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.48 66.48"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-1" cx="33.24" cy="33.24" r="31.11"/><path class="cls-2" d="M33.24,0A33.24,33.24,0,1,0,66.48,33.24,33.27,33.27,0,0,0,33.24,0Zm0,3.33A29.92,29.92,0,1,1,3.32,33.24,29.89,29.89,0,0,1,33.24,3.33Zm-8.31,15V48.2l26.59-15Z"/></g></svg><span class="size16 typo1 color2">Lancer la vidéo</span></div></div><div class="video-container"><iframe width="100%" src="http://www.youtube.com/embed/'.get_field('video_entete').'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
						$classeVideo = "";
					}
					
?>
					<div class="video-entete <?php echo $classeVideo;?>">
						<?php //echo do_shortcode('[embed width="123" height="456"]http://www.youtube.com/watch?v=dQw4w9WgXcQ[/embed]'); ?>
						<?php //echo do_shortcode('[video src="'.get_field('video_entete').'" type="video/mp4"]'); ?>
							<?php 
							if(get_field('source_youtube')==true){
								echo $chaine_video;
							}
							else{
								//echo $chaine_video;
								echo do_shortcode('[videojs_video url="'.get_field('video_entete').'" width="100%" poster="'.$poster_src[0].'"]');
							}
							?>
						<!--</video>-->

	        		</div>
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
				$avecblocvideo = true;
				$compteur_video = 0;
				$poster_bloc = get_sub_field('poster_video');
				$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-poster-video', false);
				$par_youtube = "";
				/*$chaine_video = '<video class="video-js" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'683:375\'}">
									<source src="'.get_sub_field('source_video').'" type="video/mp4">
									<p class="vjs-no-js">
									  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
									  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
									</p>
								</video>';*/

				//if(get_sub_field('source_youtube_bloc_video')==true){
					$chaine_video = '<div class="poster" style="background-image:url(\''.$poster_src[0].'\');"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.48 66.48"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-1" cx="33.24" cy="33.24" r="31.11"/><path class="cls-2" d="M33.24,0A33.24,33.24,0,1,0,66.48,33.24,33.27,33.27,0,0,0,33.24,0Zm0,3.33A29.92,29.92,0,1,1,3.32,33.24,29.89,29.89,0,0,1,33.24,3.33Zm-8.31,15V48.2l26.59-15Z"/></g></svg><span class="size16 typo1 color2">Lancer la vidéo</span></div></div><div class="video-container"><iframe width="100%" src="http://www.youtube.com/embed/'.get_sub_field('source_video').'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
				//}
?>
	        	<div class="bloc-video bordures-single">
	        		<div class="la-video">
						<?php echo $chaine_video;?>	        			
	        		</div>
<?php
					if(get_sub_field('legende_video')!=""){
?>
	        			<p class="legende-video size12 tk-utopia-std-display man"><?php the_sub_field('legende_video');?></p>
<?php
					}
?>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_image' ): 
?>
	        	<div class="bloc-image bordures-single">
	        		<div class="l-image">
	        			<img src="<?php the_sub_field('source_image');?>" alt="<?php the_sub_field('legende_image');?>">
	        		</div>
<?php
					if(get_sub_field('legende_image')!=""){
?>
	        			<p class="legende-image size12 tk-utopia-std-display man"><?php the_sub_field('legende_image');?></p>
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
<?php
	$args = array(
        'posts_per_page' => -1,
        'post_type' => 'post',
        'order' => 'ASC',
		'orderby' => 'menu_order',
        'exclude' => array($sauv_id)
    );
	$liste_articles_lecture_continue = get_posts($args);

	$compteur_liste = 1;
	foreach ($liste_articles_lecture_continue as $article_lecture_continue){
		$est_actif = "";
		if($compteur_liste==1){
			$est_actif = "actif";
		}
		$compteur_liste++;
?>
		<span class="invisible id-lecture-continue <?php echo $est_actif;?>" data-id-lecture-continue="<?php echo $article_lecture_continue->ID;?>"></span>
<?php
	}
?>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>