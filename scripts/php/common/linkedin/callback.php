<?php
	require_once "conf.php";

	#$oauth = getOauth();
	
	echo "Done". $_SESSION['_oauth_token'] . $_SESSION['ppp'];

	var_dump( $_SESSION );
	// $oauth->setToken($this->getOauth_token(), $this->getOauth_token_secret());
 //  $access_token_info = $oauth->getAccessToken(BASE_API_URL . ACC_PATH);  		
	// $this->setState(2);
	// $this->setToken($access_token_info['oauth_token']);
	// $this->setSecret($access_token_info['oauth_token_secret']);
	// $this->setOauth_verifier($_GET['oauth_verifier']);

?>