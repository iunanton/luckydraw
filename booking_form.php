<!DOCTYPE html>
<?php
	require_once('constant.php');
	
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
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T03:17:52+0800" >
<meta name="copyright" content="XIAODONG IT Consulting">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta name="theme-color" content="#FFA366" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=1" />
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	.input-field {
		display: block;	
	}
	.input-field::after {
		content: '';
		clear: both;
		display: block;	
	}
	.input-field label {
		width: 100px;
		float: left;
		text-align: right;
		margin-right: 10px;
		display: block;
	}
	.input-field input[type=submit] {
		float: left;
		margin-left: 110px;	
	}
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
				<p>Please specify your name and contact phone number below in the form fields:</p>
				<form method="POST" id="test-confirmation" action="confirmation.php">
					<input type="hidden" name="test" value="<?= $test ?>">
					<div class="input-field">
						<label for="name-field">Date:</label>
						<input type="text" id="name-field" name="date" value="<?= $info['date']; ?>" disabled="true">
					</div>
					<div class="input-field">
						<label for="name-field">Time:</label>
						<input type="text" id="name-field" name="time" value="<?= substr($info['time'], 0, 5); ?>" disabled="true">
					</div>
	
					<div class="input-field">
						<label for="name-field">Name:</label>
						<input type="text" id="name-field" name="name" maxlength="16" title="From 1 letter to 16 letters" required>
					</div>
					<div class="input-field">
						<label for="tel-field">Tel.: *</label>
						<input type="text" id="tel-field" name="tel" pattern="[0-9]{8,12}" title="From 8 to 13 digits" required>
					</div>
					<div class="input-field">
						<input type="submit" value="Confirm">				
					</div>
					<div class="input-field">
						* The Tel. No. for urgent re-arrangement ONLY				
					</div>
				</form>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>