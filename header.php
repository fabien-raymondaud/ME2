<!doctype html>
<!--[if lte IE 6]> <html class="no-js ie6 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 ie678" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'dnf5tme',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
    <title>
    	<?php bloginfo('name') ?>
    	<?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?>
    	<?php elseif ( is_home() ) : ?>
    	<?php else : ?><?php wp_title() ?><?php endif ?>
	</title>
 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
	<meta property="og:image" content="http://www.memoireselectriques.fr/memoires-electriques.png"/>

	<!-- leave this for stats -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/dist/css/style.min.css" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	<script src="<?php bloginfo( 'template_url' ); ?>/dist/js/jquery.flexslider-min.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/dist/js/built.js"></script>

    <!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->

	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<?php

if(is_archive() || is_page_template('template_tous_les_articles.php')){
?>
	<body class="page-archive unscrolled">
<?php
}
else{
?>
	<body <?php body_class(); ?>>
<?php
}
	if(is_archive() || is_page_template('template_tous_les_articles.php')){
?>
		<div class="anim-archive flex-container-h">
			<div class="masque-logo"></div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 287.96 89.84">
				<g id="Calque_1-2" data-name="Calque 1">
					<polygon class="cls-1" points="18.81 89.84 0 78.4 2.56 74.18 17.92 83.52 31.45 68.8 48.53 79.19 62.06 64.47 80.87 75.91 78.31 80.12 62.95 70.79 49.42 85.51 32.34 75.12 18.81 89.84"/>
					<path class="cls-1" d="M216.35,27.71c-4.47,0-7.51-3-10-5.41-2.87-2.79-4.77-4.46-7.71-3.9l-.93-4.84c5.61-1.07,9.19,2.41,12.07,5.21s4.77,4.47,7.71,3.9,4.09-2.83,5.72-6.48,3.68-8.23,9.29-9.31,9.19,2.41,12.07,5.21,4.77,4.47,7.71,3.9,4.08-2.83,5.71-6.48,3.68-8.23,9.29-9.31,9.19,2.41,12.07,5.21,4.77,4.47,7.71,3.9l.93,4.84c-5.6,1.08-9.19-2.41-12.07-5.21s-4.77-4.46-7.71-3.9-4.08,2.83-5.71,6.48-3.68,8.23-9.29,9.31-9.19-2.41-12.07-5.21-4.77-4.46-7.71-3.9-4.09,2.83-5.71,6.48-3.68,8.23-9.29,9.31A10.87,10.87,0,0,1,216.35,27.71Z"/>
					<rect class="cls-1" x="181.08" y="70.2" width="25.34" height="4.93" transform="translate(-9.53 33.98) rotate(-9.78)"/>
					<path d="M102.13,57.73l.62,3.82-9.57,1.56.4,2.47,8.61-1.4.59,3.66-8.61,1.4.89,5.48,9.88-1.6.62,3.8-14.17,2.3L88.26,60Zm-5.69-1.11-3.93.64,2.7-5.44,4.55,1.09Z"/>
					<polygon points="109.38 76.28 106.25 57.05 110.55 56.36 113.05 71.76 121.25 70.43 121.87 74.25 109.38 76.28"/>
					<path d="M151.21,65.59A6.42,6.42,0,0,0,156,62.24l3.21,2.39A10.51,10.51,0,0,1,144.29,68a9.6,9.6,0,0,1-4-6.62A9.7,9.7,0,0,1,142,53.72a10,10,0,0,1,6.7-4A10.29,10.29,0,0,1,157.25,52l-2.18,3.46a6.34,6.34,0,0,0-5.47-1.71A6,6,0,0,0,145.71,56a5.58,5.58,0,0,0-1,4.54,5.89,5.89,0,0,0,2.32,4,5.42,5.42,0,0,0,4.2,1"/>
					<polygon points="168.75 50.71 171.27 66.22 166.98 66.92 164.46 51.41 159.01 52.29 158.41 48.58 173.59 46.11 174.2 49.82 168.75 50.71"/>
					<path d="M193.37,49.44q.75,4.62-2.69,6.56l6,6.09-5.28.86-5.26-5.44-3,.48,1,6.13-4.29.7L176.73,45.6,184,44.41q4.48-.73,6.64.47t2.7,4.56m-4.8,3.12a2.94,2.94,0,0,0,.43-2.4,2.46,2.46,0,0,0-1.17-2,5.35,5.35,0,0,0-3-.11l-3.22.52.93,5.69,3.14-.51a4.67,4.67,0,0,0,2.88-1.2"/>
					<rect x="198.26" y="41.87" width="4.35" height="19.48" transform="translate(-5.68 32.79) rotate(-9.22)"/>
					<path d="M226.39,47.27a9.94,9.94,0,0,1-.65,5.64,9.56,9.56,0,0,1-3.53,4.25,2,2,0,0,0,.9.57,2.35,2.35,0,0,0,1.16.11,3.64,3.64,0,0,0,1.1-.36,3.06,3.06,0,0,0,.81-.57,4.1,4.1,0,0,0,.83-1.29l2.66,2.31a7.9,7.9,0,0,1-5.51,3.46,6.56,6.56,0,0,1-3.39-.38,6.19,6.19,0,0,1-2.87-2.16,10,10,0,0,1-7.64-1.68A10.19,10.19,0,0,1,208,43a10.62,10.62,0,0,1,14.36-2.33,9.63,9.63,0,0,1,4.07,6.61M222,48a6.38,6.38,0,0,0-2.36-4.12,5.51,5.51,0,0,0-8.12,1.32A6.73,6.73,0,0,0,213,54a5.54,5.54,0,0,0,8.11-1.32A6.32,6.32,0,0,0,222,48"/>
					<path d="M235.91,50.62a3.56,3.56,0,0,0,3.1.87,3.52,3.52,0,0,0,2.66-1.8,5.79,5.79,0,0,0,.47-3.82l-1.73-10.62,4.29-.7,1.75,10.76a8.66,8.66,0,0,1-1.27,6.8A9,9,0,0,1,233.34,54,8.63,8.63,0,0,1,230,48l-1.75-10.76,4.29-.7,1.73,10.62a5.73,5.73,0,0,0,1.66,3.47"/>
					<path d="M272.27,34a1.68,1.68,0,0,0-.4,1.45,1.55,1.55,0,0,0,1,1.21,14,14,0,0,0,3.68.6,10,10,0,0,1,4.58,1.33,5.06,5.06,0,0,1,2.15,3.69A5.26,5.26,0,0,1,282,46.79a7.83,7.83,0,0,1-4.84,2.44,12,12,0,0,1-8.78-2l2-3.55q3.55,2.22,6.19,1.79a3.07,3.07,0,0,0,1.78-.81,1.66,1.66,0,0,0,.45-1.49,1.63,1.63,0,0,0-.94-1.26,9.5,9.5,0,0,0-3-.57A12.47,12.47,0,0,1,269.67,40a5,5,0,0,1-2.21-3.76,5,5,0,0,1,1.28-4.54,8,8,0,0,1,4.67-2.28,12,12,0,0,1,4,0A10.46,10.46,0,0,1,281,30.79l-1.66,3.49a8.58,8.58,0,0,0-5.48-1.06,2.62,2.62,0,0,0-1.61.78"/>
					<polygon points="136.07 52.21 136.69 56.03 126.79 57.64 127.72 63.34 136.33 61.95 136.92 65.6 128.31 67 128.68 69.25 138.25 67.69 138.87 71.49 125 73.74 121.88 54.52 136.07 52.21"/>
					<polygon points="262.98 31.58 263.61 35.4 254.03 36.96 254.43 39.42 263.04 38.02 263.64 41.68 255.03 43.08 255.92 48.56 265.8 46.96 266.41 50.76 252.25 53.06 249.12 33.83 262.98 31.58"/>
					<polygon points="56.58 42.98 53.11 54.29 50.56 54.71 43.7 45.08 45.66 57.13 41.39 57.83 38.27 38.67 44.06 37.73 50.7 47.45 53.95 36.13 59.7 35.19 62.82 54.34 58.54 55.04 56.58 42.98"/>
					<polygon points="100.65 35.82 97.17 47.13 94.62 47.54 87.77 37.91 89.73 49.97 85.45 50.66 82.34 31.51 88.12 30.57 94.77 40.29 98.02 28.96 103.77 28.02 106.89 47.18 102.61 47.88 100.65 35.82"/>
					<path d="M127.28,41.15A10.57,10.57,0,0,1,113,43.48a9.59,9.59,0,0,1-4.05-6.58,9.59,9.59,0,0,1,1.76-7.53A10.58,10.58,0,0,1,125,27,9.59,9.59,0,0,1,129,33.62a9.59,9.59,0,0,1-1.76,7.53m-2.6-6.81a6.35,6.35,0,0,0-2.35-4.1,5.49,5.49,0,0,0-8.08,1.31,6.7,6.7,0,0,0,1.42,8.73A5.52,5.52,0,0,0,123.75,39a6.3,6.3,0,0,0,.94-4.62"/>
					<rect x="132.65" y="23.11" width="4.33" height="19.41" transform="translate(-3.52 22.06) rotate(-9.23)"/>
					<path d="M156.68,25.95q.75,4.6-2.68,6.54l6,6.06-5.26.86L149.46,34l-3,.48,1,6.11-4.28.69-3.11-19.15,7.26-1.18q4.46-.72,6.62.47t2.69,4.54m-4.78,3.11a2.94,2.94,0,0,0,.43-2.39,2.45,2.45,0,0,0-1.17-2,5.32,5.32,0,0,0-3-.11l-3.21.52.92,5.67,3.12-.51a4.66,4.66,0,0,0,2.87-1.2"/>
					<path d="M183.05,19.06a1.67,1.67,0,0,0-.4,1.44,1.54,1.54,0,0,0,1,1.21,13.91,13.91,0,0,0,3.67.6,10,10,0,0,1,4.56,1.33A5,5,0,0,1,194,27.31a5.24,5.24,0,0,1-1.25,4.49,7.81,7.81,0,0,1-4.82,2.43,11.93,11.93,0,0,1-8.74-2l2-3.54q3.54,2.21,6.17,1.78a3.06,3.06,0,0,0,1.77-.81,1.66,1.66,0,0,0,.45-1.48,1.62,1.62,0,0,0-.94-1.25,9.41,9.41,0,0,0-3-.57,12.43,12.43,0,0,1-5.23-1.27,5,5,0,0,1-2.2-3.75,5,5,0,0,1,1.28-4.53,8,8,0,0,1,4.65-2.27,11.93,11.93,0,0,1,3.94,0,10.41,10.41,0,0,1,3.65,1.32l-1.66,3.48a8.55,8.55,0,0,0-5.46-1.05,2.61,2.61,0,0,0-1.6.78"/>
					<polygon points="174.12 16.63 174.74 20.44 164.87 22.04 165.8 27.72 174.38 26.33 174.97 29.97 166.39 31.37 166.75 33.6 176.29 32.05 176.91 35.84 163.09 38.08 159.98 18.93 174.12 16.63"/>
					<path d="M78.27,32.21,78.89,36l-9.54,1.55.4,2.46,8.58-1.39.59,3.65-8.58,1.39.89,5.46,9.84-1.6.62,3.78L67.57,53.61,64.46,34.46Zm-5.67-1.1-3.92.64,2.69-5.42,4.54,1.09Z"/>
				</g>
			</svg>
		</div>
<?php
	}
