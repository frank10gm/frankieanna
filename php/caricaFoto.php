<?php
require_once('../lib/acc_class.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['mail'];
$data = $_POST['data'];
$luogo = $_POST['luogo'];
$indirizzo = $_POST['indirizzo'];
$foto1 = $_POST['file1'];
$foto2 = $_POST['file2'];
$foto3 = $_POST['file3'];

//echo("$nome, $cognome, $mail, $data, $luogo, $indirizzo, $foto1, $foto2, $foto3");

$acc = new ACCOUNT;


$acc->caricaFotoConcorso($nome, $cognome, $mail, $data, $luogo, $indirizzo, $foto1, $foto2, $foto3);

?>