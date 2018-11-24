<?php
class Day4_timespace extends CI_Controller {

    //to demo, we need some fake data
    public function generateData(){

        $this->load->model("Categories_model");
        $this->load->model("Products_model");

        for($i=0;$i<30000;$i++) {

            $category_id = $this->Categories_model->insert(array(
                'name' => md5($i),
            ));

            $this->Products_model->insert(array(
                'category_id' => $category_id,
                'name'        => sha1($i),
                'created_date' => date("Y-m-d H:i:s"),
            ));

        }


    }

    public function productList(){

        $this->load->model("Products_model");

        $productList = $this->Products_model->fetch(10, 0);

        echo json_encode($productList);

    }

}
?>