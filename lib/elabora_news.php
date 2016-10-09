<?php
require_once("mysql_class.php");
require_once("acc_class.php");
$acc = new ACCOUNT;

$testo = $_POST['testo'];
$data = date('d/m/y');

//mysql
$acc->sql_open();
$query = "INSERT INTO news (data, testo) VALUES ('$data', '$testo')";
mysql_query($query);
$acc->sql_close();

echo "<meta http-equiv=\"refresh\" content=\"0;url=/home.php?cat=a_news\">";

?>