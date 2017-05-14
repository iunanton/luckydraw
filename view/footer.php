<?php
	switch($global_lang) {
		case EN:
			$first_column = "CENTER<br>About Us<br>Join Us<br>Member";
			$second_column = "CONTACT<br>(852) 5405 6631";
			$third_column = "ADDRESS<br>Flat 25, 6/F,<br>Career And Kenson Industrial Mansion,<br>58 Hung To Rd,<br>Kwun Tong, HK";
			$fourth_column = "GO UP";
			$copyright = "&copy Copyright By Lucky Draw Studio";
			break;
		case ZH:
			$first_column = "中心<br>關於我們<br>	加入我們<br>會員";
			$second_column = "電話<br>(852) 5405 6631";
			$third_column = "地址<br>香港 觀塘 鴻圖道58號<br>金凱工業大廈 6樓 25室";
			$fourth_column = "GO UP";
			$copyright = "&copy Copyright By 幸運抽獎工作室";
			break;
	}
?>
<footer>
	<div class="footer-row">
		<div class="footer-column"><?=$first_column; ?></div>
		<div class="footer-column"><?=$second_column; ?></div>
		<div class="footer-column"><?=$third_column; ?></div>
		<div class="footer-column"><?=$fourth_column; ?></div>
	</div>
	<div class="footer-row"><?=$copyright; ?></div>
</footer>
