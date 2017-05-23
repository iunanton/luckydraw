<?php
	if(isset($_GET['date'])) {
		$max_day = 31;
		echo basename(__FILE__, ".php")." processing...<br>";
		require_once('mydatabase.php');
		$conn = new myDatabase();
		for($day = 1; $day <= $max_day; $day++) {
			$date = $_GET['date']."-".str_pad($day, 2, '0', STR_PAD_LEFT);
			echo "Fill time slots for ".$date."<br>";
			$conn->fillTimeSlotTable($date);
		}
	} else {
		echo "Please open luckydrawhk.com/class/".basename(__FILE__)."?date=YYYY-MM";	
	}
?>
