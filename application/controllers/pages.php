<?php
	
class Pages extends MY_Controller{
		
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->library('session');
	}
		
	
	public function index($page = ''){
		$data['title'] 	= 'Pages';
		
		$data['pages']	=	$this->pages_model->get_pages();
		
		$this->render_view('pages/index', $data);
	}

	public function create(){
		$data['title'] = 'Create a new page';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Page content', 'required');
		$this->form_validation->set_rules('site_id', 'Site_id', 'required');
		
		
		
		if($this->form_validation->run() === FALSE){
			$this->load->render_view('pages/create', $data);
		} else {
			$new_page = $this->pages_model->set_page();
			$data['insert_id'] = $new_page;
			//$data['success'] = 'Page '.$new_page.' created';
			
			$this->view($data['insert_id'], $data);
			//redirect('pages/view/'.$data['insert_id'], $data);
		}
	}
	
	public function view($page_id, $data=array()){
		$this->load->helper('url');
		
		if(intval($page_id)){
			$data['page'] = $this->pages_model->get_pages($page_id);
			// Later aflaten vangen door database : page_id
			if(!file_exists('application/views/pages/'.$page_id.'.php')){
				// Pagina bestaat niet,	
				//redirect('pages');
			}
		}
		
		
		
		$data['title']				=	$data['page']['title'];//ucfirst(/*Page title*/);
		//$data['base_url'] 			=	$this->config->item('base_url');
		
		// CSS
		$data['normalize'] 			=	$this->config->item('normalize');
		$data['foundation'] 		=	$this->config->item('foundation');
		$data['screen'] 			=	$this->config->item('screen');
		
		//JS
		$data['foundation_core']	=	$this->config->item('foundation_core');
		$data['modenizr']			=	$this->config->item('modernizer');
		$data['jquery.js']			=	$this->config->item('jquery.js');
		$data['core']				=	$this->config->item('core');
		
		var_dump($data);
		
		
		$this->render_view('pages/view', $data);
	}
	
	public function delete($page_id){
		if(intval($page_id)){
			if($this->pages_model->delete_page($page_id)){
				
			}
			redirect('pages');
		}
	}
}
?>