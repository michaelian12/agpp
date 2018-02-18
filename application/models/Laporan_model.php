<?php 
class Laporan_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// Create
	public function get_pekerjaan_query($id)
	{
		$query = $this->db->get_where('pekerjaan', array('id_proyek' => $id));
		return $query->result_array();
	}

	public function get_risiko_query($id)
	{
		$sql = 'select r.id_risiko, mr.nama_master_risiko from risiko r join master_risiko mr on r.id_master_risiko = mr.id_master_risiko where r.id_proyek = '.$id;
		$query = $this->db->query($sql);
		// $query = $this->db->get_where('risiko', array('id_proyek' => $id));
		return $query->result_array();
	}

	public function set_laporan($id)
	{
		// laporan pekerjaan
		// $tgl_laporan = date('Y-m-d');
		$tgl_laporan = $this->input->post('tgl_laporan');
		$kemajuan = $this->input->post('kemajuan');
		$id_pekerjaan = $this->input->post('id_pekerjaan');

		for ($i=0; $i < count($this->input->post('id_pekerjaan')); $i++) {
			$data = array(
				'tgl_laporan_pekerjaan' => $tgl_laporan,
				'kemajuan' => $kemajuan[$i],
				'id_pekerjaan' => $id_pekerjaan[$i]
			);
			$this->db->insert('laporan_pekerjaan', $data);
		}

		// laporan harian
		$data = array(
			'tgl_laporan_harian' => $tgl_laporan,
			'cuaca' => $this->input->post('cuaca'),
			'kendala' => $this->input->post('kendala'),
			'efek' => $this->input->post('efek'),
			'penyebab' => $this->input->post('penyebab'),
			'deteksi' => $this->input->post('deteksi'),
			'id_proyek' => $id
		);
		$this->db->insert('laporan_harian', $data);
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

	public function get_laporan_query($id)
	{
		$sql = 'select pro.id_proyek, lap.tgl_laporan_pekerjaan from proyek pro join pekerjaan pek on pro.id_proyek=pek.id_proyek join laporan_pekerjaan lap on pek.id_pekerjaan=lap.id_pekerjaan group by pro.id_proyek, lap.tgl_laporan_pekerjaan having pro.id_proyek = '.$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// Update
	public function get_laporan_pekerjaan($id, $tgl)
	{
		$sql = 'select pro.id_proyek, lap.id_laporan_pekerjaan, pek.nama_pekerjaan, pek.bobot, lap.kemajuan, lap.tgl_laporan_pekerjaan from proyek pro join pekerjaan pek on pro.id_proyek=pek.id_proyek join laporan_pekerjaan lap on pek.id_pekerjaan=lap.id_pekerjaan having (pro.id_proyek = '.$id.' and lap.tgl_laporan_pekerjaan = "'.$tgl.'")';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_laporan_harian($id, $tgl)
	{
		$query = $this->db->get_where('laporan_harian', array('id_proyek' => $id, 'tgl_laporan_harian' => $tgl));
		return $query->row_array();
	}

	public function update_laporan()
	{
		// laporan pekerjaan
		$id_laporan_pekerjaan = $this->input->post('id_laporan_pekerjaan');
		$kemajuan = $this->input->post('kemajuan');

		$tgl_laporan = $this->input->post('tgl_laporan');

		for ($i=0; $i < count($this->input->post('kemajuan')) ; $i++) { 
			$data = array(
				'tgl_laporan_pekerjaan' => $tgl_laporan,
				'kemajuan' => $kemajuan[$i]
			);
			$this->db->where('id_laporan_pekerjaan', $id_laporan_pekerjaan[$i]);
			$this->db->update('laporan_pekerjaan', $data);
		}

		// laporan harian
		$data = array(
			'tgl_laporan_harian' => $tgl_laporan,
			'cuaca' => $this->input->post('cuaca'),
			'kendala' => $this->input->post('kendala'),
			'efek' => $this->input->post('efek'),
			'penyebab' => $this->input->post('penyebab')
			// 'deteksi' => $this->input->post('deteksi')
		);
		$this->db->where('id_laporan_harian', $this->input->post('id_laporan_harian'));
		$this->db->update('laporan_harian', $data);
	}

	public function update_notifikasi($id)
	{
		$data = array(
			'read_status' => 1
		);

		$this->db->where('id_laporan_harian', $id);
		$this->db->update('laporan_harian', $data);

		$query = $this->db->get_where('laporan_harian', array('id_laporan_harian' => $id));
		return $query->row_array();
	}

	// Delete
	public function delete_laporan($id, $tgl)
	{
		// delete laporan pekerjaan
		$sql = 'select pro.id_proyek, lap.tgl_laporan_pekerjaan, lap.id_laporan_pekerjaan from proyek pro join pekerjaan pek on pro.id_proyek = pek.id_proyek join laporan_pekerjaan lap on pek.id_pekerjaan = lap.id_pekerjaan having (pro.id_proyek = '.$id.' and lap.tgl_laporan_pekerjaan = "'.$tgl.'")';
		$query = $this->db->query($sql);

		$data = $query->result_array();
		foreach ($data as $data_item) {
			$this->db->delete('laporan_pekerjaan', array('id_laporan_pekerjaan'=>$data_item['id_laporan_pekerjaan']));
		};

		// delete laporan kendala
		$this->db->delete('laporan_harian', array('id_proyek'=>$id, 'tgl_laporan_harian'=>$tgl));
	}
}
?>