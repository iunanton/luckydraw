<?php
	switch($global_lang) {
		case EN:
			switch($global_page) {
				case "summary":
					$title = "Lucky Draw Studio - Summary";
					break;
				case "rapid_test":
					$title = "Lucky Draw Studio - Rapid Test";
					break;
			}
			break;
		case ZH:
			switch($global_page) {
				case "summary":
					$title = "幸運抽獎工作室 - Summary";
					break;
				case "rapid_test":
					$title = "幸運抽獎工作室 - 快速測試";
					break;
			}
			break;
	}
?>
<title><?=$title ?></title>