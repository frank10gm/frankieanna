<div class="title-fascia">#concorso fotografico</div>
<h2>Una speranza per Bologna: cosa muove l'uomo a costruire?</h2>
<div class="row" id="ris-conc">
	<form class="form-signin" role="form" id="form-conc">
	
	<div class="col-lg-offset-1 col-lg-4" align="center">
		<h3>Puoi caricare fino a 3 foto:</h3>
		<h5 style="color:red;">il file DEVE contenere nome e cognome del partecipante<br>es: m-rossi-1.jpg</h5><br>
		
		<input class="file-inputs" data-filename-placement="inside" title="Search for a file to add" id="fileupload" type="file" name="files[]" data-url="files/" style="padding-top:0px;" required>
		<div id="upload-result" style="font-size:10px; color:red;"></div>
		<div class="progress">
		  <div id="progress" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
		    0%
		  </div>
		</div>
		
		<input class="file-inputs" id="fileupload2" type="file" title="Search for a file to add" name="files[]" data-url="files/" style="padding-top:0px;">
		<div id="upload-result2" style="font-size:10px; color:red;"></div>
		<div class="progress">
		  <div id="progress2" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
		    0%
		  </div>
		</div>
		
		<input class="file-inputs" id="fileupload3" type="file" title="Search for a file to add" name="files[]" data-url="files/" style="padding-top:0px;">
		<div id="upload-result3" style="font-size:10px; color:red;"></div>
		<div class="progress">
		  <div id="progress3" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
		    0%
		  </div>
		</div>
		
		<h2>In palio uno zaino fotografico TENBA!</h2>
		<img src="/2014/img/concorso/zaino-tenba.jpg" width="300px" alt="Premio: zaino TENBA!" />
		<br>
		Dopo aver caricato una o più foto, compila il modulo sulla destra!
	</div>
	
	<div align="center" id="risultato" class="col-lg-offset-1 col-lg-4">
		<h3>Modulo di iscrizione:</h3>
		<br>
		<div style="" >
			
				<input type="text" class="form-control" id="nome" placeholder="Nome" required>
				<input type="text" class="form-control" id="cognome" placeholder="Cognome" required>		
				<input type="email" class="form-control" id="mail" placeholder="Mail" required>
				<input type="date" class="form-control" id="data" placeholder="Data di nascita" required>
				<input type="text" class="form-control" id="luogo" placeholder="Luogo di nascita" required>
				<input type="text" class="form-control" id="indirizzo" placeholder="Indirizzo" required>
				<div class="checkbox">
				  <label>
				    <input type="checkbox" id="info" value="aaa" required>
					    Accetto il regolamento ed il trattamento dei dati, come indicato dall'informativa sulla privacy.<br>I dati sopra inseriti non verranno visualizzati in nessuna parte del sito.<br/>
					    Le foto verranno valutate con giudizio insindacabile da una giuria composta dagli organizzatori del concorso e da professionisti del settore, i quali nomi verranno resi noti solo al termine del concorso.
				  </label>
				</div>
				<br>
		
				<p>
				  Per completare l'iscrizione devi compilare e firmare i seguenti documenti (puoi mandarceli via mail all'indirizzo <a href="concorsofotografico@festadeibambini.org">concorsofotografico@festadeibambini.org</a>):
				  <a href="./files/concorso/regolamento-concorso.pdf">Regolamento</a><br />
				  <a href="./files/concorso/scheda-iscrizione-concorso.pdf">Scheda d'iscrizione</a><br />
				  <a href="./files/concorso/liberatoria-concorso.pdf">Liberatoria immagini</a>
				</p>
				<button id="save" class="btn btn-primary" type="submit">Iscriviti!</button>
		</div>
	</div>	
	
	</form>
</div>

<script>

$('#form-conc').submit(function () {
 send();
 return false;
});

var send = function(){
		//var aHTML = $('#summernote').code();
		var nome = $('#nome').val();
		var cognome = $('#cognome').val();
		var mail = $('#mail').val();
		var data = $('#data').val();
		var luogo = $('#luogo').val();
		var indirizzo = $('#indirizzo').val();	
		var info = $('#info').val();	
		var file1 = $('#fileupload').val();
		var file2 = $('#fileupload2').val();
		var file3 = $('#fileupload3').val();
		
		if(nome == "" || cognome == "" || mail == "" || data == "" || luogo == "" || indirizzo == "" || $('#info').prop("checked") == false ){
			return;
		}
		
		$.post('./php/caricaFoto.php', { nome: nome, cognome: cognome, mail: mail, data: data, luogo: luogo, indirizzo: indirizzo, file1: file1, file2: file2, file3: file3 })
		.success(function(result){
		    alert(result);
		    $('#ris-conc').html('<h3>Grazie per esserti iscritto!!</h3>');
		    
		})
		.error(function(){
	    	console.log('Error loading page');
		});
	};
</script>

<script src="js/file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="js/file-upload/js/jquery.iframe-transport.js"></script>
<script src="js/file-upload/js/jquery.fileupload.js"></script>

<script>

