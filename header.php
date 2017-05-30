<!doctype html>
<!--[if lte IE 6]> <html class="no-js ie6 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 ie678" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
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
    <script src="<?php bloginfo( 'template_url' ); ?>/dist/js/built.js"></script>


    <!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->

	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
	<header class="header-general flex-container-h">
		<h1><a href="<?php echo site_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/css/svg/logo.svg" alt="Mémoires électriques"></a></h1>
		<div class="player">
			
		</div>
		<div class="recherche">
			
		</div>
		<button class="burger">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 18"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M18,2H1A1,1,0,0,1,1,0H18a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M18,18H1a1,1,0,0,1,0-2H18a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M22,10H1A1,1,0,0,1,1,8H22a1,1,0,0,1,0,2Z"/></g></svg>

			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.48 18.1" class="invisible"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M15.24,1.64,1.77,17.75A1,1,0,1,1,.23,16.46L13.71.36a1,1,0,1,1,1.53,1.28Z"/><path class="cls-1" d="M.23,1.64l13.48,16.1a1,1,0,1,0,1.53-1.28L1.77.36A1,1,0,1,0,.23,1.64Z"/></g></svg>
		</button>
		<nav class="nav-burger">
			<ul class="nav-1">
				<li class="entree-principale"><a href="<?php echo site_url(); ?>">Accueil</a></li>
				<li class="entree-principale"><a href="">Tous les articles</a></li>
				<li class="entree-secondaire"><a href="">Rapido</a></li>
				<li class="entree-secondaire"><a href="">Portrait</a></li>
				<li class="entree-secondaire"><a href="">Reportages</a></li>
				<li class="entree-secondaire"><a href="">Épopées</a></li>
				<li class="entree-secondaire"><a href="">L'humeur de ...</a></li>
			</ul>
			<ul class="nav-2">
				<li class="entree-principale"><a href="">Dans le rétro</a></li>
				<li class="entree-principale"><a href="">Les playlists</a></li>
			</ul>
			<ul class="nav-installation">
				<li><a href="<?php the_permalink(2);?>">L'installation</a></li>
			</ul>
			<ul class="nav-3">
				<li class="entree-principale"><a href="<?php the_permalink(101);?>">À propos</a></li>
				<li class="entree-secondaire"><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li class="entree-secondaire"><a href="<?php the_permalink(105);?>">Nous suivre</a></li>
			</ul>
			<ul class="nav-rs flex-container-h">
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
			<ul class="nav-mentions">
				<li class="entree-minimale"><a href="<?php the_permalink(99);?>">Mentions légales</a></li>
			</ul>
		</nav>
	</header>
