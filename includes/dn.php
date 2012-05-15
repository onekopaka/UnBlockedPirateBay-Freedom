<?php
function checkurl($url)
{
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$thisdone = "0";
$domaintoproxy = "194.71.107.80";
$checkurl = checkurl("http://$domaintoproxy/");
if(!stristr($checkurl, "HTTP/") === FALSE) {
$domaintoproxy = "194.71.107.80";
$thisdone = "1";
}

if($thisdone == "0"){
$domaintoproxy = "thepiratebay.se";
$checkurl = checkurl("http://$domaintoproxy/");
if(!stristr($checkurl, "HTTP/") === FALSE) {
$domaintoproxy = "thepiratebay.se";
$thisdone = "1";
}
}

if($thisdone == "0"){
$domaintoproxy = "unblockedpiratebay.com/external/tpbdown/?url=";
}
?>