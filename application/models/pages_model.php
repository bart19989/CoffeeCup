<?php 
class pages_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function get_pages($page_id = 0){
		if($page_id == 0){
			$query = $this->db->get('pages');
			return $query->result_array();	
		}
		$query = $this->db->get_where('pages', array('page_id' => $page_id));
		return $query->row_array();
	}
	
	public function set_page(){
		$this->load->helper('url');
		
		$title_url = url_title($this->input->post('title'), 'dash', TRUE);
		
		$data = array(
			'title' 	=> $this->input->post('title'),
			'site_id' 	=> $this->input->post('site_id'),
			'content' 	=> $this->input->post('content')
		);
		
		$this->db->insert('pages', $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
	}
	
	public function delete_page($id=0){
		$id	=	intval($id);
		if(!empty($id)){
			$this->db->where('page_id', $id);
			$this->db->delete('pages');
		}
	}
}
?>