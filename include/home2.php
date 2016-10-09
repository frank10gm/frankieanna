<div id="include-container" style="">

<h1 id="" style="z-index:101;"><img src="images/rotella.png" alt="rotella" width="600" height="290" style="position:static; z-index:1; top: 0px; right: 200px;"/></h1>

<div id="div-video1">
<a onclick="cambiaVideo();" style="" id="play">play</a>
<input id="fai" type="text" name="fname" size="35" hidden="true" style="">
<a id="invia" hidden="true" onclick="prova();" style="">invia</a>
<br><br>
<video id="video1" width="720" height="405" style="">
    <source src="video/deus.mp4" type="video/mp4" id="mainChannel">	
</video>
</div>

</div>

<script type="text/javascript">

// variabili
pagina = 'home';

$(document).ready(function() {
	
	player = new MediaElementPlayer('#video1',{
        alwaysShowControls: false,
        videoVolume: 'horizontal',
        features: ['playpause','progress','volume','fullscreen']
   
    });

});

</script>