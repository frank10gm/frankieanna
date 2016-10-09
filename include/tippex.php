<div id="include-container" style="">

<!--<h1 id="" style="z-index:101;"><img src="images/rotella.png" alt="rotella" width="600" height="290" style="position:static; z-index:1; top: 0px; right: 200px;"/></h1>-->
<img id="image" src="images/background/cerchio.png" alt="cerchio" width="25%" style="position:absolute; right:0px; top: 35px;"/>
<div id="div-video1">
<a onclick="cambiaVideo();" style="" id="play">play</a>
<input id="fai" type="text" name="fname" size="35" hidden="true" style="">
<a id="invia" hidden="true" onclick="prova();" style="">invia</a>
<br><br>
<video id="video1" width="720" height="405" style="">
    <source src="" type="video/mp4" id="mainChannel">	
</video>
<br>
</div>

</div>

<script type="text/javascript">

/*var rotation = function (){
   $("#image").rotate({
      angle:0, 
      animateTo:360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();*/

$("#image").rotate({ 
   bind: 
     { 
        mouseover : function() { 
            $(this).rotate({animateTo:180})
        },
        mouseout : function() { 
            $(this).rotate({animateTo:0})
        }
     } 
   
});

// variabili
pagina = 'home';

$(document).ready(function() {
	
	player = new MediaElementPlayer('#video1',{
        alwaysShowControls: false,
        videoVolume: 'horizontal',
        //features: ['playpause','progress','volume','fullscreen']
        features: []
    });

});

</script>