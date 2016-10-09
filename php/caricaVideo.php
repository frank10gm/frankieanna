<?php
require_once('../lib/acc_class.php');
$utente = $_POST['utente'];
$video = $_POST['video'];

$acc = new ACCOUNT;

$acc->caricaVideo($utente, $video);
?>