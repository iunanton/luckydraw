<?php
	//Connect to DATABASE
	require_once('mydatabase.php');

	//import myCalendar class
	require_once('mycalendar.php');

	//import myTime class
	require_once('myschedule.php');

	//GET and POST methods
	if(isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day'])) {
		$year = $_GET['year'];
		$month = str_pad($_GET['month'], 2, '0', STR_PAD_LEFT);
		$day = str_pad($_GET['day'], 2, '0', STR_PAD_LEFT);
	} else {
		$year = date("Y");
		$month = date("m");
		$day = date("d");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>A-backup - HIV Test Booking</title>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-12T04:36:49+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="mycalendar.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
</head>
<body>
<?php
	//Select query to DATABASE
	$conn = new myDatabase();
	$service_days = $conn->getDateArray();
	$service_times = $conn->getTimeArray($year, $month, $day);
?>
	<div id="header"><img src="logo.jpg" alt="logo" height="100px"></div>
	<div id="nav">
		<div id="news"><a href="#">NEWS</a></div>
		<div id="rapid-test"><a href="#">RAPID-TEST</a></div>
		<div id="free-condom"><a href="#">FREE CONDOM</a></div>
		<div id="videos"><a href="#">VIDEOS</a></div>
		<div id="hiv-pos"><a href="#">HIV+</a></div>
		<div id="join-us"><a href="#">JOIN US</a></div>
		<div id="about-us"><a href="#">ABOUT US</a></div>
	</div>
	<div id="page">
		<div id="header">Booking Form</div>
		<div id="content">
			<b>What date would you like an appointment?</b>
			<?php
				//Create calendar for current date
				$calendar = new myCalendar($year, $month, $day, 0, $service_days);
				$calendar->draw();
				$calendar->show();
			?>
			<?php
				//Create schedule for current date
				$schedule = new mySchedule();
				$schedule->update($service_times);
				$schedule->draw();
				$schedule->getSchedule();
			?>
			<b>Preferred time slot</b>
			<select id="schedule">
				<option value="1">14:00</option>
				<option value="2">14:30</option>
				<option value="3">15:00</option>
			</select>
			<input type="submit" value="Next">
		</div>
	</div>
	<div id="footer">Lucky &copy Copyright By A-Backup</div>
</body>
</html>