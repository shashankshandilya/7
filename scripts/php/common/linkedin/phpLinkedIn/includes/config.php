<?php

/*
 * Config details for the example
 */

define('CALLBACK_URL', 'http://4h45.localtunnel.com/phpLinkedIn/example/index.php');
define('BASE_API_URL', 'https://api.linkedin.com');

define('REQUEST_PATH', '/uas/oauth/requestToken?oauth_callback=' . urlencode(CALLBACK_URL));
define('AUTH_PATH', '/uas/oauth/authorize');
define('ACC_PATH', '/uas/oauth/accessToken');

define('CUSTOMER_KEY', 'gqfw2eyjexcl');
define('CUSTOMER_SECRET', 'P1wzGmPkRtr8dExQ');

$profileFields = array(	'id',
				'first-name',
				'last-name',
				'headline',
				'location',
				'industry',
				'distance',
				'relation-to-viewer',
				'current-status',
				'api-standard-profile-request'
		);
