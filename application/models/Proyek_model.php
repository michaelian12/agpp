<?php 
class Proyek_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function set_proyek()
	{
		$data =  array(
			'no_spp' => $this->input->post('no_spp'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nama_klien' => $this->input->post('nama_klien'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_selesai' => $this->input->post('tgl_selesai')
		);
		
		$this->db->insert('proyek', $data);
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

	// Update
	public function update_proyek($id)
	{
		$data =  array(
			'no_spp' => $this->input->post('no_spp'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nama_klien' => $this->input->post('nama_klien'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_selesai' => $this->input->post('tgl_selesai')
		);

		$this->db->where('id_proyek', $id);
		$this->db->update('proyek', $data);
	}

	// Delete
	public function delete_proyek($id)
	{
		$this->db->delete('proyek', array('id_proyek'=>$id));
	}
}
?>