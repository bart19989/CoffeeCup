<?php

class messages_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function set_messages(){
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('slug'), 'dash', TRUE);
		
		$data = array(
			'title' => $this->input->post('title'),
			'slug' 	=> $slug,
			'text' 	=> $this->input->post('text')
		);
		
		return $this->db->insert('messages', $data);
	}
	
	public function get_messages($slug = FALSE){
		if($slug === FALSE){
			$query = $this->db->get('messages');
			return $query->result_array();
		}
		$query = $this->db->get_where('messages', array('slug' => $slug));
		return $query->row_array();
	}
	
	public function getmessagesByID($id){
		if((int)$id > 0){
			$query	=	$this->db->get_where('messages', array('message_id' => $id));
			return $query->result_array();
		}
	}
	
	public function delete($id=0){
		$id	=	intval($id);
		if(!empty($id)){
			$this->db->where('message_id', $id);
			$this->db->delete('messages');
		}
	}
	
}
?>