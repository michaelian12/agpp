<?php 
class Proyek_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function get_klien()
	{
		$query = $this->db->get('klien');
		return $query->result_array();
	}

	public function set_proyek()
	{
		$data =  array(
			'no_spp' => $this->input->post('no_spp'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_selesai' => $this->input->post('tgl_selesai'),
			'id_klien' => $this->input->post('id_klien')
		);
		
		$this->db->insert('proyek', $data);
	}

	// Read
	public function get_proyek_query()
	{
		$sql = 'select * from proyek p join klien k on p.id_klien = k.id_klien';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// Update
	public function get_proyek($id)
	{
		$query = $this->db->get_where('proyek', array('id_proyek' => $id));
		return $query->row_array();
	}

	public function update_proyek($id)
	{
		$data =  array(
			'no_spp' => $this->input->post('no_spp'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_selesai' => $this->input->post('tgl_selesai'),
			'id_klien' => $this->input->post('id_klien')
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