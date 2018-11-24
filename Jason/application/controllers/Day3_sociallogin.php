<?php
class Day3_sociallogin extends CI_Controller {
    public function glogin_api(){

        $this->load->library("googleclient");
        $token = $this->input->post("token",true);
        $data = $this->googleclient->connect($token);
        echo json_encode($data);

    }

    public function flogin_api(){

        $this->load->library("fbclient");
        $token = $this->input->post("token",true);
        $data = $this->fbclient->connect($token);
        echo json_encode($data);

    }
    
}