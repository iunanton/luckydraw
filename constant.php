<?php
	define("EN", 1, false);
	define("ZH", 2, false);
	define("CH", 3, false);
	define("KR", 4, false);
	define("JP", 5, false);
	define("RU", 6, false);
	define("TODAY", date("Y-m-d"), false);
	define("YEAR", date("Y"), false);
	define("MONTH", date("m"), false);
	define("DAY", date("d"), false);
	define("NOW", date("H:i:s"), false);
	define("END_OF_BOOKING_TIME", "16:00:00", false);
	define("OPERATION_TIME_FROM", "16:00:00", false);
	define("OPERATION_TIME_TO", "21:00:00", false);
	
	$meta_keywords = "愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀";
	$meta_description = "愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀";
	
	$locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
	switch($locale) {
		case "en-US": $global_lang = EN;
			break;
		case "en": $global_lang = EN;
			break;
		case "zh-TW": $global_lang = ZH;
			break;
		case "zh-HW": $global_lang = ZH;
			break;
		case "zh": $global_lang = ZH;
			break;
		default: $global_lang = EN;
			break;
	}
	
?>