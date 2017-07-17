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
<meta name="date" content="2017-07-18T05:53:43+0800" >
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
							$header = "Rapid Test";
							break;
						case 'zh':
							$header = "快速測試";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<article id="left-column">
					<?php
						switch($global_lang) {
							case 'en':
								$html = <<<HTML
<h3>Heterosexual AIDS Test or HIV Test</h3>
<p><strong>Lucky Draw Studio</strong> (www.luckydrawhk.com) opens Sunday to Saturday and Public Holidays. We provide Anonymous Rapid HIV Test. Only take one drop of blood and the result will come out within 15 munutes. All tests are conducted in private and result will remain Anonymous.</p>
<p>In the future, we will apply Government funding. Meanwhile, the operation cost is solely by donation. All the donation will spend on wages, rent and test kit expense. The running cost is around HK$1000 daily. Service user only need to pay HK$600 per day, then every service user should donate HK$200-300. If you have any financial difficulties, please let us know beforehand. If the donation cannot cover our cost especially rent, the testing service will stop.</p>
<div class="content-image">
	<img src="images/tail_3.jpg" alt="test">
	<p>Hot Line number：<strong>5405 6631</strong></p>
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
		<td colspan="7">
			<strong>5405 6631</strong> Telephone booking 15:30-21:30<br>
			<strong>Walk-in</strong> 16:30-20:30 Please call 5405 6631 before come<br>
			<strong>Internet Booking</strong> 16:30-20:30 Please <a href="booking.php">Click here</a>
		</td>
					</tr>
						<td colspan="7"><strong>Most Convenient Way</strong> >>> <a href="booking.php">Click in for Web booking</a></td>
					</tr>
				</table>
HTML;
								break;
							case 'zh':
								$html = <<<HTML
<h3>異性戀愛滋病測試或HIV測試</h3>
<p><strong>「幸運抽獎工作室」Lucky Draw Studio</strong> (www.luckydrawhk.com) 逢星期一至日及公眾假期提供可即日預約無需等幾日的不記名愛滋病測試及其他性病測試，只需拮一下手指，15分鐘就有結果！所有測試過程及結果絕對保密。</p>
<p>本會未來將會申請政府資助，但現時只靠捐款運作，而捐款全數用於人工、租金、試劑等開支。每日營運開支~$1000，服務使用者祗需付$600，預計每人捐$200~300。如有經濟困難請早開聲。若捐款持續不足維持成本將會停止服務。</p>
<div class="content-image">
	<img src="images/tail_3.jpg" alt="test">
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
		<td colspan="7">
			<strong>5405 6631</strong> 電話預約 15:30 - 21:30<br>
			<strong>自由上嚟</strong> 16:30 - 20:30 請出發前致電 5405 6631<br>
			<strong>網上預約</strong> 16:30 - 20:30 <a href="booking.php">請按此</a>
		</td>
	</tr>
	</tr>
		<td colspan="7"><strong>最快捷方便</strong> >>> <a href="booking.php">按此網上預約</a></td>
	</tr>
</table>
HTML;
								break;

						}
					?>
					<?=$html; ?>
				</article>
				<article id="map"></article>
				<script>
					var map;
					var markers = [];
					function initMap() {
						//Constructor creates a new map - only center and zoom are required.
						map = new google.maps.Map(document.getElementById('map'), {
							center: {lat: 22.309973, lng: 114.224158},
							zoom: 17
						});
					
						var locations = [
							{title: 'Lucky Draw Studio', location: {lat: 22.309973, lng: 114.222658}},
							{title: 'B3 exit (fire station)', location: {lat: 22.3117292, lng: 114.2260397}}
						];

						var largeInfowindow = new google.maps.InfoWindow();
						var bounds = new google.maps.LatLngBounds();

						for (var i = 0; i < locations.length; i++) {
							var position = locations[i].location; 
							var title = locations[i].title;
							var marker = new google.maps.Marker({
								map: map,
								position: position,
								title: title,
								animation: google.maps.Animation.DROP,
								id: i
							});
							markers.push(marker);
							bounds.extend(marker.position);
							marker.addListener('click', function () {
								populateInfoWindow(this, largeInfowindow);
							});
						}
						map.fitBounds(bounds);
						function populateInfoWindow(marker, infowindow) {
							if (infowindow.marker != marker) {
								infowindow.marker = marker;
								infowindow.setContent('<div>' + marker.title + '</div>');
								infowindow.open(map, marker);
								infowindow.addListener('closeclick',function () {
									infowindow.setMarker(null);
								});
							}
						}
					}
				</script>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
		<?php
			switch($global_lang) {
				case 'en':
					$google_map_settings = "region=HK&language=en-GB&";
					break;
				case 'zh':
					$google_map_settings = "region=HK&language=zh-TW&";
					break;
			}
		?>
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?<?=$google_map_settings; ?>key=AIzaSyC0JzzaUAMDLQF-AQ7wdku9Zg2T4IbPvI4&v=3&callback=initMap"
			type="text/javascript">
		</script>
	</div>
</body>
</html>
