<?php
class Day5_recaptcha extends CI_Controller {

    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['site_key'] = "6LfuJ34UAAAAALWfqMDrCOY3E80bej6xtfhYn-Vh
        ";
        $this->data['secret_key'] = "6LfuJ34UAAAAAB9O29FrVfaM-wiRmXlreKQa0zol
        ";
        

    }

    public function contact(){
        $this->load->view("frontend/header", $this->data);
        $this->load->view("frontend/contact", $this->data);
        $this->load->view("frontend/footer", $this->data);
    }

    public function contact_submit(){

        $gresponse = $this->input->post("g-recaptcha-response", true);			
		$query = http_build_query(array(
			'secret'	=> $this->data['secret_key'],
			'response'	=> $gresponse,
			'remoteip'	=> isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'',
		)); 
					
		$context = stream_context_create(array(
			'http' => array(
				'method' => 'POST',
				'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
				'content' => $query,
			),
		));
					
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify",false,$context);
					
		$result = json_decode($response, true);
										
		//判斷驗證碼是否正確
		if(!$result['success']) {
			show_error('Make sure you are not a robot');
		}
        

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

        /*
        $this->load->library("emailer");
        $this->emailer->sendmail("jason.tian@i-tea.com.tw", "Someone is calling you...", "You've got a mail!!!");
        */
        
        //bring user to contact again
        redirect(base_url('contact')."?Success=True");

    }

}
?>