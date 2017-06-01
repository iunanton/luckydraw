<?php
/** db class
 *  described connection to MySQL database
 *  and common methods to work with it
 */
	class db {
		private $servername;
		private $dbname;
		private $username;
		private $passwd;
		private $charset;
		private $pdo;
		public $results_per_page = 20; // number of results per page
		
		public function __construct() {
			require_once("config.php");
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
		
		public function getDefaultTimeSlots() {
			$sql = "SELECT id, time FROM default_time";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$timeSlots = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
			return $timeSlots;
		}
		
		public function getTimeSlotsCount() {
			$sql = "SELECT COUNT(id) AS total FROM time_slots";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return ceil($count / $this->results_per_page);
		}
		
		public function getTimeSlots($page = 1) {
			$start_from = ($page-1) * $this->results_per_page;
			$sql = "SELECT t.id, t.date, d.time, r.id AS reservation FROM time_slots AS t JOIN default_time AS d ON t.time = d.id LEFT JOIN reservations AS r ON t.id = r.time_slot ORDER BY t.id DESC LIMIT $start_from, $this->results_per_page";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$TimeArray = $stmt->fetchAll();
			return $TimeArray;
		}
		
		public function addTimeSlots($start_day, $end_day, $timeSlots) {
			$end_day->modify('+1 day');
			$interval = new DateInterval('P1D');
			$dateRange = new DatePeriod($start_day, $interval ,$end_day);
			$sql = "INSERT INTO time_slots (date, time)";
			$sql.= " VALUES (:date, :time)";
			$stmt = $this->pdo->prepare($sql);
			foreach($dateRange as $day) {
				$date = $day->format('Y-m-d');
				$stmt->bindParam(':date', $date);
				foreach($timeSlots as $timeSlot) {
					$stmt->bindParam(':time', $timeSlot);
					$stmt->execute();
				}
			}
		}
		
		public function deleteTimeSlot($timeSlot) {
			$sql = "DELETE FROM time_slots";
			$sql.= " WHERE id = :time";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':time', $timeSlot);
			$stmt->execute();
		}
		
		public function getReservations() {
			$sql = "SELECT r.id, t.date, d.time, r.name, r.phone, r.reservation_time";
			$sql.= " FROM reservations AS r";
			$sql.= " JOIN time_slots AS t ON r.time_slot = t.id";
			$sql.= " JOIN default_time AS d ON t.time = d.id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$reservations = $stmt->fetchAll();
			return $reservations;
		}
	}
?>
