function prova(){
	
	var src;
	var testo = $('#fai').val().toLowerCase();
	
	
	if(testo.indexOf('scoreggi') != -1){
		clearTimeout(timeout);
		src = "video/2.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo == 'uccidi mario' || testo.indexOf('mario') != -1 && testo.indexOf('uccid') != -1){
		clearTimeout(timeout);
		src = "video/3.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('triumph') != -1 || testo.indexOf('kawasak') != -1 || testo.indexOf('harley') != -1 || testo.indexOf('deus') != -1){
		clearTimeout(timeout);
		src = "video/4.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo == 'raccoglie le mele'){
		clearTimeout(timeout);
		src = "video/5.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('schiaccia') != -1 && testo.indexOf('noc') != -1){
		clearTimeout(timeout);
		src = "video/6.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo == 'si sposa'){
		clearTimeout(timeout);
		src = "video/7.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo == 'ama claudio'){
		clearTimeout(timeout);
		src = "video/9.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo == 'scrambler'){
		clearTimeout(timeout);
		src = "video/10.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('odia') != -1 && testo.indexOf('rocco') != -1){
		clearTimeout(timeout);
		src = "video/11.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('vola') != -1){
		clearTimeout(timeout);
		src = "video/12.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('ama') != -1 && testo.indexOf('bambin') != -1){
		clearTimeout(timeout);
		src = "video/13.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}else if(testo.indexOf('scommette') != -1 ){
		clearTimeout(timeout);
		src = "video/14.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}
	
	
	
	else{
		clearTimeout(timeout);
		src = "video/8.mp4";
		player.pause();
		player.setSrc(src);
		player.play();
		timeout = setTimeout("player.pause();", 4500);
		
	}
	
}