<?php

$ch = curl_init();

$cookieFile = dirname(__FILE__) . 'tmp\cookie.txt' ; // Apparently, this path suits the situation when you write code on Windows system. If it's Linux, you should change it to a proper path format for Linux.
$userAgent = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.104 Safari/537.36 Core/1.53.2372.400 QQBrowser/9.5.10548.400';

if (file_exists($cookieFile)){
    unlink($cookieFile);
}

curl_setopt($ch, CURLOPT_URL,'https://github.com/login' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_id());
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch, CURLOPT_REFERER, 'https://github.com');
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/text; charset=UTF-8'));

$result = curl_exec($ch);
curl_close($ch);

var_dump(htmlspecialchars($result));