?>

	<div class="popup-playlist">
		<span class="fermer-radio">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.48 18.1">
				<g id="Calque_1-2" data-name="Calque 1">
					<path class="cls-1" d="M15.24,1.64,1.77,17.75A1,1,0,1,1,.23,16.46L13.71.36a1,1,0,1,1,1.53,1.28Z"/><path class="cls-1" d="M.23,1.64l13.48,16.1a1,1,0,1,0,1.53-1.28L1.77.36A1,1,0,1,0,.23,1.64Z"/>
				</g>
			</svg>
		</span>
		<div class="current-playlist">

<?php
			$args = array(
				'post_type' => 'cue_playlist',
				'posts_per_page' => 1,
				'order' => 'ASC',
				'orderby' => 'rand'
			);
			$query_playlist_active = new WP_Query( $args );

			if($query_playlist_active->have_posts()) : 
				while($query_playlist_active->have_posts()) : 
					$query_playlist_active->the_post();
?>
					<h2 class="man typo2 size24"><?php the_title();?></h2>
<?php
					$playlist_active=$post->ID;
					echo do_shortcode('[cue id="'.$playlist_active.'"]');
				endwhile;
			endif;
?>
			<a href="#" class="display-all-playlists typo1 size16 color2">Toutes les playlists</a>
		</div>

		<div class="all-playlists ferme">
			<a href="#" class="back-radio size14 typo1 color4"><< Retour à la radio</a>
			<ul class="unstyled">
