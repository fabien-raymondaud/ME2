<?php
$class_footer = ""; 
if(is_home() || is_front_page()){
	$class_footer = "footer-home";
}
?>
<footer class="footer-principal <?php echo $class_footer;?>">
<?php 
if(is_home() || is_front_page()){
	$annees = get_terms('annee');

	foreach($annees as $annee){
?>
		<span class="invisible element-annee" data-annee="<?php echo $annee->name;?>"></span>	
<?php
	}
?>
	<div class="dans-le-retro flex-container-h">
		<h3 class="uppercase size16"><span>Dans le rétro</span></h3>
		<div class="flexslider-retro">
			<ul class="slides">
		    <?php // remontées articles selon année
		    	
		    	foreach($annees as $annee){
		    		$texte_articles = "article";
		    		if($annee->count>1){
		    			$texte_articles = "articles";
		    		}
		    		$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_field('image_categorie', 'annee_'.$annee->term_id), 'full', false);
		   	?>
					<li class="panneau-annee flex-container-h">
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
							<p class="nb-articles typo1 size14"><?php echo $annee->count.' '.$texte_articles;?></p>
							<h3 class="size50 mtn mbs"><?php echo "#".$annee->name;?></h3>
			<?php
					if(get_field('descriptif_categorie', 'annee_'.$annee->term_id)!=""){
			?>
							<div class="texte-thematique tk-utopia-std-display size18 mtm">
								<?php the_field('descriptif_categorie', 'annee_'.$annee->term_id);?>
							</div>
			<?php
					}
			?>
							<a href="<?php echo get_term_link($annee);?>" title="Lien vers <?php echo $annee->name;?>" class="typo1 size13 tous-articles">Tous les articles</a>
						</div>
					</li>
		   	<?php
		   		}
		    ?>
		    </ul>

		    <div class="conteneur-nav-retro"></div>
		</div>
	</div>
