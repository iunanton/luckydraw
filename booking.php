<?php
	//include myCalendar class
	require_once('mycalendar.php');

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
<title>Lucky - HIV Test Booking</title>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-13T03:58:27+0800" >
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
	<div id="header"><img src="logo.jpg" alt="logo" height="100px"></div>
	<div id="nav">
		<div id="news"><a href="news.php">NEWS</a></div>
		<div id="rapid-test"><a href="rapid_test.php">RAPID-TEST</a></div>
		<div id="test-booking"><a href="booking.php">TEST BOOKING</a></div>
		<div id="free-condom"><a href="#">FREE CONDOM</a></div>
		<div id="videos"><a href="#">VIDEOS</a></div>
		<div id="hiv-pos"><a href="#">HIV+</a></div>
		<div id="join-us"><a href="#">JOIN US</a></div>
		<div id="about-us"><a href="about_us.php">ABOUT US</a></div>
	</div>
	<div id="page">
		<div id="header">Booking</div>
		<div id="content">
			<p>What date and time would you like an appointment?</p>
			<?php
				//Create calendar for current date
				$calendar = new myCalendar($year, $month, $day, 0);
				$calendar->draw();
				$calendar->show();
			?>
		</div>
	</div>
	<div id="footer">Lucky &copy Copyright By Lucky Draw Studio<br>
	地址：觀塘鴻圖道58號金凱工業大廈6樓25室　電話：(852) 5405 6631</div>
</body>
</html>