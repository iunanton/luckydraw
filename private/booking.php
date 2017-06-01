<!DOCTYPE html>
<?php
	require_once('../constant.php');
	require_once('../class/db.class.php');
	require_once('../class/mydatabase.php');
	$global_page = basename(__FILE__, '.php');
	if (isset($_GET["page"])) {
		$page  = $_GET["page"];
	} else {
		$page=1;
	};
	
	$db_conn = new db();
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-01T22:05:38+0800" >
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
						$header = "Booking";
						break;
					case ZH:
						$header = "預約測試";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div class="wrapper-content">
			<?php
				$reservations = $db_conn->getReservations();
			?>
				<p><strong><?=sizeof($reservations);?> appointment(s)</strong> was founded:</p>
				<table class="sql-query">
					<tr>
						<?php
							switch($global_lang) {
								case EN:
									echo "<th>#</th><th>Date</th><th>Time</th><th>Name</th><th>Phone</th><th>The booking received at</th><th>Cancel</th>";
									break;
								case ZH:
									echo "<th>id</th><th>日期</th><th>時間</th><th>名字</th><th>電話</th><th>接收時間</th><th>取消</th>";
									break;
							}
						?>
						
					</tr>
					<?php
							switch($global_lang) {
								case EN:
									$cancel = "Cancel";
									$cancelled = "Cancelled";
									break;
								case ZH:
									$cancel = "取消";
									$cancelled = "己經取消了";
									break;	
							}
						foreach ($reservations as $reservation) {
							echo "<tr>";
							echo "<td>".$reservation['id']."</td>";
							echo "<td>".$reservation['date']."</td>";
							echo "<td>".$reservation['time']."</td>";
							echo "<td>".$reservation['name']."</td>";
							echo "<td>".$reservation['phone']."</td>";
							echo "<td>".$reservation['reservation_time']."</td>";
							echo "<td>".($reservation['cancelled'] ? $cancelled : $cancel)."</td>";
							echo "</tr>";
						}
					?>
			</table>
		</div>
		<div class="wrapper-footer">
			<?php
				$total_pages = $db_conn->getReservationsCount();
				include('../view/page_nav.php');
			?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>