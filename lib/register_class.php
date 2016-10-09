<?php

class REGISTER{
	function reg_verify(){
		session_start();
		if(isset($_SESSION['user']) || isset($_COOKIE[md5('user')])){
		return(true);
		}}}

?>