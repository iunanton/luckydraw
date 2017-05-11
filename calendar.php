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
<link href="" rel="stylesheet" type="text/css">
<style type="text/css">
	body {
		margin: 0 0 0 0;	
	}
	body div{
		display: block;	
	}
	#nav div {
		display: inline-block;	
	}
	#page {
		width: 900px;
		margin-left: 150px;	
	}
	#page div {
		display: block;	
	}
	#page #header {
		margin-top: 10px;
		margin-bottom: 10px;
		font-size: 24px;
	}
	#calendar {
		border-collapse: collapse;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#calendar,
	#calendar-head,
	#calendar-head td,
	.calendar-day-head, {
		border-width: 0px;	
	}
	.calendar-row,
	.calendar-row td {
    border: 1px solid grey;
	}
	#calendar th,
	#calendar td {
		text-align: center;
	}
	#calendar-prev a,
	#calendar-next a {
		text-decoration: none;
	}
	.day-number {
		text-decoration: none;
		margin: 10px 10px 10px 10px;
		border-radius: 5px 5px 5px 5px;
		
	}
	.calendar-day.today .day-number {
		border: 1px solid lightblue;
	}
	.calendar-day.selected .day-number {
		background-color: grey;
		color: white;
	}
	.active .day-number:hover {
		background-color: coral;
		color: white;
	}
</style>
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