<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="/assets/css/style.css"> -->
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<script type="text/javascript">
	// jquery codes - makes data display without refreshing the page!
	// this time through $get i/o $post

	// array return on browser w/out using jquery ->
	// weather = { "data": { "current_condition": [ {"cloudcover": "0", "humidity": "23", "observation_time": "10:44 PM", "precipMM": "0.0", "pressure": "1016", "temp_C": "1", "temp_F": "34", "visibility": "16", "weatherCode": "113",  "weatherDesc": [ {"value": "Sunny" } ],  "weatherIconUrl": [ {"value": "http:\/\/cdn.worldweatheronline.net\/images\/wsymbols01_png_64\/wsymbol_0001_sunny.png" } ], "winddir16Point": "NW", "winddirDegree": "321", "windspeedKmph": "0", "windspeedMiles": "0" } ],  "request": [ {"query": "New York, United States Of America", "type": "City" } ],  "weather": [ {"date": "2014-03-26", "precipMM": "0.4", "tempMaxC": "2", "tempMaxF": "35", "tempMinC": "-6", "tempMinF": "21", "weatherCode": "113",  "weatherDesc": [ {"value": "Sunny" } ],  "weatherIconUrl": [ {"value": "http:\/\/cdn.worldweatheronline.net\/images\/wsymbols01_png_64\/wsymbol_0001_sunny.png" } ], "winddir16Point": "NW", "winddirDegree": "322", "winddirection": "NW", "windspeedKmph": "40", "windspeedMiles": "25" } ] }}

	$(document).ready(function(){
		$('form').submit(function(){
		$.get(
			$(this).attr('action')+"?callback=?",
			$(this).serialize(),
			function(weather){
				// print weather on sole -> help decide how to call out what we need to grab
				console.log(weather);
			// this is to capture only data we need.
			// data -> current_condition -> index 0 -> "temp_F" => which value is  "34"
			var temp = weather.data.current_condition[0].temp_F;
			var temp_c = weather.data.current_condition[0].temp_C;
			
			// aim: add temp info to html and show on view -> NEED HTML TAG! -> jquery requirement -> div id='result'-> add temp and display there
			// echo $_SESSION
			// $('#result').append("<h1>The city you request is:" + query + "</h1>");			
			$('#result').append("<h2>The current temperature is: " + temp+"</h2>");
			$('#result').append('<h2>The temperature in C is '+ temp_c + "</h2>");
			},
			'json');
		return false;
		});
	});
	</script>
	<title>Weather API</title>
</head>
<body>
	<!-- this just grab result , but page refresh -->

	<h2>This is to show how Ajax and API work together. Data is shown Without refreshing the page by using Ajax. </h2>
	<h2>API grabs city's weather real-time info and present on the view page. </h2>
	<form action='http://api.worldweatheronline.com/free/v1/weather.ashx' method='get'>
		<select name = 'q' >
			<!-- when user choose mountain view in the dropdown -> create 'get' variable->
			  $_get('q') -> value is mountain_view-->
			<option value='mountain_view'>Mountain View</option>
			<option value='new_york'>New York</option>
			<option value='north_carolina'>North Carolina</option>
			<option value='la'>Los Angela</option>
		</select>
		<!-- hardcore the key value  -->
		<input type='hidden' name='key' value='jtpc4myth9fwxjgwz9fh5fw5'>
		<input type='hidden' name='format' value='json'>
		<!-- submit button -->
		<input type='submit' value='get weather!'>
	</form>

	<div id='result'>
	</div>
</body>
</html>















