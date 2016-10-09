<?php
require_once('../lib/acc_class.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['mail'];
$data = $_POST['data'];
$telefono = $_POST['telefono'];
$corporazione = $_POST['corporazione'];


//echo("$nome, $cognome, $mail, $data, $luogo, $indirizzo, $foto1, $foto2, $foto3");

$acc = new ACCOUNT;


$acc->caricaPalio($nome, $cognome, $mail, $data, $telefono, $corporazione);

?>