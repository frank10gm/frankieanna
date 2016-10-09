<br>
<br>
<div class="container profile" align="left">
	<h1 class="nome-utente"></h1>(<a onclick="logout();">logout</a>)
	<div class="profile" id="div-profile">
	<a>load your video for the contest.</a><br>
	<span style="font-size:10px;">NB: you can load more than one video, but only the last will be considered.<br></span>
	
	<span style="font-size:16px;">last loaded video: </span><span class="last-video" style="font-size:16px;"></span>
	<br>
	<input id="fileupload" type="file" name="files[]" data-url="files/php/" style="padding-top:7px;" multiple>
	</div>
	<br>
	<div id="upload-result">
	</div>
	<div id="progress">
	    <div class="bar" style="width: 0%;"></div>
	</div>
	
	
	<div id="post-blog">
		<strong>write a BLOG post.</strong>
		<br>
		<input type="text" class="form-control" id="title" placeholder="Enter title">
		<div id="summernote">Write here...</div>
		<button id="save" class="btn btn-primary" onclick="send()" type="button">Send</button>
		<button id="edit" class="btn btn-primary" onclick="edit()" type="button">Edit</button>
	</div>
</div>
		
<script>
	var save = function() {
		var aHTML = $('#summernote').code(); //save HTML If you need(aHTML: array).
		$('#summernote').destroy();
	};
	var edit = function() {
		$('#summernote').summernote({focus: true});
	};
	$(document).ready(function() {
		$('#summernote').summernote({
			height: 200,
			onImageUpload: function(files, editor, welEditable) {
				//$('#summernote').code('<strong>Works OK!</strong>');
				sendFile(files[0], editor, welEditable);
			}
		});
		
		if (potere < 100){
			$('#post-blog').html('');
		}
	});			
	
	//send the post for the blog
	var send = function(){
		var aHTML = $('#summernote').code();
		var title = $('#title').val();
		
		$.post('./php/caricaPost.php', { titolo: title, testo: aHTML, utente: utente })
		.success(function(result){
		    alert(result);
		    $('#title').html('');
		    $('#summernote').code('');
		    
		    $('#visualizzaBlog').load('include/blog/blog.php');
		})
		.error(function(){
	    	console.log('Error loading page');
		});
	};	
	
	
	function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "./blog/blog-img.php",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
    }
	
	//form2 substitute submit
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

<script src="js/file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="js/file-upload/js/jquery.iframe-transport.js"></script>
<script src="js/file-upload/js/jquery.fileupload.js"></script>

<script>

$(function () {
	//carica nome utente e avatar
	$.post('./php/checkAvatar.php', { utente: utente })
	    .success(function(result){
	        //$('#upload-result').html(result);
	        avatar = result;
	        $('.nome-utente').html('<br><img id="avatar" src="users/avatars/files/' + avatar + '" height="120" style="padding-top: 7px;" /> ');
	        
			$('.nome-utente').prepend(utente);
	    })
	    .error(function(){
	        console.log('Error loading page');
	    });
	
	
	//controlla ultimo video caricato
	$.post('./php/checkVideo.php', { utente: utente })
	    .success(function(result){
	        //$('#upload-result').html(result);
	        $('.last-video').append(result);
	    })
	    .error(function(){
	        console.log('Error loading page');
	    });

	//controllo delle dimensioni dell'estensione e del nome del file
    $('#fileupload').fileupload({
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
			var ext = $('#fileupload').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['mp4']) == -1) {
				//file type
				$('#upload-result').html('invalid filetype, you can only upload .mp4 files..');
			}
			else if(/^[a-zA-Z0-9-]*$/.test(str[0]) == false){
				//lettering del file
				$('#upload-result').html('invalid file name, it MUST has only A-Z a-z - and 0-9 characters..');
			}
			else if(data.files[0].size > 200000000){
				//file size
				$('#upload-result').html('your file exceeds the 200MB limit..');
			}
			else{
				$('#upload-result').html('');
				data.context = $('<a/>').text('Upload')
                .appendTo('#upload-result')
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });
			}
		},
        
        done: function (e, data) {
        	var str = data.files[0].name;
			str = str.split('.');
            
            //$acc->caricaVideo($utente, ); "test.php", { name: "John", time: "2pm" }

            $.post('./php/caricaVideo.php', { utente: utente, video: str[0] })
	        .success(function(result){
	            //$('#upload-result').html(result);
	            data.context.text(result + ' Upload finished!');
	        })
	        .error(function(){
	            console.log('Error loading page');
	        });
        }
        
    });
});

</script>