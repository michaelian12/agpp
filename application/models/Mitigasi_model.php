<?php 
class Mitigasi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function get_risiko_query($id)
	{
		$sql = 'select r.id_risiko, mr.nama_master_risiko from risiko r join master_risiko mr on r.id_master_risiko = mr.id_master_risiko where r.id_proyek = '.$id;
		$query = $this->db->query($sql);
		// $query = $this->db->get_where('risiko', array('id_proyek' => $id));
		return $query->result_array();
	}

	public function get_penyebab_query($id)
	{
		$query = $this->db->get_where('penyebab', array('id_risiko' => $id));
		return $query->result_array();
	}

	public function get_penyebab($id)
	{
		$query = $this->db->get_where('penyebab', array('id_penyebab' => $id));
		return $query->row_array();
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

	public function get_mitigasi_query($id)
	{
		$sql = 'select mr.nama_master_risiko, p.nama_penyebab, p.rpn, p.kategori, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko join master_risiko mr on r.id_master_risiko = mr.id_master_risiko where r.id_proyek = '.$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// Update
	public function get_mitigasi($id)
	{
		$sql = 'select mr.nama_master_risiko, p.nama_penyebab, p.rpn, p.kategori, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko join master_risiko mr on r.id_master_risiko = mr.id_master_risiko having m.id_mitigasi = '.$id;
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