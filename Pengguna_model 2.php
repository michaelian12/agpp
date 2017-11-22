<?php 
class Pengguna_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_pengguna()
	{
		$query = $this->db->get('pengguna');
		return $query->result_array();
	}
	
}
?>