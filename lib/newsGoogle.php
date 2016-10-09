<?php
if(isset($_GET['lingua'])){
	header("Content-type: text-xml; charset=UTF-8");
	echo file_get_contents("../rss/news_irlanda.xml");
}else{
	echo "non è stata selezionata alcuna lingua";
}
?>