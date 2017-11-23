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

	public function set_pengguna()
	{
		$data =  array(
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'kata_sandi' => $this->input->post('kata_sandi'),
			'status' => $this->input->post('status')
		);

		return $this->db->insert('pengguna', $data);
	}

	public function update_pengguna($id)
	{
		$data =  array(
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'kata_sandi' => $this->input->post('kata_sandi'),
			'status' => $this->input->post('status')
		);

		$this->db->where('id_pengguna', $id);
		return $this->db->update('pengguna', $data);
	}

	public function delete_pekerjaan($id)
	{
		return $this->db->delete('pekerjaan', array('id_pekerjaan'=>$id));
	}
}
?>