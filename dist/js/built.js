$(document).ready(function(){$("button.burger").click(function(){$(".nav-burger").toggleClass("ouvert"),$("button.burger svg").toggleClass("invisible")}),$(".flexslider").flexslider({animation:"slide",controlNav:!1}),$(".flexslider-dossier").flexslider({animation:"slide",controlNav:!1,slideshowSpeed:15e3}),$(window).resize(function(){})});