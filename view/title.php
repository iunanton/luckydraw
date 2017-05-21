<?php
	switch($global_lang) {
		case EN:
			$prefix = "Heterosexual HIV Test";
			$postfix = "- Lucky Draw Studio";
			switch($global_page) {
				case "news":
					$title = $prefix." News ".$postfix;
					break;
				case "rapid_test":
					$title = $prefix." ".$postfix;
					break;
				case "booking":
					$title = $prefix." Booking ".$postfix;
					break;
				case "booking_form":
					$title = $prefix." Booking Form ".$postfix;
					break;
				case "confirmation":
					$title = $prefix." Confirmation ".$postfix;
					break;
				case "free_condom":
					$title = $prefix." Free Condom ".$postfix;
					break;
				case "videos":
					$title = $prefix." Videos ".$postfix;
					break;
				case "hiv_pos":
					$title = $prefix." HIV+ ".$postfix;
					break;
				case "join_us":
					$title = $prefix." Join Us ".$postfix;
					break;
				case "about_us":
					$title = $prefix." About Us ".$postfix;
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
					$title = "幸運抽獎工作室 - 免費安全套";
					break;
				case "videos":
					$title = "幸運抽獎工作室 - 相關影片";
					break;
				case "hiv_pos":
					$title = "幸運抽獎工作室 - HIV 陽性";
					break;
				case "join_us":
					$title = "幸運抽獎工作室 - 加入我們";
					break;
				case "about_us":
					$title = "幸運抽獎工作室 - 關於我們";
					break;
			}
			break;
		case CH:
			switch($global_page) {
				case "news":
					$title = "幸运抽奖工作室 - 最新消息";
					break;
				case "rapid_test":
					$title = "幸运抽奖工作室 - 快速测试";
					break;
				case "booking":
					$title = "幸运抽奖工作室 - 预约测试";
					break;
				case "booking_form":
					$title = "幸运抽奖工作室 - Booking Form";
					break;
				case "confirmation":
					$title = "幸运抽奖工作室 - Confirmation";
					break;
				case "free_condom":
					$title = "幸运抽奖工作室 - 免费安全套";
					break;
				case "videos":
					$title = "幸运抽奖工作室 - 相关影片";
					break;
				case "hiv_pos":
					$title = "幸运抽奖工作室 - HIV 阳性";
					break;
				case "join_us":
					$title = "幸运抽奖工作室 - 加入我们";
					break;
				case "about_us":
					$title = "幸运抽奖工作室 - 关于我们";
					break;
			}
			break;
	}
?>
<title><?=$title; ?></title>
