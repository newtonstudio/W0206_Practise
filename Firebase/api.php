<?php

$access_token = $_GET['token'];
$type = $_GET['type'];

switch($type) {
    case "fb":
        require "fbclient.php";

        $client = new Fbclient();        

        break;
    case "google":

        require "googleclient.php";

        $client = new Googleclient();        
        

        break;
}

$data = $client->connect($access_token);
echo json_encode($data);


?>