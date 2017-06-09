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

$(document).ready(function() {
	
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
	
	if(winwidth<=620){
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

	positionne_raccourci_ME(winwidth);

	if($('.nav-annees').length){
		var largeur_nav_annees = $('.conteneur-liste-annees').width();
		var nb_annees_visibles = Math.round(largeur_nav_annees/75);
		var li_parent = $('a.active').parent();
		var index_annee = $('.liste-annees li').index(li_parent) + 1;

		var decalage  = (-75 * (index_annee-nb_annees_visibles+(nb_annees_visibles/2))) + 37 ;

		$('.liste-annees').css('left', decalage+'px');
	}


	$(window).resize( function() {
		winwidth = document.body.clientWidth;
		positionne_raccourci_ME(winwidth);
		if(winwidth<=620){
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