<?php
	switch($global_lang) {
		case 'en':
			switch($global_page) {
				case "summary.php":
					$title = "Lucky Draw Studio - Summary";
					break;
				case "rapid_test.php":
					$title = "Lucky Draw Studio - Rapid Test";
					break;
				case "booking.php":
					$title = "Lucky Draw Studio - Test Booking";
					break;
				case "videos.php":
					$title = "Lucky Draw Studio - Videos";
					break;
			}
			break;
		case 'zh':
			switch($global_page) {
				case "summary.php":
					$title = "幸運抽獎工作室 - Summary";
					break;
				case "rapid_test.php":
					$title = "幸運抽獎工作室 - 快速測試";
					break;
				case "booking.php":
					$title = "幸運抽獎工作室 - 預約測試";
					break;
				case "videos.php":
					$title = "幸運抽獎工作室 - 相關影片";
					break;
			}
			break;
	}
?>
<title><?=$title ?></title>