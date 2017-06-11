<?php
/*
Template Name: Installation
*/
?>
<?php get_header();?>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="conteneur-video">
	<video autoplay loop poster="http://memoireselectriques.fr/wp-content/uploads/2015/05/accueil-iphone.jpg" class="bgvid">
		<source src="http://memoireselectriques.fr/wp-content/themes/memoires/img/clip_court.mp4" type="video/mp4">
	</video>
	<h1 class="color2 size50">Promesse de l'installation</h1>
</div>

<div class="contenu-installation">
	<h3 class="color5 uppercase size14 typo2">Libellé</h3>
	<h2 class="size50"><?php the_title();?></h2>

	<div class="chapo-installation typo1 size20">
		<?php the_field('chapo_installation');?>
	</div>

	<div class="texte-installation">
		<?php the_field('texte_courant_installation');?>
	</div>

	<div class="actions-installation flex-container-h">
		<a href="mailto:<?php the_field('contact_installation');?>" class="contact-installation">Nous contacter</a>
		<a href="mailto:<?php the_field('documentation_installation');?>" class="docu-installation">Télécharger la documentation</a>
	</div>
</div>

<div class="slider-installation flexslider-installation">
	<ul class="slides">
<?php
	if( have_rows('slide_installation') ):
	    while ( have_rows('slide_installation') ) : the_row();
?>
			<li class="flex-container-h">
				<div class="image-unique <?php the_sub_field('disposition_slide');?>">
					<img src="<?php the_sub_field('image1_slide_installation')?>" alt="Installation">
				</div>

				<div class="image-double flex-container-v">
					<img src="<?php the_sub_field('image2_slide_installation')?>" alt="Installation">
					<img src="<?php the_sub_field('image3_slide_installation')?>" alt="Installation">
				</div>
			</li>
<?php				
		endwhile;
	endif;
?>
	</ul>
</div>

<div class="conteneur-flux-rs">
	<?php echo do_shortcode('[ff id="1"]');?>
</div>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>



