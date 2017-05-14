<?php
	require_once('constant.php');
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = EN;
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
<meta name="date" content="2017-05-15T00:39:48+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
</head>
<body>
	<div id="header"><img src="logo.jpg" alt="logo" height="100px"></div>
	<?php
		include('view/navigation_bar.php');
	?>
	<div id="wrapper">
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
			<p>幸運抽獎工作室Lucky Draw Studio是支援社A-Backup的分支，是一個非牟利團體，因為政府未能資助異性戀者的測試服務，所以本工作室會以自負盈虧的形式運作，而一切成本均由捐款中支出， 並於觀塘(鴻圖道58號金凱工業大廈6樓25室)測試中心提供愛滋病病毒抗體和性病測試服務。</p>
			<p>設有測試HIV服務 Tel: 5405 6631</p>
			<p>星期一至五開放時間 16:30 - 20:30(無需預約)</p>
			<p>(無預約停止派籌時間 20:30)</p>
			<p>星期六 / 日16:30 - 20:30 (敬請預約)</p>
			<p>公眾假期 16:30 - 20:30 (敬請預約)</p>
			<p>觀塘鴻圖道58號金凱工業大廈6樓25室</p>
			<p>Email 電郵地址：abackuphk@gmail.com</p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>