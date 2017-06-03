<!DOCTYPE html>
<?php
	require_once('../constant.php');
	require_once('../class/timeslotshandler.class.php');
	
	$handler = new timeSlotsHandler();
	
	$global_page = basename(__FILE__, '.php');
	
	if (isset($_GET["page"])) {
		$page  = $_GET["page"];
	} else {
		$page=1;
	};
	
	if(isset($_GET['start-day']) && isset($_GET['end-day']) && isset($_GET['timeSlots'])) {
		$start_day = new DateTime($_GET['start-day']);
		$end_day = new DateTime($_GET['end-day']);
		$timeSlots = array_map('intval', $_GET['timeSlots']);
		$handler->addTimeSlots($start_day, $end_day, $timeSlots);
		$prompt = "Time slots were added.";
	}
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$handler->deleteTimeSlot($id);
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
<meta name="date" content="2017-06-03T20:09:55+0800" >
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
		<div class="wrapper-header">
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
		<div class="wrapper-content">
			<div class="prompt">
				<?=$prompt; ?>
			</div>
			<?php
				switch($global_lang) {
					case EN:
						$todayIs = "Today is ".date("j M, Y");
						$from = "From:";
						$to = "To:";
						break;
					case ZH:
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
				<div class="form-date">
					<label for="start-date"><?=$from; ?></label>
					<input id="start-date" type="date" name="start-day">
				</div>
				<div class="form-date">
					<label for="end-date"><?=$to; ?></label>
					<input id="end-date" type="date" name="end-day">
				</div>
				<div class="form-time-slots">
					<?php
						$defaultTimeSlots = $handler->getDefaultTimeSlots();
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
				<div class="form-submit">
					<input type="submit" name="" value="OK" />
				</div>
			</form>
			<?php
				$timeSlotsCount = $handler->getTimeSlotsCount();
				$timeSlots = $handler->getTimeSlotsByPage($page);
			?>
			<p><strong><?=$timeSlotsCount;?> record(s)</strong> was found:</p>
			<table class="sql-query">
				<tr>
					<?php
						switch($global_lang) {
							case EN:
								echo "<th>#</th><th>Date</th><th>Time</th><th>Booked Out</th><th>Delete</th>";
								break;
							case ZH:
								echo "<th>#</th><th>日期</th><th>時間</th><th>已經預訂了</th><th>刪除</th>";
								break;	
						}
					?>
				</tr>
				<?php
					switch($global_lang) {
						case EN:
						$delete = "Delete";
						$booked = "booked out";
						$notBooked = "Not booked";
							break;
						case ZH:	
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
				$total_pages = $handler->getTimeSlotsPagesCount();
				include('../view/page_nav.php');
			?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>