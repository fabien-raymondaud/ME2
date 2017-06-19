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
	    	$('.derniers-articles').append(response);

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

	$(window).resize( function() {
		winwidth = document.body.clientWidth;
		change_reso = false;
		if(winwidth>767 && !deja_grand){
			deja_grand=true;
			deja_petit=false;
			change_reso = true;
			action_articles = 'load_liste_articles';
		}

		if(winwidth<768 && !deja_petit){
			deja_petit=true;
			deja_grand=false;
			change_reso = true;
			action_articles = 'load_slider_articles';


		}

		if(change_reso){
			jQuery.post(
			    ajaxurl,
			    {
			        'action': action_articles
			    },
			    function(response){
			    	$('.derniers-articles').html("");
			    	$('.derniers-articles').append(response);

			    	if($('.flexslider-articles-mobile').length){
			    		$('.flexslider-articles-mobile').flexslider({
							animation: "slide",
							controlNav : false,
							slideshow : false
						});
			    	}
			    }
			);
		}

	});

});