<?php
// create both cURL resources
$ch1 = curl_init();
$ch2 = curl_init();

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($ch1, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://api.paintapic.com/api/v1/projects',
				CURLOPT_POST => 1,
				//CURLOPT_HEADER => TRUE,
				CURLOPT_POSTFIELDS => array(
					'image' => 'https://searchengineland.com/figz/wp-content/seloads/2015/12/google-amp-fast-speed-travel-ss-1920.jpg',
				),
				
			));
			
			curl_setopt($ch1, CURLOPT_HEADER, 0);

			
			curl_setopt_array($ch2, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://api.paintapic.com/api/v1/projects',
				CURLOPT_POST => 1,
				//CURLOPT_HEADER => TRUE,
				CURLOPT_POSTFIELDS => array(
					'image' => 'https://searchengineland.com/figz/wp-content/seloads/2015/12/google-amp-fast-speed-travel-ss-1920.jpg',
				),
				
			));
			
			curl_setopt($ch2, CURLOPT_HEADER, 0);
// set URL and other appropriate options




//create the multiple cURL handle
$mh = curl_multi_init();

//add the two handles
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$active = null;
//execute the handles
do {
    $mrc = curl_multi_exec($mh, $active);
} while ($mrc == CURLM_CALL_MULTI_PERFORM);

while ($active && $mrc == CURLM_OK) {
    if (curl_multi_select($mh) != -1) {
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    }
}

//close the handles
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);

?>