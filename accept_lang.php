<?php
$var = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo $var;
?>
<?php
$locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
echo $locale;
?>
