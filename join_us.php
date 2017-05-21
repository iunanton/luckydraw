<?php
	require_once('constant.php');
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
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
<meta name="date" content="2017-05-22T02:31:53+0800" >
<meta name="copyright" content="Lucky Draw Studio">
<meta name="keywords" content="aids test,HIV test,heterosexual,syphilis test,STI test,STD test">
<meta name="description" content="aids test,HIV test,heterosexual,syphilis test,STI test,STD test">
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
						$header = "Join Us";
						break;
					case ZH:
						$header = "加入我們";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<p>Coming soon...</p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>
