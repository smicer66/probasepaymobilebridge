<?php

define("PROBASEWALLET_MERCHANT_CODE", "KWAD6L3DWL");
define("PROBASEWALLET_DEVICE_CODE", "OTA84AD9");
define("SHIKOLA_SUBDOMAIN", "demouniversity");
define("SHIKOLA_USERNAME", "admin@bevura.com");
define("SHIKOLA_PASSWORD", "shikola2018");


function sendPostRequest($url, $jsonData)
{
	$ch = curl_init($url);
	//dd($jsonData);

	/*$jsonDataEncoded = json_encode($jsonData);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: plain/text'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	dd([$url, $result]);
	try{
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($result, 0, $header_size);
		$body = substr($result, $header_size);


		curl_close($ch);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}*/


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $jsonData,
		//"username=potzr_staff@gmail.com&encPassword=eyJpdiI6InRLOXJlM0t3cFR6WmNpdVJPWUdxNkE9PSIsInZhbHVlIjoiQTMxNGRFaHhLT3E4UEkwL1dheVV4Zz09IiwibWFjIjoiZmZjMjhmYTdjZTg5NGM3ZDUxYjViY2E4NzVkN2Y1OWYwNDM4M2FiNjA0YTg4M2E0MjY3MzVkYTgzYzE0Mzg4MyJ9&bankCode=PROBASE",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
	));

	$response = curl_exec($curl);

	//dd($response);
	try{
		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);


		curl_close($curl);

		//dd($body);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		//return $body;
		return $response;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}




function sendPostRequestWithToken($url, $jsonData, $token)
{
	$ch = curl_init($url);
	//dd($jsonData);

	/*$jsonDataEncoded = json_encode($jsonData);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: plain/text'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	dd([$url, $result]);
	try{
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($result, 0, $header_size);
		$body = substr($result, $header_size);


		curl_close($ch);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}*/


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $jsonData,
		//"username=potzr_staff@gmail.com&encPassword=eyJpdiI6InRLOXJlM0t3cFR6WmNpdVJPWUdxNkE9PSIsInZhbHVlIjoiQTMxNGRFaHhLT3E4UEkwL1dheVV4Zz09IiwibWFjIjoiZmZjMjhmYTdjZTg5NGM3ZDUxYjViY2E4NzVkN2Y1OWYwNDM4M2FiNjA0YTg4M2E0MjY3MzVkYTgzYzE0Mzg4MyJ9&bankCode=PROBASE",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded",
			//"Authorization: Bearer ".$token
		),
	));

	$response = curl_exec($curl);

	//dd($response);
	try{
		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);


		curl_close($curl);

		//dd($body);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		//return $body;
		return $response;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}


function sendGetRequest($url, $data=NULL)
{

	if($data!=null)
		$url = $url."?".$data;

	//dd($url);
	$_h = curl_init();
	curl_setopt($_h, CURLOPT_HEADER, 1);
	curl_setopt($_h, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($_h, CURLOPT_HTTPGET, 1);
	curl_setopt($_h, CURLOPT_URL, $url );
	curl_setopt($_h, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
	curl_setopt($_h, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
	$ty = curl_exec($_h);
	try{
		$header_size = curl_getinfo($_h, CURLINFO_HEADER_SIZE);
		$header = substr($ty, 0, $header_size);
		$body = substr($ty, $header_size);

		//dd($body);
		curl_close($_h);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}



function sendGetRequestWithToken($url, $data=NULL, $token)
{

	if($data!=null)
		$url = $url."?".$data;

	//dd($url);
	$_h = curl_init();
	curl_setopt($_h, CURLOPT_HEADER, 1);
	curl_setopt($_h, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($_h, CURLOPT_HTTPGET, 1);
	curl_setopt($_h, CURLOPT_URL, $url );
	curl_setopt($_h, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
	curl_setopt($_h, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
	curl_setopt($_h, CURLOPT_HTTPHEADER, array(
		"Authorization: Bearer ".$token
	));
	$ty = curl_exec($_h);
	try{
		$header_size = curl_getinfo($_h, CURLINFO_HEADER_SIZE);
		$header = substr($ty, 0, $header_size);
		$body = substr($ty, $header_size);

		//dd($body);
		curl_close($_h);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}



function sendPostRequestWithTokenForShikola($url, $data=NULL, $token)
{

	if($data!=null)
		$url = $url."?".$data;

	//dd($url);
	$_h = curl_init();
	curl_setopt($_h, CURLOPT_HEADER, 1);
	curl_setopt($_h, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($_h, CURLOPT_HTTPGET, 1);
	curl_setopt($_h, CURLOPT_URL, $url );
	curl_setopt($_h, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
	curl_setopt($_h, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
	curl_setopt($_h, CURLOPT_HTTPHEADER, array(
		"AccessKey: Bearer ".$token
	));
	$ty = curl_exec($_h);
	try{
		$header_size = curl_getinfo($_h, CURLINFO_HEADER_SIZE);
		$header = substr($ty, 0, $header_size);
		$body = substr($ty, $header_size);

		//dd($body);
		curl_close($_h);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}



function sendGetRequestWithTokenForShikola($url, $data=NULL, $token)
{

	if($data!=null)
		$url = $url."?".$data;

	//dd($url);
	$_h = curl_init();
	curl_setopt($_h, CURLOPT_HEADER, 1);
	curl_setopt($_h, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($_h, CURLOPT_HTTPGET, 1);
	curl_setopt($_h, CURLOPT_URL, $url );
	curl_setopt($_h, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
	curl_setopt($_h, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
	curl_setopt($_h, CURLOPT_HTTPHEADER, array(
		"AccessKey: Bearer ".$token
	));
	$ty = curl_exec($_h);
	try{
		$header_size = curl_getinfo($_h, CURLINFO_HEADER_SIZE);
		$header = substr($ty, 0, $header_size);
		$body = substr($ty, $header_size);

		//dd($body);
		curl_close($_h);
		$body = (trim(preg_replace('/\s+/', ' ', $body)));

		return $body;


	}
	catch(\Exception $e)
	{
		return $e;
	}

}



