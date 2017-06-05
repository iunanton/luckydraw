<!DOCTYPE html>
<?php
	require_once('../constant.php');
	require_once('../class/reservationshandler.class.php');
	
	$handler = new reservationsHandler();
	
	$global_page = basename(__FILE__, '.php');
	
	if (isset($_GET["page"])) {
		$page  = $_GET["page"];
	} else {
		$page=1;
	};
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$handler->cancel($id);
		$prompt = "Record #$id was cancelled.";
	}
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T04:56:17+0800" >
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
				<div class="prompt">
					<?=$prompt; ?>
				</div>
				<?php
					switch($global_lang) {
						case EN:
							$todayIs = "Today is ".date("j M, Y");
							break;
						case ZH:
							$todayIs = "今天".date("j M, Y");
							break;
					}
				?>
				<p><?=$todayIs; ?></p>
				<?php
					$reservationsCount = $handler->getCount();
					$reservations = $handler->getByPage($page);
				?>
					<p><strong><?=$reservationsCount;?> appointment(s)</strong> was founded:</p>
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
								echo "<td>".($reservation['cancelled'] ? $cancelled : '<a href="?id='.$reservation['id'].'">'.$cancel.'</a>')."</td>";
								echo "</tr>";
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