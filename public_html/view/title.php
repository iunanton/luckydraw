<?php
	switch($global_lang) {
		case 'en':
			$prefix = "Heterosexual HIV Test";
			$postfix = "- Lucky Draw Studio";
			switch($global_page) {
				case "news.php":
					$title = $prefix." News ".$postfix;
					break;
				case "rapid_test.php":
					$title = $prefix." ".$postfix;
					break;
				case "booking.php":
					$title = $prefix." Booking ".$postfix;
					break;
				case "booking_form.php":
					$title = $prefix." Booking Form ".$postfix;
					break;
				case "confirmation.php":
					$title = $prefix." Confirmation ".$postfix;
					break;
				case "free_condom.php":
					$title = $prefix." Free Condom ".$postfix;
					break;
				case "videos.php":
					$title = $prefix." Videos ".$postfix;
					break;
				case "hiv_pos.php":
					$title = $prefix." HIV+ ".$postfix;
					break;
				case "join_us.php":
					$title = $prefix." Join Us ".$postfix;
					break;
				case "about_us.php":
					$title = $prefix." About Us ".$postfix;
					break;
			}
			break;
		case 'zh':
			$prefix = "異性戀愛滋病測試";
			$postfix = "- 幸運抽獎工作室";
			switch($global_page) {
				case "news.php":
					$title = $prefix." 最新消息 ".$postfix;
					break;
				case "rapid_test.php":
					$title = $prefix." ".$postfix;
					break;
				case "booking.php":
					$title = $prefix." 預約測試 ".$postfix;
					break;
				case "booking_form.php":
					$title = $prefix." Booking Form ".$postfix;
					break;
				case "confirmation.php":
					$title = $prefix." Confirmation ".$postfix;
					break;
				case "free_condom.php":
					$title = $prefix." 免費安全套 ".$postfix;
					break;
				case "videos.php":
					$title = $prefix." 相關影片 ".$postfix;
					break;
				case "hiv_pos.php":
					$title = $prefix." HIV 陽性 ".$postfix;
					break;
				case "join_us.php":
					$title = $prefix." 加入我們 ".$postfix;
					break;
				case "about_us.php":
					$title = $prefix." 關於我們 ".$postfix;
					break;
			}
			break;
	}
?>
<title><?=$title; ?></title>
