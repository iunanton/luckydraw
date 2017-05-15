<?php
	switch($global_lang) {
		case EN:
			$summary = "SUMMARY";
			$rapid_test = "RAPID TEST";
			break;
		case ZH:
			$summary = "SUMMARY";
			$rapid_test = "快速測試";
			break;
	}
	switch($global_page) {
		case "summary":
			$summary_class_modifier = " selected";
			break;
		case "service":
			$rapid_test_class_modifier = " selected";
			break;
	}
?>
<nav>
	<div class="nav-link<?=$summary_class_modifier; ?>" id="summary"><a href="summary.php?lang=<?=$global_lang ?>"><?= $summary; ?></a></div>
	<div class="nav-link<?=$rapid_test_class_modifier; ?>" id="rapid_test"><a href="rapid_test.php?lang=<?=$global_lang ?>"><?= $rapid_test; ?></a></div>
</nav>