<?php
class Day5_paymentgateway extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();

        $this->data['endpoint'] = "https://www.mobile88.com/epayment/entry.asp";        
		$this->data['merchantCode'] = "ABC"; //change to your merchant code
		$this->data['merchantKey'] = "1234"; //change to your merchant key

    }
    
    //Check Out Page
    public function subscribe(){

        $this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/subscribe', $this->data);
		$this->load->view('frontend/footer', $this->data);

    }

    //Subscription submission
    public function submit_subscribe(){

        $n = $this->input->post("name", true);
        $e = $this->input->post("email", true);
        $t = $this->input->post("tel", true);        

        $this->load->model("Sales_order_model");

        $soID = $this->Sales_order_model->insert(array(
            'name'          => $n,
            'email'         => $e,
            'tel'           => $t,            
            'order_serial'  => date("YmdHis"),
            'status'        => 0,
            'amount'        => 10.5,
            'created_date'  => date("Y-m-d H:i:s"),
        ));

        redirect(base_url('checkout_payment/'.$soID));

    }

    //The Payment Page, going to send out the form to ipay88
	//Take note that the signature function might need to refer to the documentation
    public function checkout_payment($soID){

        $this->load->model("Sales_order_model");        
        $salesData = $this->Sales_order_model->getOne(array(
            'id' => $soID,
        ));        
        $this->data['salesData'] = $salesData;

        $order_serial = $salesData['order_serial'];
        $order_amount = $salesData['amount'];
        $currency     = "MYR";

        //ipay88 signature 
		$MerchantKey = $this->data['merchantKey'];
		$MerchantCode = $this->data['merchantCode'];
		$RefNo = $order_serial; 
		$amount = str_replace(".", "", $order_amount); // must remove , and . before hash
		

		$this->data['RefNo'] = $RefNo;
		$this->data['amount'] = $amount;
		$this->data['currency'] = $currency;
		$this->data['signature'] = $this->iPay88_signature($MerchantKey.$MerchantCode.$RefNo.$amount.$currency);


		$paymentMethodList = array(
			'' => "Default Payment Method",
			'2' => "Credit Card (MYR)",
			'6' => "Maybank2U",
			'8' => "Alliance Online",
			'10' => "AmOnline",
			'14' => "RHB Online",
			'15' => "Hong Leong Online",
			'16' => "FPX",
			'20' => "CIMB Click",
			'22' => "Web Cash",
			'100' => "Celcom AirCash",
			'102' => "Bank Rakyat Internet Banking",
			'103' => "AffinOnline",
			'48' => "PayPal (MYR)",
		);

		$this->data['paymentMethodList'] = $paymentMethodList;

        
        $this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_payment', $this->data);
		$this->load->view('frontend/footer', $this->data);

    
        

    }    

    //When payment successful, ipay88 server will post to this api
	//we use this api to update payment status of purchase order and send email to admin/user
	public function checkout_callback(){

		try{

			$merchantcode = $_REQUEST["MerchantCode"];
			$paymentid = $_REQUEST["PaymentId"];
			$refno = $_REQUEST["RefNo"];
			$amount = $_REQUEST["Amount"];
			$ecurrency = $_REQUEST["Currency"];
			$remark = $_REQUEST["Remark"];
			$transid = $_REQUEST["TransId"];
			$authcode = $_REQUEST["AuthCode"];
			$estatus = $_REQUEST["Status"];
			$errdesc = $_REQUEST["ErrDesc"];
			$signature = $_REQUEST["Signature"];			

			$amount = str_replace(".", "", $amount);

			$mysignature = $this->iPay88_signature($this->data['merchantKey'].$merchantcode.$paymentid.$refno.$amount.$ecurrency.$estatus);

			if($mysignature != $signature) {
				throw new Exception("Signature error: ".$signature." vs ".$mysignature."<br/>".print_r($_REQUEST,true));
			}

			$this->load->model("Sales_order_model");
			

			$soData = $this->Sales_order_model->getOne(array(
				'order_serial' => $refno,
			));
			if(empty($soData)) {
				throw new Exception("This sales order is not exists");
			}

			if(!empty($soData['status'])) {
				throw new Exception("This sales order already paid");
			}

			$this->Sales_order_model->update(array(
				'id' => $soData['id'],
			), array(
				'status' => 1,
				'modified_date' => date("Y-m-d H:i:s"),
			));
			echo "RECEIVEOK";

		} catch (Exception $e) {			
			echo "ERROR";
		}		

	}

	//last step
	public function checkout_completed($order_id){

		$this->load->model("Sales_order_model");

		$soData = $this->Sales_order_model->getOne(array(
			'id' => $order_id,			
			'is_deleted' => 0,
		));

		if(empty($soData)) {
			show_error("This Sales order is not exists");
		}

		$this->data['soData'] = $soData;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_completed', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

	public function checkout_retry($order_id){

		$this->load->model("Sales_order_model");

		$poData = $this->Sales_order_model->getOne(array(
			'status' => 0,
			'id' => $order_id,			
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Sales order is not exists");
		} else {

			$this->Sales_order_model->update(array(
				'id' => $order_id,	
			), array(
				'order_serial' => date("YmdHis").rand(100,999),
				'modified_date' => date("Y-m-d H:i:s"),
			));

		}
		redirect(base_url('checkout_payment/'.$order_id));

	}

    public function iPay88_signature($source)
	{
	  return base64_encode($this->hex2bin(sha1($source)));
	}


	private function hex2bin($hexSource)
	{		
		 $bin = "";
			for ($i=0;$i<strlen($hexSource);$i=$i+2)
			{
			  $bin .= chr(hexdec(substr($hexSource,$i,2)));
			}
		  return $bin;
	} 

	


}
?>