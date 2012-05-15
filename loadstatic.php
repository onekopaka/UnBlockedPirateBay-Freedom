<?php
include("includes/functions.php");

if(isset($_GET['static'])){
$loadurl = $_GET['static'];
$loadurl = "http://static.thepiratebay.se$loadurl";
$loadurl = get_data_img("$loadurl");
}

if(isset($_GET['bayimg'])){
$loadurl = $_GET['bayimg'];
$loadurl = "http://image.bayimg.com$loadurl";
$loadurl = get_data_img("$loadurl");
}

echo($loadurl);
?>