<?php 
require_once("mysql_class.php");
require_once("acc_class.php");
$acc = new ACCOUNT;

if($_POST['form'] == 1){
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$mail = $_POST['mail'];
	$telefono = $_POST['telefono'];
	$urgenza = $_POST['urgenza'];
	$descrizione_richiesta = $_POST['descrizione_richiesta'];
	$headers = 'From: h@ckweb webmaster <webmaster@hackweb.altervista.org>' . "\r\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "Content-Transfer-Encoding: 7bit\n\n";
	
	if($nome == "" || $mail == "" || $urgenza == "" || $descrizione_richiesta == ""){
		echo "<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=err&err=8\">";
	}else{
		//mysql
		$acc->sql_open();
		$query = "INSERT INTO assistenza (nome, cognome, mail, telefono, urgenza, tipo, descrizione) VALUES('$nome' , '$cognome', '$mail', '$telefono', '$urgenza', '$tipo_richiesta', '$descrizione_richiesta')";
		mysql_query($query);
		$acc->sql_close();
		//mail
		mail("frank10gm@gmail.com", "h@ckweb assistance: $tipo_richiesta", "<html><head></head><body>nome: $nome <br>cognome: $cognome <br>mail: $mail <br>telefono: $telefono <br>urgenza: $urgenza <br><br>descrizione:<br>					$descrizione_richiesta<br><br><br><br></body></html>", $headers);
		echo "<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=assistenza&richiesta=1\">";
	}
}

?>
	