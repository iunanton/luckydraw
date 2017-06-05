<!DOCTYPE html>
<?php
	require_once('../constant.php');
	
	$global_page = basename(__FILE__, '.php');
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T04:27:48+0800" >
<meta name="copyright" content="XIAODONG IT Consulting">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta name="theme-color" content="#FFA366" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=1" />
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
	<div class="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "Summary";
						break;
					case ZH:
						$header = "概要";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			Today is <?=date("d M, Y"); ?><br><br>
			<?php
				$conn = new myDatabase();
				$reservations = $conn->getReservations(TODAY);
				echo "For today <strong>".sizeof($reservations)." appointment(s)</strong> was founded:<br><br>";
				echo '<table class="content-table">';
				echo "<tr>";
				echo "<th>id</th><th>time</th><th>name</th><th>phone</th><th>the booking received at</th>";
				echo "</tr>";
				foreach ($reservations as $reservation) {
					echo "<tr>";
					echo "<td>".$reservation['id']."</td>";
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
				$reservations = $conn->getReservations(TOMORROW);
				echo "For today <strong>".sizeof($reservations)." appointment(s)</strong> was founded:<br><br>";
				echo '<table class="content-table">';
				echo "<tr>";
				echo "<th>id</th><th>time</th><th>name</th><th>phone</th><th>the booking received at</th>";
				echo "</tr>";
				foreach ($reservations as $reservation) {
					echo "<tr>";
					echo "<td>".$reservation['id']."</td>";
					echo "<td>".$reservation['time']."</td>";
					echo "<td>".$reservation['name']."</td>";
					echo "<td>".$reservation['phone']."</td>";
					echo "<td>".$reservation['reservation_time']."</td>";
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