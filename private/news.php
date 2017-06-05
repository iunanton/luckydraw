<!DOCTYPE html>
<?php
	require_once('../constant.php');
	require_once('../class/newshandler.class.php');
	
	$handler = new newsHandler();
	$global_page = basename(__FILE__, '.php');
	
	if(isset($_GET['del'])) {
		$id = $_GET['del'];
		$handler->delete($id);
		$prompt = "News #$id was deleted.";
	}
?>
<html>
<head>
	<?php
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-06T04:54:25+0800" >
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
<link href="../style.css" rel="stylesheet" type="text/css">
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
						$header = "News";
						break;
					case ZH:
						$header = "最新消息";
						break;
				}
			?>
			<h1><?= $header; ?></h1>
		</div>
		<div id="wrapper-content">
			Today is <?=date("d M, Y"); ?><br><br>
			<u>Add news</u><br><br>
			<table class="content-table">
				<tr>
					<th>#</th><th>Title</th><th>Language</th><th>Added at</th><th>Edit</th><th>Delete</th>		
				</tr>
				<tr>
					<td>1</td><td>有關異性戀者的非政府資助測試服務</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>有關異性戀者的非政府資助測試服務</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>有關異性戀者的非政府資助測試服務</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>有關異性戀者的非政府資助測試服務</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
				<tr>
					<td>1</td><td>有關異性戀者的非政府資助測試服務</td><td>ZH</td><td>2017-05-15</td><td><u>Edit</u></td><td><u>Delete</u></td>		
				</tr>
			</table>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>