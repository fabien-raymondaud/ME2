function positionne_raccourci_ME(winwidth) {
    if(winwidth >= 768 && winwidth < 1024){
    	var largeur_raccourci = 44;
	}
	else{
		if(winwidth > 1023){
			var largeur_raccourci = 54;
		}
	}

	if(winwidth >= 768){
		if($('body').hasClass('home') || $('body').hasClass('single-post')){
	    	var padding = parseInt($('.nav-footer').css('padding-left'), 10);
	    	var position_left = (padding - largeur_raccourci)/2;
	    	$('.raccourci-installation').css('left', position_left+'px');
	    }
	}

    return true;             
}

function fonctionnement_nav_annees(winwidth) {
	$('.nav-annees .nav-left, .nav-annees .nav-right').unbind('click');

    if($('.nav-annees').length){
		var largeur_nav_annees = $('.conteneur-liste-annees').width();
		var nb_annees_visibles = Math.round(largeur_nav_annees/75);
		var li_parent = $('a.active').parent();
		var index_annee = $('.liste-annees li').index(li_parent) + 1;
		var longueur_reelle = $('.liste-annees li').length * 75;

		var decalage_max = largeur_nav_annees - longueur_reelle;

		var decalage  = (-75 * (index_annee-nb_annees_visibles+(nb_annees_visibles/2))) + 37 ;

		$('.nav-left, .nav-right').removeClass('desactive');

		if(decalage > 0){
			decalage = 0;
			$('.nav-left').addClass('desactive');
		}
		else if(decalage<decalage_max){
			decalage = decalage_max;
			$('.nav-right').addClass('desactive');
		}

		$('.liste-annees').css('left', decalage+'px');

		$('.nav-annees .nav-left').click(function(){
			var position_annees = parseInt($('.liste-annees').css('left'), 10);
			decalage_nav = position_annees + 75;
			if(decalage_nav > 0){
				decalage_nav = 0;
				$('.nav-left').addClass('desactive');
			}
			else{
				$('.nav-left').removeClass('desactive');
			}

			$('.liste-annees').css('left', decalage_nav+'px');

		});

		$('.nav-annees .nav-right').click(function(){
			var position_annees = parseInt($('.liste-annees').css('left'), 10);
			decalage_nav = position_annees - 75;
			if(decalage_nav < decalage_max){
				decalage_nav = decalage_max;
				$('.nav-right').addClass('desactive');
			}
			else{
				$('.nav-right').removeClass('desactive');
			}

			$('.liste-annees').css('left', decalage_nav+'px');

		});
	}

    return true;             
}

function maj_player() {
    $('.player .timing').html($('.current-playlist .mejs-currenttime').html());
    $('.player .groupe').html($('.current-playlist .mejs-track-artist').html());
    $('.player .titre').html($('.current-playlist .mejs-track-title').html());

    if($('.current-playlist .mejs-playpause-button').hasClass('mejs-play')){
    	$('.player .play-pause').removeClass('pause');
    }
    else{
    	$('.player .play-pause').addClass('pause');
    }
}

function remplis_player(winwidth) {

	if(winwidth>767){
		var myVar;
		myVar = setInterval(maj_player, 1000);
	}
	
	return true;
}

function lanceMasque() {
	$('.anim-archive .masque-logo').addClass('ouvert');
	window.setTimeout(fermeMasque, 500);
}

function fermeMasque() {
	$('.anim-archive .masque-logo').addClass('ferme');
}

function lanceSVG() {
	$('.anim-archive svg').addClass('ouvert');
	window.setTimeout(fermeSVG, 750);
}

function fermeSVG() {
	$('.anim-archive svg').removeClass('ouvert');
}

function lanceBody() {
	$('.anim-archive').css('display', 'none');
	$('body.page-archive').removeClass('unscrolled');
}

function fermeRadio() {
	$('.all-playlists').addClass('ferme');
	$('.current-playlist').removeClass('ferme');
}

