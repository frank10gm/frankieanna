<?php
require_once("mysql_class.php");

class ACCOUNT extends DATABASE
{	
	//variabili


	//funzioni
	
	function creaDB(){
		//funzione da utilizzare solo all'inizio
		$this->sql_open();
		$db = $this->db;
		
		$sql = "CREATE TABLE accounts
				(
				id 				int 			NOT NULL 	AUTO_INCREMENT,
				username 		varchar(255) 	NOT NULL,
				password 		varchar(255) 	NOT NULL,
				email 			varchar(255) 	NOT NULL,
				firstname 		varchar(255),
				address 		varchar(255),
				city 			varchar(255),
				cod_verifica	varchar(255),
				
				PRIMARY KEY (id)
				)";
				
		if(!$db->query($sql)){
			die("error: [". $db->error . "]");
		}		
		
		$this->sql_close();
	}
	
	function proteggi($lettera, $parola1, $oggetto, $parola2, $numero){
		$result = "$lettera" . sha1("$parola1") . md5($oggetto) . "$parola2" . sha1("$numero");
		return $result;
	}
	
	//funzione verifica dell'utente durante la registrazione
	function verifica_utente($username, $mail)
	{
		$this->sql_open();
		$db = $this->db;
		//$sql = "SELECT username, email FROM accounts";
		
		$stmt = $db->prepare('SELECT username, email FROM accounts');
		//$stmt->bind_param('s', $name);
		
		$stmt->execute();
		
		$result = $stmt->get_result();
	
		while($row = $result->fetch_assoc()){
			if($row['username'] == $username){
				echo('nome utente non disponibile..');
				$result->free();
				$this->sql_close();
				return 1;
			}
			else if($row['email'] == $mail){
				echo('indirizzo mail gi&agrave; utilizzato..');
				$result->free();
				$this->sql_close();
				return 1;
			}
		}
		
		$stmt->close();
		$result->free();
		$this->sql_close();
		
	}
	//fine funzione verifica dell'utente durante la registrazione
	
	//funzione di login	
	function login($username, $password, $check){
		
		//elimina potere
		setcookie($this->proteggi("d","uc","power","a","ti"), "", time()-3600, "/");

		$check = 1;
	
		$this->sql_open();
		$db = $this->db;
		//$sql = "SELECT username, password, cod_verifica, potere FROM accounts";
		$stmt = $db->prepare('SELECT username, password, cod_verifica, power FROM accounts');
		
		//$stmt = $db->prepare('SELECT * FROM employees WHERE name = ?');
		//$stmt->bind_param('s', $name);
		
		$this->verificato = 2;
		
		/*if(!$result = $db->query($sql)){
			die("error: [". $db->error . "]");
		}*/
		$stmt->execute();
		
		//following method not compatible in many webservers...
		//$result = $stmt->get_result();
		
		/* bind result variables */
    	$stmt->bind_result($user, $pass, $code, $pot);
		
		/* fetch values */
    	while ($stmt->fetch()) {
			if($user == $username && $pass == ($this->proteggi('d','uc',$password,'a','ti'))){
				if($code == "1"){	
					$potere = $pot;				
					if($pot == 100){
						setcookie($this->proteggi("d","uc","power","a","ti"), $this->proteggi("d","uc",100,"a","ti"), time()+3000000, "/");
					}
					else{
						setcookie($this->proteggi("d","uc","power","a","ti"), $this->proteggi("d","uc",$pot,"a","ti"), time()+3000000, "/");
					}
					$this->loggato = true;
					$this->verificato = 1;
					break;
				}else{
					$this->loggato = false;
					$this->verificato = 0;
				}
			}else{
				$this->loggato = false;
			}
    	}
		
		//old fetch values
		/*while($row = $result->fetch_assoc()){
			
		}*/

		if($this->loggato == false && $this->verificato == 2){
			echo "nome utente o password sbagliati..";
		}else if($this->loggato == false && $this->verificato == 0){
			echo "$username, questo account non &egrave; stato verificato..";
		}else{		
					
			session_start(); //inizio sessione
			$_SESSION['username'] = $username;
			$this->ricorda($username, $check);
			?>
			<script>
			utente = '<?php echo($username); ?>';
			potere = '<?php echo($potere); ?>';

			$('#login').load('./include/user/panel.php');
			</script>
			<?php
		}
		
		//$result->free();
		$stmt->close();
		$this->sql_close();
	}
	//fine funzione	di login		
	
	
	function ver_mail($email, $user){
		$codice = rand();
		$cod_criptato = md5($codice);
		$mex = "Benvenuto $user
		
per completare la registrazione clicca sul seguente link:
http://www.ducatiscrambler.com/insert_code.php?code=$cod_criptato&user=$user
--------------------------
verification code: $cod_criptato
--------------------------
		
Non rispondere al messaggio, &egrave; un messaggio automatico!";
	
		mail($email, "Registrazione al mondo Scrambler", $mex, "From: Administrator <scrambler@ducati.com>");

		$this->sql_open();
		$db = $this->db;
		//$sql = "UPDATE accounts SET cod_verifica = '$cod_criptato' WHERE username = '$user'";
		
		$stmt = $db->prepare('UPDATE accounts SET cod_verifica = ? WHERE username = ?');
		$stmt->bind_param('ss', $cod_criptato, $user);
		
		$stmt->execute();
		
		/*$result = $stmt->get_result();
		if(!$db->query($sql)){
			die("error: [". $db->error . "]");
		}*/
		
		$stmt->close();
		$this->sql_close();
	}

