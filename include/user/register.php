
<div id="risultato-form" class="risultato-form">
</div>


<div id="form" class="form">
<table width="200" border="0">
          <tr>
            <td height="116"><div align="left">completa il form:<br><br>* = facoltativo<br><br></div>
              <form action="./include/user/elabora_register.php" method="post" name="form2" target="_self" id="form2">
                <label for="textfield">nickname:<br />
                </label>
                <input name="username" type="text" class="style1" id="textfield" />
                <br />
                <label></label>
                <label for="label2">password:<br />
                </label>
                <input name="pwd" type="password" class="style1" id="label2" />
                <br />
                <label for="label3">confirm pw:</label>
                <br />
                <input name="pwd2" type="password" class="style1" id="label3" />
                <br />
                <label for="label"> mail:</label>
                <br />
                <input name="mail" type="text" class="style1" id="label" />
                <br />
                
                <br>
                <label>*lascia un messaggio:
                <textarea name="object" class="style1"></textarea>
                </label>
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
    $.post('./include/user/elabora_register.php', data)
        .success(function(result){
            $('#risultato-form').html(result);
        })
        .error(function(){
            console.log('Error loading page');
        })
    return false;
});

pagina = 'register';
</script>