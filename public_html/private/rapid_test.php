<!DOCTYPE html>
<?php
	define('__ROOT__', dirname(dirname(dirname(__FILE__))));
	require_once(__ROOT__.'/config/php_config.php');
	require_once(__ROOT__.'/lib/timeslotshandler.class.php');
	$global_page = basename(__FILE__);
	require_once(__ROOT__.'/lib/locale.php');
	$handler = new timeSlotsHandler();

	if (isset($_GET["page"])) {
		$page  = $_GET["page"];
	} else {
		$page=1;
	};
	
	if(isset($_GET['start-day']) && isset($_GET['end-day']) && isset($_GET['timeSlots'])) {
		$start_day = new DateTime($_GET['start-day']);
		$end_day = new DateTime($_GET['end-day']);
		$timeSlots = array_map('intval', $_GET['timeSlots']);
		$handler->add($start_day, $end_day, $timeSlots);
		$prompt = "Time slots were added.";
	}
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$handler->delete($id);
		$prompt = "Time slot #$id was deleted.";
	}
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-07-18T03:16:17+0800" >
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
	.input-field {
		display: block;	
	}
	.input-field::after {
		content: '';
		clear: both;
		display: block;	
	}
	.input-field label {
		width: 100px;
		float: left;
		text-align: right;
		margin-right: 10px;
		display: block;
	}
	.input-field input[type=submit] {
		float: left;
		margin-left: 110px;	
	}
</style>
</head>
<body>
	<div class="container">
		<?php
			include('view/header.php');
		?>
		<?php
			include('view/navigation_bar.php');
		?>
		<div class="wrapper">
			<div class="wrapper-header">
				<?php
					switch($global_lang) {
						case 'en':
							$header = "Rapid Test";
							break;
						case 'zh':
							$header = "快速測試";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<div class="prompt">
					<?=$prompt; ?>
				</div>
				<?php
					switch($global_lang) {
						case 'en':
							$todayIs = "Today is ".date("j M, Y");
							$from = "From:";
							$to = "To:";
							break;
						case 'zh':
							$todayIs = "今天".date("j M, Y");
							$from = "從";
							$to = "至";
							break;
					}
				?>
				<p><?=$todayIs; ?></p>
				(UPDATED) Add new service time.<br><br>
				Enter date period to fill and choose time slots from default ones shown below:<br><br>
				<!--Add new time slot form-->
				<form action="" method="GET">
					<!--Try date input here-->
					<div class="input-field">
						<label for="start-date"><?=$from; ?></label>
						<input id="start-date" type="date" name="start-day">
					</div>
					<div class="input-field">
						<label for="end-date"><?=$to; ?></label>
						<input id="end-date" type="date" name="end-day">
					</div>
					<div class="form-time-slots">
						<?php
							$defaultTimeSlots = $handler->getDefault();
							$timeSlotsOnRow = 3;
							
							$i = 0;
							foreach ($defaultTimeSlots as $key => $time) {
								if(!($i % $timeSlotsOnRow)) {
									echo "<br>";							
								}
								echo '<input id="time-slot-'.$key.'" type="checkbox" name="timeSlots[]"  value="'.$key.'" />';
								echo '<label for="time-slot-'.$key.'">'.$time.'</label>';
								$i++;
							}
						?>
					</div>
					<div class="input-field">
						<input type="submit" name="" value="OK" />
					</div>
				</form>
				<?php
					$timeSlotsCount = $handler->getCount();
					$timeSlots = $handler->getByPage($page);
				?>
				<p><strong><?=$timeSlotsCount;?> record(s)</strong> was found:</p>
				<table class="sql-query">
					<tr>
						<?php
							switch($global_lang) {
								case 'en':
									echo "<th>#</th><th>Date</th><th>Time</th><th>Booked Out</th><th>Delete</th>";
									break;
								case 'zh':
									echo "<th>#</th><th>日期</th><th>時間</th><th>已經預訂了</th><th>刪除</th>";
									break;	
							}
						?>
					</tr>
					<?php
						switch($global_lang) {
							case 'en':
							$delete = "Delete";
							$booked = "booked out";
							$notBooked = "Not booked";
								break;
							case 'zh':
								$delete = "刪除";
								$booked = "已經預訂了";
								$notBooked = "沒有預訂";
								break;	
						}
						foreach ($timeSlots as $timeSlot) {
							echo '<tr>';
							echo '<td>'.$timeSlot['id'].'</td>';
							echo '<td>'.$timeSlot['date'].'</td>';
							echo '<td>'.$timeSlot['time'].'</td>';
							echo '<td>'.(is_null($timeSlot['reservation']) ? $notBooked : '<a href="booking.php?#reservation'.$timeSlot['reservation'].'">'.$timeSlot['reservation']."</a>").'</td>';
							if(is_null($timeSlot['reservation'])) {
								echo '<td><a href="?id='.$timeSlot['id'].'&page='.$page.'">'.$delete.'</a></td>';
							}else {
								echo '<td>'.$booked.'</td>';
							}
							echo '</tr>';			
						}
					?>
				</table>
			</div>
			<div class="wrapper-footer">
				<?php
					$total_pages = $handler->getPagesCount();
					include('../view/page_nav.php');
				?>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>