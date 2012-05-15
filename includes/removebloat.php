<?php
require("configurationfile.php");
function remove_bloat($toremove){
	//Fix /static links so they work in subdirs
	$toremove = str_replace("src=\"/static","src=\"static" , $toremove);
	$toremove = str_replace("href=\"/static","href=\"static" , $toremove);
	$toremove = str_replace("url(\"/static","url(\"static" , $toremove);
	$toremove = str_replace("url('/static","url('static" , $toremove);

	$toremove = str_replace("//static.thepiratebay.se/","static/" , $toremove);

	//Remove Ads
	$toremove = str_replace("http://clkads.com/","blank.php?blank=", $toremove);

	//We arent actually the piratebay, we are a mirror, lets change the <title> on the homepage only</title>
	$toremove = str_replace("<title>Download music, movies, games, software! The Pirate Bay - The galaxy's most resilient BitTorrent site</title>","<title>$pagetitle</title>", $toremove);

	//Disable tpb.se RSS feed links, if they cant access the main site the RSS will be useless to them. May consider proxying these at some point if there is interest
	$toremove = str_replace("http://rss.thepiratebay.se/","#comingsoon", $toremove);

	//Remove doubleclick popup
	$toremove = str_replace("var urlToShow","var Nothing", $toremove);
	$toremove = str_replace("setCookie(name, value)","setCookieGone(name, value)", $toremove);
	$toremove = str_replace("getCookie(name)","getCookieGone(name)", $toremove);
	$toremove = str_replace("displayTheWindow()","DontdisplayTheWindow()", $toremove);
	$toremove = str_replace("document.onclick = displayTheWindow;","DontdisplayTheWindow()", $toremove);

	//Remove links not wanted/needed
	$toremove = str_replace("<a href=\"/login\" title=\"Login\">Login</a> | ","", $toremove);
	$toremove = str_replace("<a href=\"/register\" title=\"Register\">Register</a> | ","", $toremove);
	$toremove = str_replace("<a href=\"/language\" title=\"Select language\">Language / Select language</a> | ","", $toremove);
	$toremove = str_replace("<a href=\"/contact\" title=\"Contact us\">Contact us</a> | ","", $toremove);
	$toremove = str_replace("<!-- <a href=\"http://www.pirateshops.com\" title=\"Pirate Shops\" target=\"_blank\">Pirate Shops</a> | -->","", $toremove);
	$toremove = str_replace("/ThePirateBayWarMachine","/ThePirateBayWarMachine\" rel=\"nofollow", $toremove);
	$toremove = str_replace("ipredator.se","ipredator.se/\" rel=\"nofollow", $toremove);
	$toremove = str_replace("/tpbdotorg","/tpbdotorg\" rel=\"nofollow", $toremove);

	$toremove = str_replace("href=\"http://bayimg.com","href=\"http://bayimg.com\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"http://suprbay.org/","href=\"http://suprbay.org/\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"http://www.bytelove.com","href=\"http://www.bytelove.com\" rel=\"nofollow", $toremove);
	$toremove = str_replace("bayfiles.com","bayfiles.com\" rel=\"nofollow", $toremove);	
	$toremove = str_replace("href=\"/about","href=\"?loadurl=/about\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"/legal","href=\"?loadurl=/legal\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"/blog","href=\"?loadurl=/blog\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"/policy","href=\"?loadurl=/policy\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"/downloads","href=\"?loadurl=/downloads\" rel=\"nofollow", $toremove);
	$toremove = str_replace("href=\"/doodles","href=\"?loadurl=/doodles\" rel=\"nofollow", $toremove);
	$toremove = str_replace("<b><a href=\"http","<a href=\"http", $toremove);
	$toremove = str_replace("TPB T-shirts</a></b>","TPB T-shirts</a>", $toremove);
	$toremove = str_replace("Bayfiles</a></b>","Bayfiles</a>", $toremove);
	#</a>

	//Remove RSS Logo - We dont support rss
	$toremove = str_replace("<a href=\"/rss\" class=\"rss\" title=\"RSS\"><img src=\"//static.thepiratebay.se/img/rss_small.gif\" alt=\"RSS\" /></a>","", $toremove);
	$toremove = str_replace("<a href=\"/rss\" class=\"rss\" title=\"RSS\"><img src=\"static/img/rss_small.gif\" alt=\"RSS\" /></a>","", $toremove);

	//Remove opensearch
	$toremove = str_replace("<link rel=\"search\" type=\"application/opensearchdescription+xml\" href=\"/static/opensearch.xml\" title=\"Search The Pirate Bay\" />", "", $toremove);
	$toremove = str_replace("<link rel=\"search\" type=\"application/opensearchdescription+xml\" href=\"static/opensearch.xml\" title=\"Search The Pirate Bay\" />", "", $toremove);

	//Switch view not yet supported
	#$toremove = str_replace("<a href=\"?loadurl=/switchview.php?view=s\">Single</a>","<a href=\"#\" onClick=\"alert('This feature is not yet supported. I need to spend a long time adding support for cookies, if/when I do this feature will work.')\">Single</a>", $toremove);

	//Remove detailed artist info that doesnt work, temporary disable comment page switching
	$toremove = str_replace("<div class=\"detailartist\"","<div class=\"detailartist\" style=\"display:none; visibility:hidden;\"", $toremove);
	$toremove = str_replace("onClick=\"comPage","onClick=\"alert('The ability to view more pages of comments is not yet here.');\" doNothing=\"comPage", $toremove);
	#$toremove = str_replace("ajax_details_artinfo.php","blank.php", $toremove);

	return $toremove;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
function remove_bloat_after_proxify($toremove){
	require("configurationfile.php");
	//Lets fix CSS
	$toremove = str_replace("<div id=\"main-content\">","<div id=\"main-content\">$codetop", $toremove);
	return $toremove;
}
?>