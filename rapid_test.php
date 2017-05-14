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
		$filename = basename(__FILE__, '.php');
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-14T23:55:13+0800" >
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
	<div id="page">
		<div id="header">Rapid Test</div>
		<div id="content">
			<p>A-Backup Testing Centre opens Monday to Saturday and Public Holidays need reservation. We provided Anonymous Rapid HIV Test. Only take a drop of blood and the result will come out within 15 minutes. All test are conducted in private and result will remain Anonymous.</p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>