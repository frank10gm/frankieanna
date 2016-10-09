<div class="container-signin" align="left">
	<br><br><br><br><br><br><br>
	<form class="form-signin" role="form" method="post" name="form2" target="_self" id="form2">
	<h2 class="form-signin-heading">Please Log in</h2>
	<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
	<input type="password" class="form-control" placeholder="Password" name="pwd" required>
	<label class="checkbox">
	<input type="checkbox" value="remember-me"> Remember me
	</label>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	</form>
	<br>
	<div id="risultato-form" align="center"></div>
</div>	

<script type="text/javascript">		
	$('#form2').submit(function(event){
    var data = $(this).serialize();
    $.post('./include/user/elabora_login.php', data)
        .success(function(result){
            $('#risultato-form').html(result);
        })
        .error(function(){
            console.log('Error loading page');
        })
    return false;
	});
</script>