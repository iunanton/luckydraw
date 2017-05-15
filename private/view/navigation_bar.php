<?php
	switch($global_lang) {
		case EN:
			$summary = "SUMMARY";
			$service = "SERVICE";
			break;
		case ZH:
			$summary = "SUMMARY";
			$service = "SERVICE";
			break;
	}
	switch($global_page) {
		case "summary":
			$summary_class_modifier = " selected";
			break;
		case "service":
			$service_class_modifier = " selected";
			break;
	}
?>
<nav>
	<div class="nav-link<?=$summary_class_modifier; ?>" id="summary"><a href="summary.php?lang=<?=$global_lang ?>"><?= $summary; ?></a></div>
	<div class="nav-link<?=$service_class_modifier; ?>" id="service"><a href="service.php?lang=<?=$global_lang ?>"><?= $service; ?></a></div>
</nav>