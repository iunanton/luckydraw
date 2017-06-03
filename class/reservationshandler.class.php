<?php
	class reservationsHandler {
		private $db_conn;
		public $results_per_page = 20;
		
		public function __construct() {
			require_once("dbconnector.class.php");
			$this->db_conn = new dbConnector();
		}
		
/*		public function getTimeSlots($date) {
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
		}*/
		
		public function getReservationsCount() {
			$sql = "SELECT COUNT(id)";
			$sql.= " FROM reservations";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return $count;
		}
		
		public function getReservationsPagesCount() {
			$sql = "SELECT COUNT(id)";
			$sql.= " FROM reservations";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return ceil($count / $this->results_per_page);
		}
		
		public function getReservationsByPage($page = 1) {			
			$start_from = ($page-1) * $this->results_per_page;
			
			$sql = "SELECT r.id, t.date, d.time, r.name, r.phone, r.reservation_time, r.cancelled";
			$sql.= " FROM reservations AS r JOIN time_slots AS t ON r.time_slot = t.id";
			$sql.= " JOIN default_time AS d ON t.time = d.id";
			$sql.= " ORDER BY t.id DESC LIMIT $start_from, $this->results_per_page";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$reservations = $stmt->fetchAll();
			return $reservations;
		}
		
		public function cancelReservation($id) {
			$sql = "UPDATE reservations";
			$sql.= " SET cancelled = true";
			$sql.= " WHERE id = :id";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
				
	}
?>
