<?php
	switch($global_lang) {
		case EN:
			$summary = "SUMMARY";
			$news = "NEWS";
			$rapid_test = "RAPID TEST";
			$test_booking = "TEST BOOKING";
			$videos = "VIDEOS";
			break;
		case ZH:
			$summary = "SUMMARY";
			$news = "最新消息";
			$rapid_test = "快速測試";
			$test_booking = "預約測試";
			$videos = "相關影片";
			break;
	}
	switch($global_page) {
		case "summary":
			$summary_class_modifier = " selected";
			break;
		case "news":
			$news_class_modifier = " selected";
			break;
		case "rapid_test":
			$rapid_test_class_modifier = " selected";
			break;
		case "booking":
			$booking_class_modifier = " selected";
			break;
		case "videos":
			$videos_class_modifier = " selected";
			break;
	}
?>
<nav>
	<div class="nav-link<?=$summary_class_modifier; ?>" id="summary"><a href="summary.php?lang=<?=$global_lang ?>"><?= $summary; ?></a></div>
	<div class="nav-link<?=$news_class_modifier; ?>" id="news"><a href="news.php?lang=<?=$global_lang ?>"><?= $news; ?></a></div>
	<div class="nav-link<?=$rapid_test_class_modifier; ?>" id="rapid-test"><a href="rapid_test.php?lang=<?=$global_lang ?>"><?= $rapid_test; ?></a></div>
	<div class="nav-link<?=$booking_class_modifier; ?>" id="test-booking"><a href="booking.php?lang=<?=$global_lang ?>"><?= $test_booking; ?></a></div>
	<div class="nav-link<?=$videos_class_modifier; ?>" id="videos"><a href="videos.php?lang=<?=$global_lang ?>"><?=$videos; ?></a></div>
</nav>