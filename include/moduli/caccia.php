<h2>Una piazza... un tesoro!</h2>
<div class="row" id="ris-caccia">
	<form class="form-signin" role="form" id="form-caccia">
	
	<div align="center" id="risultato" class="col-lg-offset-3 col-lg-6">
		<h3>Modulo di iscrizione:</h3>
		<h6>
			
		</h6>
		<br>
		<div style="" >
				<label>Adulto</label>
				<input type="text" class="form-control" id="nome" placeholder="Nome (obbligatorio)" required>
				<input type="text" class="form-control" id="cognome" placeholder="Cognome (obbligatorio)" required>	
				<input type="text" class="form-control" id="telefono" placeholder="Telefono (obbligatorio)" required>
				<hr>
				<label>Bambino 1</label>
				<input type="text" class="form-control" id="nomeb1" placeholder="Nome" >
				<input type="text" class="form-control" id="cognomeb1" placeholder="Cognome" >
				<div class="form-group">
				   <label for="classeb1">classe</label>
				   <select  class="form-control" id="classeb1">
				  <option>3</option><option>4</option><option>5</option>
				   </select>
			   	</div>
			   	<br>
			   	<hr>
				<label>Bambino 2</label>
				<input type="text" class="form-control" id="nomeb2" placeholder="Nome" >
				<input type="text" class="form-control" id="cognomeb2" placeholder="Cognome" >
				<div class="form-group">
				   <label >classe</label>
				   <select  class="form-control" id="classeb2">
				    <option>3</option><option>4</option><option>5</option>
				   </select>
			   	</div>
			   	<br>
			   	<hr>
				<label>Bambino 3</label>
				<input type="text" class="form-control" id="nomeb3" placeholder="Nome" >
				<input type="text" class="form-control" id="cognomeb3" placeholder="Cognome" >
				<div class="form-group">
				   <label >classe</label>
				   <select  class="form-control" id="classeb3">
				    <option>3</option><option>4</option><option>5</option>
				   </select>
			   	</div>
			   	<br>
			   	<hr>
				<label>Bambino 4</label>
				<input type="text" class="form-control" id="nomeb4" placeholder="Nome" >
				<input type="text" class="form-control" id="cognomeb4" placeholder="Cognome" >
				<div class="form-group">
				   <label >classe</label>
				   <select  class="form-control" id="classeb4">
				   <option>3</option><option>4</option><option>5</option>
				   </select>
			   	</div>
			   	<br>
				<button id="save" class="btn btn-primary" type="submit">Iscriviti!</button>
		</div>
	</div>	
	
	</form>
</div>

<script>

$('#form-caccia').submit(function () {
 send();
 return false;
});

var send = function(){
		//var aHTML = $('#summernote').code();
		var nome = $('#nome').val();
		var cognome = $('#cognome').val();
		var telefono = $('#telefono').val();
		var nomeb1 = $('#nomeb1').val();
		var nomeb2 = $('#nomeb2').val();
		var nomeb3 = $('#nomeb3').val();
		var nomeb4 = $('#nomeb4').val();
		var cognomeb1 = $('#cognomeb1').val();
		var cognomeb2 = $('#cognomeb2').val();
		var cognomeb3 = $('#cognomeb3').val();
		var cognomeb4 = $('#cognomeb4').val();
		var classeb1 = $('#classeb1').val();
		var classeb2 = $('#classeb2').val();
		var classeb3 = $('#classeb3').val();
		var classeb4 = $('#classeb4').val();
		
		if(nome == "" || cognome == "" || telefono == "" ){
			return;
		}
		
		$.post('./php/caricaCaccia.php', { nome: nome, cognome: cognome, telefono: telefono, nomeb1: nomeb1, nomeb2: nomeb2, nomeb3: nomeb3, nomeb4: nomeb4, cognomeb1: cognomeb1, cognomeb2: cognomeb2, cognomeb3: cognomeb3, cognomeb4: cognomeb4, classeb1: classeb1, classeb2: classeb2, classeb3: classeb3, classeb4: classeb4 })
		.success(function(result){
		    alert(result);
		    $('#ris-caccia').html('<h3 style="color: red;">Grazie per esserti iscritto!!</h3>');
		    
		})
		.error(function(){
	    	console.log('Error loading page');
		});
	};
</script>