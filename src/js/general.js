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
		$(this).html($(annees[compteur_annees]).data('annee'));
		compteur_annees++;
	});

	$('.flexslider-retro .flex-next').click(function(){
		var decalage = $('.flex-active').parent().prev().width()+24;
		$('.flex-control-nav').css('left', '-='+decalage);

	});

	$('.flexslider-retro .flex-prev').click(function(){
		var decalage = $('.flex-active').width()+24;
		$('.flex-control-nav').css('left', '+='+decalage);

	});

	$(window).resize( function() {
        
    });
});