$(document).ready(function() {

	if($('.anim-archive').length){
		window.setTimeout(lanceMasque, 1000);
		window.setTimeout(lanceSVG, 1000);
		window.setTimeout(lanceBody, 2500);
	}

	$('.back-to-top').on('click', function (e) {
        $('html,body').animate({
            scrollTop: 0
        }, 700);

        return false;
    });

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

	$('.flexslider-diapo').flexslider({
		animation: "slide",
		controlNav : false,
		slideshow : false,
		smoothHeight :	true
	});

	$('.flexslider-installation').flexslider({
		animation: "slide",
		controlNav : false,
		slideshowSpeed : 15000
	});

	

	var annees = $('.element-annee').toArray();
	var compteur_annees = 0;

	$('.flexslider-retro .flex-control-nav a').each(function(){
		$(this).html('<span>'+$(annees[compteur_annees]).data('annee')+'</span>');
		compteur_annees++;
	});

	var compteur_click_nav_retro = 0;
	var winwidth = document.body.clientWidth;
	var multiplicateur = 85;
	var decalage = 0;
	var largeur_nav = 0;
	
	if(winwidth<=767){
		largeur_nav = winwidth - 60;
		multiplicateur = largeur_nav;
		$('.flexslider-retro .flex-control-paging li').css('width', largeur_nav+'px');
	}

	$('.flexslider-retro .flex-next').click(function(){
		compteur_click_nav_retro--;
		decalage = compteur_click_nav_retro * multiplicateur;
		$('.flex-control-nav').css('left', decalage+'px');

	});

	$('.flexslider-retro .flex-prev').click(function(){
		compteur_click_nav_retro++;
		decalage = compteur_click_nav_retro * multiplicateur;
		$('.flex-control-nav').css('left', decalage+'px');
	});

	$('.lancer-diapo').click(function(){
		$('.diaporama-entete').addClass('ouvert');
		$('body').addClass('unscrolled');
		return false;
	});

	$('.fermer-diapo').click(function(){
		$('.diaporama-entete').removeClass('ouvert');
		$('body').removeClass('unscrolled');
		return false;
	});

	$('.ouvrir-radio').click(function(){
		$('.popup-playlist').addClass('ouvert');
		$('body').addClass('unscrolled');
		return false;
	});

	$('.fermer-radio').click(function(){
		$('.popup-playlist').removeClass('ouvert');
		$('body').removeClass('unscrolled');

		window.setTimeout(fermeRadio, 300);

		return false;
	});

	$('body').on('click', '.display-all-playlists', function() {
		$('.all-playlists').removeClass('ferme');
		$('.current-playlist').addClass('ferme');

		//$('.mejs-next button').trigger('click');
		return false;
	});

	$('.back-radio').click(function(){
		$('.all-playlists').addClass('ferme');
		$('.current-playlist').removeClass('ferme');
		return false;
	});

	$('.poster').click(function(){
		$(this).addClass('ferme');
		var element_video = $(this).siblings('.video-container').find('iframe');
		$(element_video)[0].src += "&autoplay=1";
		return false;
	});

	positionne_raccourci_ME(winwidth);

	fonctionnement_nav_annees(winwidth);

	remplis_player(winwidth);

	$('body').on('click', '.current-playlist .mejs-playpause-button button', function(){
		$('.player .play-pause').toggleClass('pause');
	});

	$('body').on('click', '.current-playlist .mejs-previous-button, .current-playlist .mejs-next-button', function(){
		$('.player .play-pause').addClass('pause');
	});

	$('.player .play-pause').click(function(){
		$(this).toggleClass('pause');
		$('.current-playlist .mejs-playpause-button button').trigger('click');
		return false;
	});

	$('.player .next').click(function(){
		$('.current-playlist .mejs-next button').trigger('click');
		return false;
	});

	$('.player .rewind').click(function(){
		$('.current-playlist .mejs-previous button').trigger('click');
		return false;
	});

	if($('body.single').length){
		$(window).scroll(function(){
			if( $(document).height() < ($(window).scrollTop() + $(window).height() + 400)){
				jQuery.post(
				    ajaxurl,
				    {
				        'action': 'load_next_article',
				        'identifiant': $('.id-lecture-continue.actif').data('id-lecture-continue')
				    },
				    function(response){
				    	$('.single-central').append(response);
				    }
				);
			}
		});
	}
	

	$(window).resize( function() {
		winwidth = document.body.clientWidth;

		if(winwidth<=767){
			$('.popup-playlist').removeClass('ouvert');
			$('body').removeClass('unscrolled');

			window.setTimeout(fermeRadio, 300);
		}

		positionne_raccourci_ME(winwidth);
		fonctionnement_nav_annees(winwidth);
		if(winwidth<=767){
			largeur_nav = winwidth - 60;
			$('.flexslider-retro .flex-control-paging li').css('width', largeur_nav+'px');
			multiplicateur = largeur_nav;
		}
		else{
			$('.flexslider-retro .flex-control-paging li').css('width', '61px');
			multiplicateur = 85;
		}

		decalage = compteur_click_nav_retro * multiplicateur;
		$('.flex-control-nav').css('left', decalage+'px');
    });
});