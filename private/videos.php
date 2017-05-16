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
<meta name="date" content="2017-05-17T06:23:21+0800" >
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
						$header = "Videos";
						break;
					case ZH:
						$header = "相關影片";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			Today is <?=date("d M, Y"); ?><br><br>
			<u>Add video</u><br><br>
			<table class="content-table">
				<tr>
					<th>#</th><th>Title</th><th>Language</th><th>Added at</th><th>Edit</th><th>Delete</th>		
				</tr>
				<tr>
					<td>1</td><td>Video title</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>Video title</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>Video title</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>Video title</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>Video title</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
			</table>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>
