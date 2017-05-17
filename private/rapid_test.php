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
<meta name="date" content="2017-05-18T00:30:49+0800" >
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
						$header = "Rapid Test";
						break;
					case ZH:
						$header = "快速測試";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<?php
				switch($global_lang) {
					case EN:
						$from = "From:";
						$to = "To:";
						break;
					case ZH:
						$from = "從";
						$to = "至";
						break;
				}
			?>	
			Today is <?=date("d M, Y"); ?><br><br>
			Add new service time.<br><br>
			Enter date period to fill and choose time slots from default ones shown below:<br><br>
			<!--Add new time slot form-->
			<form action="" method="GET">
				<!--Try date input here-->
				<div class="form-date">
					<label for="start-date"><?=$from; ?></label>
					<input id="start-date" type="date">
				</div>
				<div class="form-date">
					<label for="end-date"><?=$to; ?></label>
					<input id="end-date" type="date">
				</div>
				<div class="form-time-slots">
					<?php
						$conn = new myDatabase();
						$defaultTimeArray = $conn->getDefaultTimeArray();
						$timeSlotsOnRow = 3;
						
						$i = 0;
						foreach ($defaultTimeArray as $defaultTime) {
							if(!($i % $timeSlotsOnRow)) {
								echo "<br>";							
							}
							echo '<input id="time-slot-'.$defaultTime['id'].'" type="checkbox" />';
							echo '<label for="time-slot-'.$defaultTime['id'].'">'.$defaultTime['time'].'</label>';
							$i++;
						}
					?>
				</div>
				<div class="form-submit">
					<input type="submit" name="" value="OK" />
				</div>
			</form>
			<table class="content-table">
				<tr>
					<th>#</th><th>Date</th><th>Time</th><th>Delete</th>		
				</tr>
				<?php
					$allServiceTime = $conn->getAllServiceTime();
					foreach ($allServiceTime as $serviceTime) {
						echo '<tr>';
						echo '<td>'.$serviceTime['id'].'</td>';
						echo '<td>'.$serviceTime['date'].'</td>';
						echo '<td>'.$serviceTime['time'].'</td>';
						echo '<td><u>Delete</u></td>';
						echo '</tr>';
					}
				?>
			</table>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>