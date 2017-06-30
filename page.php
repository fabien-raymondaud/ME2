<?php get_header();?>
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<?php
	$avecblocvideo=false;
	$compteur_video = 0;
?>
	<div class="single-central">
		
		<div class="entete-article bordures-single">
			<h1 class="size50 mbs mtn"><?php the_title();?></h1>
		</div>
<?php
	if( have_rows('page_builder_page') ):
	    while ( have_rows('page_builder_page') ) : the_row();
	        if( get_row_layout() == 'bloc_chapo_page' ):
?>
	        	<div class="bloc-chapo bordures-single bloc-chapo bordures-single size20 typo1 ptl">
	        		<?php the_sub_field('texte_chapo_page');?>
	        		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.32 19.74">
	        			<g id="Calque_1-2" data-name="Calque 1">
	        				<polygon class="cls-1" points="25.66 19.74 13.69 6.86 3.42 17.9 0 14.72 13.69 0 25.66 12.88 37.63 0 51.31 14.72 47.89 17.9 37.63 6.86 25.66 19.74"/>
	        			</g>
	        		</svg>
	        	</div>
<?php
	        elseif( get_row_layout() == 'bloc_texte_courant_page' ): 
?>
	        	<div class="bloc-texte-courant bordures-single ptl"><?php the_sub_field('texte_courant_page');?></div>
<?php
	        elseif( get_row_layout() == 'bloc_citation_page' ): 
?>
	        	<div class="bloc-citation bordures-single">
	        		<div class="la-citation">
	        			<blockquote>
	        				<?php the_sub_field('texte_citation_page');?>
	        			</blockquote>
<?php
						if(get_sub_field('legende_citation_page')!=""){
?>
	        				<p class="legende-citation color7 size12 tk-utopia-std-display man"><?php the_sub_field('legende_citation_page');?></p>
<?php
						}
?>
					</div>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_video_page' ): 
				$avecblocvideo = true;
				$compteur_video = 0;
				$poster_bloc = get_sub_field('poster_video_page');
				$poster_src = wp_get_attachment_image_src($poster_bloc, 'image-poster-video', false);
				$par_youtube = "";
				$chaine_video = '<video class="video-js" preload="auto" width="100%" poster="'.$poster_src[0].'" controls="control" data-setup="{\'aspectRatio\':\'683:375\'}">
									<source src="'.get_sub_field('source_video_page').'" type="video/mp4">
									<p class="vjs-no-js">
									  Pour visualiser la vidéo correctement merci de vous équiper d\'un. navigateur qui
									  <a href="http://videojs.com/html5-video-support/" target="_blank">supporte les vidéos HTML5</a>
									</p>
								</video>';

				if(get_sub_field('source_youtube_bloc_video_page')==true){
					$chaine_video = '<div class="poster" style="background-image:url(\''.$poster_src[0].'\');"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.48 66.48"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-1" cx="33.24" cy="33.24" r="31.11"/><path class="cls-2" d="M33.24,0A33.24,33.24,0,1,0,66.48,33.24,33.27,33.27,0,0,0,33.24,0Zm0,3.33A29.92,29.92,0,1,1,3.32,33.24,29.89,29.89,0,0,1,33.24,3.33Zm-8.31,15V48.2l26.59-15Z"/></g></svg><span class="size16 typo1 color2">Lancer la vidéo</span></div></div><div class="video-container"><iframe width="100%" src="http://www.youtube.com/embed/'.get_sub_field('source_video_page').'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
				}
?>
	        	<div class="bloc-video bordures-single">
	        		<div class="la-video">
						<?php echo $chaine_video;?>	        			
	        		</div>
<?php
					if(get_sub_field('legende_video_page')!=""){
?>
	        			<p class="legende-video size12 tk-utopia-std-display man"><?php the_sub_field('legende_video_page');?></p>
<?php
					}
?>
	        	</div>
<?php
			elseif( get_row_layout() == 'bloc_image_page' ): 
?>
	        	<div class="bloc-image bordures-single">
	        		<div class="l-image">
	        			<img src="<?php the_sub_field('source_image_page');?>" alt="<?php the_sub_field('legende_image_page');?>">
	        		</div>
<?php
					if(get_sub_field('legende_image_page')!=""){
?>
	        			<p class="legende-image size12 tk-utopia-std-display man"><?php the_sub_field('legende_image_page');?></p>
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