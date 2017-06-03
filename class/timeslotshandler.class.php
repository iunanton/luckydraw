<?php
	class timeSlotsHandler {
		private $db_conn;
		
		public function __construct() {
			require_once("dbconnector.class.php");
			$this->db_conn = new dbConnector();
		}
		
		public function getTimeSlots($date) {
			$sql = "SELECT s.id, d.time";
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
		
	}
?>
