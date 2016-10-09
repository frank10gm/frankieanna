<?php 

function checkLogin($acc){
	//funzione di controllo se l'utente ha fatto il login
	if(isset($_SESSION['username'])){
	 	$utente = $_SESSION['username'];
	 	$potere = $acc->verPotere();
	 	?>
	 	<script>
	 	potere = "<?php echo($potere); ?>";
	 	utente = "<?php echo($utente); ?>";
	 	
	 	$('#login').load('./include/user/panel.php');
	 	</script>
	 	<?php
	}elseif(isset($_COOKIE[md5('username')])){
	 	$acc->sql_open();
	 	$db = $acc->db;
	 	$sql = "SELECT username FROM accounts";
	 	if(!$result = $db->query($sql)){
			die("error: [". $db->error . "]");
		}
	
		while($row = $result->fetch_assoc()){
		//echo $row['info'] . '<br>';
			if(("d" . sha1("uc") . md5($row['username']) . "a" . sha1("ti")) == $_COOKIE[md5('username')]){
				$utente = $row['username'];
				$potere = $acc->verPotere();
				?>
				<script>
				utente = "<?php echo($utente); ?>";
				potere = "<?php echo($potere); ?>";
				
				$('#login').load('./include/user/panel.php');
				</script>
				<?php
			}
		}
		
		$result->free();
		
		$acc->sql_close();
	}
	
	/*$acc->sql_open();
	$db = $acc->db;
	
	$query = "SELECT info FROM info WHERE id = '2'";
	
	if(!$result = $db->query($query)){
		die("error: [". $db->error . "]");
	}
	
	while($row = $result->fetch_assoc()){
		//echo $row['info'] . '<br>';
	}
	
	//echo 'Total results: ' . $result->num_rows;
	
	$acc->sql_close();*/
}

checkLogin($acc);
?>