$(document).ready(function() {
	$('button.burger').click(function(){
		$('.nav-burger').toggleClass('ouvert');
		$('button.burger svg').toggleClass('invisible');
	});

	$('.flexslider').flexslider({
		animation: "slide",
		controlNav : false
	});

	$('.flexslider-dossier').flexslider({
		animation: "slide",
		controlNav : false,
		slideshowSpeed : 15000
	});

	$('.flexslider-retro').flexslider({
		animation: "slide",
		slideshow : false,
		controlsContainer : '.conteneur-nav-retro',
		animationLoop : false
	});

	var annees = $('.element-annee').toArray();
	var compteur_annees = 0;

	$('.flexslider-retro .flex-control-nav a').each(function(){
		$(this).html('<span>'+$(annees[compteur_annees]).data('annee')+'</span>');
		compteur_annees++;
	});

	var compteur_click_nav_retro = 0;

	$('.flexslider-retro .flex-next').click(function(){
		compteur_click_nav_retro--;
		var decalage = compteur_click_nav_retro * 85;
		$('.flex-control-nav').css('left', decalage+'px');

	});

	$('.flexslider-retro .flex-prev').click(function(){
		compteur_click_nav_retro++;
		var decalage = compteur_click_nav_retro * 85;
		$('.flex-control-nav').css('left', decalage+'px');

	});

	$(window).resize( function() {
        
    });
});