	function ricorda($username, $check){
		if($check == 1){
			setcookie(md5("username"), ("d" . sha1("uc") . md5($username) . "a" . sha1("ti")), time()+3000000, "/");
			$_SESSION['ric'] = "sarai ricordato";
		}
	}//fine funzione
	
	function logout(){
		session_start();
		$_SESSION=array(); 
		session_destroy();
		setcookie(md5("username"), "", time()-3600, "/");
		setcookie($this->proteggi("d","uc","power","a","ti"), "", time()-3600, "/");
		?>
			<script>
			potere = 0;
            </script>
		<?php
		//echo "you did the logout";

	}//fine funzione

	//funzione verifica potere
	function verPotere(){
		if($_COOKIE[$this->proteggi("d","uc","power","a","ti")] == $this->proteggi("d","uc",100,"a","ti")){
		return 100;
		}
	}//fine funzione

	function verifica_registrazione($user, $code){
		$this->sql_open();
		$result = mysql_query("SELECT cod_verifica FROM accounts WHERE login = '$user'");
		$row = mysql_fetch_row($result);

		if($row[0] == $code){
			mysql_query("UPDATE accounts SET cod_verifica = '', verifica = '1' WHERE login = '$user'");
			echo "complimenti! il tuo account &egrave; ora verificato<br><br>hackweb";
		}else{
			echo "il tuo codice &egrave; scaduto";
		}
		$this->sql_close();
	}
	
/* ------------- VIDEO ------------- */

	function caricaVideo($user, $video){
		$video = $video . ".mp4";
		
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "UPDATE accounts SET video = '$video' WHERE username = '$user'";

		if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}
		
		echo($video);

		$this->sql_close();
	}

