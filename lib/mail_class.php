<?php

class MAIL{

	function invia_mail($nome_mittente, $mail_mittente, $destinatario, $oggetto, $messaggio){
		mail($destinatario, $oggetto, $messaggio, "From: $nome_mittente <$mail_mittente>");
		}
		
}
?>		