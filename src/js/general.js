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

function resize_player_heberge(winwidth){
	if(winwidth>710){
		var largeur_bloc_video = $('.video-entete.heberge').width();
		var hauteur_player = largeur_bloc_video / 16 * 9;

		$('.video-entete.heberge .mejs-mediaelement').height(hauteur_player);

		var margin_top_player = (hauteur_player - 400)/-2;

		$('.video-entete.heberge .mejs-mediaelement').css('margin-top', margin_top_player+'px');
		$('.video-entete.heberge .mejs-mediaelement').css('margin-left', '0px');
	}
	else{
		var margin_left_player = (710 - winwidth)/-2;
		$('.video-entete.heberge .mejs-mediaelement').css('margin-left', margin_left_player+'px');
		$('.video-entete.heberge .mejs-mediaelement').css('margin-top', '0px');
	}
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
	var winwidth = document.body.clientWidth;

	if($('.video-entete.heberge').length){
		$('.video-entete.heberge video').mediaelementplayer();

		resize_player_heberge(winwidth);
	}
	

	$('.recherche .awesomplete > input').attr('placeholder', 'Votre recherche');

	$('.recherche-header .open-search').click(function(){
		$('.recherche-header .searchform').addClass('ouvert');
		$('.recherche-header .close-search').removeClass('invisible');
	});

	$('.recherche-header .close-search').click(function(){
		$('.recherche-header .searchform').removeClass('ouvert');
		$(this).addClass('invisible');
	});

	$('.recherche-page-recherche .close-search').click(function(){
		$('.recherche-page-recherche .searchform .awesomplete input').val("");
	});

	var largeur_recherche = winwidth * 58.4 / 100;
	$('.header-general .searchform .awesomplete').css('width', largeur_recherche+'px');

	if($('.header-cat .filtres select').length){
		$('.header-cat .filtres select').each(function(){
		    var $this = $(this), numberOfOptions = $(this).children('option').length;
		  
		    $this.addClass('select-hidden'); 
		    $this.wrap('<div class="select"></div>');
		    $this.after('<div class="select-styled"></div>');

		    var $styledSelect = $this.next('div.select-styled');
		    $styledSelect.text($this.children('option').eq(0).text());
		  
		    var $list = $('<ul />', {
		        'class': 'select-options'
		    }).insertAfter($styledSelect);
		  
		    for (var i = 0; i < numberOfOptions; i++) {
		        $('<li />', {
		            text: $this.children('option').eq(i).text(),
		            rel: $this.children('option').eq(i).val()
		        }).appendTo($list);
		    }
		  
		    var $listItems = $list.children('li');
		  
		    $styledSelect.click(function(e) {
		        e.stopPropagation();
		        $('div.select-styled.active').not(this).each(function(){
		            $(this).removeClass('active').next('ul.select-options').hide();
		        });
		        $(this).toggleClass('active').next('ul.select-options').toggle();
		    });
		  
		  
		    $(document).click(function() {
		        $styledSelect.removeClass('active');
		        $list.hide();
		    });

		});
	}
	
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

	$('body').on('click', '.lancer-diapo', function(){
		$(this).parent().parent().next('.diaporama-entete').addClass('ouvert');
		$('body').addClass('unscrolled');
		return false;
	});

	$('body').on('click', '.fermer-diapo', function(){
		$(this).parent().removeClass('ouvert');
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

	$('body').on('click', '.poster', function() {
		$(this).addClass('ferme');
		var element_video = $(this).siblings('.video-container').find('iframe');
		$(element_video)[0].src += "&autoplay=1";
		return false;
	});

	$('.plus-actu-installation').click(function(){
		$(this).addClass('ferme');
		$('.conteneur-breve').addClass('ouvert');
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
		autorise_chargement = true;
		var currentHash = $('.hashs.actif').data('new-url');
		$(window).scroll(function(){

			if( $(document).height() < ($(window).scrollTop() + $(window).height() + 400) && autorise_chargement && $('.id-lecture-continue.actif').length){
				autorise_chargement = false;
				var identifiant_lecture_continue = $('.id-lecture-continue.actif').data('id-lecture-continue');

				$('.id-lecture-continue.actif').removeClass('actif').next('.id-lecture-continue').addClass('actif');
				jQuery.post(
				    ajaxurl,
				    {
				        'action': 'load_next_article',
				        'identifiant': identifiant_lecture_continue
				    },
				    function(response){
				    	$('.hashs').removeClass('actif');
				    	$('.single-central').append(response);

				    	$('.video-entete.heberge video').mediaelementplayer();
				    	!function(a,b,c){"use strict";var d='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 40"><path d="M10,40C4.5,40,0,35.5,0,30s4.5-10,10-10s10,4.5,10,10S15.5,40,10,40z M0,0l40,40V20L20,0H0z M80,0H40v14h40V0z M74,40L60,18L46,40H74z"/></svg>';b.extend(MediaElementPlayer.prototype,{buildaudiothememark:function(a,b,c,e){c.append('<a href="https://audiotheme.com/?utm_source=wordpress-plugin&utm_medium=link&utm_content=cue-logo&utm_campaign=plugins" target="_blank" class="mejs-audiotheme-mark">'+d+"</a>")},buildcuebackground:function(a,c,d,e){var f=a.container.append(b("<img />",{"class":"mejs-player-background",src:a.options.cueBackgroundUrl})).find(".mejs-player-background");b.each(a.options.cuePlaylistTracks,function(b,c){a.options.cuePlaylistTracks[b].thumb.src=c.thumb.src||a.options.cueBackgroundUrl}),a.$node.on("setTrack.cue",function(a,b,c){b.thumb=b.thumb||{},""===c.options.cueBackgroundUrl&&f.attr("src",b.thumb.src)}).trigger("backgroundCreate.cue",a)}})}(this,jQuery),function(a,b,c){"use strict";var d,e=b([]),f=!0;d={init:function(){b(a).on("resize.cue",d.resize)},initEl:function(a){var c,e,f,g,h=b(a),i=h.data("cueMediaClasses"),j=[];if(i.breakpoints.length){for(e=0;e<i.breakpoints.length;e++)c=i.breakpoints[e],f=c.type||"min-width",g=c.size||c,j[e]={type:f,size:g,className:c.className||f+"-"+g};i.breakpoints=j,h.data("cueMediaSettings",i),d.update(h)}},resize:function(){f&&e.length&&(f=!1,setTimeout(function(){d.update(e),f=!0},b.fn.cueMediaClasses.defaults.resizeDelay))},update:function(a){a.each(function(){var a,c,d=b(this),e=d.outerWidth(),f=d.data("cueMediaClasses");if(f.breakpoints.length)for("number"!=typeof e&&(e=d.width()),c=0;c<f.breakpoints.length;c++)a=f.breakpoints[c],d.toggleClass(a.className,"min-width"===a.type?e>=a.size:e<=a.size)})}},d.init(),b.fn.cueMediaClasses=function(a){var c=b.extend({breakpoints:[]},a);return this.each(function(){var a=b(this);a.data("cueMediaClasses",c),e=e.add(a),d.initEl(a)})},b.fn.cueMediaClasses.defaults={resizeDelay:800}}(this,jQuery),window.cue=window.cue||{},function(a,b,c){"use strict";var d,e=" -webkit- -moz- -o- -ms- ".split(" "),f={},g=b("html");cue.l10n=b.extend(cue.l10n,_cueSettings.l10n),d=function(a){var b,c,d;if(f[a]||""===f[a])return f[a]+a;b=document.createElement("div"),d=["","Moz","Webkit","O","ms","Khtml"];for(c in d)if("undefined"!=typeof b.style[d[c]+a])return f[a]=d[c],d[c]+a;return a.toLowerCase()},cue.settings.hasCssFilters=function(){var a=document.createElement("div");return a.style.cssText=e.join("filter:blur(2px); "),!!a.style.length&&(c===document.documentMode||document.documentMode>9)}(),cue.settings.hasSvgFilters=function(){var b=!1;try{b="SVGFEColorMatrixElement"in a&&2===SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(c){}return b&&!/(MSIE|Trident)/.test(a.navigator.userAgent)}(),cue.settings.isTouch=function(){return"ontouchstart"in a||a.DocumentTouch&&document instanceof a.DocumentTouch}(),g.toggleClass("no-css-filters",!cue.settings.hasCssFilters).toggleClass("no-svg-filters",!cue.settings.hasSvgFilters),b.extend(cue,{initialize:function(){b(".cue-playlist").each(function(){var c={},d=b(this),e=d.closest(".cue-playlist-container").find(".cue-playlist-data");d.addClass(cue.settings.isTouch?"touch":"no-touch"),e.length&&(c=b.parseJSON(e.first().html())),!cue.settings.hasCssFilters&&cue.settings.hasSvgFilters&&(b("#cue-filter-blur").length||b("body").append('<svg id="cue-filter-svg" style="position: absolute; bottom: 0"><filter id="cue-filter-blur"><feGaussianBlur class="blur" stdDeviation="20" color-interpolation-filters="sRGB"/></filter></svg>'),d.on("backgroundCreate.cue",function(b,c){c.container.find(".mejs-player-background").css("filter","url('"+a.location.href+"#cue-filter-blur')")})),d.cuePlaylist({cueBackgroundUrl:c.thumbnail||"",cueEmbedLink:c.embed_link||"",cuePermalink:c.permalink||"",cuePlaylistLoop:!1,cueResponsiveProgress:!0,cueSelectors:{playlist:".cue-playlist"},cueSkin:c.skin||"cue-skin-default",defaultAudioHeight:0,features:b.fn.cuePlaylist.features}).cueMediaClasses({breakpoints:[{type:"max-width",size:480},{type:"max-width",size:380},{type:"max-width",size:300},{type:"max-width",size:200}]})})}}),b.fn.cuePlaylist.features=["cuebackground","cueartwork","cuecurrentdetails","cueprevioustrack","playpause","cuenexttrack","volume","progress","current","duration","cueplaylist","audiothememark"],b(document).ready(cue.initialize).on("pjax:end",cue.initialize)}(this,jQuery);

				    	resize_player_heberge(winwidth);
				    	
				    	autorise_chargement = true;

				    	$('.flexslider-diapo').flexslider({
							animation: "slide",
							controlNav : false,
							slideshow : false,
							smoothHeight :	true
						});
				    }
				);
			}
			
			var compteurHashs = 0;
	        $('.hashs').each(function () {
	            var top = window.pageYOffset;
	            var distance = top - $(this).offset().top;
	            var hash = $(this).data('new-url');

	            if (distance < 100 && distance > -100 && currentHash != hash) {
	                history.replaceState('changement URL', $(this).data('new-title'), $(this).data('new-url'));
	                currentHash = hash;
	            }
	        });
		});
	}
	

	$(window).resize( function() {
		winwidth = document.body.clientWidth;

		if(winwidth<=767){
			$('.popup-playlist').removeClass('ouvert');
			$('body').removeClass('unscrolled');

			window.setTimeout(fermeRadio, 300);
		}

		if($('.video-entete.heberge').length){
			resize_player_heberge(winwidth);
		}

		positionne_raccourci_ME(winwidth);
		fonctionnement_nav_annees(winwidth);

		var largeur_recherche = winwidth * 58.4 / 100;
		$('.header-general .searchform .awesomplete').css('width', largeur_recherche+'px');

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