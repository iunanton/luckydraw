<!DOCTYPE html>
<?php
	require_once('constant.php');
	
	$global_page = basename(__FILE__, '.php');
	
	require_once('class/mydatabase.php');
?>
<?php
	//include myCalendar class
	require_once('class/mycalendar.php');

	//GET and POST methods
	if(isset($_GET['year']) && isset($_GET['month'])) {
		$year = $_GET['year'];
		$month = str_pad($_GET['month'], 2, '0', STR_PAD_LEFT);
		$day = str_pad($_GET['day'], 2, '0', STR_PAD_LEFT);
	} else {
		$year = YEAR;
		$month = MONTH;
		$day = DAY;
	}
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T03:19:52+0800" >
<meta name="copyright" content="XIAODONG IT Consulting">
<meta name="keywords" content="愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀">
<meta name="description" content="愛滋病測試，AIDS測試，hiv測試，愛滋測試九龍，AIDS測試九龍，hiv測試九龍，aids test kowloon,hiv test kowloon,aids test, hiv test,梅毒測試，syphilis test,梅毒測試，性病測試，STD test,STI test,heterosexual,異性戀">
<meta name="theme-color" content="#FFA366" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=1" />
<link href="style.css" rel="stylesheet" type="text/css">
<link href="class/mycalendar.css" rel="stylesheet" type="text/css">
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
			<div id="wrapper-header">
				<?php
					switch($global_lang) {
						case EN:
							$header = "Booking";
							break;
						case ZH:
							$header = "預約測試";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div id="wrapper-content">
				<?php
					switch($global_lang) {
						case EN:
							$subheader = "<h2>Heterosexual AIDS Test or HIV Test</h2>";
							break;
						case ZH:
							$subheader = "<h2>異性戀愛滋病測試或HIV測試</h2>";
							break;
					}
				?>
				<?=$subheader; ?>			
				<p>What date and time would you like an appointment?</p>
				<?php
					//Create calendar for current date
					$calendar = new myCalendar($year, $month, $global_lang);
					$calendar->draw();
					$calendar->show();
				?>
			</div>
		</div>
		<?php
			include('view/footer.php');
		?>
	</div>
</body>
</html>