<?php

class messages extends CI_Controller{
		
	public function __construct(){
		parent::__construct();
		$this->load->model('messages_model');
		
	}
	
	public function index(){
		$data['title'] = 'Messages';
		$data['messages']	=	$this->messages_model->get_messages();
		
		$this->load->render_view('messages/index' , $data);
	}
	
	public function view($slug=''){
		$data['title'] = 'View '.$slug;
		$data['messages_item']	=	$this->messages_model->get_messages($slug);
		
		
		
		if(empty($data['messages_item'])){
			
			show_404();
		}
		
			
		$this->load->render_view('messages/view', $data);
	}
	
	public function create(){
		$data['title'] = 'Create a message';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
		$this->form_validation->set_rules('slug', 'Categorie', 'required');
		
		if($this->form_validation->run() === FALSE){
			$this->load->render_view('messages/create', $data);
		} else {
			$this->messages_model->set_messages();
			redirect('messages');
		}
	}

	public function delete($id){
		if((int)$id > 0){
			$data['messages_item']	=	$this->messages_model->getmessagesByID($id);
			
			if(empty($data['messages_item'])){
				show_404();
			}
			
			$this->messages_model->delete($id);
			redirect('messages');
		}
	}
	
}
?>