<?php
	switch($global_lang) {
		case EN:
			$first_column = ARRAY("CENTER","Back");
			$second_column = ARRAY("GO UP");
			$copyright = "&copy Copyright By Lucky Draw Studio";
			break;
		case ZH:
			$first_column = ARRAY("中心","回上一頁");
			$second_column = ARRAY("GO UP");
			$copyright = "&copy Copyright By 幸運抽獎工作室";
			break;
	}
?>
<footer>
	<div class="footer-row">
		<div class="footer-column">
			<h3><?=$first_column[0]; ?></h3>
			<ul>
				<li><a href="../news.php?lang=<?=$global_lang; ?>"><?=$first_column[1]; ?></a></li>
			</ul>
		</div>
		<div class="footer-column">
			<a href="#"><?=$second_column[0]; ?></a>
		</div>
	</div>
	<div class="footer-row" id="footer-copyright"><?=$copyright; ?></div>
</footer>