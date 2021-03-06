<?php
	class dbConnector {
		private $servername;
		private $dbname;
		private $username;
		private $passwd;
		private $charset;
		public $pdo;
		
		public function __construct() {
			define('__ROOT__', dirname(dirname(__FILE__)));
			require_once(__ROOT__."/config/db_config.php");
			$this->servername = SERVERNAME;
			$this->dbname = DBNAME;
			$this->username = USERNAME;
			$this->passwd = PASSWD;
			$this->charset = CHARSET;
			$dsn = "mysql:host=$this->servername;dbname=$this->dbname;charset=$this->charset";
			$opt = [
				PDO::ATTR_ERRMODE					=>	PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE	=>	PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES		=>	false,
			];
			$this->pdo = new PDO($dsn, $this->username, $this->passwd, $opt);
		}
	}
?>
