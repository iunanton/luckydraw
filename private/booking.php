<?php
	require_once('../constant.php');
	
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = EN;
	}

	$global_page = basename(__FILE__, '.php');

	require_once('../class/mydatabase.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-19T00:32:36+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>
<body>
	<?php
		include('view/header.php');
	?>
	<?php
		include('view/navigation_bar.php');
	?>
	<div id="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "Booking";
						break;
					case ZH:
						$header = "預約測試";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<?php
				$conn = new myDatabase();
				$reservations = $conn->getAllReservations();
				echo "<strong>".sizeof($reservations)." appointment(s)</strong> was founded:<br><br>";
				echo '<table class="content-table">';
				echo "<tr>";
				echo "<th>id</th><th>date</th><th>time</th><th>name</th><th>phone</th><th>the booking received at</th>";
				echo "</tr>";
				foreach ($reservations as $reservation) {
					echo "<tr>";
					echo "<td>".$reservation['id']."</td>";
					echo "<td>".$reservation['date']."</td>";
					echo "<td>".$reservation['time']."</td>";
					echo "<td>".$reservation['name']."</td>";
					echo "<td>".$reservation['phone']."</td>";
					echo "<td>".$reservation['reservation_time']."</td>";
					echo "</tr>";	
				}
				echo "</table>";
			?>
			<?php
				$conn = new myDatabase();
				$appointments = $conn->getAppointments(TODAY);
				echo sizeof($appointments)." appointment(s) was founded:<br><br>";
				echo "<table>";
				echo "<tr>";
				echo "<th>id</th><th>date</th><th>time</th><th>name</th><th>phone</th><th>the booking received at</th>";
				echo "</tr>";
				foreach ($appointments as $appointment) {
					echo "<tr>";
					echo "<td>".$appointment['id']."</td><td>".$appointment['time']."</td><td>".$appointment['name']."</td><td>".$appointment['phone']."</td><td>".$appointment['reservation_time']."</td>";
					echo "</tr>";	
				}
				echo "</table>";
			?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>
