<h1 class="nome-utente"></h1>
<div class="profile" id="div-profile">
<a>Edit your profile:</a><br>
<span style="font-size:10px;">NB: only some elements can be changed.<br></span>
<br>
<span style="font-size:16px;">last loaded video: </span><span class="last-video edit-prof-el" style="font-size:16px;"></span><br>
<span style="font-size:16px;">username:          </span><span class="prof-username edit-prof-el" style="font-size:16px;"></span><br>
<span style="font-size:16px;">password:          </span><span class="prof-password edit-prof-el" style="font-size:16px;">########</span><br>
<span style="font-size:16px;">bike:          </span><span class="prof-moto edit-prof-el" style="font-size:16px;"></span><br>

<span style="font-size:16px;">avatar:          </span><span class="prof-avatar edit-prof-el" style="font-size:16px;"></span> <input id="avatarupload" type="file" name="files[]" data-url="users/avatars/" ><br>

<span style="font-size:16px;">bike's photo:          </span><span class="prof-foto-moto edit-prof-el" style="font-size:16px;"></span> <input id="motoupload" type="file" name="files[]" data-url="files/php/" multiple><br>

</div>

<br>

<div class="upload-result">
</div>

<div id="progress">
    <div class="bar" style="width: 0%;"></div>
</div>

<script src="js/file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="js/file-upload/js/jquery.iframe-transport.js"></script>
<script src="js/file-upload/js/jquery.fileupload.js"></script>

<script>

$(function () {
	//carica nome utente e avatar
	function checkProfile(){
		$.post('./php/checkProfile.php', { utente: utente })
	    .success(function(result){
	    	var obj = $.parseJSON( result );

	        //$('#upload-result').html(result);
	        avatar = result;
	        $('.nome-utente').html('<img id="avatar" src="users/avatars/files/' + obj.avatar + '" width="120" height="120" /> ');
			$('.nome-utente').append(utente);
			$('.prof-username').html(utente);
			$('.prof-avatar').html(obj.avatar);
			$('.prof-moto').html(obj.bike);
			$('.prof-foto-moto').html(obj.bike_photo);
	    })
	    .error(function(){
	        console.log('Error loading page');
	    });
	}
	
	checkProfile();
	
	
	//controlla ultimo video caricato
	$.post('./php/checkVideo.php', { utente: utente })
	    .success(function(result){
	        //$('#upload-result').html(result);
	        $('.last-video').html(result);
	    })
	    .error(function(){
	        console.log('Error loading page');
	    });

	//controllo delle dimensioni dell'estensione e del nome del file
    $('#avatarupload').fileupload({
        dataType: 'json',
        
        replaceFileInput: false,
        
        limitMultiFileUploads: 1,

        progressall: function (e, data) {
        	var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress .bar').css(
            	'width',
				progress + '%'
			);
		},
		
		/*add: function (e, data) {
            data.context = $('<p/>').text('Uploading...').appendTo(document.body);
            data.submit();
        },
		
		done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }*/
        
        add: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
			
			
			//clean progress bar
			var progress = 0;
			$('#progress .bar').css(
            	'width',
				progress + '%'
			);
        	
        	//check the input filed to match our's requests (and dimension)
			var ext = $('#avatarupload').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['jpg', 'jpeg', 'png', 'gif']) == -1) {
				//file type
				$('.upload-result').html('invalid filetype..');
			}
			else if(/^[a-zA-Z0-9-]*$/.test(str[0]) == false){
				//lettering del file
				$('.upload-result').html('invalid file name, it MUST has only A-Z a-z - and 0-9 characters..');
			}
			else if(data.files[0].size > 2000000){
				//file size
				$('.upload-result').html('your file exceeds the 2MB limit..');
			}
			else{
				$('.upload-result').html('');
				data.context = $('<a/>').text('Upload')
                .appendTo('.upload-result')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });
			}
		},
        
        done: function (e, data) {
        	var str = data.files[0].name;
            
            //$acc->caricaVideo($utente, ); "test.php", { name: "John", time: "2pm" }

            $.post('./php/caricaAvatar.php', { utente: utente, photo: str })
	        .success(function(result){
	            //$('.upload-result').html(result);
	            data.context.text(result + ' Upload finished!');
	            //checkProfile();
	            caricaModificaProfilo();
	        })
	        .error(function(){
	            console.log('Error loading page');
	        });
        }
        
    });
});

</script>