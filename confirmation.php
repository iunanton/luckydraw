<?php
	require_once('constant.php');
	if(isset($_GET['lang']) && in_array($_GET['lang'], $lang_array)) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = ZH;
	}
	
	$global_page = basename(__FILE__, '.php');

	require_once('class/mydatabase.php');
?>
<?php
	//include myDatabase class
	require_once('class/mydatabase.php');
	$conn = new myDatabase();

	//GET and POST methods
	if(isset($_POST['test']) && isset($_POST['name']) && isset($_POST['tel'])) {
		$test = $_POST['test'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$conn->setReservation($test, $name, $tel);
		$info = $conn->getTestInfo($test);

	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T02:54:55+0800" >
<meta name="copyright" content="Lucky Draw Studio">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#test-confirmation .input-field {
		display: block;	
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
	<div class="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "Confirmation";
						break;
					case ZH:
						$header = "Confirmation";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<p>Your booking was confirmed successfully.</p>
			<p><?= $info['date'].' '.$info['time'] ?></p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>