<div id="risultato-form" class="risultato-form">
</div>

<div id="form" class="form">
<table width="200" border="0">
          <tr>
            <td height="116"><div align="left">Se non ti sei ancora registrato clicca <a onclick="loadPage('#login', 'include/user/register.php', 'register');">qui</a><br><br></div>
              <form action="./include/user/elabora_login.php" method="post" name="form2" target="_self" id="form2">
                <label for="textfield">nickname:<br />
                </label>
                <input name="username" type="text" class="style1" id="textfield" />
                <br />
                <label></label>
                <label for="label2">password:<br />
                </label>
                <input name="pwd" type="password" class="style1" id="label2" />
                <br />
                <input name="submit" type="submit" class="style1" value="send" />
                <input name="clear" type="reset" class="style1" value="clear" />
                <br />
              </form></td>
          </tr>
</table>
</div>

<script>
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

pagina = 'login';
</script>