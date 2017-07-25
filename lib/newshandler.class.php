<?php
	class newsHandler {
		private $db_conn;
		
		public function __construct() {
			require_once("dbconnector.class.php");
			$this->db_conn = new dbConnector();
		}
		
		public function getTitles() {
			$sql = "SELECT n.id, l.lang, n.date, n.title";
			$sql.= " FROM news AS n";
			$sql.= " LEFT JOIN languages AS l";
			$sql.= " ON n.lang = l.id";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->execute();
			$titles = $stmt->fetchAll();
			return $titles;
		}
		
		public function getByID($id) {
			$sql = "SELECT lang, date, title, content";
			$sql.= " FROM news";
			$sql.= " WHERE id = :id";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$article = $stmt->fetch(PDO::FETCH_ASSOC);
			return $article;
		}
		
		public function getByLang($lang) {
			$sql = "SELECT n.title, n.content, DATE(n.date) AS date";
			$sql.= " FROM news AS n LEFT JOIN languages AS l ON n.lang = l.id";
			$sql.= " WHERE l.short = :lang OR n.lang IS NULL";
			$sql.= " ORDER BY n.date DESC";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':lang', $lang);
			$stmt->execute();
			$article = $stmt->fetchAll();
			return $article;
		}
		
		public function add($lang, $title, $content) {
			if($lang == '') {
				$sql = "INSERT INTO news (title, content)";
				$sql.= " VALUES (:title, :content)";
				$stmt = $this->db_conn->pdo->prepare($sql);
				$stmt->bindParam(':title', $title);
				$stmt->bindParam(':content', $content);
			} else {
				$sql = "INSERT INTO news (lang, title, content)";
				$sql.= " VALUES (:lang, :title, :content)";
				$stmt = $this->db_conn->pdo->prepare($sql);
				$stmt->bindParam(':lang', $lang);
				$stmt->bindParam(':title', $title);
				$stmt->bindParam(':content', $content);
			}
			$stmt->execute();
		}
		
		public function delete($id) {
			$sql = "DELETE FROM news";
			$sql.= " WHERE id = :id";
			$stmt = $this->db_conn->pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
		
	}
?>
