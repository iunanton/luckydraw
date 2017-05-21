<?php
	switch($global_lang) {
		case EN:
			$first_column = ARRAY("CENTER","About Us","Join Us","Staff");
			$second_column = ARRAY("CONTACT","Tel.: (852) 5405 6631","E-mail: luckygrawkt@gmail.com","<img src=\"images/whatsapp.png\" alt=\"whatsapp\" height=\"24\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">5405 6631</span>","<img src=\"images/line.png\" alt=\"whatsapp\" height=\"32\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">luckydrawstudio</span>");
			$third_column = ARRAY("ADDRESS","Flat 25, 6/F,","Career And Kenson Industrial Mansion,","58 Hung To Rd,","Kwun Tong, HK");
			$fourth_column = ARRAY("GO UP");
			$copyright = "&copy Copyright By Lucky Draw Studio";
			break;
		case ZH:
			$first_column = ARRAY("中心","關於我們","加入我們","工作人員");
			$second_column = ARRAY("聯絡","電話：(852) 5405 6631","電郵地址：luckygrawkt@gmail.com","<img src=\"images/whatsapp.png\" alt=\"whatsapp\" height=\"24\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">5405 6631</span>","<img src=\"images/line.png\" alt=\"whatsapp\" height=\"32\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">luckydrawstudio</span>");
			$third_column = ARRAY("地址","香港觀塘鴻圖道58號","金凱工業大廈","6樓 25室");
			$fourth_column = ARRAY("回頂");
			$copyright = "&copy Copyright By 幸運抽獎工作室";
			break;
		case CH:
			$first_column = ARRAY("中心","关于我们","加入我们","工作人员");
			$second_column = ARRAY("联络","电话：(852) 5405 6631","电邮地址：luckygrawkt@gmail.com","<img src=\"images/whatsapp.png\" alt=\"whatsapp\" height=\"24\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">5405 6631</span>","<img src=\"images/line.png\" alt=\"whatsapp\" height=\"32\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">luckydrawstudio</span>");
			$third_column = ARRAY("地址","香港觀塘鴻圖道58號","金凱工業大廈","6樓 25室");
			$fourth_column = ARRAY("回顶");
			$copyright = "&copy Copyright By 幸運抽獎工作室";
			break;
	}
?>
<footer>
	<div class="footer-row">
		<div class="footer-column">
			<h3><?=$first_column[0]; ?></h3>
			<ul>
				<li><a href="about_us.php?lang=<?=$global_lang; ?>"><?=$first_column[1]; ?></a></li>
				<li><a href="#"><?=$first_column[2]; ?></a></li>
				<li><a href="private/summary.php?lang=<?=$global_lang; ?>"><?=$first_column[3]; ?></a></li>
			</ul>
		</div>
		<div class="footer-column">
			<h3><?=$second_column[0]; ?></h3>
			<ul>
				<li><?=$second_column[1]; ?></li>
				<li><?=$second_column[2]; ?></li>
				<li><?=$second_column[3]; ?></li>
				<li><?=$second_column[4]; ?></li>
			</ul>
		</div>
		<div class="footer-column">
			<h3><?=$third_column[0]; ?></h3>
			<ul>
				<li><?=$third_column[1]; ?></li>
				<li><?=$third_column[2]; ?></li>
				<li><?=$third_column[3]; ?></li>
				<li><?=$third_column[4]; ?></li>
			</ul>
		</div>
		<div class="footer-column">
			<a href="#"><?=$fourth_column[0]; ?></a>
		</div>
	</div>
	<div class="footer-row" id="footer-copyright"><?=$copyright; ?></div>
</footer>