<?php
	switch($global_lang) {
		case EN:
			$news = "<br>NEWS";
			$rapid_test = "RAPID TEST";
			$test_booking = "TEST BOOKING";
			$free_condom = "FREE CONDOM";
			break;
		case ZH:
			$news = "最新消息";
			$rapid_test = "快速測試";
			$test_booking = "預約測試";
			$free_condom = "免費安全套";
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
	}
?>
<nav>
	<ul class="nav-bar">
		<li class="nav-link<?=$news_class_modifier; ?>">
			<a href="news.php?lang=<?=$global_lang ?>"><?= $news; ?></a>
		</li>
		<li class="nav-link<?=$rapid_test_class_modifier; ?>">
			<a href="rapid_test.php?lang=<?=$global_lang ?>"><?= $rapid_test; ?></a>
		</li>
		<li class="nav-link<?=$booking_class_modifier; ?>">
			<a href="booking.php?lang=<?=$global_lang ?>"><?= $test_booking; ?></a>
		</li>
		<li class="nav-link<?=$free_condom_class_modifier; ?>">
			<a href="free_condom.php?lang=<?=$global_lang ?>"><?=$free_condom; ?></a>
		</li>
	</ul>
</nav>
