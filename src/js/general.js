$(document).ready(function() {
	$('button.burger').click(function(){
		$('.nav-burger').toggleClass('ouvert');
		$('button.burger svg').toggleClass('invisible');
	});

	$('.flexslider').flexslider({
		animation: "slide",
		controlNav : false
	});

	$(window).resize( function() {
        
    });
});