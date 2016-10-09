<?php
class DATABASE
	{
		var $db;
		var $host = "hostingmysql262.register.it";
		var $user = "AADP2_frank10gm";
		var $pass = "checazzovuoi";
		var $dbname = "festadeibambini_org_db";
	
		function sql_open()
		{
			$this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			return($this->db);
		}
	

		function sql_close()
		{
			$this->db->close();
		}
	}
?>