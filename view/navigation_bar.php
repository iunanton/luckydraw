<?php
	switch($global_lang) {
		case EN:
			$news = "NEWS";
			$rapid_test = "RAPID TEST";
			$test_booking = "TEST BOOKING";
			$free_condom = "FREE CONDOM";
			$videos = "VIDEOS";
			$hiv_pos = "HIV+";
			$join_us = "JOIN US";
			$about_US = "ABOUT US";
			break;
		case ZH:
			$news = "最新消息";
			$rapid_test = "快速測試";
			$test_booking = "預約測試";
			$free_condom = "免費安全套";
			$videos = "相關影片";
			$hiv_pos = "HIV 陽性";
			$join_us = "加入我們";
			$about_US = "關於我們";
			break;
		case CH:
			$news = "最新消息";
			$rapid_test = "快速测试";
			$test_booking = "预约测试";
			$free_condom = "免费安全套";
			$videos = "相关影片";
			$hiv_pos = "HIV 阳性";
			$join_us = "加入我们";
			$about_US = "关于我们";
			break;
	}
	switch($global_page) {
		case "news":
			$news_class_modifier = " selected";
			break;
		case "rapid_test":
			$rapid_test_class_modifier = " selected";
			break;
		case "booking":
			$booking_class_modifier = " selected";
			break;
		case "free_condom":
			$free_condom_class_modifier = " selected";
			break;
		case "videos":
			$videos_class_modifier = " selected";
			break;
		case "hiv_pos":
			$hiv_pos_class_modifier = " selected";
			break;
		case "join_us":
			$join_us_class_modifier = " selected";
			break;
		case "about_us":
			$about_us_class_modifier = " selected";
			break;
	}
?>
<nav>
	<div class="nav-link<?=$news_class_modifier; ?>" id="news"><a href="news.php?lang=<?=$global_lang ?>"><?= $news; ?></a></div>
	<div class="nav-link<?=$rapid_test_class_modifier; ?>" id="rapid-test"><a href="rapid_test.php?lang=<?=$global_lang ?>"><?= $rapid_test; ?></a></div>
	<div class="nav-link<?=$booking_class_modifier; ?>" id="test-booking"><a href="booking.php?lang=<?=$global_lang ?>"><?= $test_booking; ?></a></div>
	<div class="nav-link<?=$free_condom_class_modifier; ?>" id="free-condom"><a href="free_condom.php?lang=<?=$global_lang ?>"><?=$free_condom; ?></a></div>
	<div class="nav-link<?=$videos_class_modifier; ?>" id="videos"><a href="videos.php?lang=<?=$global_lang ?>"><?=$videos; ?></a></div>
	<div class="nav-link<?=$hiv_pos_class_modifier; ?>" id="hiv-pos"><a href="hiv_pos.php?lang=<?=$global_lang ?>"><?=$hiv_pos; ?></a></div>
	<div class="nav-link<?=$join_us_class_modifier; ?>" id="join-us"><a href="join_us.php?lang=<?=$global_lang ?>"><?=$join_us; ?></a></div>
	<div class="nav-link<?=$about_us_class_modifier; ?>" id="about-us"><a href="about_us.php?lang=<?=$global_lang ?>"><?= $about_US; ?></a></div>
</nav>
