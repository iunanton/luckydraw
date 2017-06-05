<?php
	require_once('../constant.php');
	require_once('../class/videoshandler.class.php');
	
	$handler = new videosHandler();

	$global_page = basename(__FILE__, '.php');
	
	if(isset($_GET['lang']) && isset($_GET['title']) && isset($_GET['content'])) {
		$handler->add($_GET['lang'], $_GET['title'], $_GET['content']);
		$prompt = "Video was added.";
	}
	
	if(isset($_GET['del'])) {
		$id = $_GET['del'];
		$handler->delete($id);
		$prompt = "Video #$id was deleted.";
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
<meta name="date" content="2017-06-06T04:56:57+0800" >
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
	<div class="container">
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
							$header = "Videos";
							break;
						case ZH:
							$header = "相關影片";
							break;
					}
				?>
				<h1><?= $header; ?></h1>
			</div>
			<div class="wrapper-content">
				<div class="prompt">
					<?=$prompt; ?>
				</div>
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
	<!----------------------------------------------------------------------------------- -->
				Add new video.<br><br>
				For Youtube video:<br>Please fill video title, copy iframe tag and paste it below:<br><br>
				<!--Add new time slot form-->
				<form action="" method="GET">
					<!--Try date input here-->
					<div class="input-field">
						<label for="lang">Language: </label>
						<select id="lang" name="lang">
							<option value="">All</option>
							<?php
								$languages = $handler->getLang();
								foreach ($languages as $key => $language) {
									echo '<option value="'.$key.'">'.$language.'</option>';
								}
							?>
						</select>				
					</div>
					<div class="input-field">
						<label for="title">Title: </label>
						<input id="title" type="text" name="title">
					</div>
					<div class="input-field">
						<label for="content">iframe tag: </label>
						<input id="content" type="text" name="content">
					</div>
					<div class="input-field">
						<input type="submit" name="" value="Add video" />
					</div>
				</form>
	<!--------------------------------------------------------------------------------- -->
				<?php
					$videos = $handler->getTitles();
				?>
				<p><strong><?=sizeof($videos);?> news videos(s)</strong> were found:</p>
				<table class="sql-query">
					<tr>
						<th>#</th><th>Title</th><th>Language</th><th>Added at</th><th>Edit</th><th>Delete</th>		
					</tr>
					<?php
						foreach ($videos as $video) {
							echo "<tr>";
							echo "<td>";
							echo $video["id"];
							echo "</td>";
							echo "<td>";
							echo $video["title"];
							echo "</td>";
							echo "<td>";
							echo (is_null($video["lang"]) ? "All" : $video["lang"]);
							echo "</td>";
							echo "<td>";
							echo $video["date"];
							echo "</td>";
							echo "<td>";
							echo "edit";
							echo "</td>";
							echo "<td>";
							echo '<a href="?del='.$video["id"].'">delete</a>';
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
	</div>
</body>
</html>
