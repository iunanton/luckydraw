<?php
	define("EN", 1, false);
	define("ZH", 2, false);
	define("CH", 3, false);
	define("KR", 4, false);
	define("JP", 5, false);
	define("RU", 6, false);
	define("TODAY", date("Y-m-d"), false);
	define("YEAR", date("Y"), false);
	define("MONTH", date("m"), false);
	define("DAY", date("d"), false);
	define("NOW", date("H:i:s"), false);
	define("END_OF_BOOKING_TIME", "16:00:00", false);
	define("OPERATION_TIME_FROM", "16:00:00", false);
	define("OPERATION_TIME_TO", "21:00:00", false);
	if(isset($_GET['lang'])) {
	$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
	}
	
	$global_page = basename(__FILE__, '.php');
?>