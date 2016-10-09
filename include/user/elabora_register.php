<?php
require_once("../../lib/acc_class.php");

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$mail = $_POST['mail'];
$text = $_POST['object'];
$last_ip = $_SERVER['REMOTE_ADDR'];

$mex = "capo abbiamo un nuovo utente.. ecco i suoi dati..

--------------------------------------------
nick:		$username
password:	$pwd
mail:		$mail
ip:			$last_ip
--------------------------------------------

questo è il suo messaggio:

$text
";

//verifica nome utente 
$acc = new ACCOUNT;

if($acc->verifica_utente($username, $mail) != 1){
	//controllo campi
	if($username == NULL || $pwd == NULL || $pwd2 == NULL || $mail == NULL){
		echo($username . ' completa tutti i campi per favore..');
	}
	elseif($pwd != $pwd2){
		echo($username . '.. le password non coincidono..');
	}elseif(eregi('^[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+$', $mail)){
		$acc->sql_open();
		$db = $acc->db;
		//inseriamo i dati
		$pwd = $acc->proteggi('d','uc',$pwd,'a','ti');
		
		$sql = "INSERT INTO accounts (username, password, email) VALUES('$username' , '$pwd', '$mail')";
		if(!$db->query($sql)){
			die("error: [". $db->error . "]");
		}
		
		$acc->sql_close();
		
		//invia il codice di verifica all'utente
		$acc->ver_mail($mail, $username);
		
		echo($username . ' ti sei registrato!!');
		
		?>
			<script>
				$('#form').html("Controlla la tua mail per confermare la tua iscrizione!");
			</script>
		<?php
		
		
		
	}else{
		
		echo($username . ' inserisci una mail corretta..');
	} //else
}


?>
