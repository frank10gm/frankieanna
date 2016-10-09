<?php
require_once('../lib/acc_class.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$telefono = $_POST['telefono'];
$nomeb1 = $_POST['nomeb1'];
$nomeb2 = $_POST['nomeb2'];
$nomeb3 = $_POST['nomeb3'];
$nomeb4 = $_POST['nomeb4'];
$cognomeb1 = $_POST['cognomeb1'];
$cognomeb2 = $_POST['cognomeb2'];
$cognomeb3 = $_POST['cognomeb3'];
$cognomeb4 = $_POST['cognomeb4'];
$classeb1 = $_POST['classeb1'];
$classeb2 = $_POST['classeb2'];
$classeb3 = $_POST['classeb3'];
$classeb4 = $_POST['classeb4'];


//echo("$nome, $cognome, $mail, $data, $luogo, $indirizzo, $foto1, $foto2, $foto3");

$acc = new ACCOUNT;


$acc->caricaCaccia($nome, $cognome, $telefono, $nomeb1, $nomeb2, $nomeb3, $nomeb4, $cognomeb1, $cognomeb2, $cognomeb3, $cognomeb4, $classeb1, $classeb2, $classeb3, $classeb4);

?>