<?php
	require_once('constant.php');
	
	if(isset($_GET['lang']) && in_array($_GET['lang'], $lang_array)) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
	}

	$global_page = basename(__FILE__, '.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T02:54:34+0800" >
<meta name="copyright" content="Lucky Draw Studio">
<meta name="keywords" content="愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀">
<meta name="description" content="愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
</head>
<body>
	<?php
		include('view/header.php');
	?>
	<?php
		include('view/navigation_bar.php');
	?>
	<div class="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "About Us";
						break;
					case ZH:
						$header = "關於我們";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<?php
				switch($global_lang) {
					case EN:
						$html = <<<HTML
<p><strong>Lucky Draw Studio</strong> is a branch of A-Backup and a nonprofit organization. Due to Government has not funded heterosexuals testing service, we will run in a self-financing mode. All the cost are paid by donation. We located in Kwun Tong and provide HIV test and Syphilis test service.</p>
<p>HIV test booking tel: <strong>5405 6631</strong></p>
<p>Sunday to Saturday <strong>16:30 - 20:30</strong></p>
<p>Email address: luckydrawkt@gmail.com</p>
HTML;
						break;
					case ZH:
						$html = <<<HTML
<p><strong>幸運抽獎工作室Lucky Draw Studio</strong>是支援社A-Backup的分支，是一個非牟利團體，因為政府未能資助異性戀者的測試服務，所以本工作室會以自負盈虧的形式運作，而一切成本均由捐款中支出， 並於觀塘測試中心提供愛滋病病毒抗體和性病測試服務。</p>
<p>愛滋病測試電話預約: <strong>5405 6631</strong></p>
<p>星期一至日開放時間 <strong>16:30 - 20:30</strong></p>
<p>電郵地址：luckydrawkt@gmail.com</p>
HTML;
						break;
				}
			?>
			<?=$html; ?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>