<div id="video-container" style="" align="left">
</div>

<div id="video-top" class="video-top" align="left">free spirit</div>


<script type="text/javascript">

// variabili
pagina = 'video';
tempoVideo = '';

//var videoMan = '<video id="video2" height="'+ $(window).height()/2 +'" style=""><source src="video/515.mp4" type="video/mp4" id="mainChannel"></video>';
var videoMan = '<video id="video2" width="100%" height="720" style=""><source src="video/scr-old.mp4" type="video/mp4" id="mainChannel"></video>';


$('#video-container').append(videoMan);

$(window).height();

$(document).ready(function() {
	
	player = new MediaElementPlayer('#video2',{
        alwaysShowControls: false,
        videoVolume: 'horizontal',
        //features: ['playpause','progress','volume','fullscreen']
        features: [],
        success: function (mediaElement, domObject) { 
		
		// add event listener
		mediaElement.addEventListener('timeupdate', function(e) {		
			tempoVideo = mediaElement.currentTime
		}, false);
		
		mediaElement.addEventListener('ended', function(e) {		
			$('#video-top').animate({
				opacity: 0
			}, 500, function(){
				setTimeout(function() {
					$('#video-top').html('The new Scrambler waits you...');
					$('#video-top').animate({ opacity: 1 }, 1000);
				}, 3000);
			});	
			}, false);

	
		// call the play method
			mediaElement.play();
		
		},
	// fires when a problem is detected
	error: function () { 
	
	}
    });
    
        
    //posiziona elementi nella pagina
	//$('#video-top')
	var videoContainer = $('#video2');
	
	var offset = videoContainer.offset();
	var top = offset.top;
	var bottom = top + videoContainer.height();
	var newPos = ($(window).height()/2 + 60) + 'px';
	
	$('#video-top').css({ top: newPos });
	
    

});

counter = 0;

$('#video-top').animate({ opacity: 1}, 1000, function() {
    $('#video-top').animate({ opacity: 1}, 1000, function() {
    	$('#video-top').animate({ opacity: 0}, 1000, function() {
    		$('#video-top').html('post-heritage');
    		$('#video-top').css({left: 700, top:500, color: 'red'});
    		$('#video-top').animate({ opacity: 0}, 1000, function() {
    			$('#video-top').animate({ opacity: 1}, 1000, function() {
    				$('#video-top').animate({ opacity: 1}, 1000, function() {
    					$('#video-top').animate({ opacity: 0}, 1000, function() {
    						$('#video-top').html('self expression');
							$('#video-top').css({left: 100, top:370, color: 'black'});
							$('#video-top').animate({ opacity: 1}, 1000, function() {
							});
						});
					});	
    			});
    		});
    	});
    });
});


//loadVideo(videoN);

</script>