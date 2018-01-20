<?php
//Get data from instagram api
$hashtag = 'max';
//Query need client_id or access_token
$query = array(
	'client_id' => '91bc29c1ab7a4da1806888ed5b9bf487',
	'count'		=> 3
);
$username = "naveed.anwar4";
$access_token = "ddd5c3252cfd4adaa52ae7126da75b2c";
//$url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?'.http_build_query($query);
$url = "https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $access_token;
try {
	$curl_connection = curl_init($url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	
	//Data are stored in $data
	$data = json_decode(curl_exec($curl_connection), true);
	var_dump($data);
	curl_close($curl_connection);
} catch(Exception $e) {
	return $e->getMessage();
}
?>