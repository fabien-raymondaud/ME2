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
	var filtre_type = -1;
	var filtre_ordre = "DESC";
	var offsetArticles = 10; 
	var recherche = "";

	/* Load more */
	$('.afficher-plus-articles').click(function(){
		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'load_more_articles',
		        'offset': offsetArticles,
		        'type': filtre_type,
		        'ordre': filtre_ordre,
		        'recherche': recherche
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

	/* Filtre articles */
	$('.filtres .select:first-of-type .select-options li').click(function(){
		filtre_type = $(this).attr('rel');

		$(this).parent().prev('.select-styled').text($(this).text()).removeClass('active');
        $(this).val($(this).attr('rel'));
        $(this).parent().hide();

		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'filtre_articles',
		        'offset': 0,
		        'type': filtre_type,
		        'ordre': filtre_ordre,
		        'recherche': recherche
		    },
		    function(response){
		    	offsetArticles = 10;
		    	$('.conteneur-liste-articles').html("");
		    	$('.conteneur-liste-articles').append(response);
		    	
		    	if(offsetArticles>=$('#compteur-posts').val() || $('.panneau-article').length<10){
		    		$('.afficher-plus-articles').css('display','none');
		    	}
		    	else{
		    		$('.afficher-plus-articles').css('display','inline-block');
		    	}
		    }
		);
	});

	$('.filtres .select:last-child .select-options li').click(function(){
		filtre_ordre = $(this).attr('rel');

		$(this).parent().prev('.select-styled').text($(this).text()).removeClass('active');
        $(this).val($(this).attr('rel'));
        $(this).parent().hide();

		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'filtre_articles',
		        'offset': 0,
		        'type': filtre_type,
		        'ordre': filtre_ordre,
		        'recherche': recherche
		    },
		    function(response){
		    	offsetArticles = 10; 
		    	$('.conteneur-liste-articles').html("");
		    	$('.conteneur-liste-articles').append(response);
		    	
		    	if(offsetArticles>=$('#compteur-posts').val() || $('.panneau-article').length<10){
		    		$('.afficher-plus-articles').css('display','none');
		    	}
		    	else{
		    		$('.afficher-plus-articles').css('display','inline-block');
		    	}
		    }
		);
	});

	/* /Filtre articles */



	/* Chargement playlist */
	$('.lien-playlist').click(function(){
		$('.all-playlists > ul > li').removeClass('is-playing');
		$(this).parent().addClass('is-playing');

		$('.lien-playlist').html('Écouter');
		$(this).html('En écoute');

		jQuery.post(
		    ajaxurl,
		    {
		        'action': 'load_playlist',
		        'playlist': $(this).data('playlist')
		        
		    },
		    function(response){
		    	$('.all-playlists').addClass('ferme');
				$('.current-playlist').removeClass('ferme');

		    	$('.current-playlist').html("");
		    	$('.current-playlist').append(response);

		    	!function(a,b,c){"use strict";var d='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 40"><path d="M10,40C4.5,40,0,35.5,0,30s4.5-10,10-10s10,4.5,10,10S15.5,40,10,40z M0,0l40,40V20L20,0H0z M80,0H40v14h40V0z M74,40L60,18L46,40H74z"/></svg>';b.extend(MediaElementPlayer.prototype,{buildaudiothememark:function(a,b,c,e){c.append('<a href="https://audiotheme.com/?utm_source=wordpress-plugin&utm_medium=link&utm_content=cue-logo&utm_campaign=plugins" target="_blank" class="mejs-audiotheme-mark">'+d+"</a>")},buildcuebackground:function(a,c,d,e){var f=a.container.append(b("<img />",{"class":"mejs-player-background",src:a.options.cueBackgroundUrl})).find(".mejs-player-background");b.each(a.options.cuePlaylistTracks,function(b,c){a.options.cuePlaylistTracks[b].thumb.src=c.thumb.src||a.options.cueBackgroundUrl}),a.$node.on("setTrack.cue",function(a,b,c){b.thumb=b.thumb||{},""===c.options.cueBackgroundUrl&&f.attr("src",b.thumb.src)}).trigger("backgroundCreate.cue",a)}})}(this,jQuery),function(a,b,c){"use strict";var d,e=b([]),f=!0;d={init:function(){b(a).on("resize.cue",d.resize)},initEl:function(a){var c,e,f,g,h=b(a),i=h.data("cueMediaClasses"),j=[];if(i.breakpoints.length){for(e=0;e<i.breakpoints.length;e++)c=i.breakpoints[e],f=c.type||"min-width",g=c.size||c,j[e]={type:f,size:g,className:c.className||f+"-"+g};i.breakpoints=j,h.data("cueMediaSettings",i),d.update(h)}},resize:function(){f&&e.length&&(f=!1,setTimeout(function(){d.update(e),f=!0},b.fn.cueMediaClasses.defaults.resizeDelay))},update:function(a){a.each(function(){var a,c,d=b(this),e=d.outerWidth(),f=d.data("cueMediaClasses");if(f.breakpoints.length)for("number"!=typeof e&&(e=d.width()),c=0;c<f.breakpoints.length;c++)a=f.breakpoints[c],d.toggleClass(a.className,"min-width"===a.type?e>=a.size:e<=a.size)})}},d.init(),b.fn.cueMediaClasses=function(a){var c=b.extend({breakpoints:[]},a);return this.each(function(){var a=b(this);a.data("cueMediaClasses",c),e=e.add(a),d.initEl(a)})},b.fn.cueMediaClasses.defaults={resizeDelay:800}}(this,jQuery),window.cue=window.cue||{},function(a,b,c){"use strict";var d,e=" -webkit- -moz- -o- -ms- ".split(" "),f={},g=b("html");cue.l10n=b.extend(cue.l10n,_cueSettings.l10n),d=function(a){var b,c,d;if(f[a]||""===f[a])return f[a]+a;b=document.createElement("div"),d=["","Moz","Webkit","O","ms","Khtml"];for(c in d)if("undefined"!=typeof b.style[d[c]+a])return f[a]=d[c],d[c]+a;return a.toLowerCase()},cue.settings.hasCssFilters=function(){var a=document.createElement("div");return a.style.cssText=e.join("filter:blur(2px); "),!!a.style.length&&(c===document.documentMode||document.documentMode>9)}(),cue.settings.hasSvgFilters=function(){var b=!1;try{b="SVGFEColorMatrixElement"in a&&2===SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(c){}return b&&!/(MSIE|Trident)/.test(a.navigator.userAgent)}(),cue.settings.isTouch=function(){return"ontouchstart"in a||a.DocumentTouch&&document instanceof a.DocumentTouch}(),g.toggleClass("no-css-filters",!cue.settings.hasCssFilters).toggleClass("no-svg-filters",!cue.settings.hasSvgFilters),b.extend(cue,{initialize:function(){b(".cue-playlist").each(function(){var c={},d=b(this),e=d.closest(".cue-playlist-container").find(".cue-playlist-data");d.addClass(cue.settings.isTouch?"touch":"no-touch"),e.length&&(c=b.parseJSON(e.first().html())),!cue.settings.hasCssFilters&&cue.settings.hasSvgFilters&&(b("#cue-filter-blur").length||b("body").append('<svg id="cue-filter-svg" style="position: absolute; bottom: 0"><filter id="cue-filter-blur"><feGaussianBlur class="blur" stdDeviation="20" color-interpolation-filters="sRGB"/></filter></svg>'),d.on("backgroundCreate.cue",function(b,c){c.container.find(".mejs-player-background").css("filter","url('"+a.location.href+"#cue-filter-blur')")})),d.cuePlaylist({cueBackgroundUrl:c.thumbnail||"",cueEmbedLink:c.embed_link||"",cuePermalink:c.permalink||"",cuePlaylistLoop:!1,cueResponsiveProgress:!0,cueSelectors:{playlist:".cue-playlist"},cueSkin:c.skin||"cue-skin-default",defaultAudioHeight:0,features:b.fn.cuePlaylist.features}).cueMediaClasses({breakpoints:[{type:"max-width",size:480},{type:"max-width",size:380},{type:"max-width",size:300},{type:"max-width",size:200}]})})}}),b.fn.cuePlaylist.features=["cuebackground","cueartwork","cuecurrentdetails","cueprevioustrack","playpause","cuenexttrack","volume","progress","current","duration","cueplaylist","audiothememark"],b(document).ready(cue.initialize).on("pjax:end",cue.initialize)}(this,jQuery);
		    	
		    }
		);

		return false;
	});

	/* /Chargement playlist */

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