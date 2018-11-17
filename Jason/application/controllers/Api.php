<?php

//Application Interface
class Api extends CI_Controller {

    public function api_contact_submit(){

        if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));


            $n = $this->input->post("name", true);
            $e = $this->input->post("email", true);
            $t = $this->input->post("tel", true);
            $m = $this->input->post("msg", true);

            $this->load->model("Contact_model");

            $this->Contact_model->insert(array(
                'name'          => $n,
                'email'         => $e,
                'tel'           => $t,
                'msg'           => $m,
                'created_date'  => date("Y-m-d H:i:s"),
            ));

            echo json_encode(array(
                'status' => "OK",
                'result' => array(
                    'name' => $n,
                    'email' => $e,
                    'tel' => $t,
                    'msg' => $m,
                ),  
            ));


        }

        /*
        $n = $this->input->post("name", true);
        $e = $this->input->post("email", true);
        $t = $this->input->post("tel", true);
        $m = $this->input->post("msg", true);

        //PHP Array (Associative) => JSON Object
        //PHP Array (Indexed)     => JSON Array

        $this->load->model("Contact_model");

        $this->Contact_model->insert(array(
            'name'          => $n,
            'email'         => $e,
            'tel'           => $t,
            'msg'           => $m,
            'created_date'  => date("Y-m-d H:i:s"),
        ));

        echo json_encode(array(
            'status' => "OK",
            'result' => array(
                'name' => $n,
                'email' => $e,
                'tel' => $t,
                'msg' => $m,
            ),  
        ));
        */

    }

    public function report_api(){

        /*
        [
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]
        */

        //PHP indexed array => JSON Array
        //PHP Associative array => JSON Object

        $data = array();
        $data[] = array("Year","Sales","Expenses");
        $data[] = array("2013", rand(0,1000), rand(0,400));
        $data[] = array("2014", rand(0,1000), rand(0,400));
        $data[] = array("2015", rand(0,1000), rand(0,400));
        $data[] = array("2015", rand(0,1000), rand(0,400));

        echo json_encode($data);


    }

    public function socialLogin($socialPlatform, $token) {
        

    }

}
?>