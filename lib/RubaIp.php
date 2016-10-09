<?php

class RUBA{

public function ruba(){

if ($_SERVER['REMOTE_ADDR'] != "192.168.0.2" && $_SERVER['REMOTE_ADDR'] != "127.0.0.1"){
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