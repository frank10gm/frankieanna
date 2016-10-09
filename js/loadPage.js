function loadPage(elemento, paginaF, doveSiamo){
	if (doveSiamo != pagina){
		pagina = doveSiamo;
		$(elemento).animate({
			opacity: 0
		}, 500, function(){
			$(elemento).load(paginaF);
		});
	
		$(elemento).animate({
			opacity: 1
		}, 1000);
	}
}

function loadElement(elemento){
	$(elemento).animate({
			opacity: 1
		}, 500, function(){
			setTimeout(function() {
				$(elemento).animate({ opacity: 0 }, 500);
			}, 3000);
	});
}

function paroleACaso(elemento, testo){
	$(elemento).html(testo);
	$(elemento).animate({
					opacity: 1
				}, 500, function(){
					setTimeout(function() {
						$(elemento).animate({ opacity: 0 }, 500);
				}, 3000);
			});
}