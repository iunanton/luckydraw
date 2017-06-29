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
			$summary = "概要";
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
	<ul class="private-nav-bar">
		<li class="nav-link<?=$summary_class_modifier; ?>">
			<a href="summary.php"><?= $summary; ?></a>
		</li
		><li class="nav-link<?=$news_class_modifier; ?>">
			<a href="news.php"><?= $news; ?></a>
		</li
		><li class="nav-link<?=$rapid_test_class_modifier; ?>">
			<a href="rapid_test.php"><?= $rapid_test; ?></a>
		</li
		><li class="nav-link<?=$booking_class_modifier; ?>">
			<a href="booking.php"><?= $test_booking; ?></a>
		</li
		><li class="nav-link<?=$videos_class_modifier; ?>">
			<a href="videos.php"><?=$videos; ?></a>
		</li>
	</ul>
</nav>
