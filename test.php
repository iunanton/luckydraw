<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-01T05:37:05+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="" rel="stylesheet" type="text/css">
<style type="text/css">
	body {
		color: #305D7C;
	}
	.calendar {
		display: grid;
		grid-template-columns: 50px auto;	
	}
	.calendar-month-header {
		grid-column: 1 / 3;
		padding: 10px 10px 10px 10px;
		background-color: #FFA366;
		color: inherit;
		font-style: normal;
		font-variant: normal;
		font-weight: bold;
		font-size: 24px;	
	}
	.calendar-day-header {
		grid-column: 1 / 2;
		margin: 5px 5px 5px 5px;
		width: 40px;
		vertical-align: top;	
	}
	.calendar-day-number {
		display: inline-block;
		color: inherit;
		font-style: normal;
		font-variant: normal;
		font-weight: bold;
		font-size: 24px;
	}
	.calendar-day-description {
		display: inline-block;
		color: inherit;
	}
	.calendar-day-content {
		grid-column: 2 / 3;
		overflow:hidden;
		width: auto;
		border-width: thin;
		border-style: solid;
		border-color: black;	
	}
	.calendar-time-slot {
		display: inline-block;
		padding: 10px 20px 10px 20px;
		background-color: #FFA366;
		margin: 10px 10px 10px 10px;
	}
</style>
</head>
<body>

	<?php
		echo "Try to include calendar class<br>";
		include("class/calendar.class.php");
		echo "Create calendar object<br>";
		$current_day = date("Y-m-d", time());
		echo $current_day."<br>";
		$obj = new calendar($current_day);
		echo "Call render() method<br>";
		$obj->render();
	?>

</body>
</html>