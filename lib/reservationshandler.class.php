<?php
	class reservationsHandler {
		private $db_conn;
		public $results_per_page = 20;
		
		public function __construct() {
			require_once("dbconnector.class.php");
			$this->db_conn = new dbConnector();
		}
		
		public function getForToday() {
			$sql = "SELECT r.id, t.date, d.time, r.name, r.phone, r.reservation_time, r.cancelled";
			$sql.= " FROM reservations AS r JOIN time_slots AS t ON r.time_slot = t.id";
			$sql.= " JOIN default_time AS d ON t.time = d.id";
			$sql.= " WHERE t.date = CURDATE() AND NOT r.cancelled ORDER BY t.id ASC";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$reservations = $stmt->fetchAll();
			return $reservations;
		}
		
		public function getForTomorrow() {
			$sql = "SELECT r.id, t.date, d.time, r.name, r.phone, r.reservation_time, r.cancelled";
			$sql.= " FROM reservations AS r JOIN time_slots AS t ON r.time_slot = t.id";
			$sql.= " JOIN default_time AS d ON t.time = d.id";
			$sql.= " WHERE t.date = DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND NOT r.cancelled ORDER BY t.id ASC";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$reservations = $stmt->fetchAll();
			return $reservations;
		}
		
		public function getCount() {
			$sql = "SELECT COUNT(id)";
			$sql.= " FROM reservations";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return $count;
		}
		
		public function getPagesCount() {
			$sql = "SELECT COUNT(id)";
			$sql.= " FROM reservations";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			return ceil($count / $this->results_per_page);
		}
		
		public function getByPage($page = 1) {			
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
		
		public function set($time_slot, $name, $tel) {
			if($tel == '') {
				$sql = "INSERT INTO reservations (name, time_slot)";
				$sql.= " VALUES (:name, :time_slot)";
				$stmt = $this->db_conn->pdo->prepare($sql);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':time_slot', $time_slot);
			} else {
				$sql = "INSERT INTO reservations (name, phone, time_slot)";
				$sql.= " VALUES (:name, :phone, :time_slot)";
				$stmt = $this->db_conn->pdo->prepare($sql);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':phone', $tel);
				$stmt->bindParam(':time_slot', $time_slot);
			}
			$stmt->execute();
		}
		
		public function cancel($id) {
			$sql = "UPDATE reservations";
			$sql.= " SET cancelled = true";
			$sql.= " WHERE id = :id";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
				
	}
?>
