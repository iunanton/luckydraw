<!DOCTYPE html>
<?php
	require_once('constant.php');
	require_once('class/mydatabase.php');
	require_once('class/db.class.php');
	$global_page = basename(__FILE__, '.php');
?>
<html>
<head>
<title>Test Page - Weekly</title>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-02T20:26:40+0800" >
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
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	body {
		color: #305D7C;
	}
	.calendar {
		display: grid;
		grid-template-columns: 50px auto;
		grid-row-gap: 10px;
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
	.week-description {
		grid-column: 2 / 3;
	}
/*	.calendar-day {
		grid-column: 1 / 3;
		border-width: thin;
		border-style: solid;
		border-color: #305D7C;	
	}
*/
	.calendar-day-header {
		grid-column: 1 / 2;
/*		border-left-width: thin;
		border-left-style: solid;
		border-left-color: #305D7C;
		border-top-width: thin;
		border-top-style: solid;
		border-top-color: #305D7C;
		border-bottom-width: thin;
		border-bottom-style: solid;
		border-bottom-color: #305D7C;*/
		padding: 5px 5px 5px 5px;
		vertical-align: top;
	}
	.calendar-day-header.today {
		background-color: #EEEEEE;
	}
	.calendar-day-number {
		display: block;
		color: inherit;
		font-style: normal;
		font-variant: normal;
		font-weight: bold;
		font-size: 24px;
	}
	.calendar-day-description {
		display: block;
		color: inherit;
	}
	.calendar-day-content {
		grid-column: 2 / 3;
/*		border-top-width: thin;
		border-top-style: solid;
		border-top-color: #305D7C;
		border-bottom-width: thin;
		border-bottom-style: solid;
		border-bottom-color: #305D7C;
		border-right-width: thin;
		border-right-style: solid;
		border-right-color: #305D7C;*/
	}
	.calendar-time-slot {
		display: inline-block;
		padding: 5px 10px 5px 10px;
		background-color: #FFA366;
		margin: 5px 5px 5px 5px;
	}
	.calendar-time-slot:hover {
		background-color: #FF6600;
	}
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
						case CH:
							$header = "预约测试";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<h2>Heterosexual AIDS Test or HIV Test</h2>
				<p>What date and time would you like an appointment?</p>
				<?php

					$db_conn = new db();

				?>
				<?php
					include("class/calendar.class.php");
					$current_day = date("Y-m-d", time());
					$obj = new calendar($current_day);
					$obj->render();
				?>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>