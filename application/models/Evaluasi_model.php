<?php 
class Evaluasi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function get_risiko($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('risiko');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('risiko', array('id_risiko' => $id));
			return $query->row_array();
		}
	}

	public function get_risiko_query($id)
	{
		$query = $this->db->get_where('risiko', array('id_proyek' => $id));
			return $query->result_array();
	}

	public function get_penyebab($id)
	{
		$query = $this->db->get_where('penyebab', array('id_penyebab' => $id));
		return $query->row_array();
	}

	public function get_efek_query($id)
	{
		$query = $this->db->get_where('efek', array('id_risiko' => $id));
		return $query->result_array();
	}

	public function get_penyebab_query($id)
	{
		$query = $this->db->get_where('penyebab', array('id_risiko' => $id));
		return $query->result_array();
	}

	public function get_mitigasi_query($id)
	{
		$query = $this->db->get_where('mitigasi', array('id_penyebab' => $id));
		return $query->result_array();
	}

	public function set_evaluasi($id)
	{
		$tgl_evaluasi = date('Y-m-d');

		$data =  array(
			'tgl_evaluasi' => $tgl_evaluasi,
			'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_penyebab' => $this->input->post('nama_penyebab'),
			'nilai_o' => $this->input->post('nilai_o'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d'),
			'rpn' => $this->input->post('rpn'),
			'kategori' => $this->input->post('kategori'),
			'nama_mitigasi' => $this->input->post('nama_mitigasi'),
			'id_proyek' => $id
		);

		$this->db->insert('evaluasi', $data);
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

	public function get_evaluasi_query($id)
	{
		$query = $this->db->get_where('evaluasi', array('id_proyek' => $id));
		return $query->result_array();
	}

	// Update
	public function get_evaluasi($id)
	{
		$query = $this->db->get_where('evaluasi', array('id_evaluasi' => $id));
		return $query->row_array();
	}

	public function update_evaluasi($id)
	{
		$data =  array(
			'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_penyebab' => $this->input->post('nama_penyebab'),
			'nilai_o' => $this->input->post('nilai_o'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d'),
			'rpn' => $this->input->post('rpn'),
			'kategori' => $this->input->post('kategori'),
			'nama_mitigasi' => $this->input->post('nama_mitigasi')
		);

		$this->db->where('id_evaluasi', $id);
		$this->db->update('evaluasi', $data);
	}

	// Delete
	public function delete_evaluasi($id)
	{
		$this->db->delete('evaluasi', array('id_evaluasi'=>$id));
	}
}
?>