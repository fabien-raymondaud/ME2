<?php
/*
Template Name: Installation
*/
?>
<?php get_header();?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="conteneur-video-installation">
	<video autoplay loop poster="http://memoireselectriques.fr/wp-content/uploads/2015/05/accueil-iphone.jpg" class="bgvid">
		<!--<source src="<?php the_field('video_installation'); ;?>" type="video/mp4">-->
	</video>
	<h1 class="color2 size50">Promesse de l'installation</h1>
</div>

<div class="contenu-installation">
	<h3 class="color5 uppercase size14 typo2 man">Libellé</h3>
	<h2 class="size50 man"><?php the_title();?></h2>

	<div class="chapo-installation typo1 size20">
		<?php the_field('chapo_installation');?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.32 19.74">
			<g id="Calque_1-2" data-name="Calque 1">
				<polygon class="cls-1" points="25.66 19.74 13.69 6.86 3.42 17.9 0 14.72 13.69 0 25.66 12.88 37.63 0 51.31 14.72 47.89 17.9 37.63 6.86 25.66 19.74"/>
			</g>
		</svg>
	</div>

	<div class="texte-installation">
		<?php the_field('texte_courant_installation');?>
	</div>

	<div class="actions-installation flex-container-h typo1 size16">
		<a href="mailto:<?php the_field('contact_installation');?>" class="contact-installation">Nous contacter</a>
		<a href="<?php the_field('documentation_installation');?>" class="docu-installation">Télécharger la documentation</a>
	</div>
</div>

<div class="conteneur-slider-installation">
	<div class="slider-installation flexslider-installation">
		<ul class="slides">
	<?php
		if( have_rows('slide_installation') ):
		    while ( have_rows('slide_installation') ) : the_row();
	?>
				<li class="flex-container-h">
					<div class="image-unique dispo-<?php the_sub_field('disposition_slide');?>" style="background-image:url('<?php echo get_sub_field('image1_slide_installation')?>');">
					</div>

					<div class="image-double flex-container-v">
						<div style="background-image:url('<?php echo get_sub_field('image2_slide_installation')?>');"></div>
						<div style="background-image:url('<?php echo get_sub_field('image3_slide_installation')?>');"></div>
					</div>
				</li>
	<?php				
			endwhile;
		endif;
	?>
		</ul>
	</div>
</div>

<div class="actus-installation flex-container-h">
	<div class="conteneur-actus">
		<div class="avec-overflow">
			<h3 class="typo2 uppercase size14 color7 man"><?php the_field('libelle_bloc_actu');?></h3>
			<h2 class="size50 color7 man"><?php the_field('titre_bloc_actu');?></h2>
<?php
			$args = array(
					'post_type' => 'breve_installation',
					'posts_per_page' => 3,
					'order' => 'ASC',
					'orderby' => 'menu_order'
				);
				$query_breves_installation = new WP_Query( $args );

				if($query_breves_installation->have_posts()) : 
					while($query_breves_installation->have_posts()) : 
						$query_breves_installation->the_post();
?>
						<div class="conteneur-breve">
							<h3 class="size20 color2 man"><?php the_title();?></h3>
							<p class="date-breve color2 typo1 size14 man"><?php echo mysql2date('j/m/Y', get_field('date_breve'));?></p>
							<div class="texte-breve size18 color2 tk-utopia-std-display">
								<?php the_field('texte_breve');?>
							</div>
<?php
							if(get_field('lien_breve')!=""){
								$texte_lien = "Lire la suite";
								if(get_field('texte_lien_breve')!=""){
									$texte_lien = get_field('texte_lien_breve');
								}
?>
								<a href="<?php the_field('lien_breve');?>" target="_blank" class="typo1 size16 color2"><?php echo $texte_lien;?></a>
<?php
							}
?>
						</div>
<?php
					endwhile;
					wp_reset_postdata();
				endif;
?>	
			<a href="#" class="plus-actu-installation color5 typo1 size16">Plus d'actus</a>		
		</div>
	</div>

	<div class="conteneur-image-actus" style="background-image:url('<?php echo get_field('image_bloc_actu');?>');"></div>
</div>

<div class="conteneur-flux-rs">
	<h3 class="size24 txtcenter plm prm">Social wall</h3>
	<?php echo do_shortcode('[ff id="1"]');?>
</div>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>



