<?php
class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('modules_model');
	}
	
	public function render_view($body, $data, $return = FALSE){
		$data['menu'] = $this->modules_model->get_modules();
		
		
		print_r($data['menu']);
		
		$template	=	$this->load->view('templates/header', $data, $return);
		$template	=	$this->load->view('templates/top_menu', $data, $return);
		$template	=	$this->load->view('templates/side_menu', $data, $return);
		$template	=	$this->load->view( $body, $data, $return);
		$template	=	$this->load->view('templates/footer', $data, $return);
		
		if($return){
			return $template;
		}
	}
}
?>