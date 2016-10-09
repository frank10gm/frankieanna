<?php

class LIMITE{
	function limita_usi(){
		setcookie(md5("usi"), md5(1), time()+86400, "/");
		}}
?>