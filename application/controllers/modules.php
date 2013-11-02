<?php 

class Modules extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->modules_model();
	}
	
	public function get_menu(){
		$data['items'] = $this->modules_model->get_modules();
		
		echo 'dwadawdw';
		print_r($data);
		
		$this->load->render_view('templates/side_menu', $data);
	}
}
