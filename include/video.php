<br>
<br>
<br>

<video id="video2" width="720" height="405">
    <source src="video/macklemore.mp4" type="video/mp4" id="mainChannel">	
</video>

<div class="elenco-media" style="">
	Play video:
	<br>
	<a onclick="loadVideo('video/macklemore.mp4');">Macklemore</a>
	<br>
	<a onclick="loadVideo('video/deus.mp4');">Deus</a>
</div>



<script type="text/javascript">

// variabili
pagina = 'video';

$(document).ready(function() {
	
	player = new MediaElementPlayer('#video2',{
        alwaysShowControls: false,
        videoVolume: 'horizontal',
        features: ['playpause','progress','volume','fullscreen']
        //features: []
    });

});


</script>