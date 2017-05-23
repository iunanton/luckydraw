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
			$prefix = "異性戀愛滋病測試";
			$postfix = "- 幸運抽獎工作室";
			switch($global_page) {
				case "news":
					$title = $prefix." 最新消息 ".$postfix;
					break;
				case "rapid_test":
					$title = $prefix." ".$postfix;
					break;
				case "booking":
					$title = $prefix." 預約測試 ".$postfix;
					break;
				case "booking_form":
					$title = $prefix." Booking Form ".$postfix;
					break;
				case "confirmation":
					$title = $prefix." Confirmation ".$postfix;
					break;
				case "free_condom":
					$title = $prefix." 免費安全套 ".$postfix;
					break;
				case "videos":
					$title = $prefix." 相關影片 ".$postfix;
					break;
				case "hiv_pos":
					$title = $prefix." HIV 陽性 ".$postfix;
					break;
				case "join_us":
					$title = $prefix." 加入我們 ".$postfix;
					break;
				case "about_us":
					$title = $prefix." 關於我們 ".$postfix;
					break;
			}
			break;
		case CH:
			$prefix = "异性恋爱滋病测试";
			$postfix = "- 幸运抽奖工作室";
			switch($global_page) {
				case "news":
					$title = $prefix." 最新消息 ".$postfix;
					break;
				case "rapid_test":
					$title = $prefix." ".$postfix;
					break;
				case "booking":
					$title = $prefix." 预约测试 ".$postfix;
					break;
				case "booking_form":
					$title = $prefix." Booking Form ".$postfix;
					break;
				case "confirmation":
					$title = $prefix." Confirmation ".$postfix;
					break;
				case "free_condom":
					$title = $prefix." 免费安全套 ".$postfix;
					break;
				case "videos":
					$title = $prefix." 相关影片 ".$postfix;
					break;
				case "hiv_pos":
					$title = $prefix." HIV 阳性 ".$postfix;
					break;
				case "join_us":
					$title = $prefix." 加入我们 ".$postfix;
					break;
				case "about_us":
					$title = $prefix." 关于我们 ".$postfix;
					break;
			}
			break;
	}
?>
<title><?=$title; ?></title>
