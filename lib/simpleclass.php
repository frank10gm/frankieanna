<?php
function __autoload($nome_classe){
require_once($nome_classe.'php');
}

class SimpleClass
{
	//member
	public $var = 'frankie';
	
	//method
	public function displayVar()
		{
	
		echo $this->var;
		}
}

class ClasseEstesa extends SimpleClass
{
	function displayVar()
	{
	echo "extending class...\n";
	parent::displayVar();
	}
}

$ext = new ClasseEstesa();
$ext->displayVar();
echo "<br /><br />working on a new test server to have the new one ready earlier...";




?>