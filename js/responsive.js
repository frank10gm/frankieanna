function centraH(elemento){
	var w = $(elemento).width();
	w = -(w/2)+'px';
	$(elemento).css({
		"position":"fixed",
		"left":"50%",
		"margin-left":w
	});
}

function centraV(elemento){
	var h = $(elemento).height();
	var t = $('html').height();
	h = -(h/2)+'px';
	t = t/2+'px';
	$(elemento).css({
		"margin-top":h,
		"top":t
	});
}

function dopoTesto(elemento){
	var b = $('#scr2').height() + $('#scr2').offset().top + 60 + 'px';
	$(elemento).css({
		"top":b
	});
}

function dopoEl(elemento, dopo, quantoDopo){
	var b = $(dopo).height() + $(dopo).offset().top + quantoDopo + 'px';
	$(elemento).css({
		"top":b
	});
}

function loadAcc(elemento,pulsante,testo, testo2){
	var o = $(elemento).css( "opacity" );
	if(o == 0){
		$(elemento).animate({
			opacity: 1
		}, 700, 'linear');
		$(pulsante).animate({opacity: 0}, 700, 'linear', function(){$(pulsante).html(testo2);$(pulsante).animate({opacity: 1}, 700, 'linear');});
	}else if(o == 1){
		$(elemento).animate({
			opacity: 0
		}, 700, 'linear');
		$(pulsante).animate({opacity: 0}, 700, 'linear', function(){$(pulsante).html(testo);$(pulsante).animate({opacity: 1}, 700, 'linear');});
		
		
	}
}

function loadMoto(elemento,pulsante,testo, testo2, c1, c2, c3, t1, t2, testo3, testo4){
	var o = $(elemento).css( "opacity" );
	if(o == 0){
		$(t1).html(testo3);
		$(t2).html(testo4);
		$(c1).animate({
			opacity: 0
		}, 700, 'linear');
		$(c2).animate({
			opacity: 0
		}, 700, 'linear');
		$(c3).animate({
			opacity: 0
		}, 700, 'linear');
		$(elemento).animate({
			opacity: 1
		}, 700, 'linear');
		$(pulsante).animate({opacity: 0}, 700, 'linear', function(){$(pulsante).html(testo);$(pulsante).animate({opacity: 1}, 700, 'linear');});
	}else if(o == 1){
		$(elemento).animate({
			opacity: 0
		}, 700, 'linear');
		$(c1).animate({
			opacity: 1
		}, 700, 'linear');
		$(pulsante).animate({opacity: 0}, 700, 'linear', function(){$(pulsante).html(testo2);$(pulsante).animate({opacity: 1}, 700, 'linear');});
		
		
	}	
}

function unloadMoto(elemento){
	$(elemento).animate({
			opacity: 0
		}, 1000, 'linear');
}