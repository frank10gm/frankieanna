<?php

class RUBA{

function ruba(){

if ($_SERVER['REMOTE_ADDR'] != "81.208.83.233" && $_SERVER['REMOTE_ADDR'] != "127.0.0.1"){
 			 $da = date('d M y - H:i:s');
			 $fp = fopen('ip_rubati.txt', 'a');
			 fwrite($fp, $da);
			 fwrite($fp, " : ");
			 fwrite($fp, $_SERVER['REMOTE_ADDR']); 
			 fwrite($fp, "\n");
			 fclose($fp);
			 }
			 
			 }
			 }
?>			 