function checkWidth(){
	if (document.body.clientWidth < 500){
		$('.item').css({"width":"245px"});
	} else if (document.body.clientWidth > 500 && $('.item').width() < 270){
		$('.item').css({"width":"280px"});
	}
}

function goTop(){
	$('html, body').animate({
						scrollTop: ($("#0-slide").offset().top - 20)
					}, 1000);
}

/* VIDEO */

function loadVideo(src){
	player.pause();
	player.setSrc(src);
	player.play();
}

function cambiaVideo(){
	var src = "video/1.mp4";
	//$('#video1').pause();

	//$('#mainChannel').attr('src','video/macklemore.mp4');
	//$('#video1').load();
	//$('#video1').play();
	
	clearTimeout(timeout);
	
	player.pause();
	player.setSrc(src);
	player.load();
	player.play();
	timeout = setTimeout("player.pause();", 4500);
	$('#play').html("scrivi l'azione di Franco: ");
	$('#fai').show();
	$('#invia').show();
}

/* --------------- PROFILE --------------- */

function personalizzaMenu(user, power){
	/*var menu = '<ul id="user-menu"><li><a onclick="caricaModificaProfilo();" class="edit-profile">edit profile</a></li><li><a onclick="logout();">logout</a></li></ul>';
 	$('#a-login').html(utente);
 	//$('#login').addClass('has-dropdown',0);
 	$('#li-login').attr('class','has-dropdown');
 	$('#a-login').attr('onclick','');
 	$('#li-login').append(menu);
 	$('#user-menu').attr('class','dropdown');
 	$(document).foundation();*/
 	
 	utente = user;
 	potere = power;
/* 	var menu = '<ul id="user-menu" class="dropdown-menu"><li><a href="" onclick="caricaModificaProfilo();" class="edit-profile">edit profile</a></li><li><a href="" onclick="logout();">logout</a></li></ul>';
 	$('#a-login').removeClass('nav-link');
 	$('#li-login').addClass('dropdown');
 	//$('#li-login').append(menu);
 	$('#a-login').addClass('dropdown-toggle');
 	$('#a-login').html(utente + ' <b class="caret">');
 	$("#a-login").attr("href", "#")*/
}

function ripristinaMenu(){
	//$('#li-login').html('<a id="a-login" class="login" href="#login">Login</a>');
	$('#li-login').removeClass('dropdown');
	//$('#a-login').attr('class','login');
	$('#a-login').html("Login");
	//$('#fine').html("You logged out.");
	//setTimeout("$('#fine').html('')", 3000);
	//loadElement('#fine');
	//$(document).foundation();
	
	//$('#login').load('./include/user/login.php');
}

function logout(){
	var data = $(this).serialize();
    $.post('php/elabora_logout.php', data)
        .success(function(result){
            $('#fine').html(result);
			$('#login').load('include/user/login2.php');
            //ripristinaMenu();
            //svuota modifica profilo
            //chiudiModificaProfilo();
        })
        .error(function(){
            console.log('Error loading page');
        }) 
        return false;
}

function caricaModificaProfilo(){
	$('#edit-profile').load('./include/user/edit-profile.php');
}

function chiudiModificaProfilo(){
	$('#edit-profile').html('');
}


/* --------------- CONFIGURATOR --------------- */

function loadAccessory(elemento, vleft, vtop){
	var image = $(elemento);
	var position = image.position();
	var vleft = position.left + vleft;
	var vtop = position.top - vtop;
	
	$(elemento).animate({
			opacity: 1,
			left : vleft,
			top : vtop
		}, 700, 'linear');
}

function unloadAccessory(elemento, vleft, vtop){
	var image = $(elemento);
	var position = image.position();
	var vleft = position.left - vleft;
	var vtop = position.top + vtop;

	$(elemento).animate({
			opacity: 0,
			left : vleft,
			top : vtop
		}, 700, 'linear');
}

function loadVersion(elemento){
	$(elemento).animate({
			opacity: 1
		}, 400, 'linear');
}

function unloadVersion(elemento){
	$(elemento).animate({
			opacity: 0
		}, 400, 'linear');
}