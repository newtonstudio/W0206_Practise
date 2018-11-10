<?php
class Frontend extends CI_Controller {
    public function index(){

        $this->load->model("News_model");

        // SELECT * FROM news WHERE is_deleted = 0

        $newsList = $this->News_model->get_where(array(
            'is_deleted' => 0,
        ));

        $data = array();
        $data['newsList'] = $newsList;


        $this->load->view("frontend/header", $data);
        $this->load->view("frontend/index", $data);
        $this->load->view("frontend/footer", $data);
    }

    public function news_detail($id) {

        $data = array();
        $this->load->model("News_model");
        $newsData = $this->News_model->getOne(array(
            'id' => $id,
        ));

        $data['newsData'] = $newsData;

        $this->load->view("frontend/header", $data);
        $this->load->view("frontend/detail", $data);
        $this->load->view("frontend/footer", $data);
    }

    public function about(){
        $this->load->view("frontend/header");
        $this->load->view("frontend/about");
        $this->load->view("frontend/footer");
    }
}
?>