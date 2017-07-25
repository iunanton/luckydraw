<?php
	switch($global_lang) {
		case 'en':
			$first_column = ARRAY("CENTER","Videos","HIV+","About Us","Join Us","Staff");
			$second_column = ARRAY("CONTACT","Tel.: (852) 5405 6631","E-mail: luckydrawkt@gmail.com","WhatsApp: 5405 6631","Line ID: luckydrawstudio");
			$third_column = ARRAY("ADDRESS","Flat 25, 6/F,","Career And Kenson Industrial Mansion,","58 Hung To Rd,","Kwun Tong, HK");
			$fourth_column = ARRAY("GO UP");
			$copyright = "Copyright &copy 2016-".date("Y").' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
		case 'zh':
			$first_column = ARRAY("中心","相關影片","HIV 陽性","關於我們","加入我們","工作人員");
			$second_column = ARRAY("聯絡","電話：(852) 5405 6631","電郵地址：luckydrawkt@gmail.com","WhatsApp: 5405 6631</span>","Line ID: luckydrawstudio</span>");
			$third_column = ARRAY("地址","香港觀塘鴻圖道58號","金凱工業大廈","6樓 25室");
			$fourth_column = ARRAY("回頂");
			$copyright = "Copyright &copy 2016-".date("Y").' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
	}
?>
<footer class="page-footer">
	<div class="footer-row" id="footer-info">
		<div class="footer-group">
			<h3><?=$first_column[0]; ?></h3>
			<ul class="nav">
				<li><a href="videos.php"><?=$first_column[1]; ?></a></li>
				<li><a href="hiv_pos.php"><?=$first_column[2]; ?></a></li>
				<li><a href="about_us.php"><?=$first_column[3]; ?></a></li>
				<li><a href="join_us.php"><?=$first_column[4]; ?></a></li>
				<li><a href="private/summary.php" rel="nofollow"><?=$first_column[5]; ?></a></li>
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