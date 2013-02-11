<?php
	require_once "conf.php";

	try {
		session_start();
		$oauth = getOauth();
		$request_token_path = BASE_API_URL. REQUEST_PATH;
		#echo "path followed is ========= $request_token_path \n";
		$request_token_info = $oauth->getRequestToken( $request_token_path, CALLBACK_URL );
  	if(!empty($request_token_info)) {
  		#print_r($request_token_info);
  		$_SESSION['ppp'] = "shashank";
  		$_SESSION['_oauth_token']        = $request_token_info['oauth_token'];
  		$_SESSION['_oauth_token_secret'] = $request_token_info['oauth_token_secret'];
  		$url  = BASE_API_URL.AUTH_PATH ."?oauth_token=".$request_token_info['oauth_token'];
  		#echo "Done". $_SESSION['_oauth_token'] . $_SESSION['ppp'];
  		header('Location: '.$url );
  	} else {
    	print "Failed fetching request token, response was: " . $oauth->getLastResponse();
  	}	
	} catch (OAuthException $e) {
		echo "Exception Response: ". $e->lastResponse . "\n";
	}

	#gets the request token

?>