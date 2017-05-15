<?php
class myDatabase {
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;
	private $pdo;
	public function __construct() {
		$config = parse_ini_file('mydatabase.ini');
		$this->servername = $config['servername'];
		$this->username = $config['username'];
		$this->password = $config['password'];
		$this->dbname = $config['dbname'];
		$this->charset = $config['charset'];
		$dsn = "mysql:host=$this->servername;dbname=$this->dbname;charset=$this->charset";
		$opt = [
			PDO::ATTR_ERRMODE					=>	PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE	=>	PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES		=>	false,
		];
		$this->pdo = new PDO($dsn, $this->username, $this->password, $opt);
	}
	public function getValidDates() {
		$sql = "SELECT date";
		$sql.= " FROM service_times";
		if(strtotime(NOW) < strtotime(END_OF_BOOKING_TIME)) {
			$sql.= " WHERE date >= CURDATE()";
		} else {
			$sql.= " WHERE date > CURDATE()";
		}
		$sql.= " GROUP BY date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$DateArray = $stmt->fetchAll(PDO::FETCH_COLUMN);
		return $DateArray;
	}
	public function getTimeArray($date) {
		$sql = "SELECT s.id, d.time";
		$sql.= " FROM service_times AS s";
		$sql.= " JOIN default_times AS d ON s.time = d.id";
		$sql.= " LEFT JOIN appointments AS a ON s.id = a.service_time";
		$sql.= " WHERE a.id IS NULL";
		$sql.= " AND s.date = :date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
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
	public function getAppointments($date) {
		$sql = "SELECT a.id, d.time, a.name, a.phone, a.reservation_time";
		$sql.= " FROM appointments AS a";
		$sql.= " JOIN service_times AS s ON a.service_time = s.id";
		$sql.= " JOIN default_times AS d ON s.time = d.id";
		$sql.= " WHERE s.date = :date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		$stmt->execute();
		$appointments = $stmt->fetchAll();
		return $appointments;
	}
	public function getDefaultTimeArray() {
		$sql = "SELECT id, time";
		$sql.= " FROM default_times";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$defaultTimeArray = $stmt->fetchAll();
		return $defaultTimeArray;
	}
}
?>