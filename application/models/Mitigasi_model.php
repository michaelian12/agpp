<?php 
class Mitigasi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function get_risiko()
	{
		$query = $this->db->get('risiko');
		return $query->result_array();
	}

	public function get_penyebab($id)
	{
		$query = $this->db->get_where('penyebab', array('id_risiko' => $id));
		return $query->result_array();
	}

	public function set_mitigasi()
	{
		$data =  array(
			'nama_mitigasi' => $this->input->post('nama_mitigasi'),
			'id_penyebab' => $this->input->post('id_penyebab')
		);

		$this->db->insert('mitigasi', $data);
	}

	// Read
	public function get_mitigasi_query()
	{
		$sql = 'select r.nama_risiko, p.nama_penyebab, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// Update
	public function get_mitigasi($id)
	{
		$sql = 'select r.nama_risiko, p.nama_penyebab, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko having m.id_mitigasi = '.$id;
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function update_mitigasi($id)
	{
		$data =  array(
			'nama_mitigasi' => $this->input->post('nama_mitigasi')
		);

		$this->db->where('id_mitigasi', $id);
		$this->db->update('mitigasi', $data);
	}

	// Delete
	public function delete_mitigasi($id)
	{
		$this->db->delete('mitigasi', array('id_mitigasi'=>$id));
	}
}
?>