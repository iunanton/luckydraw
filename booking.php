<?php
	require_once('constant.php');
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
	}
	
	$global_page = basename(__FILE__, '.php');
	
	require_once('class/mydatabase.php');
?>
<?php
	//include myCalendar class
	require_once('class/mycalendar.php');

	//GET and POST methods
	if(isset($_GET['year']) && isset($_GET['month'])) {
		$year = $_GET['year'];
		$month = str_pad($_GET['month'], 2, '0', STR_PAD_LEFT);
		$day = str_pad($_GET['day'], 2, '0', STR_PAD_LEFT);
	} else {
		$year = YEAR;
		$month = MONTH;
		$day = DAY;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-21T05:12:36+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="class/mycalendar.css" rel="stylesheet" type="text/css">
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
					case CH:
						$header = "预约测试";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<p>What date and time would you like an appointment?</p>
			<?php
				//Create calendar for current date
				$calendar = new myCalendar($year, $month, $global_lang);
				$calendar->draw();
				$calendar->show();
			?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>