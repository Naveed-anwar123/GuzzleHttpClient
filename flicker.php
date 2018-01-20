<?php

	 function test(){
			$api_key = "3c78da5fbdc4ad1235bd766fa1d31f33";
			$tag = 'nature,flowers,background,buildings,seas';
			//$tag = 'profile';
			$perPage = 100;
			$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.Search';
			//$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.getSizes';
			$url.= '&api_key='.$api_key;
			$url.= '&tags='.$tag;
			$url.= '&per_page='.$perPage;
			$url.= '&format=json';
			$url.= '&nojsoncallback=1';
			//header("Content-type:application/json");
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				//CURLOPT_POST => 1,
				//CURLOPT_HEADER => TRUE,
				
				
			));
				//curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			// Send the request & save response to $resp
			if(!curl_exec($curl)){
				die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
			}
			else
			{
				/*$cu = curl_init();
				$arr [] = json_decode(curl_exec($curl),true);
				//print_r($arr[0]["photos"]["photo"]);
				$photo_array = $arr[0]["photos"]["photo"];
				$ur = 'https://api.flickr.com/services/rest/?method=flickr.photos.getSizes';
				foreach($photo_array as $single_photo){
					$photo_id = $single_photo["id"];
					//echo $photo_id;
					
					curl_setopt_array($cu, array(
						CURLOPT_RETURNTRANSFER => 1,
						CURLOPT_URL => $ur,
						CURLOPT_POST => 1,
						//CURLOPT_HEADER => TRUE,
						CURLOPT_POSTFIELDS => array(
							'photo_id' => $photo_id
						)
						
					));
						if(!curl_exec($cu)){
							die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
						}
						else
						{
							$ar [] = json_decode(curl_exec($curl),true);
							var_dump($ar);
						}
					
				}*/
				//var_dump($);
				$arr [] = json_decode(curl_exec($curl),true);
				$photo_array = $arr[0]["photos"]["photo"];
				foreach($photo_array as $single_photo){
 
					$farm_id = $single_photo["farm"];
					$server_id = $single_photo["server"];
					$photo_id = $single_photo["id"];
					$secret_id = $single_photo["secret"];
					$size = 'm';
					$title = $single_photo["title"];
					 
					$photo_url = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';
					 echo "<a href='".$photo_url."' download='flickr.jpg'><img src='".$photo_url."' width='300' height='300'/ ></a>";
					 
					 //echo '<img src="https://pbs.twimg.com/profile_images/839721704163155970/LI_TRk1z_400x400.jpg">';
					 
				}
				
			
				
				//var_dump(curl_exec($curl));	
				//echo curl_exec($curl);
			}
			// Close request to clear up some resources
			curl_close($curl);
	}

		
		test();

?>


	

