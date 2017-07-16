<?php
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang']."<br>";		
	} else {
		$langs = array();
		$preferred = array('en', 'zh', 'cn', 'kr');
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			echo $_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
			preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
			if (count($lang_parse[1])) {
				$langs = array_combine($lang_parse[1], $lang_parse[4]);
				foreach ($langs as $lang => $val) {
					if ($val === '') $langs[$lang] = 1;
				}
				arsort($langs, SORT_NUMERIC);
			}
		}
		$intersect = array_values(array_intersect(array_keys($langs), $preferred));
		
		if (isset($intersect[0])) {
			$global_lang = $intersect[0];
		} else {
			$global_lang = 'en';
		}
		header("Location: ".$global_lang.$_SERVER['REQUEST_URI']);
		die();
	}
?>
