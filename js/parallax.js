// JavaScript Document
$(function() {
	
	//collegamento allo scorrimento della pagina
	$(window).bind('scroll', function(e) {	
		parallax();
	});
	
	//collegamento alla navbar
	$('.nav-link').bind('click', function(event) {
        var $anchor = $(this);
        //console.log($anchor);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        //event.preventDefault();
        //event.stopImmediatePropagation();
    });

	$('a.home').click(function(){
		
		$('html, body').animate({ scrollTop:0}, 1000,	
			function() {
			
			parallax();
			
			});
			return false;
	
		});
	
	$('a.configurator').click(function(){
		
		$('html, body').animate({ scrollTop:$('#configurator').offset().top}, 1000,	
			function() {
			
			parallax();
			
			});
			return false;
	
		});
		
		$('a.servizi').click(function(){
		
		$('html, body').animate({ scrollTop:$('#servizi').offset().top}, 1000,	
			function() {
			
			parallax();
			
			});
			return false;
	
		});
	
	$('a.contatti').click(function(){
		
		$('html, body').animate({ scrollTop:$('#contatti').offset().top}, 1000,	
			function() {
			
			parallax();
			
			});
			return false;
	
		});
	
	
	$('a.login').click(function(){
		
		$('html, body').animate({ scrollTop:$('#login').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});
	
	$('a.video').click(function(){
		
		$('html, body').animate({ scrollTop:$('#video').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});
	
	$('a.photo').click(function(){
		
		$('html, body').animate({ scrollTop:$('#photo').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});
	
	$('a.edit-profile').click(function(){
		
		$('html, body').animate({ scrollTop:$('#edit-profile').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});
	
	$('a.community').click(function(){
		
		$('html, body').animate({ scrollTop:$('#community').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});
	
	$('a.apparel').click(function(){
		
		$('html, body').animate({ scrollTop:$('#apparel').offset().top}, 1000,	
			function() {
			
			parallax();
			
		});
		return false;
	});

});

function parallax() {
	
	var scrollPosition=$(window).scrollTop();
	$('#backgr').css('top',(0 - (scrollPosition *.2)) +'px');
	//$('#immagini').css('top',(0 -(scrollPosition * .5)) + 'px');
}