<?php
			$args = array(
				'post_type' => 'cue_playlist',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'menu_order'
			);
			$query_playlists = new WP_Query( $args );

			if($query_playlists->have_posts()) : 
				while($query_playlists->have_posts()) : 
					$query_playlists->the_post();
					$tracks = get_cue_playlist_tracks( $post );

					$chaine_morceaux = "morceau";
					if(count($tracks)>1){
						$chaine_morceaux = "morceaux";
					}

					$classe_liste = "";
					$chaine_ecouter = "Écouter";
					if($post->ID==$playlist_active){
						$classe_liste = "is-playing";
						$chaine_ecouter = "En écoute";
					}
?>
					<li class="flex-container-h color7 <?php echo $classe_liste;?>">
						<div class="cartouche-playlist">
							<h3 class="typo2 size32 man"><?php the_title();?></h3>
<?php
							if(get_field('descriptif_playlist')!=""){
?>
								<div class="description-playlist size18 tk-utopia-std-display">
									<?php the_field('descriptif_playlist');?>
								</div>
<?php
							}
?>
							<p class="nb-tracks typo1 size14"><?php echo count($tracks).' '.$chaine_morceaux?></p>
						</div>

						<a class="lien-playlist flex-container-h typo1 size16 color2" href="#" data-playlist="<?php echo $post->ID;?>"><?php echo $chaine_ecouter;?></a>
					</li>
