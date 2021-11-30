<?php
	// include defines for access to global variables
	include '../defines.php';

	// syntax for api call endpoint
	$endpointSyntax = 'GET https://graph.facebook.com/v11.0/{ig-media-id}?fields={fields}&access_token={access-token}';

	// actual endpoint with a medi aid
	$endpoint = 'https://graph.facebook.com/v11.0/18133500736207075';

	$params = array( // parameters for the endpoint
		'fields' => 'caption,comments_count,id,ig_id,is_comment_enabled,like_count,media_product_type,media_type,media_url,owner,permalink,shortcode,thumbnail_url,timestamp,username,video_title',
		'access_token' => $accessToken
	);

	// make the api call and get a response
	$response = makeApiCall( $endpoint, 'GET', $params );

	/**
	 * Make a a curl call to an endpoint with params
	 *
	 * @param string $endpoint we are hitting
	 * @param string $type of request
	 * @param array $params to send along with the request
	 *
	 * @return array with the api response
	 */
	function makeApiCall( $endpoint, $type, $params ) {
		// initialize curl
		$ch = curl_init();

		// create endpoint with params
		$apiEndpoint = $endpoint . '?' . http_build_query( $params );
		
		// set other curl options
		curl_setopt( $ch, CURLOPT_URL, $apiEndpoint );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		// get response
		$response = curl_exec( $ch );

		// close curl
		curl_close( $ch );

		return array( // return data
			'type' => $type,
			'endpoint' => $endpoint,
			'params' => $params,
			'api_endpoint' => $apiEndpoint,
			'data' => json_decode( $response, true )
		);
	}