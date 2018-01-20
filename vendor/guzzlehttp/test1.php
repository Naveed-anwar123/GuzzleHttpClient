<?php

require '../autoload.php';
use guzzlehttp\guzzle\src;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

$promises = [];
$client = new GuzzleHttp\Client();

$url = 'http://1.bp.blogspot.com/-5bPNsF5plzw/VnJWs-7RbrI/AAAAAAAARmA/DaZmn8YUjAk/s1600-r/logo_research_at_google_color_1x_web_512dp.png';
	//$apiRequest    = $client->request('POST', 'http://api.paintapic.com/api/v1/projects?image='.$url );
	 $p = $client->request('POST', 'http://api.paintapic.com/api/v1/projects?image='.$url );
	 $content       = json_decode($p->getBody()->getContents(), true);
	      $uuid = $content['uuid'];
	 // GuzzleHttp\Promise\all($p)->then(function (array $responses) {
    // foreach ($responses as $response) {
         // $profile = json_decode($response->getBody(), true);
		  // $uuid = $profile['uuid'];
         // // Do something with the profile.
		 // var_dump($profile);	
    // }
// })->wait();		
		 
	 for($i = 0; $i < 9 ; $i++){
		 
		 $promises[] = $client->requestAsync('POST', 'http://api.paintapic.com/api/v1/projects/'.$uuid.'/renderings',
						array(
							'form_params' => array(
								  "level_of_detail" => "1000",
								  'segmentation_shape'=> '0.5',
								  'number_of_paint_colors'=> '20',
								  "bilateral_filter_window"=> "3",
								  "gaussia_filter_window"=> "1",
								  "color_space"=> "LAB",
								  "canvas_size" => "m",
								  "outline_color"=> "0.75",
								  "contrast_enhancement"=> "false",
								  "noise_reduction"=> "0"

							)
                        )
				);
			
	 }
	 
// foreach (array('naveed','salman') as $username) {
   // // $promises[] = $client->requestAsync('GET', 'https://api.github.com/users/'.$username);
// }

GuzzleHttp\Promise\all($promises)->then(function (array $responses) {
    foreach ($responses as $response) {
         $profile = json_decode($response->getBody(), true);
         // Do something with the profile.
		 var_dump($profile);
    }
})->wait();
?>