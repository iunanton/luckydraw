<?php
	//include myDatabase class
	require_once('mydatabase.php');
	$conn = new myDatabase();

	//GET and POST methods
	if(isset($_POST['test']) && isset($_POST['name']) && isset($_POST['tel'])) {
		$test = $_POST['test'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$conn->setAppointment($test, $name, $tel);
		$info = $conn->getTestInfo($test);
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Lucky - Test Appointment</title>
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
	#test-confirmation .input-field {
		display: block;	
	}
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
		<div id="header">Test Appointment</div>
		<div id="content">
			<p>Your booking was confirmed successfully.</p>
			<p><?= $info['date'].' '.$info['time'] ?></p>
		</div>
	</div>
	<div id="footer">Lucky &copy Copyright By Lucky Draw Studio<br>
	地址：觀塘鴻圖道58號金凱工業大廈6樓25室　電話：(852) 5405 6631</div>
</body>
</html>