<?php
}
?>
	<nav class="nav-footer flex-container-h">
		<div class="colonne-1">
			<ul class="nav-1 unstyled">
				<li class="entree-principale"><a href="<?php echo site_url(); ?>">Accueil</a></li>
				<li class="entree-principale"><a href="<?php the_permalink(383);?>">Tous les articles</a></li>
				<li class="entree-secondaire typo1"><a href="<?php echo get_term_link(42); ?>">Rapido</a></li>
				<li class="entree-secondaire typo1"><a href="<?php echo get_term_link(6); ?>">Portrait</a></li>
				<li class="entree-secondaire typo1"><a href="<?php echo get_term_link(48); ?>">Reportages</a></li>
				<li class="entree-secondaire typo1"><a href="<?php echo get_term_link(2); ?>">Épopées</a></li>
				<li class="entree-secondaire typo1"><a href="<?php echo get_term_link(70); ?>">L'humeur de ...</a></li>
			</ul>
			<ul class="nav-2 unstyled">
				<li class="entree-principale"><a href="#">Dans le rétro</a></li>
				<li class="entree-principale"><a href="#">Les playlists</a></li>
			</ul>
			<ul class="nav-installation unstyled">
				<li class="entree-principale"><a href="<?php the_permalink(2);?>">L'installation</a></li>
			</ul>
		</div>

		<div class="colonne-2">
			<ul class="nav-3 unstyled">
				<li class="entree-principale"><a href="<?php the_permalink(101);?>">À propos</a></li>
				<li class="entree-secondaire typo1"><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li class="entree-secondaire typo1">Nous suivre</li>
			</ul>
			<ul class="nav-rs unstyled flex-container-h">
				<li>
					<a href="<?php the_field('compte_twitter', 'options');?>" class="twitter" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.02 36.02"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M18,36A18,18,0,1,0,0,18,18,18,0,0,0,18,36"/><path class="cls-2" d="M27,13.29a7.46,7.46,0,0,1-2.12.58,3.7,3.7,0,0,0,1.63-2,7.35,7.35,0,0,1-2.35.9,3.7,3.7,0,0,0-6.4,2.53,3.6,3.6,0,0,0,.1.84,10.49,10.49,0,0,1-7.63-3.87,3.71,3.71,0,0,0,1.14,4.94,3.72,3.72,0,0,1-1.68-.46v0a3.7,3.7,0,0,0,3,3.63,3.69,3.69,0,0,1-1.67.06A3.7,3.7,0,0,0,14.48,23a7.44,7.44,0,0,1-4.6,1.58A7.32,7.32,0,0,1,9,24.55a10.52,10.52,0,0,0,16.2-8.87c0-.16,0-.32,0-.48A7.46,7.46,0,0,0,27,13.29"/></g></svg>
					</a>
				</li>
				<li>
					<a href="<?php the_field('compte_facebook', 'options');?>" class="facebook" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"/><path class="cls-2" d="M12.9,14.13h1.76V12.42a4.57,4.57,0,0,1,.57-2.64A3.13,3.13,0,0,1,18,8.5a11.05,11.05,0,0,1,3.15.32l-.44,2.6a6,6,0,0,0-1.42-.21c-.68,0-1.3.24-1.3.93v2h2.8l-.2,2.54H18v8.84h-3.3V16.67H12.9Z"/></g></svg>
					</a>
				</li>
			</ul>
			<ul class="nav-mentions unstyled">
				<li class="entree-secondaire typo1"><a href="<?php the_permalink(99);?>">Mentions légales</a></li>
			</ul>

			<div class="nav-partager">
				<h4 class="size12 typo1"><span>Partager</span></h4>
				<ul class="unstyled">
					<?php
						global $wp;
  						$current_url = home_url( add_query_arg( array(), $wp->request ) );
					?>
					<li>

						<a href="https://twitter.com/share?text=Mémoires électriques, le webzine <?php echo $current_url;?>" class="twitter" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.02 36.02"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M18,36A18,18,0,1,0,0,18,18,18,0,0,0,18,36"/><path class="cls-2" d="M27,13.29a7.46,7.46,0,0,1-2.12.58,3.7,3.7,0,0,0,1.63-2,7.35,7.35,0,0,1-2.35.9,3.7,3.7,0,0,0-6.4,2.53,3.6,3.6,0,0,0,.1.84,10.49,10.49,0,0,1-7.63-3.87,3.71,3.71,0,0,0,1.14,4.94,3.72,3.72,0,0,1-1.68-.46v0a3.7,3.7,0,0,0,3,3.63,3.69,3.69,0,0,1-1.67.06A3.7,3.7,0,0,0,14.48,23a7.44,7.44,0,0,1-4.6,1.58A7.32,7.32,0,0,1,9,24.55a10.52,10.52,0,0,0,16.2-8.87c0-.16,0-.32,0-.48A7.46,7.46,0,0,0,27,13.29"/></g></svg>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url;?>" class="facebook" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"/><path class="cls-2" d="M12.9,14.13h1.76V12.42a4.57,4.57,0,0,1,.57-2.64A3.13,3.13,0,0,1,18,8.5a11.05,11.05,0,0,1,3.15.32l-.44,2.6a6,6,0,0,0-1.42-.21c-.68,0-1.3.24-1.3.93v2h2.8l-.2,2.54H18v8.84h-3.3V16.67H12.9Z"/></g></svg>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="back-to-top">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 39">
				<g id="Calque_1-2" data-name="Calque 1">
					<circle class="cls-1" cx="19.5" cy="19.5" r="18.5"/>
					<polygon class="cls-2" points="27.06 19.49 27.05 19.5 27.06 19.51 17.53 28.5 15.94 27 23.89 19.5 15.94 12 17.53 10.5 27.06 19.49"/>
					<circle class="cls-2" cx="17.27" cy="19.5" r="1.32"/>
				</g>
			</svg>
		</div>

		<a href="<?php the_permalink(2); ?>" title="Aller à L'installation" class="raccourci-installation">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.34 54.34">
				<g id="Calque_1-2" data-name="Calque 1">
					<rect class="cls-2" x="11.01" y="28.02" width="10.74" height="1.97" transform="translate(-16.47 23.47) rotate(-50.98)"/>
					<rect class="cls-2" x="17.47" y="28.03" width="1.97" height="5.37" transform="translate(-17.08 26.06) rotate(-51.54)"/>
					<rect class="cls-2" x="18" y="28" width="10.74" height="1.97" transform="translate(-13.86 28.89) rotate(-50.98)"/>
					<rect class="cls-2" x="24.46" y="28.01" width="1.97" height="5.37" transform="translate(-14.42 31.52) rotate(-51.54)"/>
					<rect class="cls-2" x="24.99" y="27.98" width="10.74" height="1.97" transform="translate(-11.25 34.35) rotate(-51.02)"/>
					<rect class="cls-2" x="31.45" y="27.99" width="1.97" height="5.37" transform="translate(-11.76 36.98) rotate(-51.52)"/>
					<rect class="cls-2" x="31.83" y="27.84" width="10.74" height="1.97" transform="translate(-8.62 39.55) rotate(-50.95)"/>
					<rect class="cls-2" x="38.29" y="27.84" width="1.97" height="5.37" transform="translate(-9.06 42.29) rotate(-51.54)"/>
					<polygon class="cls-2" points="19.25 41.95 13.12 37.68 14.16 36.19 19.24 39.73 24.8 35.76 30.41 39.66 35.97 35.7 42.1 39.97 41.06 41.46 35.98 37.93 30.42 41.89 24.82 37.99 19.25 41.95"/>
					<path class="cls-2" d="M19.27,20.93a4.41,4.41,0,0,1-3.49-1.87c-.72-.81-1.18-1.27-2.13-1.27h0V16h0a4.41,4.41,0,0,1,3.49,1.87c.72.81,1.18,1.27,2.13,1.27h0c1,0,1.41-.46,2.13-1.27A4.4,4.4,0,0,1,24.89,16h0a4.41,4.41,0,0,1,3.48,1.87c.72.81,1.18,1.27,2.13,1.27h0c1,0,1.41-.46,2.13-1.27a4.41,4.41,0,0,1,3.49-1.88h0a4.41,4.41,0,0,1,3.49,1.87c.72.81,1.18,1.27,2.13,1.27h0v1.82h0A4.42,4.42,0,0,1,38.26,19c-.72-.81-1.18-1.27-2.13-1.27h0c-1,0-1.41.46-2.13,1.27a4.41,4.41,0,0,1-3.49,1.88h0A4.4,4.4,0,0,1,27,19c-.72-.81-1.18-1.27-2.13-1.27h0c-1,0-1.41.46-2.13,1.27a4.41,4.41,0,0,1-3.49,1.88Z"/>
				</g>
			</svg>
			<span class="size16">ME : l'installation!</span>
		</a>
	</nav>
