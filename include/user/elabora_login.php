<?php

require_once("../../lib/acc_class.php");

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$last_ip = $_SERVER['REMOTE_ADDR'];

//verifica nome utente 
$acc = new ACCOUNT;

$acc->login($username, $pwd, "1");

?>