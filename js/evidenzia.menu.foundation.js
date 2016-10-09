function evidenziaMenu(paginaDerivata){

	$('#a-home').css('color','#fff');
	$("#a-home").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-history').css('color','#fff');
	$("#a-history").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-login').css('color','#fff');
	$("#a-login").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-3').css('color','#fff');
	$("#a-3").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-4').css('color','#fff');
	$("#a-4").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-5').css('color','#fff');
	$("#a-5").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-6').css('color','#fff');
	$("#a-6").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});
	
	$('#a-7').css('color','#fff');
	$("#a-7").mouseenter(function() {
    		$(this).css("color", "#03b1dc");
		}).mouseleave(function() {
			$(this).css("color", "#fff");
	});

	$('#a-' + paginaDerivata).css('color','#03b1dc');
	$('#a-' + paginaDerivata).mouseleave(function(){
		$(this).css('color', '#03b1dc');
	});
	
	
	/*
	if(paginaDerivata == 'home'){
		$('#a-history').css('color','#fff');
		$('#a-brand').css('color','#fff');
	}else if(paginaDerivata == 'history'){
		$('#a-home').css('color','#fff');
		$('#a-brand').css('color','#fff');
	}
	*/
	

}