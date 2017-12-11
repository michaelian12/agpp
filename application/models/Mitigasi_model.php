<?php 
class Mitigasi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_mitigasi_query()
	{
		$sql = 'select r.nama_risiko, p.nama_penyebab, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_mitigasi($id)
	{
		$sql = 'select r.nama_risiko, p.nama_penyebab, m.nama_mitigasi, m.id_mitigasi from mitigasi m join penyebab p on m.id_penyebab = p.id_penyebab join risiko r on p.id_risiko = r.id_risiko having m.id_mitigasi = '.$id;
		$query = $this->db->query($sql);
		return $query->row_array();
	}

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

	public function update_mitigasi($id)
	{
		$data =  array(
			'nama_mitigasi' => $this->input->post('nama_mitigasi')
		);

		$this->db->where('id_mitigasi', $id);
		$this->db->update('mitigasi', $data);
	}

	public function delete_mitigasi($id)
	{
		$this->db->delete('mitigasi', array('id_mitigasi'=>$id));
	}

	// public function set_risiko()
	// {
	// 	$data =  array(
	// 		'nama_risiko' => $this->input->post('nama_risiko'),
	// 		'nilai_s' => $this->input->post('nilai_s'),
	// 		'nama_kontrol' => $this->input->post('nama_kontrol'),
	// 		'nilai_d' => $this->input->post('nilai_d')
	// 	);

	// 	$this->db->insert('risiko', $data);
	// 	return $this->db->insert_id();
	// }

	// public function set_efek($id)
	// {
	// 	$nama_efek = $this->input->post('nama_efek');

	// 	for ($i = 0; $i < count($this->input->post('nama_efek')); $i++) { 
	// 		$data =  array(
	// 			'nama_efek' => $nama_efek[$i],
	// 			'id_risiko' => $id
	// 		);
	// 		$this->db->insert('efek', $data);
	// 	}
	// }

	// public function set_penyebab($id)
	// {
	// 	$nama_penyebab = $this->input->post('nama_penyebab');
	// 	$nilai_o = $this->input->post('nilai_o');

	// 	for ($i = 0; $i < count($this->input->post('nama_penyebab')); $i++) { 
	// 		$data =  array(
	// 			'nama_penyebab' => $nama_penyebab[$i],
	// 			'nilai_o' => $nilai_o[$i],
	// 			'id_risiko' => $id
	// 		);
	// 		$this->db->insert('penyebab', $data);
	// 	}
	// }

	// public function update_risiko($id)
	// {
	// 	// risiko
	// 	$data =  array(
	// 		'nama_risiko' => $this->input->post('nama_risiko'),
	// 		'nilai_s' => $this->input->post('nilai_s'),
	// 		'nama_kontrol' => $this->input->post('nama_kontrol'),
	// 		'nilai_d' => $this->input->post('nilai_d')
	// 	);

	// 	$this->db->where('id_risiko', $id);
	// 	$this->db->update('risiko', $data);

	// 	// efek
	// 	$id_efek = $this->input->post('id_efek');
	// 	$nama_efek = $this->input->post('nama_efek');

	// 	for ($i = 0; $i < count($this->input->post('nama_efek')); $i++) {
	// 		// check  if id_efek is exists
	// 		if ($id_efek[$i] != null) {
	// 			// update
	// 			$data =  array(
	// 				'nama_efek' => $nama_efek[$i],
	// 				'id_risiko' => $id
	// 			);
	// 			$this->db->where('id_efek', $id_efek[$i]);
	// 			$this->db->update('efek', $data);
	// 		} else {
	// 			// insert
	// 			$data =  array(
	// 				'nama_efek' => $nama_efek[$i],
	// 				'id_risiko' => $id
	// 			);
	// 			$this->db->insert('efek', $data);
	// 		}
	// 	}

	// 	// penyebab
	// 	$id_penyebab = $this->input->post('id_penyebab');
	// 	$nama_penyebab = $this->input->post('nama_penyebab');
	// 	$nilai_o = $this->input->post('nilai_o');

	// 	for ($i = 0; $i < count($this->input->post('nama_penyebab')); $i++) {
	// 		// check  if id_penyebab is exists
	// 		if ($id_penyebab[$i] != null) {
	// 			// update
	// 			$data =  array(
	// 				'nama_penyebab' => $nama_penyebab[$i],
	// 				'nilai_o' => $nilai_o[$i],
	// 				'id_risiko' => $id
	// 			);
	// 			$this->db->where('id_penyebab', $id_penyebab[$i]);
	// 			$this->db->update('penyebab', $data);
	// 		} else {
	// 			// insert
	// 			$data =  array(
	// 				'nama_penyebab' => $nama_penyebab[$i],
	// 				'nilai_o' => $nilai_o[$i],
	// 				'id_risiko' => $id
	// 			);
	// 			$this->db->insert('penyebab', $data);
	// 		}
	// 	}
	// }

	// public function delete_risiko($id)
	// {
	// 	try {
	// 		// $this->db->delete('efek', array('id_risiko'=>$id));
	// 		// $this->db->delete('penyebab', array('id_risiko'=>$id));
	// 		$this->db->delete('risiko', array('id_risiko'=>$id));
	// 	} catch (Exception $e) {
	// 		echo "error";
	// 		echo 'Caught exception: ', $e->getMessage(), '\n';
	// 	}
	// }

	// public function delete_efek($id)
	// {
	// 	$this->db->delete('efek', array('id_efek'=>$id));
	// }

	// public function delete_penyebab($id)
	// {
	// 	$this->db->delete('penyebab', array('id_penyebab'=>$id));
	// }
}
?>