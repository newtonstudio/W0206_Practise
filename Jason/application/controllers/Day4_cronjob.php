<?php
class Day4_cronjob extends CI_Controller {

    public function cronjob(){
		
		$this->load->model("Currency_history_model");

		$data = file_get_contents("http://data.fixer.io/api/latest?access_key=cf70e47f987ad95d2a361d3ff831a02e&format=1");

		$myData = json_decode($data, true);

		if($myData['success']) {

			$this->Currency_history_model->insert(array(
				'date'	=> $myData['date'],
				'ts'	=> $myData['timestamp'],
				'EURMYR' => $myData['rates']['MYR'],
				'created_date' => date('Y-m-d H:i:s'),
			));

		}


	}

}
?>