</footer>
<?php 

/*if(is_home() || is_front_page() || is_archive() || is_page_template('template_tous_les_articles.php') || is_search()){
?>
	<div class="elements-parallax">
		<div class="blue-wave">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.75 159.22"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M.5,158.72c0-11.29,10.16-16.55,18.32-20.77,7.67-4,12.31-6.67,12.31-10.89s-4.65-6.93-12.31-10.89C10.66,112,.5,106.71.5,95.42S10.66,78.88,18.82,74.67c7.67-4,12.31-6.67,12.31-10.89s-4.65-6.93-12.31-10.88C10.66,48.67.5,43.43.5,32.14S10.66,15.6,18.82,11.38C26.49,7.43,31.14,4.72,31.14.5H42.25c0,11.3-10.17,16.54-18.33,20.76-7.66,4-12.31,6.66-12.31,10.88S16.26,39.06,23.92,43c8.17,4.22,18.33,9.46,18.33,20.76S32.09,80.32,23.92,84.54c-7.66,4-12.31,6.65-12.31,10.88s4.65,6.93,12.31,10.89c8.17,4.22,18.33,9.47,18.33,20.76s-10.16,16.55-18.33,20.76c-7.66,4-12.31,6.67-12.31,10.89Z"/></g></svg>
		</div>

		<div class="zebra-noir">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.5 110.46"><g id="Calque_1-2" data-name="Calque 1"><polygon class="cls-1" points="42.5 55.22 14.77 80.99 38.54 103.09 31.69 110.46 0 80.99 27.73 55.22 0 29.45 31.69 0 38.54 7.37 14.77 29.45 42.5 55.22"/></g></svg>
		</div>

		<div class="entrelaces">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 242.94"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M65,0c0,19.73-15.61,29.49-28.15,37.33S16.42,50.61,16.42,60.73s7.77,15.49,20.43,23.41S65,101.73,65,121.46,49.39,151,36.85,158.8s-20.43,13.28-20.43,23.4,7.77,15.5,20.43,23.41S65,223.2,65,242.93H48.58c0-10.12-7.76-15.49-20.43-23.41S0,201.93,0,182.2s15.61-29.49,28.15-37.32,20.43-13.3,20.43-23.42S40.82,106,28.15,98,0,80.46,0,60.73,15.61,31.24,28.15,23.41,48.58,10.12,48.58,0Z"/><path class="cls-1" d="M65,60.74c0,19.74-15.61,29.5-28.15,37.34s-20.43,13.28-20.43,23.4,7.77,15.5,20.43,23.41S65,162.48,65,182.22,49.39,211.7,36.85,219.53s-20.43,13.29-20.43,23.41H0c0-19.74,15.61-29.49,28.15-37.33s20.43-13.28,20.43-23.4-7.77-15.49-20.43-23.41S0,141.21,0,121.48,15.61,92,28.15,84.16s20.43-13.3,20.43-23.42S40.81,45.25,28.15,37.33,0,19.74,0,0H16.42c0,10.12,7.77,15.5,20.43,23.41S65,41,65,60.74Z"/></g></svg>
		</div>

		<div class="hachures">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 224.94"><g id="Calque_1-2" data-name="Calque 1"><rect class="cls-1" x="25.32" y="-6.28" width="14.36" height="77.57" transform="translate(-13.46 32.5) rotate(-45)"/><rect class="cls-1" x="25.32" y="47.03" width="14.36" height="77.57" transform="translate(-51.16 48.11) rotate(-45)"/><rect class="cls-1" x="25.32" y="100.35" width="14.36" height="77.56" transform="translate(-88.87 63.74) rotate(-45.01)"/><rect class="cls-1" x="25.32" y="153.65" width="14.36" height="77.57" transform="translate(-126.55 79.34) rotate(-45)"/></g></svg>
		</div>
	</div>
<?php
}*/
?>
<?php wp_footer(); ?>
</body>
</html>
