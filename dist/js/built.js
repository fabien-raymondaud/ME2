function positionne_raccourci_ME(a){if(a>=768&&1024>a)var b=44;else if(a>1023)var b=54;if(a>=768&&($("body").hasClass("home")||$("body").hasClass("single-post"))){var c=parseInt($(".nav-footer").css("padding-left"),10),d=(c-b)/2;$(".raccourci-installation").css("left",d+"px")}return!0}function fonctionnement_nav_annees(){if($(".nav-annees .nav-left, .nav-annees .nav-right").unbind("click"),$(".nav-annees").length){var a=$(".conteneur-liste-annees").width(),b=Math.round(a/75),c=$("a.active").parent(),d=$(".liste-annees li").index(c)+1,e=75*$(".liste-annees li").length,f=a-e,g=-75*(d-b+b/2)+37;$(".nav-left, .nav-right").removeClass("desactive"),g>0?(g=0,$(".nav-left").addClass("desactive")):f>g&&(g=f,$(".nav-right").addClass("desactive")),$(".liste-annees").css("left",g+"px"),$(".nav-annees .nav-left").click(function(){var a=parseInt($(".liste-annees").css("left"),10);decalage_nav=a+75,decalage_nav>0?(decalage_nav=0,$(".nav-left").addClass("desactive")):$(".nav-left").removeClass("desactive"),$(".liste-annees").css("left",decalage_nav+"px")}),$(".nav-annees .nav-right").click(function(){var a=parseInt($(".liste-annees").css("left"),10);decalage_nav=a-75,f>decalage_nav?(decalage_nav=f,$(".nav-right").addClass("desactive")):$(".nav-right").removeClass("desactive"),$(".liste-annees").css("left",decalage_nav+"px")})}return!0}function maj_player(){$(".player .timing").html($(".current-playlist .mejs-currenttime").html()),$(".player .groupe").html($(".current-playlist .mejs-track-artist").html()),$(".player .titre").html($(".current-playlist .mejs-track-title").html()),$(".current-playlist .mejs-playpause-button").hasClass("mejs-play")?$(".player .play-pause").removeClass("pause"):$(".player .play-pause").addClass("pause")}function remplis_player(a){if(a>767){var b;b=setInterval(maj_player,1e3)}return!0}function lanceMasque(){$(".anim-archive .masque-logo").addClass("ouvert"),window.setTimeout(fermeMasque,500)}function fermeMasque(){$(".anim-archive .masque-logo").addClass("ferme")}function lanceSVG(){$(".anim-archive svg").addClass("ouvert"),window.setTimeout(fermeSVG,750)}function fermeSVG(){$(".anim-archive svg").removeClass("ouvert")}function lanceBody(){$(".anim-archive").css("display","none"),$("body.page-archive").removeClass("unscrolled")}function fermeRadio(){$(".all-playlists").addClass("ferme"),$(".current-playlist").removeClass("ferme")}$(document).ready(function(){$(".anim-archive").length&&(window.setTimeout(lanceMasque,1e3),window.setTimeout(lanceSVG,1e3),window.setTimeout(lanceBody,2500)),$(".back-to-top").on("click",function(){return $("html,body").animate({scrollTop:0},700),!1}),$("button.burger").click(function(){$(".nav-burger").toggleClass("ouvert"),$("button.burger svg").toggleClass("invisible")}),$(".flexslider").flexslider({animation:"slide",controlNav:!1}),$(".flexslider-dossier").flexslider({animation:"slide",controlNav:!1,slideshowSpeed:15e3}),$(".flexslider-retro").flexslider({animation:"slide",slideshow:!1,controlsContainer:".conteneur-nav-retro",animationLoop:!1}),$(".flexslider-diapo").flexslider({animation:"slide",controlNav:!1,slideshow:!1,smoothHeight:!0}),$(".flexslider-installation").flexslider({animation:"slide",controlNav:!1,slideshowSpeed:15e3});var a=$(".element-annee").toArray(),b=0;$(".flexslider-retro .flex-control-nav a").each(function(){$(this).html("<span>"+$(a[b]).data("annee")+"</span>"),b++});var c=0,d=document.body.clientWidth,e=85,f=0,g=0;767>=d&&(g=d-60,e=g,$(".flexslider-retro .flex-control-paging li").css("width",g+"px")),$(".flexslider-retro .flex-next").click(function(){c--,f=c*e,$(".flex-control-nav").css("left",f+"px")}),$(".flexslider-retro .flex-prev").click(function(){c++,f=c*e,$(".flex-control-nav").css("left",f+"px")}),$(".lancer-diapo").click(function(){return $(".diaporama-entete").addClass("ouvert"),$("body").addClass("unscrolled"),!1}),$(".fermer-diapo").click(function(){return $(".diaporama-entete").removeClass("ouvert"),$("body").removeClass("unscrolled"),!1}),$(".ouvrir-radio").click(function(){return $(".popup-playlist").addClass("ouvert"),$("body").addClass("unscrolled"),!1}),$(".fermer-radio").click(function(){return $(".popup-playlist").removeClass("ouvert"),$("body").removeClass("unscrolled"),window.setTimeout(fermeRadio,300),!1}),$("body").on("click",".display-all-playlists",function(){return $(".all-playlists").removeClass("ferme"),$(".current-playlist").addClass("ferme"),!1}),$(".back-radio").click(function(){return $(".all-playlists").addClass("ferme"),$(".current-playlist").removeClass("ferme"),!1}),$(".poster").click(function(){$(this).addClass("ferme");var a=$(this).siblings(".video-container").find("iframe");return $(a)[0].src+="&autoplay=1",!1}),positionne_raccourci_ME(d),fonctionnement_nav_annees(d),remplis_player(d),$("body").on("click",".current-playlist .mejs-playpause-button button",function(){$(".player .play-pause").toggleClass("pause")}),$("body").on("click",".current-playlist .mejs-previous-button, .current-playlist .mejs-next-button",function(){$(".player .play-pause").addClass("pause")}),$(".player .play-pause").click(function(){return $(this).toggleClass("pause"),$(".current-playlist .mejs-playpause-button button").trigger("click"),!1}),$(".player .next").click(function(){return $(".current-playlist .mejs-next button").trigger("click"),!1}),$(".player .rewind").click(function(){return $(".current-playlist .mejs-previous button").trigger("click"),!1}),$(window).resize(function(){d=document.body.clientWidth,767>=d&&($(".popup-playlist").removeClass("ouvert"),$("body").removeClass("unscrolled"),window.setTimeout(fermeRadio,300)),positionne_raccourci_ME(d),fonctionnement_nav_annees(d),767>=d?(g=d-60,$(".flexslider-retro .flex-control-paging li").css("width",g+"px"),e=g):($(".flexslider-retro .flex-control-paging li").css("width","61px"),e=85),f=c*e,$(".flex-control-nav").css("left",f+"px")})});