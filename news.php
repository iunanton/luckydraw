<?php
	require_once('constant.php');
	
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
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
<meta name="date" content="2017-05-22T02:55:08+0800" >
<meta name="copyright" content="Lucky Draw Studio">
<meta name="keywords" content="愛滋病測試,AIDS test,hiv測試,hiv test,syphilis test,梅毒測試,性病測試,STD test,STI test,heterosexual,異性戀">
<meta name="description" content="愛滋病測試,AIDS test,hiv測試,hiv test,syphilis test,梅毒測試,性病測試,STD test,STI test,heterosexual,異性戀">
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
					case CH:
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
			<?php
				switch($global_lang) {
					case EN:
						$html = <<<HTML
<p>Refer to Government statement, No MSM (gay) HIV testing resourse can be used for heterosexual testing service. On the other hand, we understand heterosexuals seeking HIV test and support are very difficult. Even there are some testing service but booking may not be the same day.</p>
<p>It cannot ease the anxiety. So a new non-Government funded heterosexuals testing center (Lucky Draw Studio) will be established in Hung To Road Kwun Tong to serve heterosexuals. The testing center will open Sunday to Saturday, 16:30 to 20:30.</p>
<p><strong>Lucky Draw Studio</strong> starts running on 1st April 2017. We will provide rapid HIV test and Syphilis test. Due to the Internet booking web page is not finished at the moment, you may use the telephone booking.
Because there is no Government funding, all the cost will depended on donation which included rent, wages and test kit etc. Please donate. The Testing Center door sign is Lucky Draw Studio and it has no wording of any diseases. All tests are conducted privately and result will remain Anonymous. Our testing staff has tens of HIV positive cases experience.</p>
<p>We do not have any religion background and no registered social worker. Our Test counselor has thin morality and is polygamy practitioner.</p>
HTML;
						break;
					case ZH:
						$html = <<<HTML
<h2>有關異性戀者的非政府資助測試服務</h2>
<p>因政府通知，不能使用同志測試服務的資源為異性戀者提供測試服務，但亦明白異性戀者尋找快速測試服務或支援是極為困難，即使有測試服務亦未必能做到即日測試，亦未能解決即時的擔心，所以新的非政府資助異性戀者測試中心(幸運抽獎工作室)將會在觀塘鴻圖道開業為大家服務，測試中心服務時間為星期一至日、下午四時三十分至八時三十分。</p>
<p>而幸運抽獎工作室於4月1日正式運作，為大家提供HIV愛滋病及Syphilis梅毒快速測試服務。因為網上預約系統未能預期完成，所以暫時只有電話預約。</p>
<p>亦因為沒有政府資助，所以成本將由捐款支出，成本包括租金、人工、試劑等等，煩請各位踴躍捐助。測試中心門口水牌為「幸運抽獎工作室」及並沒有提及任何疾病的字眼在門口。所有內容不記名及保密。由有處理數以十計positive case經驗的職員主理。</p>
<p>本會沒有宗教背景也沒有註冊社工，輔導員的性道德觀念薄弱，是多元關係實行者。</p>
<p>查詢或預約 Tel/WhatsApp：5405 6631/line ID:luckydrawstudio</p>
HTML;
						break;
					case CH:
						$html = <<<HTML
<h2>有关异性恋者的非政府资助测试服务</h2>
<p>因政府通知，不能使用同志测试服务的资源为异性恋者提供测试服务，但亦明白异性恋者寻找快速测试服务或支援是极为困难，即使有测试服务亦未必能做到即日测试，亦未能解决即时的担心，所以新的非政府资助异性恋者测试中心(幸运抽奖工作室)将会在观塘鸿图道开业为大家服务，测试中心服务时间为星期一至日、下午四时三十分至八时三十分。 </p>
<p>而幸运抽奖工作室于4月1日正式运作，为大家提供HIV爱滋病及Syphilis梅毒快速测试服务。因为网上预约系统未能预期完成，所以暂时只有电话预约。 </p>
<p>亦因为没有政府资助，所以成本将由捐款支出，成本包括租金、人工、试剂等等，烦请各位踊跃捐助。测试中心门口水牌为「幸运抽奖工作室」及并没有提及任何疾病的字眼在门口。所有内容不记名及保密。由有处理数以十计positive case经验的职员主理。 </p>
<p>本会没有宗教背景也没有注册社工，辅导员的性道德观念薄弱，是多元关系实行者。 </p>
<p>查询或预约 Tel/WhatsApp：5405 6631/line ID:luckydrawstudio</p>
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