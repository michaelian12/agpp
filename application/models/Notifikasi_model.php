<?php 
class Notifikasi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_notifikasi()
	{
		$sql = 'select * from laporan_harian l join proyek p on l.id_proyek = p.id_proyek where l.read_status = 0';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>