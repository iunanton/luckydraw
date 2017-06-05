<?php

/** myDatabase class
 *  described connection to mySQL database
 *  and common methods to work with it
 */
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
	
	/** Return associative array id => time
	 *  of service default time
	 *  @return associative array
	 */
	public function getDefaultTimeArray() {
		$sql = "SELECT id, time FROM default_time";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$defaultTime = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
		return $defaultTime;
	}
	
	/** Fill time_slots table
	 *	 by all service default time
	 *  and nothing to return
	 */
	public function fillTimeSlotTable($date) {
		//형 보고 싶어요
		$defaultTime = $this->getDefaultTimeArray();
		$sql = "INSERT INTO time_slots (date, time)";
		$sql.= " VALUES (:date, :time)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		foreach ($defaultTime as $key => $time) {
			$stmt->bindParam(':time', $key);
			$stmt->execute();
		}
	}
	
	/** Return array [id],[date],[time]
	 *  of time slots in database
	 *  @return array
	 */
	public function getAllTimeSlots() {
		$sql = "SELECT t.id, t.date, d.time";
		$sql.= " FROM time_slots AS t";
		$sql.= " JOIN default_time AS d";
		$sql.= " ON t.time = d.id";
		$sql.= " ORDER BY t.id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$TimeArray = $stmt->fetchAll();
		return $TimeArray;
	}

	/** Return array [id],[date],[time]
	 *  of time slots in database
	 *  from today
	 *  @return array
	 */
	public function getAllTimeSlotsFromToday() {
		$sql = "SELECT t.id, t.date, d.time";
		$sql.= " FROM time_slots AS t";
		$sql.= " JOIN default_time AS d";
		$sql.= " ON t.time = d.id";
		$sql.= " WHERE t.date >= CURRENT_DATE()";
		$sql.= " ORDER BY t.id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$TimeArray = $stmt->fetchAll();
		return $TimeArray;
	}

	/** Insert new reservation
	 *	 @time_slot INT
	 *  @name STRING
	 *  @tel STRING
	 *  @return nothing
	 */
	public function setReservation($time_slot, $name, $tel) {
		if($tel == '') {
			$sql = "INSERT INTO reservations (name, time_slot)";
			$sql.= " VALUES (:name, :time_slot)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':time_slot', $time_slot);
		} else {
			$sql = "INSERT INTO reservations (name, phone, time_slot)";
			$sql.= " VALUES (:name, :phone, :time_slot)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':phone', $tel);
			$stmt->bindParam(':time_slot', $time_slot);
		}
		$stmt->execute();
	}

	/** Select info about reservation
	 *	 @time_slot INT
	 *  @return array
	 */
	public function getTestInfo($time_slot) {
		$sql = "SELECT t.date, d.time";
		$sql.= " FROM time_slots AS t ";
		$sql.= "JOIN default_time AS d ON t.time = d.id";
		$sql.= " WHERE t.id = :time_slot";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':time_slot', $time_slot);		
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
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
	
	public function getAllReservations() {
		$sql = "SELECT r.id, t.date, d.time, r.name, r.phone, r.reservation_time";
		$sql.= " FROM reservations AS r";
		$sql.= " JOIN time_slots AS t ON r.time_slot = t.id";
		$sql.= " JOIN default_time AS d ON t.time = d.id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$reservations = $stmt->fetchAll();
		return $reservations;
	}
	public function getReservations($date) {
		$sql = "SELECT r.id, d.time, r.name, r.phone, r.reservation_time";
		$sql.= " FROM reservations AS r";
		$sql.= " JOIN time_slots AS t ON r.time_slot = t.id";
		$sql.= " JOIN default_time AS d ON t.time = d.id";
		$sql.= " WHERE t.date = :date";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':date', $date);
		$stmt->execute();
		$reservations = $stmt->fetchAll();
		return $reservations;
	}
}
?>