<?php
				endwhile;

			endif;
?>
			</ul>
		</div>
	</div>

	<header class="header-general flex-container-h">
		<h1>
			<a href="<?php echo site_url(); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 169.74 25.1">
					<g id="Calque_1-2" data-name="Calque 1">
						<path class="cls-1" d="M92.64,23.52c-3.87,0-5.67-3.49-7.12-6.29C84.15,14.58,83.21,13,81.74,13S79.33,14.58,78,17.23c-1.45,2.8-3.25,6.29-7.12,6.29S65.17,20,63.72,17.23C62.35,14.58,61.41,13,59.94,13s-2.41,1.61-3.78,4.26C54.71,20,52.91,23.52,49,23.52S43.37,20,41.93,17.23C40.56,14.58,39.62,13,38.15,13V9.21c3.87,0,5.67,3.49,7.12,6.29,1.37,2.65,2.3,4.26,3.78,4.26s2.41-1.61,3.78-4.26c1.45-2.8,3.25-6.29,7.12-6.29s5.67,3.49,7.12,6.29c1.37,2.65,2.3,4.26,3.78,4.26s2.41-1.61,3.78-4.26c1.45-2.8,3.25-6.29,7.12-6.29s5.67,3.49,7.12,6.29c1.37,2.65,2.31,4.26,3.78,4.26Z"/><rect x="4.05" y="10.59" width="3.76" height="11.86" transform="translate(-10.6 22.43) rotate(-89.93)"/><polygon points="32.4 13.05 27.54 22.86 25.16 22.86 20.33 13.05 20.33 24.35 16.32 24.35 16.32 6.4 21.74 6.4 26.36 16.26 31.01 6.4 36.4 6.4 36.4 24.35 32.4 24.35 32.4 13.05"/><rect class="cls-1" x="110.52" y="14.06" width="20.53" height="3.76" transform="translate(32.35 99.74) rotate(-50.98)"/><rect class="cls-1" x="122.86" y="14.07" width="3.76" height="10.27" transform="translate(32.11 104.93) rotate(-51.53)"/><rect class="cls-1" x="123.88" y="14.02" width="20.53" height="3.76" transform="translate(37.36 110.13) rotate(-50.99)"/><rect class="cls-1" x="136.23" y="14.03" width="3.76" height="10.27" transform="translate(37.17 115.36) rotate(-51.52)"/><rect class="cls-1" x="137.25" y="13.98" width="20.53" height="3.76" transform="translate(42.31 120.48) rotate(-50.98)"/><rect class="cls-1" x="149.6" y="14" width="3.76" height="10.27" transform="translate(42.25 125.8) rotate(-51.52)"/><rect class="cls-1" x="150.32" y="13.7" width="20.53" height="3.76" transform="translate(47.37 130.53) rotate(-50.98)"/><rect class="cls-1" x="162.67" y="13.72" width="3.76" height="10.27" transform="translate(47.42 135.95) rotate(-51.53)"/><path d="M97.16,6.49V24.71h13.42v-3.6h-9.36V15.92h8.16V12.45h-8.16V10.11h9.07V6.49ZM104.79,0l-3.31,4.61h3.72l3.63-2.92Z"/>
					</g>
				</svg>
			</a>
		</h1>
		<div class="player">
