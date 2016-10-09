<map id="x" name="x">
<area shape="circle" alt="" title="" coords="482,51,47"  />
<area shape="circle" alt="" title="" coords="423,183,82" />
<area shape="circle" alt="" title="" coords="659,358,99" />
<area shape="circle" alt="" title="" coords="161,188,54" />
<area shape="circle" alt="" title="" coords="259,362,69" />
</map>

<!--<img src="images/configurator/standard.png" alt="standard" width="768" height="491" usemap="#x" onmouseout="scompari();"/>-->
<img src="images/configurator/standard.png" id="standard" alt="wood" width="500" height="320" style="position:absolute; left: 30%; top: 20%; opacity:1; z-index: -5;"/>
<img src="images/configurator/ft.png" id="full" alt="ft" width="500" height="320" style="position:absolute; left: 30%; top: 20%; z-index: -4; opacity: 0;"/>
<img id="ue" src="images/configurator/ue.png" alt="ue" width="500" height="320" style="position:absolute; left: 30%; top: 20%; opacity: 0; z-index: -3;"/>
<img src="images/configurator/wood.png" id="wood" alt="wood" width="500" height="320" style="position:absolute; left: 30%; top: 20%; opacity:0; z-index: -2;"/>

<div id="pulsanti">
<a onmouseover="loadVersion('#full')" onmouseout="unloadVersion('#full');">Full Throttle</a>&nbsp;&nbsp;&nbsp;
<a onmouseover="loadVersion('#ue')" onmouseout="unloadVersion('#ue');">Urban Enduro</a>&nbsp;&nbsp;&nbsp;
<a onmouseover="loadVersion('#wood');" onmouseout="unloadVersion('#wood');">Woodstock</a>
</div>

<div id="access">
	<img id="image" src="images/configurator/cerchi/1.jpg" width="18%" style="position:absolute; left: 55%; top: 60%; opacity:0;" />
	<img id="image2" src="images/configurator/manubrio/1.jpg" width="18%" style="position:absolute; left: 60%; top: 30%; opacity:0;" />
</div>

<script>
$('#access').append('');

function compari(){
	//loadAccessory("#image", 140, 140);
}

function scompari(){
	//unloadAccessory("#image", 140, 140);
}
</script>