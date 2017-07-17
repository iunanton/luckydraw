<!DOCTYPE html>
<?php
	define('__ROOT__', dirname(dirname(dirname(__FILE__))));
	require_once(__ROOT__.'/config/php_config.php');
	require_once(__ROOT__.'/lib/languageshandler.class.php');
	require_once(__ROOT__.'/lib/newshandler.class.php');
	$global_page = basename(__FILE__);
	require_once(__ROOT__.'/lib/locale.php');
	$lang_handler = new languagesHandler();
	$handler = new newsHandler();

	if(isset($_POST['lang']) && isset($_POST['title']) && isset($_POST['editor'])) {
		$handler->add($_POST['lang'], $_POST['title'], $_POST['editor']);
		$prompt = "News was added.";
	}

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
<meta name="date" content="2017-07-18T03:16:54+0800" >
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
<script src="../ckeditor/ckeditor.js"></script>
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
						case 'en':
							$header = "News";
							break;
						case 'zh':
							$header = "最新消息";
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
						case 'en':
							$todayIs = "Today is ".date("j M, Y");
							break;
						case 'zh':
							$todayIs = "今天".date("j M, Y");
							break;
					}
				?>
				<p><?=$todayIs; ?></p>
				<p>Add news</p>
				<form action="" method="POST">
					<div class="input-field">
						<label for="lang">Language: </label>
						<select id="lang" name="lang">
							<option value="">All</option>
							<?php
								$languages = $lang_handler->get();
								foreach ($languages as $key => $language) {
									echo '<option value="'.$key.'">'.$language.'</option>';
								}
							?>
						</select>				
					</div>
					<div class="input-field">
						<label for="title">Heading: </label>
						<input id="title" type="text" name="title">
					</div>
					<div class="input-field">
						<label for="editor">Text: </label>
					</div>
		         <textarea name="editor" id="editor" rows="10" cols="80">
	                Please type news text here.
	            </textarea>
					<div class="input-field">
						<input type="submit" name="" value="Add News" />
					</div>
					<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
						 CKEDITOR.replace( 'editor' );
					</script>
				</form>
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
							echo '<a href="?del='.$article["id"].'">delete</a>';
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