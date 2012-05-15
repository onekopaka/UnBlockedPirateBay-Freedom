<?php
require("removebloat.php");
require("proxifycontent.php");

function get_data($url)
{
	$cookie = ("cookies.txt");
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
	curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie); 
	curl_setopt($ch,CURLOPT_USERAGENT,'TMB Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_MAXCONNECTS,320);
	curl_setopt($ch,CURLOPT_TIMEOUT,30);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
	$data = curl_exec($ch);
	curl_close($ch);
	$data .= make_itwork(check);
#	$data .= file_get_contents(
	return $data;
}

function get_data_img($url)
{
	$cookie = ("cookies.txt");
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
	curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie); 
	curl_setopt($ch,CURLOPT_USERAGENT,'TMB Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_MAXCONNECTS,320);
	curl_setopt($ch,CURLOPT_TIMEOUT,30);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function search_curl($url)
{
$ch = curl_init();
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.11) Gecko/20071127 Firefox/2.0.0.11');

// Only calling the head
curl_setopt($ch, CURLOPT_HEADER, true); // header will be at output
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD'); // HTTP request is 'HEAD'

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function make_itwork($make_itwork)
{
	// This function makes nothing work. It adds junk.
	return "";
}
?>