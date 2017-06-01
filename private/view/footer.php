<?php
	switch($global_lang) {
		case EN:
			$first_column = ARRAY("CENTER","Home");
			$second_column = ARRAY("GO UP");
			$copyright = "Copyright &copy 2016-".YEAR.' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
		case ZH:
			$first_column = ARRAY("中心","首頁");
			$second_column = ARRAY("GO UP");
			$copyright = "Copyright &copy 2016-".YEAR.' <a href="http://xiaodong.com.ru" style="color: inherit">XIAODONG IT Consulting</a>';
			break;
	}
?>
<footer>
	<div class="footer-row" id="footer-info">
		<div class="footer-group">
			<h3><?=$first_column[0]; ?></h3>
			<ul class="nav">
				<li><a href="../news.php"><?=$first_column[1]; ?></a></li>
			</ul>
		</div>
		<div class="footer-group">
			<h3><a href="#"><?=$second_column[0]; ?></a></h3>
		</div>
	</div>
	<div class="footer-row" id="footer-copyright"><?=$copyright; ?></div>		
</footer>