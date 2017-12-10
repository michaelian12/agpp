<?php 
class Risiko_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

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

	public function get_efek($id)
	{
		$query = $this->db->get_where('efek', array('id_risiko' => $id));
		return $query->result_array();
	}

	public function get_penyebab($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('penyebab');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('penyebab', array('id_risiko' => $id));
			return $query->result_array();
		}
	}

	public function set_risiko()
	{
		$data =  array(
			'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d')
		);

		$this->db->insert('risiko', $data);
		return $this->db->insert_id();
	}

	public function set_efek($id)
	{
		$nama_efek = $this->input->post('nama_efek');

		for ($i = 0; $i < count($this->input->post('nama_efek')); $i++) { 
			$data =  array(
				'nama_efek' => $nama_efek[$i],
				'id_risiko' => $id
			);
			$this->db->insert('efek', $data);
		}
	}

	public function set_penyebab($id)
	{
		$nama_penyebab = $this->input->post('nama_penyebab');
		$nilai_o = $this->input->post('nilai_o');

		for ($i = 0; $i < count($this->input->post('nama_penyebab')); $i++) { 
			$data =  array(
				'nama_penyebab' => $nama_penyebab[$i],
				'nilai_o' => $nilai_o[$i],
				'id_risiko' => $id
			);
			$this->db->insert('penyebab', $data);
		}
	}

	public function update_risiko($id)
	{
		$data =  array(
			'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d')
		);

		$this->db->where('id_risiko', $id);
		$this->db->update('risiko', $data);
	}

	public function delete_risiko($id)
	{
		try {
			// $this->db->delete('efek', array('id_risiko'=>$id));
			// $this->db->delete('penyebab', array('id_risiko'=>$id));
			echo "mau hapus";
			$this->db->delete('risiko', array('id_risiko'=>$id));
		} catch (Exception $e) {
			echo "error";
			echo 'Caught exception: ', $e->getMessage(), '\n';
		}
	}
}
?>