<?php
class modules_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function get_modules($name=''){
		if(empty($name)){
			$query = $this->db->get('modules');
			return $query->result_array();
		}
		$query = $this->db->get_where('modules', array('name' => $name));
		return $query->row_array();
	}
}

?>