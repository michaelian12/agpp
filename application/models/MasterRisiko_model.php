<?php 
class MasterRisiko_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function set_master_risiko()
	{
		$data =  array(
			'nama_master_risiko' => $this->input->post('nama_master_risiko')
		);
		
		$this->db->insert('master_risiko', $data);
	}

	// Read
	public function get_master_risiko($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('master_risiko');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('master_risiko', array('id_master_risiko' => $id));
			return $query->row_array();
		}
	}

	// Update
	public function update_master_risiko($id)
	{
		$data =  array(
			'nama_master_risiko' => $this->input->post('nama_master_risiko')
		);

		$this->db->where('id_master_risiko', $id);
		$this->db->update('master_risiko', $data);
	}

	// Delete
	public function delete_master_risiko($id)
	{
		$this->db->delete('master_risiko', array('id_master_risiko'=>$id));
	}
}
?>