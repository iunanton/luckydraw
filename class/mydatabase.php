<?php
class myDatabase {
	private $servername = "localhost";
	private $username = "abackup";
	private $password = "simple11";
	private $dbname = "abackup";
	private $charset = 'utf8';
	private $pdo;
	public function __construct() {
		$dsn = "mysql:host=$this->servername;dbname=$this->dbname;charset=$this->charset";
		$opt = [
			PDO::ATTR_ERRMODE					=>	PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE	=>	PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES		=>	false,
		];
		$this->pdo = new PDO($dsn, $this->username, $this->password, $opt);
	}
	public function getDateArray() {
		$stmt = $this->pdo->prepare("SELECT date FROM service_times WHERE date >= CURDATE() GROUP BY date");
		$stmt->execute();
		$DateArray = $stmt->fetchAll(PDO::FETCH_COLUMN);
		return $DateArray;
	}
	public function getTimeArray($year, $month, $day) {
		$stmt = $this->pdo->prepare("SELECT s.id, d.time FROM service_times AS s JOIN default_times AS d ON s.time = d.id LEFT JOIN appointments AS a ON s.id = a.service_time WHERE a.id IS NULL AND s.date = STR_TO_DATE('$year,$month,$day','%Y,%m,%d') AND (s.date > CURDATE() OR (s.date = CURDATE() AND d.time > CURTIME()))");
		$stmt->execute();
		$TimeArray = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
		return $TimeArray;
	}
	public function getTestInfo($test) {
		$stmt = $this->pdo->prepare("SELECT s.date AS date, d.time AS time FROM service_times AS s JOIN default_times AS d ON s.time = d.id WHERE s.id = :test");
		$stmt->bindParam(':test', $test);		
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function setAppointment($test, $name, $tel) {
		$stmt = $this->pdo->prepare("INSERT INTO appointments (name, phone, service_time) VALUES (:name, :phone, :service_time)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':phone', $tel);
		$stmt->bindParam(':service_time', $test);
		$stmt->execute();
	}
}
?>
