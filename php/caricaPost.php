<?php
require_once('../lib/acc_class.php');
$titolo = $_POST['titolo'];
$testo = $_POST['testo'];
$utente = $_POST['utente'];
$data = date("Y-m-d"); 

$acc = new ACCOUNT;

$acc->caricaPost($titolo, $testo, $utente, $data);
?>