$(function () {

	$('.file-inputs').bootstrapFileInput();
	//controllo delle dimensioni dell'estensione e del nome del file
    $('#fileupload').fileupload({
        dataType: 'json',
        
        replaceFileInput: false,
        
        limitMultiFileUploads: 1,

        progressall: function (e, data) {
        	var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress').css(
            	'width',
				progress + '%'
			);
			$('#progress').html(progress + '%');
		},
        
        add: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			//clean progress bar
			var progress = 0;
			$('#progress').css(
            	'width',
				progress + '%'
			);
			$('#progress').html(progress + '%');
        	
        	//check the input filed to match our's requests (and dimension)
			var ext = $('#fileupload').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['jpg', 'jpeg']) == -1) {
				//file type
				$('#upload-result').html('Tipo di file non valido.. sono ammessi SOLO .jpg e .jpeg');
				$('#fileupload').val('');
			}
			else if(/^[a-zA-Z0-9-]*$/.test(str[0]) == false){
				//lettering del file
				$('#upload-result').html('Nome file non valido, può contenere SOLO i seguenti caratteri: A-Z a-z - 0-9');
				$('#fileupload').val('');
			}
			else if(data.files[0].size > 20000000){
				//file size
				$('#upload-result').html('La dimensione massima è di 20MB..')
				$('#fileupload').val('');;
			}
			else{
				$('#upload-result').html('');
				data.submit();
				
				/*data.context = $('<a/>').text('Upload')
                .appendTo('#upload-result')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });*/
			}
		},
        
        done: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			//
			//data.context.text( ' Upload finished!');
			
			$('#progress').html('caricata e pronta per l\'invio');
				$('#progress').css(
            		'width',
					100 + '%'
				);
            
            //$acc->caricaVideo($utente, ); "test.php", { name: "John", time: "2pm" }
/*
            $.post('./php/caricaVideo.php', { utente: utente, video: str[0] })
	        .success(function(result){
	            //$('#upload-result').html(result);
	            data.context.text(result + ' Upload finished!');
	        })
	        .error(function(){
	            console.log('Error loading page');
	        });
*/	        
        }
        
    });
    
    $('#fileupload2').fileupload({
        dataType: 'json',
        
        replaceFileInput: false,
        
        limitMultiFileUploads: 1,

        progressall: function (e, data) {
        	var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress2').css(
            	'width',
				progress + '%'
			);
			$('#progress2').html(progress + '%');
		},
        
        add: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			//clean progress bar
			var progress = 0;
			$('#progress2').css(
            	'width',
				progress + '%'
			);
			$('#progress2').html(progress + '%');
        	
        	//check the input filed to match our's requests (and dimension)
			var ext = $('#fileupload2').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['jpg', 'jpeg']) == -1) {
				//file type
				$('#upload-result2').html('Tipo di file non valido..');
				$('#fileupload2').val('');
				
			}
			else if(/^[a-zA-Z0-9-]*$/.test(str[0]) == false){
				//lettering del file
				$('#upload-result2').html('Nome file non valido, può contenere SOLO i seguenti caratteri: A-Z a-z - 0-9');
				$('#fileupload2').val('');
			}
			else if(data.files[0].size > 20000000){
				//file size
				$('#upload-result2').html('La dimensione massima è di 20MB..');
				$('#fileupload2').val('');
			}
			else{
				$('#upload-result2').html('');
				data.submit();
				$('#progress2').html('caricata e pronta per l\'invio');
				$('#progress2').css(
            		'width',
					100 + '%'
				);
				/*data.context = $('<a/>').text('Upload')
                .appendTo('#upload-result')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });*/
			}
		},
        
        done: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			$('#progress2').html('caricata e pronta per l\'invio');
				$('#progress2').css(
            		'width',
					100 + '%'
				);
			
			//
			//data.context.text( ' Upload finished!');
            
            //$acc->caricaVideo($utente, ); "test.php", { name: "John", time: "2pm" }
/*
            $.post('./php/caricaVideo.php', { utente: utente, video: str[0] })
	        .success(function(result){
	            //$('#upload-result').html(result);
	            data.context.text(result + ' Upload finished!');
	        })
	        .error(function(){
	            console.log('Error loading page');
	        });
*/	        
        }
        
    });
    
    $('#fileupload3').fileupload({
        dataType: 'json',
        
        replaceFileInput: false,
        
        limitMultiFileUploads: 1,

        progressall: function (e, data) {
        	var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress3').css(
            	'width',
				progress + '%'
			);
			$('#progress3').html(progress + '%');
		},
        
        add: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			//clean progress bar
			var progress = 0;
			$('#progress3').css(
            	'width',
				progress + '%'
			);
			$('#progress3').html(progress + '%');
        	
        	//check the input filed to match our's requests (and dimension)
			var ext = $('#fileupload3').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['jpg', 'jpeg']) == -1) {
				//file type
				$('#upload-result3').html('Tipo di file non valido..');
				$('#fileupload2').val('');
			}
			else if(/^[a-zA-Z0-9-]*$/.test(str[0]) == false){
				//lettering del file
				$('#upload-result3').html('Nome file non valido, può contenere SOLO i seguenti caratteri: A-Z a-z - 0-9');
				$('#fileupload2').val('');
			}
			else if(data.files[0].size > 20000000){
				//file size
				$('#upload-result3').html('La dimensione massima è di 20MB..');
				$('#fileupload2').val('');
			}
			else{
				$('#upload-result3').html('');
				data.submit();
				$('#progress3').html('caricata e pronta per l\'invio');
				$('#progress3').css(
            		'width',
					100 + '%'
				);
				/*data.context = $('<a/>').text('Upload')
                .appendTo('#upload-result')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });*/
			}
		},
        
        done: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			$('#progress3').html('caricata e pronta per l\'invio');
				$('#progress3').css(
            		'width',
					100 + '%'
				);
			//
			//data.context.text( ' Upload finished!');
            
            //$acc->caricaVideo($utente, ); "test.php", { name: "John", time: "2pm" }
/*
            $.post('./php/caricaVideo.php', { utente: utente, video: str[0] })
	        .success(function(result){
	            //$('#upload-result').html(result);
	            data.context.text(result + ' Upload finished!');
	        })
	        .error(function(){
	            console.log('Error loading page');
	        });
*/	        
        }
        
    });
});

</script>