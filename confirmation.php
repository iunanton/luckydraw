<?php
	require_once('constant.php');
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = EN;
	}
	
	$global_page = basename(__FILE__, '.php');
	
	require_once('mydatabase.php');
?>
<?php
	//include myDatabase class
	require_once('mydatabase.php');
	$conn = new myDatabase();

	//GET and POST methods
	if(isset($_POST['test']) && isset($_POST['name']) && isset($_POST['tel'])) {
		$test = $_POST['test'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$conn->setAppointment($test, $name, $tel);
		$info = $conn->getTestInfo($test);
	}
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
<meta name="date" content="2017-05-14T23:55:07+0800" >
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
	<div id="header"><img src="logo.jpg" alt="logo" height="100px"></div>
	<?php
		include('view/navigation_bar.php');
	?>
	<div id="page">
		<div id="header">Confirmation</div>
		<div id="content">
			<p>Your booking was confirmed successfully.</p>
			<p><?= $info['date'].' '.$info['time'] ?></p>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>