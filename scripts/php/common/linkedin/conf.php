<?php
	
	define("BASE_URL", 'http://4h45.localtunnel.com/oauth.php');
	define("CALLBACK_URL", 'http://4h45.localtunnel.com/callback.php');
	define("API_KEY", "gqfw2eyjexcl");
	define("API_SECRET", "P1wzGmPkRtr8dExQ");
	define("OAUTH_USER_TOKEN:", "e3de13c7-417e-4c1c-8dbd-7479a92008cf");
	define("OAUTH_USER_SECRET:", "7255aa7e-0746-4f8e-b031-3e581f07610c");

	define("BASE_API_URL", 'https://api.linkedin.com');
	define("AUTH_PATH", '/uas/oauth/authenticate');
	define("REQUEST_PATH", '/uas/oauth/requestToken');
	define("ACC_PATH", '/uas/oauth/accessToken');

	/*get oauth object done */
	function getOauth(){
		$oauth = new OAuth(API_KEY, API_SECRET, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
		$oauth->setAuthType(OAUTH_AUTH_TYPE_AUTHORIZATION);
		$oauth->setNonce(rand());
		$oauth->enableDebug();	
		return $oauth;
	}
	/*oauth object is done */

?>