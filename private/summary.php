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
<meta name="date" content="2017-05-17T15:00:10+0800" >
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
	.summary {
		border-collapse: collapse;
	}
	.summary td {
		padding: 10px 10px 10px 10px;
		border: 1px solid black
	}
	.summary td.selected {
		background-color: yellow;	
	}
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
						$header = "Summary";
						break;
					case ZH:
						$header = "Summary";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			Today is <?=date("d M, Y"); ?><br><br>
			<?php
				$conn = new myDatabase();
				$appointments = $conn->getAppointments(TODAY);
				echo sizeof($appointments)." appointment(s) was founded:<br><br>";
				echo "<table>";
				echo "<tr>";
				echo "<th>id</th><th>time</th><th>name</th><th>phone</th><th>the booking received at</th>";
				echo "</tr>";
				foreach ($appointments as $appointment) {
					echo "<tr>";
					echo "<td>".$appointment['id']."</td><td>".$appointment['time']."</td><td>".$appointment['name']."</td><td>".$appointment['phone']."</td><td>".$appointment['reservation_time']."</td>";
					echo "</tr>";	
				}
				echo "</table>";
			?>
			<table class="summary">
				<tr>
					<td class="selected">16:30<br>Name<br>phone</td>
					<td>17:00<br>--</td>
					<td>17:30<br>--</td>
					<td>18:00<br>--</td>
					<td>18:30<br>--</td>
					<td class="selected">19:00<br>Name<br>phone</td>
					<td class="selected">19:30<br>Name<br>phone</td>
					<td>20:00<br>--</td>
					<td class="selected">20:30<br>Name<br>phone</td>
				</tr>			
			</table>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>