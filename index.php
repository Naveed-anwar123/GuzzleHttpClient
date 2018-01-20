 <?php

	

	 function test(){
			header("Content-type:application/json");
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://api.paintapic.com/api/v1/projects',
				CURLOPT_POST => 1,
				//CURLOPT_HEADER => TRUE,
				CURLOPT_POSTFIELDS => array(
					'image' => 'https://searchengineland.com/figz/wp-content/seloads/2015/12/google-amp-fast-speed-travel-ss-1920.jpg',
				),
				
			));
				//curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			// Send the request & save response to $resp
			if(!curl_exec($curl)){
				die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
			}
			else
			{
				return json_decode(curl_exec($curl),true)['uuid'];
				//var_dump(curl_exec($curl));	
				//echo curl_exec($curl);
			}
			// Close request to clear up some resources
			curl_close($curl);
	}

		
		
		
		$uuid = test();
		
		
		for($i =0 ; $i <=8 ; $i++){
				filter($uuid);
		}
		
		
		
		function filter($uuid){
			
			$curl = curl_init();
			//curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
			curl_setopt_array($curl, array(
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_URL => 'http://api.paintapic.com/api/v1/projects/'.$uuid.'/renderings',
					CURLOPT_POST => 1,
					//CURLOPT_HEADER => TRUE,
					CURLOPT_POSTFIELDS => array(
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
					),
					
				));
			
			if(!curl_exec($curl)){
					die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
				}
				else
				{
					//var_dump(json_decode(curl_exec($curl),true));
					return json_decode(curl_exec($curl),true)['rendering']['preview_url'];
					
					// echo "<pre>";
					 // print_r(json_decode(curl_exec($curl),true));
					 // echo "</pre>";
					//var_dump(curl_exec($curl));	
					//echo curl_exec($curl);
				}
				// Close request to clear up some resources
			//curl_close($curl);
		}
 ?>
 
 
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    

    <div class="row text-center text-lg-left">
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://pap-files.s3-us-west-1.amazonaws.com/projects/2981-84d1c555202e409db89eb15a/renderings/43825d9333_preview.png" alt="">
            </a>
        </div>
        
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

 
 