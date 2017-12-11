<?php 
class Pekerjaan_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function set_pekerjaan()
	{
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$bobot = $this->input->post('bobot');
		$id_proyek = $this->input->post('id_proyek');

		for ($i = 0; $i < count($this->input->post('nama_pekerjaan')); $i++) { 
			$data =  array(
				'nama_pekerjaan' => $nama_pekerjaan[$i],
				'bobot' => $bobot[$i],
				'id_proyek' => $id_proyek
			);
			$this->db->insert('pekerjaan', $data);
		}
	}

	// Read
	public function get_proyek($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('proyek');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('proyek', array('id_proyek' => $id));
			return $query->row_array();
		}
	}

	public function get_pekerjaan_query($id)
	{
		$query = $this->db->get_where('pekerjaan', array('id_proyek' => $id));
		return $query->result_array();
	}

	// Update
	public function get_pekerjaan($id)
	{
		$query = $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id));
		return $query->row_array();
	}

	
	public function update_pekerjaan($id)
	{
		$data =  array(
			'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
			'bobot' => $this->input->post('bobot')
		);

		$this->db->where('id_pekerjaan', $id);
		$this->db->update('pekerjaan', $data);
	}

	// Delete
	public function delete_pekerjaan($id)
	{
		$this->db->delete('pekerjaan', array('id_pekerjaan'=>$id));
	}
}
?>