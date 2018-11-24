<?php
class Day3_sociallogin extends CI_Controller {
    public function glogin_api(){

        $this->load->library("googleclient");
        $token = $this->input->post("token",true);
        $data = $this->googleclient->connect($token);

        $this->load->model("User_model");

        $userdata = $this->User_model->getOne(array(
            'type' => "google",
            'email' => $data['email'],
            'is_deleted' => 0,
        ));
        if(empty($userdata)) {

            $this->User_model->insert(array(
                'type' => "google",
                'email' => $data['email'],
                'token' => $token,
                'created_date' => date("Y-m-d H:i:s"),
            ));

        } else {

            $this->User_model->update(array(
                'id' => $userdata['id'],
            ), array(
                'token' => $token,
                'modified_date' => date("Y-m-d H:i:s"),
            ));

        }



        //echo json_encode($data);

    }

    public function flogin_api(){

        $this->load->library("fbclient");
        $token = $this->input->post("token",true);
        $data = $this->fbclient->connect($token);
        //echo json_encode($data);
        $this->load->model("User_model");

        $userdata = $this->User_model->getOne(array(
            'type' => "fb",
            'email' => $data['email'],
            'is_deleted' => 0,
        ));
        if(empty($userdata)) {

            $this->User_model->insert(array(
                'type' => "fb",
                'email' => $data['email'],
                'token' => $token,
                'created_date' => date("Y-m-d H:i:s"),
            ));

        } else {

            $this->User_model->update(array(
                'id' => $userdata['id'],
            ), array(
                'token' => $token,
                'modified_date' => date("Y-m-d H:i:s"),
            ));

        }


    }
    
}