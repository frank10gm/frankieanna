$("document").ready(function() {	

	$('html').keydown(function(e){
	
		if(($('#fai').val()) != ""){
			
			if(e.keyCode == 13){
				prova();
			}
		}
		
		
	});	
	
});