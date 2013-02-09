<?php
 	session_start();
 
	$oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);

	try {
		$request_token_response = $oauth->getRequestToken('https://api.linkedin.com/uas/oauth/requestToken');
	 
		if($request_token_response === FALSE) {
		  throw new Exception("Failed fetching request token, response was: " . $oauth->getLastResponse());
		} else {
		  $request_token = $request_token_response;
		  $oauth_token = $request_token['oauth_token'];
		  $_SESSION['requestToken']  = serialize( $request_token['oauth_token'] );
		  $url = "https://api.linkedin.com/uas/oauth/authorize?oauth_token=$oauth_token";
		  header("Location: $url");
		}	
	} catch (Exception $e) {
		echo "$e->getmessage()";
	}

?>
