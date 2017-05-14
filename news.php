<?php
	require_once('constant.php');
	
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = EN;
	}

	$global_page = basename(__FILE__, '.php');

	require_once('class/mydatabase.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-15T00:39:58+0800" >
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
	<header>
		<img src="logo.jpg" alt="logo" height="100px">
	</header>
	<?php
		include('view/navigation_bar.php');
	?>
	<div id="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "News";
						break;
					case ZH:
						$header = "最新消息";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<?php
				$conn = new myDatabase();
				//$content = $conn->getNews($global_lang);
			?>
			<h2>有關異性戀者的非政府資助測試服務</h2>
			<p>因政府通知，不能使用同志測試服務的資源為異性戀者提供測試服務，但亦明白異性戀者尋找快速測試服務或支援是極為困難，即使有測試服務亦未必能做到即日測試，亦未能解決即時的擔心，所以新的非政府資助異性戀者測試中心(幸運抽獎工作室)將會在觀塘鴻圖道開業為大家服務，測試中心服務時間為星期一至日、下午四時三十分至八時三十分。</p>
			<p>而幸運抽獎工作室於4月1日正式運作，為大家提供HIV愛滋病及Syphilis梅毒快速測試服務。因為網上預約系統未能預期完成，所以暫時只有電話預約。</p>
			<p>亦因為沒有政府資助，所以成本將由捐款支出，成本包括租金、人工、試劑等等，煩請各位踴躍捐助。測試中心門口水牌為「幸運抽獎工作室」及並沒有提及任何疾病的字眼在門口。所有內容不記名及保密。由有處理數以十計positive case經驗的職員主理。</p>
			<p>本會沒有宗教背景也沒有註冊社工，輔導員的性道德觀念薄弱，是多元關係實行者。</p>
			<p>查詢或預約 Tel/WhatsApp：5405 6631/line ID:luckydrawstudio</p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>