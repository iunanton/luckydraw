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
	public function getDefaultTimeArray() {
		$sql = "SELECT id, time FROM default_time";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$defaultTime = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
		return $defaultTime;
	}
	public function fillTimeSlotTable($date) {
		//형 보고 싶어요
		$defaultTime = $this->getDefaultTime();
		$sql = "INSERT INTO time_slots (date, time)";
		$sql.= " VALUES (:date, :time)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		foreach ($defaultTime as $key => $time) {
			$stmt->bindParam(':time', $key);
			$stmt->execute();
		}
	}
	public function getValidDates() {
		$sql = "SELECT date";
		$sql.= " FROM time_slots";
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
	public function getAllServiceTime() {
		$sql = "SELECT s.id, s.date, d.time";
		$sql.= " FROM time_slots AS s";
		$sql.= " JOIN default_time AS d";
		$sql.= " ON s.time = d.id";
		$sql.= " ORDER BY s.id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$TimeArray = $stmt->fetchAll();
		return $TimeArray;
	}
	public function getTimeArray($date) {
		$sql = "SELECT s.id, d.time";
		$sql.= " FROM time_slots AS s";
		$sql.= " JOIN default_time AS d ON s.time = d.id";
		$sql.= " LEFT JOIN reservations AS a ON s.id = a.time_slot";
		$sql.= " WHERE a.id IS NULL";
		$sql.= " AND s.date = :date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		$stmt->execute();
		$TimeArray = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
		return $TimeArray;
	}
	public function getTestInfo($test) {
		$stmt = $this->pdo->prepare("SELECT s.date AS date, d.time AS time FROM time_slots AS s JOIN default_time AS d ON s.time = d.id WHERE s.id = :test");
		$stmt->bindParam(':test', $test);		
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function setAppointment($test, $name, $tel) {
		$stmt = $this->pdo->prepare("INSERT INTO reservations (name, phone, time_slot) VALUES (:name, :phone, :time_slot)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':phone', $tel);
		$stmt->bindParam(':time_slot', $test);
		$stmt->execute();
	}
	public function getAllReservtions() {
		$sql = "SELECT a.id, d.time, a.name, a.phone, a.reservation_time";
		$sql.= " FROM reservations AS a";
		$sql.= " JOIN time_slots AS s ON a.time_slot = s.id";
		$sql.= " JOIN default_time AS d ON s.time = d.id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$reservations = $stmt->fetchAll();
		return $reservations;
	}
	public function getReservations($date) {
		$sql = "SELECT a.id, d.time, a.name, a.phone, a.time";
		$sql.= " FROM reservations AS a";
		$sql.= " JOIN time_slots AS s ON a.time_slot = s.id";
		$sql.= " JOIN default_time AS d ON s.time = d.id";
		$sql.= " WHERE s.date = :date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		$stmt->execute();
		$reservations = $stmt->fetchAll();
		return $reservations;
	}
}
?>