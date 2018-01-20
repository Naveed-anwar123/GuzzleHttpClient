<?php
require '../autoload.php';
use guzzlehttp\guzzle\src;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

	
	$source = 'cnn';
	$client = new \GuzzleHttp\Client();
	//$apiRequest    = $client->request('GET', 'https://newsapi.org/v1/articles?source='.$source.'&sortBy=top&apiKey=7acd5b7b868e44808d157bf356c9bbdb' );
	//$content       = json_decode($apiRequest->getBody()->getContents(), true);
	
	$url = 'http://1.bp.blogspot.com/-5bPNsF5plzw/VnJWs-7RbrI/AAAAAAAARmA/DaZmn8YUjAk/s1600-r/logo_research_at_google_color_1x_web_512dp.png';
	$apiRequest    = $client->request('POST', 'http://api.paintapic.com/api/v1/projects?image='.$url );
	$content       = json_decode($apiRequest->getBody()->getContents(), true);
	
   // var_dump($content['uuid']);
   $uuid  = $content['uuid'];
   
    for($i = 0; $i < 9 ; $i++){
            $apiRequest    = $client->post(
                                        'http://api.paintapic.com/api/v1/projects/'.$uuid.'/renderings',
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
            $content       = json_decode($apiRequest->getBody()->getContents(), true);
            $collection[]  = $content;
        }
		echo "<pre>";
			print_r($collection);
		echo "</pre>";
           

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
		//echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		//echo $res->getBody();
		// '{"id": 1420053, "name": "guzzle", ...}'

		// Send an asynchronous request.
		// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
		// $promise = $client->sendAsync($request)->then(function ($response) {
			// echo 'I completed! ' . $response->getBody();
		// });
		// $promise->wait();   


?>