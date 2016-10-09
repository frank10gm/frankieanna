<?php 

class MATE
	{
		function quadrato($num)
			{
				return $num * $num;
			}
	}
	
$mat = new MATE;
echo $mat->quadrato(20);

?>