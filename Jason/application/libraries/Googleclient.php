<?php

require "./vendor/autoload.php";


class Googleclient {

	public $client_id = "902855485543-vl35n1e25t8u2f8gheuv54f186dvq83u.apps.googleusercontent.com";	

	public function connect($token){

        $client = new Google_Client(['client_id' => $this->client_id]);  // Specify the CLIENT_ID of the app that accesses the backend
        $client->setAuthConfig('./client_secret_902855485543-vl35n1e25t8u2f8gheuv54f186dvq83u.apps.googleusercontent.com.json');
		$payload = $client->verifyIdToken($token);
		if ($payload) {

			return $payload;
		} else {
		  return array();
		}

	}

}
?>