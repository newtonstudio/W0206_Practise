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

    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public function productList(){

        $time_start = $this->microtime_float();

        $this->load->model("Products_model");
        $this->load->model("Categories_model");

        $category_array = array();
        $categoryList = $this->Categories_model->get_where();
        if(!empty($categoryList)) {
            foreach($categoryList as $v) {
                $category_array[$v['id']] = $v['name'];
            }
        }


        $productList = $this->Products_model->fetch(1000, 0);
        //$productList = $this->Products_model->get_where();
        if(!empty($productList)) {
            foreach($productList as $k => $v) {

                
                //method I
                // $categoryData = $this->Categories_model->getOne(array(
                //     'id' => $v['category_id'],
                // ));
                // $productList[$k]['category_name'] = $categoryData['name'];
                

                //method II
                
                $productList[$k]['category_name'] = isset($category_array[$v['category_id']])?$category_array[$v['category_id']]:'';
                

            }
        }

        $time_end = $this->microtime_float();

        $diff = $time_end - $time_start;

        echo json_encode(array(
            'time' => $diff,
            'productList' => $productList,
        ));

    }

}
?>