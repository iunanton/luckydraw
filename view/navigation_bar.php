	<nav>
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
					$free_condom = "無標題文件";
					$videos = "相關影片";
					$hiv_pos = "HIV 陽性";
					$join_us = "加入我們";
					$about_US = "關於我們";
					break;
			}
		?>
		<div class="nav-link" id="news"><a href="news.php?lang=<?=$global_lang ?>"><?= $news; ?></a></div>
		<div class="nav-link" id="rapid-test"><a href="rapid_test.php?lang=<?=$global_lang ?>"><?= $rapid_test; ?></a></div>
		<div class="nav-link" id="test-booking"><a href="booking.php?lang=<?=$global_lang ?>"><?= $test_booking; ?></a></div>
		<div class="nav-link" id="free-condom"><a href="#"><?=$free_condom; ?></a></div>
		<div class="nav-link" id="videos"><a href="#"><?=$videos; ?></a></div>
		<div class="nav-link" id="hiv-pos"><a href="#"><?=$hiv_pos; ?></a></div>
		<div class="nav-link" id="join-us"><a href="#"><?=$join_us; ?></a></div>
		<div class="nav-link" id="about-us"><a href="about_us.php?lang=<?=$global_lang ?>"><?= $about_US; ?></a></div>
	</nav>