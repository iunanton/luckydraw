<!DOCTYPE html>
<?php
	define('__ROOT__', dirname(dirname(dirname(__FILE__))));
	require_once(__ROOT__.'/config/php_config.php');
	require_once(__ROOT__.'/lib/reservationshandler.class.php');
	$global_page = basename(__FILE__);
	require_once(__ROOT__.'/lib/locale.php');
	$handler = new reservationsHandler();
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-07-18T03:33:19+0800" >
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
						case 'en':
							$header = "Summary";
							break;
						case 'zh':
							$header = "概要";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<?php
					switch($global_lang) {
						case 'en':
							$todayIs = "Today is ".date("j M, Y");
							break;
						case 'zh':
							$todayIs = "今天".date("j M, Y");
							break;
					}
				?>
				<p><?=$todayIs; ?></p>
				<?php
					$reservations = $handler->getForToday();
				?>
				<p>For today <strong><?=sizeof($reservations);?> appointment(s)</strong> were found:</p>
				<table class="sql-query">
					<tr>
						<?php
							switch($global_lang) {
								case 'en':
									echo "<th>#</th><th>Time</th><th>Name</th><th>Phone</th><th>The booking received at</th>";
									break;
								case 'zh':
									echo "<th>#</th><th>時間</th><th>名字</th><th>電話</th><th>接收時間</th>";
									break;
							}
						?>
					</tr>
					<?php
						foreach ($reservations as $reservation) {
							echo "<tr>";
							echo "<td>".$reservation['id']."</td>";
							echo "<td>".$reservation['time']."</td>";
							echo "<td>".$reservation['name']."</td>";
							echo "<td>".(is_null($reservation['phone']) ? 'not specified' : $reservation['phone'] )."</td>";
							echo "<td>".$reservation['reservation_time']."</td>";
							echo "</tr>";	
						}
					?>
				</table>
				<?php
					$reservations = $handler->getForTomorrow();
				?>
				<p>For tomorrow <strong><?=sizeof($reservations);?> appointment(s)</strong> were found:</p>
				<table class="sql-query">
					<tr>
						<?php
							switch($global_lang) {
								case 'en':
									echo "<th>#</th><th>Time</th><th>Name</th><th>Phone</th><th>The booking received at</th>";
									break;
								case 'zh':
									echo "<th>#</th><th>時間</th><th>名字</th><th>電話</th><th>接收時間</th>";
									break;
							}
						?>
					</tr>
					<?php
						foreach ($reservations as $reservation) {
							echo "<tr>";
							echo "<td>".$reservation['id']."</td>";
							echo "<td>".$reservation['time']."</td>";
							echo "<td>".$reservation['name']."</td>";
							echo "<td>".$reservation['phone']."</td>";
							echo "<td>".$reservation['reservation_time']."</td>";
							echo "</tr>";	
						}
					?>
				</table>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>