<?php 
class Pengguna_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_pengguna($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('pengguna');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('pengguna', array('id_pengguna' => $id));
			return $query->row_array();
		}
	}

	public function set_pengguna()
	{
		$data =  array(
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'kata_sandi' => $this->encryptIt($this->input->post('kata_sandi')),
			'status' => $this->input->post('status')
		);

		$this->db->insert('pengguna', $data);
	}

	public function update_pengguna($id)
	{
		$data =  array(
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'status' => $this->input->post('status')
		);

		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}

	public function delete_pengguna($id)
	{
		$this->db->delete('pengguna', array('id_pengguna'=>$id));
	}

	// password encryption function
	private function encryptIt($q){
	  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
	  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
	  return($qEncoded);
	}

	// password decryption function
	private function decryptIt($q){
	  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
	  $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
	  return($qDecoded);
	}
}
?>