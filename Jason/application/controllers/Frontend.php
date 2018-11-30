<?php
class Frontend extends CI_Controller {
    public function index(){

        $this->output->enable_profiler(FALSE);

        $this->benchmark->mark("NewmodelLoadingTime_start");
        $this->load->model("News_model");
        $this->benchmark->mark("NewmodelLoadingTime_end");

        $this->benchmark->mark("SlugLoadingTime_start");
        $this->load->helper("slug");
        $this->benchmark->mark("SlugLoadingTime_end");

        // SELECT * FROM news WHERE is_deleted = 0
        $this->benchmark->mark("NewsLoadingTime_start");
        $newsList = $this->News_model->get_where(array(
            'is_deleted' => 0,
        ));
        $this->benchmark->mark("NewsLoadingTime_end");

        $data = array();
        $data['newsList'] = $newsList;

        $this->benchmark->mark("ViewLoadingTime_start");
        $this->load->view("frontend/header", $data);
        $this->load->view("frontend/index", $data);
        $this->load->view("frontend/footer", $data);
        $this->benchmark->mark("ViewLoadingTime_end");
    }

    public function news_detail($id, $slug) {

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

    public function contact(){




        $this->load->view("frontend/header");
        $this->load->view("frontend/contact_api");
        $this->load->view("frontend/footer");
    }

    public function contact_submit(){
        

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

        $this->load->library("emailer");

        $this->emailer->sendmail("jason.tian@i-tea.com.tw", "Someone is calling you...", "You've got a mail!!!");
        
        //bring user to contact again
        redirect(base_url('contact')."?Success=True");

    }

    public function json_demo(){

        //JSON = Javascript Object Notation

        //Javascript Object
        //var c = {"a":"b","c":"d"};

        //Javascript Array
        //var d = ["a","b","c","d"];

        //Object in Array
        // var k = [{"a":"b","c":"d"},{"a":"b","c":"d"},{"a":"b","c":"d"}];

        //Array in Array
        // var j = [["a","b","c","d"],["a","b","c","d"],["a","b","c","d"]];

        //Complex
        /*
         var z = {
            "name":"Michael",
            "carlist":["BMW","Toyota","Mazda"],
            "cart":[{"id":1,"name":"Bread","price":22},{"id":1,"name":"Milk","price":32}]
        }

        */

        //JSON
        //Server -> Server
        //PHP -> PHP
        //Javascript(Client) -> PHP (Server)
        //PHP(Server) -> Javascript (Client)
        //PHP -> MySQL
        //MySQL -> PHP



    }

    public function report(){

        $this->load->view("frontend/header");
        $this->load->view("frontend/report");
        $this->load->view("frontend/footer");

    }
}
?>