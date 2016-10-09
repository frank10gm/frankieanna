<script>

$(function () {
	//carica nome utente e avatar
	function checkProfile(){
		$.post('./php/visualizzaPost.php')
	    .success(function(result){
	    	var obj = $.parseJSON( result );
	    	
	    	$.each(obj, function(i, object) {
				$.each(object, function(property, value) {
					if(property == 'title'){
						var testo = '<div id="blog-' + i + '" class="blog-post"><h2 class="blog-post-title">' + value + '</h2><p><span class="blog-post-meta" id="blog-date-' + i + '">April 3, 2014 by <a href="#" id="blog-autor-' + i + '">Abso</a></span></p></div>';
						$(testo).appendTo('#visualizzaBlog');
						//$('#visualizzaPost').append(testo);
					}
					else if(property == 'content'){
						var testo = '<p>' + value + '</p>';
						$(testo).appendTo('#blog-' + i);
						//$('#visualizzaPost').append();
					}
					else if(property == 'date'){
						var testo = value + ' by <a href="#" id="blog-autor-' + i + '"></a>';
						$('#blog-date-' + i).html(testo);
						//$(testo).appendTo('#blog-' + i);
						//$('#visualizzaPost').append();
					}
					else if(property == 'autor'){
						var testo = '' + value + '';
						$('#blog-autor-' + i).html(testo);
						//$(testo).appendTo('#blog-' + i);
						//$('#visualizzaPost').append();
					}
					//console.log(property + "=" + value);
				});
			});
			$('#visualizzaBlog').append('<ul class="pager"><li><a href="#">Previous</a></li><li><a href="#">Next</a></li></ul>');
	    })
	    .error(function(){
	        console.log('Error loading page');
	    });
	}
	
	checkProfile();
	
});

</script>