<footer class="footer-principal">
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
				<li class="entree-principale"><a href="">Tous les articles</a></li>
				<li class="entree-secondaire typo1"><a href="">Rapido</a></li>
				<li class="entree-secondaire typo1"><a href="">Portrait</a></li>
				<li class="entree-secondaire typo1"><a href="">Reportages</a></li>
				<li class="entree-secondaire typo1"><a href="">Épopées</a></li>
				<li class="entree-secondaire typo1"><a href="">L'humeur de ...</a></li>
			</ul>
			<ul class="nav-2 unstyled">
				<li class="entree-principale"><a href="">Dans le rétro</a></li>
				<li class="entree-principale"><a href="">Les playlists</a></li>
			</ul>
			<ul class="nav-installation unstyled">
				<li class="entree-principale"><a href="<?php the_permalink(2);?>">L'installation</a></li>
			</ul>
		</div>

		<div class="colonne-2">
			<ul class="nav-3 unstyled">
				<li class="entree-principale"><a href="<?php the_permalink(101);?>">À propos</a></li>
				<li class="entree-secondaire typo1"><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li class="entree-secondaire typo1"><a href="<?php the_permalink(105);?>">Nous suivre</a></li>
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
		</div>
	</nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>
