<?php
	class timeSlotsHandler {
		private $db_conn;
		public $results_per_page = 20;
		
		public function __construct() {
			require_once("dbconnector.class.php");
			$this->db_conn = new dbConnector();
		}
		
		public function getDefault() {
			$sql = "SELECT id, TIME_FORMAT(time, '%H:%i') AS time FROM default_time";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$timeSlots = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
			return $timeSlots;
		}
		
		public function get($date) {
			$sql = "SELECT s.id, TIME_FORMAT(d.time, '%H:%i') AS time";
			$sql.= " FROM time_slots AS s";
			$sql.= " JOIN default_time AS d ON s.time = d.id";
			$sql.= " LEFT JOIN reservations AS a ON s.id = a.time_slot";
			$sql.= " WHERE (a.id IS NULL OR a.cancelled)";
			$sql.= " AND s.date = :date";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':date', $date);
			$stmt->execute();
			$timeSlots = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
			return $timeSlots;
		}
		
		public function getTestInfo($time_slot) {
			$sql = "SELECT t.date, d.time";
			$sql.= " FROM time_slots AS t ";
			$sql.= "JOIN default_time AS d ON t.time = d.id";
			$sql.= " WHERE t.id = :time_slot";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':time_slot', $time_slot);		
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		}
		
		public function getCount() {
			$sql = "SELECT COUNT(id) AS total FROM time_slots";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return $count;
		}
		
		public function getPagesCount() {
			$sql = "SELECT COUNT(id) AS total FROM time_slots";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return ceil($count / $this->results_per_page);
		}
		
		public function getByPage($page = 1) {
			$start_from = ($page-1) * $this->results_per_page;
			$sql = "SELECT t.id, t.date, TIME_FORMAT(d.time, '%H:%i') AS time, r.id AS reservation";
			$sql.= " FROM time_slots AS t JOIN default_time AS d ON t.time = d.id";
			$sql.= " LEFT JOIN reservations AS r ON t.id = r.time_slot";
			$sql.= " ORDER BY t.id DESC LIMIT $start_from, $this->results_per_page";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$timeSlots = $stmt->fetchAll();
			return $timeSlots;
		}
		
		public function add($start_day, $end_day, $timeSlots) {
			$end_day->modify('+1 day');
			$interval = new DateInterval('P1D');
			$dateRange = new DatePeriod($start_day, $interval ,$end_day);
			$sql = "INSERT INTO time_slots (date, time)";
			$sql.= " VALUES (:date, :time)";
			$stmt = $this->db_conn->pdo->prepare($sql);
			foreach($dateRange as $day) {
				$date = $day->format('Y-m-d');
				$stmt->bindParam(':date', $date);
				foreach($timeSlots as $timeSlot) {
					$stmt->bindParam(':time', $timeSlot);
					$stmt->execute();
				}
			}
		}
		
		public function delete($timeSlot) {
			$sql = "DELETE FROM time_slots";
			$sql.= " WHERE id = :time";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':time', $timeSlot);
			$stmt->execute();
		}
		
	}
?>
