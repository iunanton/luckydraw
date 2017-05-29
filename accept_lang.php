<?php
$var = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo $var;
$locale = Locale::acceptFromHttp($var);
echo $locale;
?>
