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
<meta name="date" content="2017-05-20T04:11:54+0800" >
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
	#left-column {
		float: left;
		width: 60%;
		margin-right: 20px;

	}
	#map {
		float: right;
		width: 36%;
		height: 400px;	
	}
	#wrapper-content::after {
		display: block;
		content: '';
		clear: both;	
	}
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
						$header = "Rapid Test";
						break;
					case ZH:
						$header = "快速測試";
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
<p>A-Backup Testing Centre opens Monday to Saturday and Public Holidays need reservation. We provided Anonymous Rapid HIV Test. Only take a drop of blood and the result will come out within 15 minutes. All test are conducted in private and result will remain Anonymous.</p>
HTML;
						break;
					case ZH:
						$html = <<<HTML
<p><strong>愛滋病測試 / HIV測試</strong><br>
<strong>「幸運抽獎工作室」Lucky Draw Studio</strong> 逢星期一至日及公眾假期提供可即日預約無需等幾日的不記名愛滋病測試及其他性病測試，只需拮一下手指，15分鐘就有結果！所有測試過程及結果絕對保密。</p>
<p>本會未來將會申請政府資助，但現時只靠捐款運作，而捐款全數用於人工、租金、試劑等開支，每日營運開支~$600，預計每人捐$200~300，如有經濟困難請開聲。若捐款持續不足維持成本將會停止服務。</p>	
HTML;
						break;
				}
			?>
			<div id="left-column">
				<?=$html; ?>
				<div class="content-image">
					<img src="images/tail_3.jpg" alt="test" height="160">
					<p>熱線電話：<strong>5405 6631</strong></p>
				</div>
				<table class="content-table">
					<tr>
						<th class="selected">SUN</th>
						<th>MON</th>
						<th>TUE</th>
						<th>WED</th>
						<th>THU</th>
						<th>FRI</th>
						<th>SAT</th>
					</tr>
					<tr>
						<td colspan="7">16:30-20:30<br>可親臨本中心即場安排測試<br>(無預約停止派籌時間 20:30)</td>
					</tr>
					<tr>
						<td colspan="7">服務時間 Service Hour 16:30 - 20:30<br>請電 Tel 5405 6631或 <a href="booking.php?lang=<?=$global_lang; ?>">網上預約</a></td>				
					</tr>
				</table>
				<p>最快捷方便>>><a href="booking.php?lang=<?=$global_lang; ?>">按此網上預約</a></p>
				<p><strong>觀塘鴻圖道58號金凱工業大廈6樓25室</strong></p>
			</div>
			<div id="map"></div>
			<script>
				var map;
				function initMap() {
					//Constructor creates a new map - only center and zoom are required.
					map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: 22.309973, lng: 114.222658},
						zoom: 18
					});
				}
			</script>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0JzzaUAMDLQF-AQ7wdku9Zg2T4IbPvI4&v=3&callback=initMap"
		type="text/javascript">
	</script>
</body>
</html>