<?php
	switch($global_lang) {
		case EN:
			$first_column = ARRAY("CENTER","Videos","HIV+","About Us","Join Us","Staff");
			$second_column = ARRAY("CONTACT","Tel.: (852) 5405 6631","E-mail: luckydrawkt@gmail.com","WhatsApp: 5405 6631","Line ID: luckydrawstudio");
			$third_column = ARRAY("ADDRESS","Flat 25, 6/F,","Career And Kenson Industrial Mansion,","58 Hung To Rd,","Kwun Tong, HK");
			$fourth_column = ARRAY("GO UP");
			$copyright = "Copyright &copy 2016-".YEAR.' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
		case ZH:
			$first_column = ARRAY("中心","相關影片","HIV 陽性","關於我們","加入我們","工作人員");
			$second_column = ARRAY("聯絡","電話：(852) 5405 6631","電郵地址：luckydrawkt@gmail.com","<img src=\"images/whatsapp.png\" alt=\"whatsapp\" height=\"36\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">WhatsApp: 5405 6631</span>","<img src=\"images/line.png\" alt=\"whatsapp\" height=\"48\" style=\"vertical-align:middle\"><span style=\"vertical-align:middle\">Line ID: luckydrawstudio</span>");
			$third_column = ARRAY("地址","香港觀塘鴻圖道58號","金凱工業大廈","6樓 25室");
			$fourth_column = ARRAY("回頂");
			$copyright = "Copyright &copy 2016-".YEAR.' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
	}
?>
<footer>
	<div class="footer-row" id="footer-info">
		<div class="footer-group">
			<h3><?=$first_column[0]; ?></h3>
			<ul class="nav">
				<li><a href="videos.php"><?=$first_column[1]; ?></a></li>
				<li><a href="hiv_pos.php"><?=$first_column[2]; ?></a></li>
				<li><a href="about_us.php"><?=$first_column[3]; ?></a></li>
				<li><a href="join_us.php"><?=$first_column[4]; ?></a></li>
				<li><a href="private/summary.php"><?=$first_column[5]; ?></a></li>
			</ul>
		</div>
		<div class="footer-group">
			<h3><?=$second_column[0]; ?></h3>
			<ul>
				<li><?=$second_column[1]; ?></li>
				<li><?=$second_column[2]; ?></li>
				<li><?=$second_column[3]; ?></li>
				<li><?=$second_column[4]; ?></li>
			</ul>
		</div>
		<div class="footer-group">
			<h3><?=$third_column[0]; ?></h3>
			<ul class="address">
				<li><?=$third_column[1]; ?></li>
				<li><?=$third_column[2]; ?></li>
				<li><?=$third_column[3]; ?></li>
				<li><?=$third_column[4]; ?></li>
			</ul>
		</div>
		<div class="footer-group">
			<h3><a href="#"><?=$fourth_column[0]; ?></a></h3>
		</div>
	</div>
	<div class="footer-row" id="footer-copyright"><?=$copyright; ?></div>		
</footer>