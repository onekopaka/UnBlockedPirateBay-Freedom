<?php
include("includes/functions.php");
include("includes/dn.php");

$scriptname = $_SERVER['SCRIPT_NAME'];
$loadurl = $_SERVER["REQUEST_URI"];
$loadurl = str_replace("$scriptname", "http://$domaintoproxy/s/", $loadurl);

$loadurl = search_curl($loadurl);

$loadurl = remove_bloat("$loadurl");
$loadurl = str_replace("piratebay.se", "", $loadurl);
$loadurl = str_replace(" ", "+", $loadurl);

$loadurl = nl2br("$loadurl");

$regex = '/Location:+(.*)<br \/>/';
preg_match($regex,$loadurl,$match);
$loadurl = $match[1];
$loadurl = str_replace(",200", "", $loadurl);
$loadurl = str_replace("+/search/", "/search/", $loadurl);
$loadurl = str_replace("/0/99/", "/0/7/", $loadurl);

@header("Location: index.php?loadurl=$loadurl");
exit;
?>