<?php
require_once("mail_class.php");
require_once("class_limite_utilizzi.php");
require_once("acc_class.php");

$nome_mittente = $_POST['mittenten'];
$mail_mittente = $_POST['emittente'];
$destinatario  = $_POST['destinatario'];
$oggetto	   = $_POST['oggetto'];
$messaggio	   = $_POST['messaggio'];

if($nome_mittente == NULL || $mail_mittente == NULL || $destinatario == NULL || $oggetto == NULL || $messaggio == NULL){
	echo("<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=anon\">");
	exit;
	}elseif(!eregi('^[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+$', $mail_mittente) || !eregi('^[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+$', $destinatario)){
	echo("<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=anon\">");
	exit;
	}

$acc = new ACCOUNT;
if($acc->ver_potere() == true){
	echo "admin";
	}else{
		echo "normal-user";
		$uso = new LIMITE;
		$uso->limita_usi();
	}




$invio = new MAIL;
$invio->invia_mail($nome_mittente, $mail_mittente, $destinatario, $oggetto, $messaggio);
echo("<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=err&err=0\">");

?>