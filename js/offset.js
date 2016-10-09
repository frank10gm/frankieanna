$("document").ready(function() {	

	$('html').keydown(function(e){
	
		//console.log(e.keyCode);
		
		
		if(e.keyCode == 40){
			$('html, body').animate({
						scrollTop: $(document).scrollTop() + scrolla

					}, scrollaTime);	
				
		} else if (e.keyCode == 38){
			$('html, body').animate({
						scrollTop: $(document).scrollTop() - scrolla

					}, scrollaTime);	
		} else if(e.keyCode == 84){
			$('html, body').animate({
						scrollTop: $("#0-slide").offset().top
					}, scrollaTime);
		}  /*else if(e.keyCode == 39){
			$('html, body').animate({
						scrollTop: $("#0-slide").offset().top
					}, scrollaTime);
		}*/
	});		
			
	//qui inizia la parte dei pulsanti su schermo		
			
	$('#home').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#1-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#principal-button').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#0-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#brand').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#6-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#storia').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#3-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#mood').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#47-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#relations').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#8-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#macklemore2').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#23-slide").offset().top
		}, scrollaTime);				  		 
	});
	
	$('#deus').click(function(){			   
		$('html, body').animate({
			scrollTop: $("#2-video").offset().top
		}, scrollaTime);				  		 
	});



});
