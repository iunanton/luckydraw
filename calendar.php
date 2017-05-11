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
<html>
<head>
<link href="mycalendar.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

	//Select query to DATABASE
	$conn = new myDatabase();
	$service_days = $conn->getDateArray();
	$service_times = $conn->getTimeArray($year, $month, $day);

	//Create calendar for current date
	$calendar = new myCalendar($year, $month, $day, 0, $service_days);
	$calendar->draw();
	$calendar->show();

	//Create schedule for current date
	$schedule = new mySchedule();
	$schedule->update($service_times);
	$schedule->draw();
	$schedule->getSchedule();
?>
</body>
</html>