<?php
//require_once("../security/security.php");
require_once('acc_class.php');
$nick = $_POST['username'];
$pass = $_POST['password'];
$check = $_POST['ricordami'];

if(!isset($check)){
	$check = "nric";
	}


$acc = new ACCOUNT;
$acc->sql_open();

$acc->login($nick, $pass, $check);

$acc->sql_close();

?>