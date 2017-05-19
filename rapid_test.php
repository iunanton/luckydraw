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
<meta name="date" content="2017-05-19T23:07:08+0800" >
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
	#map {
		width: 100%;
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
			<del>Switch language and table style will be implemented later..</del>
			<p>A-Backup Testing Centre opens Monday to Saturday and Public Holidays need reservation. We provided Anonymous Rapid HIV Test. Only take a drop of blood and the result will come out within 15 minutes. All test are conducted in private and result will remain Anonymous.</p>
			<p>
Rapid-Test
愛滋病測試 / HIV測試
「幸運抽獎工作室」Lucky Draw Studio 逢星期一至日及公眾假期提供可即日預約無需等幾日的不記名愛滋病測試及其他性病測試，只需拮一下手指，15分鐘就有結果！所有測試過程及結果絕對保密。
本會未來將會申請政府資助，但現時只靠捐款運作，而捐款全數用於人工、租金、試劑等開支，每日營運開支~$600，預計每人捐$200~300，如有經濟困難請開聲。若捐款持續不足維持成本將會停止服務。			
			
			</p>
			<img src="images/tail_3.jpg" alt="test" height="160">熱線電話：<strong>5405 6631</strong>
			<table class="content-table">
				<tr>
					<th>SUN</th>
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
			最快捷方便>>><a href="booking.php?lang=<?=$global_lang; ?>">按此網上預約</a><br>
			觀塘鴻圖道58號金凱工業大廈6樓25室
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
	<div id="map"></div>
	<script>
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 8,
				center: {lat: -34.397, lng: 150.644}
			});
		}
	</script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiAow0o-xQIPXSlIUfRs1QLEIrdKXTydc&callback=initMap"
		type="text/javascript">
	</script>
</body>
</html>