<?php 
class Risiko_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function update_nilai_kritis($id)
	{
		// nilai kritis
		$sql = 'select p.id_penyebab, p.rpn from penyebab p join risiko r on p.id_risiko = r.id_risiko where r.id_proyek = '.$id;
		$query = $this->db->query($sql);
		$output = $query->result_array();

		$total_rpn = 0;

		foreach ($output as $output_item) {
			$total_rpn += $output_item['rpn'];
		}

		$nilai_kritis = round($total_rpn/count($output));

		$data = array(
			'nilai_kritis' => $nilai_kritis
		);

		$this->db->where('id_proyek', $id);
		$this->db->update('proyek', $data);

		// kategori risiko
		foreach ($output as $output_item) {
			$rpn = $output_item['rpn'];

			if ($rpn >= $nilai_kritis) {
				$kategori = 'Tinggi';
			} else {
				$kategori = 'Rendah';
			}

			$data = array(
				'kategori' => $kategori
			);

			$this->db->where('id_penyebab', $output_item['id_penyebab']);
			$this->db->update('penyebab', $data);
		}

	}

	// Create
	public function set_risiko($id)
	{
		$data =  array(
			// 'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d'),
			'id_master_risiko' => $this->input->post('id_master_risiko'),
			'id_proyek' => $id
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
		$query = $this->db->get_where('risiko', array('id_risiko' => $id));
		$output = $query->row_array();

		$nama_penyebab = $this->input->post('nama_penyebab');
		$nilai_o = $this->input->post('nilai_o');

		for ($i = 0; $i < count($this->input->post('nama_penyebab')); $i++) { 
			$data =  array(
				'nama_penyebab' => $nama_penyebab[$i],
				'nilai_o' => $nilai_o[$i],
				'rpn' => $output['nilai_s'] * $nilai_o[$i] * $output['nilai_d'],
				'id_risiko' => $id
			);
			$this->db->insert('penyebab', $data);
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

	public function get_master_risiko()
	{
		$query = $this->db->get('master_risiko');
		return $query->result_array();
	}

	public function get_risiko_query($id)
	{
		$sql = 'select mr.nama_master_risiko, r.nilai_s, p.nama_penyebab, p.nilai_o, r.nama_kontrol, r.nilai_d, p.rpn, r.id_risiko from risiko r join master_risiko mr on r.id_master_risiko = mr.id_master_risiko join penyebab p on r.id_risiko = p.id_risiko where r.id_proyek = '.$id.' order by p.rpn desc';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// Update
	public function get_risiko($id)
	{
		$query = $this->db->get_where('risiko', array('id_risiko' => $id));
		return $query->row_array();
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

	public function update_risiko($id)
	{
		// risiko
		$data =  array(
			// 'nama_risiko' => $this->input->post('nama_risiko'),
			'nilai_s' => $this->input->post('nilai_s'),
			'nama_kontrol' => $this->input->post('nama_kontrol'),
			'nilai_d' => $this->input->post('nilai_d'),
			'id_master_risiko' => $this->input->post('id_master_risiko')
		);

		$this->db->where('id_risiko', $id);
		$this->db->update('risiko', $data);

		// efek
		$id_efek = $this->input->post('id_efek');
		$nama_efek = $this->input->post('nama_efek');

		for ($i = 0; $i < count($this->input->post('nama_efek')); $i++) {
			// check  if id_efek is exists
			if ($id_efek[$i] != null) {
				// update
				$data =  array(
					'nama_efek' => $nama_efek[$i],
					'id_risiko' => $id
				);
				$this->db->where('id_efek', $id_efek[$i]);
				$this->db->update('efek', $data);
			} else {
				// insert
				$data =  array(
					'nama_efek' => $nama_efek[$i],
					'id_risiko' => $id
				);
				$this->db->insert('efek', $data);
			}
		}

		// penyebab
		$query = $this->db->get_where('risiko', array('id_risiko' => $id));
		$output = $query->row_array();
		
		$id_penyebab = $this->input->post('id_penyebab');
		$nama_penyebab = $this->input->post('nama_penyebab');
		$nilai_o = $this->input->post('nilai_o');

		for ($i = 0; $i < count($this->input->post('nama_penyebab')); $i++) {
			// check  if id_penyebab is exists
			if ($id_penyebab[$i] != null) {
				// update
				$data =  array(
					'nama_penyebab' => $nama_penyebab[$i],
					'nilai_o' => $nilai_o[$i],
					'rpn' => $output['nilai_s'] * $nilai_o[$i] * $output['nilai_d'],
					'id_risiko' => $id
				);
				$this->db->where('id_penyebab', $id_penyebab[$i]);
				$this->db->update('penyebab', $data);
			} else {
				// insert
				$data =  array(
					'nama_penyebab' => $nama_penyebab[$i],
					'nilai_o' => $nilai_o[$i],
					'rpn' => $output['nilai_s'] * $nilai_o[$i] * $output['nilai_d'],
					'id_risiko' => $id
				);
				$this->db->insert('penyebab', $data);
			}
		}

		return $output['id_proyek'];
	}

	// Delete
	public function delete_risiko($id)
	{
		try {
			// $this->db->delete('efek', array('id_risiko'=>$id));
			// $this->db->delete('penyebab', array('id_risiko'=>$id));
			$this->db->delete('risiko', array('id_risiko'=>$id));
		} catch (Exception $e) {
			echo "error";
			echo 'Caught exception: ', $e->getMessage(), '\n';
		}
	}

	public function delete_efek($id)
	{
		$this->db->delete('efek', array('id_efek'=>$id));
	}

	public function delete_penyebab($id)
	{
		$this->db->delete('penyebab', array('id_penyebab'=>$id));
	}
}
?>