$(document).ready(function() {
	var winwidth = document.body.clientWidth;

	/* AJAX Articles home */
	var action_articles = 'load_slider_articles';
	var deja_grand = false;
	var deja_petit = false;
	var change_reso = false;

	if(winwidth > 767){
		action_articles = 'load_liste_articles';
		deja_grand=true;
	}
	else{
		deja_petit=true;
	}

	jQuery.post(
	    ajaxurl,
	    {
	        'action': action_articles
	    },
	    function(response){
	    	$('body.home .derniers-articles').append(response);

	    	if($('.flexslider-articles-mobile').length){
	    		$('.flexslider-articles-mobile').flexslider({
					animation: "slide",
					controlNav : false,
					slideshow : false
				});
	    	}
	    }
	);
	/* /AJAX Articles home */

	/* AJAX Slider Installation */
	action_installation = 'load_petit_slider'
	if(winwidth > 767){
		action_installation = 'load_gros_slider';
	}
	
	if($('.flexslider-installation').length){
		jQuery.post(
		    ajaxurl,
		    {
		        'action': action_installation
		    },
		    function(response){
		    	$('.conteneur-slider-installation').html("");
		    	$('.conteneur-slider-installation').append(response);

		    	if($('.flexslider-installation').length){
		    		$('.flexslider-installation').flexslider({
						animation: "slide",
						controlNav : false,
						slideshowSpeed : 15000
					});
		    	}
		    }
		);
	}


	/* AJAX Liste archives */
	var filtre_thematique = "Tous";
	var filtre_ordre = "DESC";
	var offsetArticles = 10; 

	/* Load more */
	$('.afficher-plus-articles').click(function(){
		if($(this).data('cat')!=""){
			filtre_thematique = $(this).data('cat');
		}

		if($(this).data('ordre')!=""){
			filtre_ordre = $(this).data('ordre');
		}

		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'load_more_articles',
		        'offset': offsetArticles,
		        'thematique': filtre_thematique,
		        'ordre': filtre_ordre
		    },
		    function(response){
		    	offsetArticles = offsetArticles + 10;
		    	$('.conteneur-liste-articles').append(response);
		    	
		    	if(offsetArticles>=$('#compteur-posts').val()){
		    		$('.afficher-plus-articles').css('display','none');
		    	}
		    }
		);

		return false;
	});
	/* /Load more */

	$(window).resize( function() {
		winwidth = document.body.clientWidth;
		change_reso = false;
		if(winwidth>767 && !deja_grand){
			deja_grand=true;
			deja_petit=false;
			change_reso = true;
			action_articles = 'load_liste_articles';
			action_installation = 'load_gros_slider';
		}

		if(winwidth<768 && !deja_petit){
			deja_petit=true;
			deja_grand=false;
			change_reso = true;
			action_articles = 'load_slider_articles';
			action_installation = 'load_petit_slider';
		}

		if(change_reso){
			jQuery.post(
			    ajaxurl,
			    {
			        'action': action_articles
			    },
			    function(response){
			    	$('body.home .derniers-articles').html("");
			    	$('body.home .derniers-articles').append(response);

			    	if($('.flexslider-articles-mobile').length){
			    		$('.flexslider-articles-mobile').flexslider({
							animation: "slide",
							controlNav : false,
							slideshow : false
						});
			    	}
			    }
			);

			jQuery.post(
			    ajaxurl,
			    {
			        'action': action_installation
			    },
			    function(response){
			    	$('.conteneur-slider-installation').html("");
			    	$('.conteneur-slider-installation').append(response);

			    	if($('.flexslider-installation').length){
			    		$('.flexslider-installation').flexslider({
							animation: "slide",
							controlNav : false,
							slideshowSpeed : 15000
						});
			    	}
			    }
			);
		}

	});

});