<?php
	switch($global_lang) {
		case EN:
			switch($global_page) {
				case "news":
					$title = "Lucky Draw Studio - News";
					break;
				case "rapid_test":
					$title = "Lucky Draw Studio - Rapid Test";
					break;
				case "booking":
					$title = "Lucky Draw Studio - Test Booking";
					break;
				case "booking_form":
					$title = "Lucky Draw Studio - Booking Form";
					break;
				case "confirmation":
					$title = "Lucky Draw Studio - Confirmation";
					break;
				case "free_condom":
					$title = "Lucky Draw Studio - Free Condom";
					break;
				case "videos":
					$title = "Lucky Draw Studio - Videos";
					break;
				case "hiv_pos":
					$title = "Lucky Draw Studio - HIV+";
					break;
				case "join_us":
					$title = "Lucky Draw Studio - Join Us";
					break;
				case "about_us":
					$title = "Lucky Draw Studio - About Us";
					break;
			}
			break;
		case ZH:
			switch($global_page) {
				case "news":
					$title = "幸運抽獎工作室 - 最新消息";
					break;
				case "rapid_test":
					$title = "幸運抽獎工作室 - 快速測試";
					break;
				case "booking":
					$title = "幸運抽獎工作室 - 預約測試";
					break;
				case "booking_form":
					$title = "幸運抽獎工作室 - Booking Form";
					break;
				case "confirmation":
					$title = "幸運抽獎工作室 - Confirmation";
					break;
				case "free_condom":
					$title = "幸運抽獎工作室 - 無標題文件";
					break;
				case "videos":
					$title = "幸運抽獎工作室 - 相關影片";
					break;
				case "hiv_pos":
					$title = "幸運抽獎工作室 - HIV 陽性";
					break;
				case "join_us":
					$title = "幸運抽獎工作室 - 關於我們";
					break;
				case "about_us":
					$title = "幸運抽獎工作室 - 關於我們";
					break;
			}
			break;
	}
?>
<title><?=$title ?>
<?php
	echo "title";
?>
</title>