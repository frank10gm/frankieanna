<p>Inserisci nome utente e passowrd del database mysql: </p>
<table width="200" border="0">
  <tr>
    <td><form name="form1" method="get" action="">
      <label>user
        <input type="text" name="user">
      </label>
      <br>
      <label>pass
        <input type="password" name="pass">
      </label>
      <label>submit
        <input type="submit" name="Submit" value="Submit">
      </label>
    </form></td>
  </tr>
</table>
<?php
$user = $_GET["user"];
$pass = $_GET["pass"];
echo $user." is logging in...";




$mysqli = new mysqli("localhost", "root", "franci", "l2jdb");

$query1 = "SELECT login FROM accounts";
$result = $mysqli->query($query1);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
print_r($row);
}
if($row['login'] == 'root'){
print " welcome admin";
}else{
print " u are a stupid common user";
}

$mysqli->close();


 
?>