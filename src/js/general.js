$(document).ready(function() {
	$('button.burger').click(function(){
		$('.nav-burger').toggleClass('ouvert');
		$('button.burger svg').toggleClass('invisible');
	});

	$(window).resize( function() {
        
    });
});