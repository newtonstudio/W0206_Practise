<?php
class Day4_recursive extends CI_Controller {

    private $loopStruc = array(
		array(
			'title' => "Computer Brand",
			'children' => array(
				array(
					'title' => "ASUS",
					'children' => array(
						array(
							'title' => "LAPTOP",
							'children' => array(),
							)
					)
				),
				array(
					'title' => "ACER",
					'children' => array(
						array(
							'title' => "LAPTOP",
							'children' => array(),
							)
					)
				),
			)
		),
		array(
			'title' => "Mobile Brand",
			'children' => array(
				array(
					'title' => "ASUS",
					'children' => array(
						array(
							'title' => "MOBILE",
							'children' => array(),
							)
					)
				),
				array(
					'title' => "ACER",
					'children' => array(
						array(
							'title' => "MOBILE",
							'children' => array(),
							)
					)
				),
			)
		),

	);

	public function loopCategory($loopStruc) {

		$html = '';
		if(!empty($loopStruc)) {
			$html .= '<ul>';
			foreach($loopStruc as $v) {
				$html .= '<li>'.$v['title'].$this->loopCategory($v['children']).'</li>';
			}
			$html .= '</ul>';
		}
		return $html;

	}

	public function showresult(){

        echo $this->loopCategory($this->loopStruc);

    }


}
?>