<?php
class Day3_unittest extends CI_Controller {
    public function runtest(){

        $this->load->model("Contact_model");
        $this->load->library('unit_test');

        //Unittest就像是Class的身體檢查報告一樣
        //當有新的成員進來，就可以自動測試，看看本來的成員是否有異動
        //以免因為一個元件壞掉，進而影響整個系統的運作

        //1. Test get_where
        $contactList = $this->Contact_model->get_where();
        $this->unit->run($contactList, 'is_array', 'contactList is array');

        //2. Test insert and getOne together
        $insert_array = array(
            'name'          => "Jason",
            'email'         => "jason.tian@i-tea.com.tw",
            'tel'           => "0161234567",
            'msg'           => "test",
            'created_date'  => date("Y-m-d H:i:s"),
        );

        $id = $this->Contact_model->insert($insert_array);
        //$insert_array['id'] = $id;

        $contactData = $this->Contact_model->getOne(array(
            'id' => $id,
        ));

        $this->unit->run($contactData, $insert_array, 'insert data is equal to getOne data');

        echo $this->unit->report();

    }
}
?>