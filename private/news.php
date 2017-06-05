<?php
	require_once('../constant.php');
	require_once('../class/newshandler.class.php');
	
	$handler = new newsHandler();
	
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
		include('view/title.php');
	?>
<meta name="generator" content="Bluefish 2.2.7" >
<meta name="author" content="Anton Yun" >
<meta name="date" content="2017-06-05T14:46:16+0800" >
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
		<div class="wrapper-header">
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
		<div class="wrapper-content">
			<?php
				switch($global_lang) {
					case EN:
						$todayIs = "Today is ".date("j M, Y");
						break;
					case ZH:
						$todayIs = "今天".date("j M, Y");
						break;
				}
			?>
			<p><?=$todayIs; ?></p>
			<p><u>Add news</u></p>
			<?php
				$articles = $handler->getTitles();
			?>
			<p><strong><?=sizeof($articles);?> news article(s)</strong> were found:</p>
			<table class="sql-query">
				<tr>
					<th>#</th><th>Title</th><th>Language</th><th>Added at</th><th>Edit</th><th>Delete</th>		
				</tr>
				<?php
					foreach ($articles as $article) {
						echo "<tr>";
						echo "<td>";
						echo $article["id"];
						echo "</td>";
						echo "<td>";
						echo $article["title"];
						echo "</td>";
						echo "<td>";
						echo (is_null($article["lang"]) ? "All" : $article["lang"]);
						echo "</td>";
						echo "<td>";
						echo $article["date"];
						echo "</td>";
						echo "<td>";
						echo "edit";
						echo "</td>";
						echo "<td>";
						echo "delete";
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<?php
		include('view/footer.php');
	?>
</body>
</html>