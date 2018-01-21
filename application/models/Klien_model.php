<?php 
class Klien_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function set_klien()
	{
		$data =  array(
			'nama_klien' => $this->input->post('nama_klien'),
			'no_telp' => $this->input->post('no_telp'),
			'perusahaan' => $this->input->post('perusahaan'),
			'alamat' => $this->input->post('alamat')
		);

		$this->db->insert('klien', $data);
	}

	// Read
	public function get_klien($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('klien');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('klien', array('id_klien' => $id));
			return $query->row_array();
		}
	}

	// Update
	public function update_klien($id)
	{
		$data =  array(
			'nama_klien' => $this->input->post('nama_klien'),
			'no_telp' => $this->input->post('no_telp'),
			'perusahaan' => $this->input->post('perusahaan'),
			'alamat' => $this->input->post('alamat')
		);

		$this->db->where('id_klien', $id);
		$this->db->update('klien', $data);
	}

	// Delete
	public function delete_klien($id)
	{
		$this->db->delete('klien', array('id_klien'=>$id));
	}
}
?>