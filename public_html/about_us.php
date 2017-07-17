<!DOCTYPE html>
<?php
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/config/php_config.php');
	require_once(__ROOT__.'/lib/languageshandler.class.php');
	$global_page = basename(__FILE__);
	require_once(__ROOT__.'/lib/locale.php');
	$lang_handler = new languagesHandler();
	$lang = $lang_handler->getShort();
?>
<html lang="<?=$global_lang; ?>">
<head>
<?php
	include_once(__ROOT__.'/config/hreflang.php');
	include_once('view/title.php');
?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-07-18T05:52:33+0800" >
<meta name="copyright" content="XIAODONG IT Consulting">
<meta name="keywords" content="<?=$meta_keywords; ?>">
<meta name="description" content="<?=$meta_description; ?>">
<meta name="theme-color" content="#FFA366" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=1" />
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
</head>
<body>
	<div class="container">
		<?php
			include('view/header.php');
		?>
		<?php
			include('view/navigation_bar.php');
		?>
		<div class="wrapper">
			<div class="wrapper-header">
				<?php
					switch($global_lang) {
						case 'en':
							$header = "About Us";
							break;
						case 'zh':
							$header = "關於我們";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<?php
					switch($global_lang) {
						case 'en':
							$html = <<<HTML
<article>
<p><strong>Lucky Draw Studio</strong> is a branch of A-Backup and a nonprofit organization. Due to Government has not funded heterosexuals testing service, we will run in a self-financing mode. All the cost are paid by donation. We located in Kwun Tong and provide HIV test and Syphilis test service.</p>
<p>HIV test booking tel: <strong>5405 6631</strong></p>
<p>Sunday to Saturday <strong>16:30 - 20:30</strong></p>
<p>Email address: luckydrawkt@gmail.com</p>
</article>
HTML;
							break;
						case 'zh':
							$html = <<<HTML
<article>
<p><strong>幸運抽獎工作室Lucky Draw Studio</strong>是支援社A-Backup的分支，是一個非牟利團體，因為政府未能資助異性戀者的測試服務，所以本工作室會以自負盈虧的形式運作，而一切成本均由捐款中支出， 並於觀塘測試中心提供愛滋病病毒抗體和性病測試服務。</p>
<p>愛滋病測試電話預約: <strong>5405 6631</strong></p>
<p>星期一至日開放時間 <strong>16:30 - 20:30</strong></p>
<p>電郵地址：luckydrawkt@gmail.com</p>
</article>
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
	</div>
</body>
</html>