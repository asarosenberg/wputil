<?php

define("USERNAME", 'test1');
define("PASSWORD", 'pass1');
define("DOMAIN", 'test.com');

# Login attempt against xmlrpc.php
$input_data = '<methodCall><methodName>wp.getUsersBlogs</methodName><params><param><value>'.USERNAME.'</value></param><param><value>'.PASSWORD.'</value></param></params></methodCall>';
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_PORT => "443",
	CURLOPT_URL => 'https://'.DOMAIN.'/xmlrpc.php',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $input_data,
	CURLOPT_HTTPHEADER => array(
	"Cache-Control: no-cache",
	"Content-Type: application/xml",
	#"X-Forwarded-For: 123.123.123.123",
	)
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo '<pre>';
	echo htmlspecialchars($response);
	echo '</pre>';
}
