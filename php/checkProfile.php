<?php
require_once('../lib/acc_class.php');
$utente = $_POST['utente'];

$acc = new ACCOUNT;

$acc->checkProfile($utente);
?>