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
<?php
	//include myDatabase class
	require_once('class/mydatabase.php');

	//GET and POST methods
	if(isset($_GET['test'])) {
		$test = $_GET['test'];
		$conn = new myDatabase();
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
<meta name="date" content="2017-05-21T02:08:41+0800" >
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
	<div id="wrapper">
		<div id="wrapper-header">
			<?php
				switch($global_lang) {
					case EN:
						$header = "Booking Form";
						break;
					case ZH:
						$header = "Booking Form";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			<p><?= $info['date'].' '.$info['time'] ?></p>
			<p>Please specify your name and contact phone number below in the form fields:</p>
			<form method="POST" id="test-confirmation" action="confirmation.php">
				<input type="hidden" name="test" value="<?= $test ?>">
				<div class="input-field">
					<label for="name-field">Name:</label>
					<input type="text" id="name-field" name="name">
				</div>
				<div class="input-field">
					<label for="tel-field">Tel.:</label>
					<input type="text" id="tel-field" name="tel">
				</div>
				<input type="submit" value="Confirm">
			</form>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>