<?php
function proxyify_links($loadurl)
{
	require"configurationfile.php";

	$loadurl = str_replace("/s/","search.php", $loadurl);

	$loadurl = str_replace("http://static.thepiratebay.se","/static", $loadurl);
	$loadurl = str_replace("//static.thepiratebay.se","/static", $loadurl);
	$loadurl = str_replace("//static.thepiratebay.org","/static", $loadurl);

	$loadurl = str_replace("http://torrents.thepiratebay.se/", "gettorrent.php?torrent=", $loadurl);
	$loadurl = str_replace("//torrents.thepiratebay.se/", "gettorrent.php?torrent=", $loadurl);

	$loadurl = str_replace("script src=\"", "script src=\"", $loadurl);
	$loadurl = str_replace("href=\"/","href=\"?loadurl=/", $loadurl);

	if($proxy_bayimg == "1"){
		$loadurl = str_replace("http://image.bayimg.com","loadstatic.php?bayimg=", $loadurl);
	}
	return $loadurl;
}
?>