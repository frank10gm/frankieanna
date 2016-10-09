<?php
require_once('../lib/acc_class.php');
$utente = $_POST['utente'];
$photo = $_POST['photo'];

$acc = new ACCOUNT;

$acc->caricaAvatar($utente, $photo);
?>