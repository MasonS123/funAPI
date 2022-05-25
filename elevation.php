<?php
   
    
	$Longitude = $_REQUEST ["Longitude"];
	$Latitude = $_REQUEST ["Latitude"];
	
	// var_dump($Longitude);
	// var_dump($Latitude);
	
	
	$url = "https://api.open-elevation.com/api/v1/lookup?locations=".$Longitude.",".$Latitude;
	
	// var_dump($url);
	
	$ch = curl_init($url);	
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result = curl_exec($ch);
	
	$x = json_decode($result);
	
	
	
	$weby = '<html>
				<head><title>How high are you?</title></head>
				  <body>
						
				  
					
					 <h1> How high are you?</h1>
					<br/>
					<p> ENTER YOUR LONGITUDE AND LATITUDE</p>
					
					<form action="elevation.php">
				  <label for="Longitude">Longitude:</label>
				  <input type="text" id="lon" name="Longitude"><br><br>
				  <label for="Latitude">Latitude:</label>
				  <input type="text" id="lan" name="Latitude"><br><br>
				  <input type="submit" value="Submit">
					</form>
					
					<p> You are  '.$x->results[0]->elevation.' high </p>
					
					
					
					<form id="reset-form" action="#" onsubmit="resetGame(); return false">
					  <button type="submit" id="reset">Reset Game</button>
					</form>
					
					<div id="feedback"></div>
				  </body>
				</html>';
	curl_close($ch);
	
	
	
	echo $weby;
	
?>