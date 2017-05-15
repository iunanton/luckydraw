<?php
	require_once('../constant.php');
	
	if(isset($_GET['lang'])) {
		$global_lang = $_GET['lang'];
	} else {
		$global_lang = EN;
	}

	$global_page = basename(__FILE__, '.php');

	require_once('../class/mydatabase.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-05-16T04:13:12+0800" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>
<body>
	<div id="header">For staff only</div>
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
			Add new service time.<br><br>
			From YYYY-MM-DD To YYYY-MM-DD<br><br>
			<?php
				echo "Today is ".date("d M, Y")."<br>";
				echo "<br>";
				$conn = new myDatabase();
				$defaultTimeArray = $conn->getDefaultTimeArray();
				foreach ($defaultTimeArray as $defaultTime) {
					echo '<input type="checkbox" name="time" value="'.$defaultTime['id'].'">'.$defaultTime['time']."<br>";
				}
			?>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>