/* ------------- PROFILO ------------- */	
	
	function caricaAvatar($user, $photo){
		
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "UPDATE accounts SET avatar = '$photo' WHERE username = '$user'";

		if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}
		
		echo($photo);

		$this->sql_close();
	}
	
	function checkVideo($user){
		
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "SELECT video FROM accounts WHERE username = '$user'";

		if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}
		
		while($row = $result->fetch_assoc()){
			echo($row['video']);
		}
		
		$result->free();
		$this->sql_close();
	}
	
	function checkAvatar($user){
		
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "SELECT avatar FROM accounts WHERE username = '$user'";

		if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}
		
		while($row = $result->fetch_assoc()){
			echo($row['avatar']);
		}
		
		$result->free();
		$this->sql_close();
	}
	
	function checkProfile($user){
		
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "SELECT avatar, bike, bike_photo FROM accounts WHERE username = '$user'";

		if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}
		
		while($row = $result->fetch_assoc()){
			echo(json_encode($row));
		}
	
		$result->free();
		$this->sql_close();
	}
	
	
	/* ------------- BLOG ------------- */

	function caricaPost($titolo, $testo, $utente, $data){
	
		$this->sql_open();
		
		$db = $this->db;
		
		//$sql = "INSERT INTO blog (title, content, autor, date) VALUES ('$titolo', '$testo', '$utente', '$data')";
		
		$stmt = $db->prepare('INSERT INTO blog (title, content, autor, date) VALUES (?, ?, ?, ?)');
		$stmt->bind_param('ssss', $titolo, $testo, $utente, $data);
		
		$stmt->execute();
		
		echo("Operation completed.");
		
		$stmt->close();
		$this->sql_close();
	}
	
	function visualizzaPost(){
		
		$this->sql_open();
		
		$db = $this->db;
		
		//$sql = "SELECT id, title, content, date, autor FROM blog ORDER BY id DESC";	
		
		$stmt = $db->prepare('SELECT id, title, content, date, autor FROM blog ORDER BY id DESC');
		//$stmt->bind_param('ssss', $titolo, $testo, $utente, $data);
		
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		//more than 1 json result
		
		/*if(!$result = $db->query($sql)){
			$this->sql_close();
			die("error: [". $db->error . "]");
		}*/
		
		$rows = [];
		
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		
		echo(json_encode($rows));
	
		$stmt->close();
		$result->free();
		$this->sql_close();
		
	}
	
	//concorso
	function caricaFotoConcorso($nome, $cognome, $mail, $data, $luogo, $indirizzo, $foto1, $foto2, $foto3){
	
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "INSERT INTO concorso_foto (nome, cognome, data_nascita, comune_nascita, indirizzo, mail, foto1, foto2, foto3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $db->prepare($sql);
		
		$stmt->bind_param('sssssssss', $nome, $cognome, $data, $luogo, $indirizzo, $mail, $foto1, $foto2, $foto3);
		
		if ($stmt->execute()) { 
			echo("Complimenti $nome! ora sei iscritto al concorso!!");
		} else {
		   echo("c'è stato un problema.. manda una mail a frank10gm@gmail.com");
   		}
		
		
		
		$stmt->close();
		$this->sql_close();
	}
	
	//palio
	function caricaPalio($nome, $cognome, $mail, $data, $telefono, $corporazione){
	
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "INSERT INTO palio (nome, cognome, mail, telefono, age, corporazione) VALUES (?, ?, ?, ?, ?, ?)";
		
		$stmt = $db->prepare($sql);
		
		$stmt->bind_param('ssssss', $nome, $cognome, $mail, $telefono, $data, $corporazione);
		
		if ($stmt->execute()) { 
			echo("Complimenti $nome! ora sei iscritto al Grande Palio!!");
		} else {
		   echo("c'è stato un problema.. manda una mail a info@festadeibambini.org");
   		}
		
		
		
		$stmt->close();
		$this->sql_close();
	}
	
	//caccia
	function caricaCaccia($nome, $cognome, $telefono, $nomeb1, $nomeb2, $nomeb3, $nomeb4, $cognomeb1, $cognomeb2, $cognomeb3, $cognomeb4, $classeb1, $classeb2, $classeb3, $classeb4){
	
		$this->sql_open();
		
		$db = $this->db;
		
		$sql = "INSERT INTO caccia (nome, cognome, telefono, nomeb1, nomeb2, nomeb3, nomeb4, cognomeb1, cognomeb2, cognomeb3, cognomeb4, classeb1, classeb2, classeb3, classeb4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $db->prepare($sql);
		
		$stmt->bind_param('sssssssssssssss', $nome, $cognome, $telefono, $nomeb1, $nomeb2, $nomeb3, $nomeb4, $cognomeb1, $cognomeb2, $cognomeb3, $cognomeb4, $classeb1, $classeb2, $classeb3, $classeb4);
		
		if ($stmt->execute()) { 
			echo("Complimenti $nome! ora sei iscritto alla Caccia al Tesoro!!");
		} else {
		   echo("c'è stato un problema.. manda una mail a info@festadeibambini.org");
   		}
		
		
		
		$stmt->close();
		$this->sql_close();
	}

	
}
//chiusura classe

?>
