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
	<header class="header-general">
		<h1><a href="<?php echo site_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/css/svg/logo.svg" alt="Mémoires électriques"></a></h1>
		<div class="player">
			
		</div>
		<div class="recherche">
			
		</div>
		<button class="burger">
			
		</button>
		<nav class="nav-burger">
			<ul class="nav-1">
				<li class="entree-principale"><a href="<?php echo site_url(); ?>">Accueil</a></li>
				<li class="entree-principale"><a href="">Tous les articles</a></li>
				<li><a href="">Rapido</a></li>
				<li><a href="">Portrait</a></li>
				<li><a href="">Reportages</a></li>
				<li><a href="">Épopées</a></li>
				<li><a href="">L'humeur de ...</a></li>
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
				<li><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li><a href="<?php the_permalink(105);?>">Nous suivre</a></li>
			</ul>
			<ul class="nav-rs">
				<li><a href="<?php the_field('compte_twitter', 'options');?>" class="twitter" target="_blank"></a></li>
				<li><a href="<?php the_field('compte_facebook', 'options');?>" class="facebook" target="_blank"></a></li>
			</ul>
			<ul class="nav-mentions">
				<li class="entree-minimale"><a href="<?php the_permalink(99);?>">Mentions légales</a></li>
			</ul>
		</nav>
	</header>