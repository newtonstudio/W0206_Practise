<?php

require "./vendor/autoload.php";


class Googleclient {

	public $client_id = "896812707953-urdg04mdidm1teolcf8308oi8l4qcg48.apps.googleusercontent.com";	

	public function connect($token){

        $client = new Google_Client(['client_id' => $this->client_id]);  // Specify the CLIENT_ID of the app that accesses the backend
        $client->setAuthConfig('./client_secret_896812707953-urdg04mdidm1teolcf8308oi8l4qcg48.apps.googleusercontent.com.json');
		$payload = $client->verifyIdToken($token);
		if ($payload) {

			return $payload;
		} else {
		  return array();
		}

	}

}
?>