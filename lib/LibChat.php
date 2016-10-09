<?php
require_once('mysql_class.php');

function memChat(){
	//$nome_n = stripslashes($_GET['name']);
	//$messaggio_n = stripslashes($_GET['msg']);
	$nome = htmlentities($_GET['name']);
	$messaggio = htmlentities($_GET['msg']);

	/*for($i = 0; $i < 6; $i++){
		switch(i){
			case 0:
				$nome = str_replace("à", "&agrave;", $nome_n);
				$messaggio = str_replace("à", "&agrave;", $messaggio_n);
			break;
			case 1:
				$nome = str_replace("è", "&egrave;", $nome_n);
				$messaggio = str_replace("è", "&egrave;", $messaggio_n);
			break;
			case 2:
				$nome = str_replace("é", "&eacute;", $nome_n);
				$messaggio = str_replace("é", "&eacute;", $messaggio_n);
			break;
			case 3:
				$nome = str_replace("ì", "&igrave;", $nome_n);
				$messaggio = str_replace("ì", "&igrave;", $messaggio_n);
			break;
			case 4:
				$nome = str_replace("ò", "&ograve;", $nome_n);
				$messaggio = str_replace("ò", "&ograve;", $messaggio_n);
			break;
			case 5:
				$nome = str_replace("ù", "&ugrave;", $nome_n);
				$messaggio = str_replace("ù", "&ugrave;", $messaggio_n);
			break;
		}
	}
	*/
	$date = date('d M y - H:i:s');
	
	//database
	$db = new DATABASE;
	$db->sql_open();

	//esecuzione queries
	$query = "INSERT INTO chat (utente, testo, data) VALUES ('$nome', '$messaggio', '$date')";
	mysql_query($query);
	
	//chiusura database
	$db->sql_close();
	
	writeChat();

}

function writeChat(){
	//database
	$db = new DATABASE;
	$db->sql_open();

	//esecuzione queries
	$query = "SELECT id, utente, data, testo FROM chat ORDER BY id DESC LIMIT 11";
	$result = mysql_query($query);
	$i = 0;
	
	while($row = mysql_fetch_array($result)){
		$r_data[$i] = $row['data'];
		$r_utente[$i] = $row['utente'];
		$r_testo[$i] = $row['testo'];
		$i++;
	}
	
	$file = fopen('../chat/chat.txt', 'w');
	$b = 10;
	
	while($b >= 0){
		fwrite($file, "$r_data[$b] : <span style=\"color:#006600\"><strong>$r_utente[$b]</strong> --></span> $r_testo[$b]<br>");
		$b--;
	}
	fclose($file);
	
	//chiusura database
	$db->sql_close();
}

if($_GET['get'] != 1 && $_GET['name'] != ""){
	memChat();
	echo(file_get_contents("../chat/chat.txt"));
}else{
	echo(file_get_contents("../chat/chat.txt"));
}
?>
	
		