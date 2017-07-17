<!DOCTYPE html>
<?php
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/config/php_config.php');
	require_once(__ROOT__.'/lib/languageshandler.class.php');
	require_once(__ROOT__.'/lib/weekscheduler.class.php');
	require_once(__ROOT__.'/lib/monthscheduler.class.php');
	$global_page = basename(__FILE__);
	require_once(__ROOT__.'/lib/locale.php');
	$lang_handler = new languagesHandler();
	$lang = $lang_handler->getShort();
	
	if(isset($_GET['day'])) {
		$current_day = $_GET['day'];
	} else {
		$current_day = date("Y-m-d", time());	
	}
?>
<html lang="<?=$global_lang; ?>">
<head>
<?php
	include_once(__ROOT__.'/config/hreflang.php');
	include_once('view/title.php');
?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-07-18T05:53:14+0800" >
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
<link href="weekscheduler.css" rel="stylesheet" type="text/css">
<link href="monthscheduler.css" rel="stylesheet" type="text/css">
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
							$header = "Booking";
							break;
						case 'zh':
							$header = "預約測試";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<?php
					switch($global_lang) {
						case 'en':
							$subheader = "<h2>Heterosexual AIDS Test or HIV Test</h2>";
							break;
						case 'zh':
							$subheader = "<h2>異性戀愛滋病測試或HIV測試</h2>";
							break;
					}
				?>
				<?=$subheader; ?>
				<p>What date and time would you like an appointment?</p>
				<?php
					//Create calendar for current date
					$obj = new weekScheduler($current_day, $global_lang);
					$obj->render();
					$obj = new monthScheduler($current_day, $global_lang);
					$obj->render();
				?>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>