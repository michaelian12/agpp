<?php 
class Pekerjaan_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_proyek()
	{
		$query = $this->db->get('proyek');
		return $query->result_array();
	}

	public function get_pekerjaan_query($id)
	{
		$query = $this->db->get_where('pekerjaan', array('id_proyek' => $id));
		return $query->result_array();
	}

	public function get_pekerjaan($id)
	{
		$query = $this->db->get_where('pekerjaan', array('id_pekerjaan' => $id));
		return $query->row_array();
	}

	public function set_pekerjaan()
	{
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$bobot = $this->input->post('bobot');
		// $data = array();

		for ($i = 0; $i < count($this->input->post('nama_pekerjaan')); $i++) { 
			$data =  array(
				'nama_pekerjaan' => $nama_pekerjaan[$i],
				'bobot' => $bobot[$i],
				'id_proyek' => '3'
			);
			$this->db->insert('pekerjaan', $data);
		}

		// return $this->db->insert('pekerjaan', $data);
	}

	public function update_pekerjaan($id)
	{
		$data =  array(
			'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
			'bobot' => $this->input->post('bobot')
		);

		$this->db->where('id_pekerjaan', $id);
		return $this->db->update('pekerjaan', $data);
	}

	public function delete_pekerjaan($id)
	{
		return $this->db->delete('pekerjaan', array('id_pekerjaan'=>$id));
	}
}
?>