<?php
			/*if($query_playlist_active->have_posts()) : 
				while($query_playlist_active->have_posts()) : 
					$query_playlist_active->the_post();

					$playlist_active=$post->ID;
					echo do_shortcode('[cue id="'.$playlist_active.'" show_playlist="0"]');
				endwhile;
			endif;*/


?>			
			<span class="rewind"></span>
			<span class="play-pause"></span>
			<div class="infos-player">
				<span class="groupe"></span>
				<span class="titre"></span>
			</div>
			<span class="timing"></span>
			<span class="next"></span>
		</div>

		<a href="#" class="ouvrir-radio typo1 size13 flex-container-h">Ouvrir la radio</a>

		<div class="recherche">
			<span></span>
			<?php get_search_form(); ?>
		</div>
		

		<button class="burger">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 18"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M18,2H1A1,1,0,0,1,1,0H18a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M18,18H1a1,1,0,0,1,0-2H18a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M22,10H1A1,1,0,0,1,1,8H22a1,1,0,0,1,0,2Z"/></g></svg>

			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.48 18.1" class="invisible"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M15.24,1.64,1.77,17.75A1,1,0,1,1,.23,16.46L13.71.36a1,1,0,1,1,1.53,1.28Z"/><path class="cls-1" d="M.23,1.64l13.48,16.1a1,1,0,1,0,1.53-1.28L1.77.36A1,1,0,1,0,.23,1.64Z"/></g></svg>
		</button>
		<nav class="nav-burger">
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
				<li class="typo1"><a href="<?php the_permalink(2);?>">L'installation</a></li>
			</ul>
			<ul class="nav-3 unstyled">
				<li class="entree-principale"><a href="<?php the_permalink(101);?>">À propos</a></li>
				<li class="entree-secondaire typo1"><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li class="entree-secondaire typo1">Nous suivre</li>
			</ul>
			<ul class="nav-rs flex-container-h unstyled">
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
				<li class="entree-minimale typo1"><a href="<?php the_permalink(99);?>">Mentions légales</a></li>
			</ul>
		</nav>
	</header>
