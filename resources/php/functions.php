<?php
	function get_providers_list() {
		$url["live_api"] = "http://etp-api.dataatwork.org/api/v0/provider/";

	    $request = curl_init(); 
	    curl_setopt($request, CURLOPT_URL, $url["live_api"]); 
		curl_setopt($request,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($request); 
	    curl_close($request);

		return json_decode($response, true);
	}

	function get_provider($provider_id) {
		$url["live_api"] = "http://etp-api.dataatwork.org/api/v0/provider/".$provider_id;

	    $request = curl_init(); 
	    curl_setopt($request, CURLOPT_URL, $url["live_api"]); 
		curl_setopt($request,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($request); 
	    curl_close($request);

		return json_decode($response, true)[0];
	}

	function get_programs_by_provider($provider_id) {
		$url["live_api"] = "http://etp-api.dataatwork.org/api/v0/program/".$provider_id;

	    $request = curl_init(); 
	    curl_setopt($request, CURLOPT_URL, $url["live_api"]); 
		curl_setopt($request,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($request); 
	    curl_close($request);

		return json_decode($response, true);
	}
	
	function get_outcome_data_by_program($provider_id, $program_id) {
		$url["live_api"] = "http://etp-api.dataatwork.org/api/v0/outcome/".$provider_id."/".$program_id;

	    $request = curl_init(); 
	    curl_setopt($request, CURLOPT_URL, $url["live_api"]); 
		curl_setopt($request,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($request); 
	    curl_close($request);

		return json_decode($response, true);
	}

	function get_place_info($place_string) {
		global $api_key;
	
		$url["live_api"] = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=".$place_string."&inputtype=textquery&fields=formatted_address,name&key=".$api_key["google_place_lookup"];

	    $request = curl_init(); 
	    curl_setopt($request, CURLOPT_URL, $url["live_api"]); 
		curl_setopt($request,CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($request); 
	    curl_close($request);
		echo $url["live_api"];
	
		return json_decode($response, true);
	}
	
	function provider_emoji($provider_name) {		
		if(preg_match("/school/i", $provider_name) === 1) { $emoji = "🏫"; }
		if(preg_match("/institute/i", $provider_name) === 1) { $emoji = "🏛"; }
		if(preg_match("/college/i", $provider_name) === 1) { $emoji = "🏢"; }
		if(preg_match("/university/i", $provider_name) === 1) { $emoji = "🏬"; }
		
		return $emoji;
	}
	
	function program_emoji($program_type) {
		$emojis = array("🌎", "🍱", "🏄🏾‍♀️", "🛰", "🌋", "🎥", "📡", "💻", "💈", "🛎", "📰");
		
		return $emojis[$program_type];
	}
?>