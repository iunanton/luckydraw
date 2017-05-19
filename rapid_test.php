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
<meta name="date" content="2017-05-19T06:27:47+0800" >
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
			<p>A-Backup Testing Centre opens Monday to Saturday and Public Holidays need reservation. We provided Anonymous Rapid HIV Test. Only take a drop of blood and the result will come out within 15 minutes. All test are conducted in private and result will remain Anonymous.</p>
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