<?php

error_reporting(0);
include("configurationfile.php");
include("includes/functions.php");
include("includes/dn.php");
$loadhomepage = "0";

if($_GET['loadurl'] == ""){
$loadurl = file_get_contents("homepage.html");
$loadhomepage = "1";
}

if($_GET['loadurl'] == "/"){
$loadurl = file_get_contents("homepage.html");
$loadhomepage = "1";
}

if(isset($_GET['loadurl']) && ($_GET['loadurl'] != "/")){
	$loadurl = $_GET['loadurl'];
	$loadurl = "http://$domaintoproxy$loadurl";
	$loadurl = str_replace(" ", "+", $loadurl);
	$loadurl = get_data("$loadurl");
}

$loadurl = remove_bloat("$loadurl");
$loadurl = proxyify_links($loadurl);
$thisdomain = $_SERVER['HTTP_HOST'];
$loadurl = str_replace("SDFSDFSDF23423", "$thisdomain", $loadurl);
$loadurl = str_replace("<-TITLEINSETTINGSFILE->", "$pagetitle", $loadurl);
$loadurl = remove_bloat_after_proxify("$loadurl");

echo($loadurl);
?>