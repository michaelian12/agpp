<?php 
class Profil_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		// $this->load->library('encrypt');
	}

	// Update
	public function get_profil($id)
	{
		$query = $this->db->get_where('pengguna', array('id_pengguna' => $id));
		return $query->row_array();
	}

	public function update_profil($id)
	{
		$data =  array(
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'email' => $this->input->post('email'),
			'kata_sandi' => $this->input->post('kata_sandi')
			// 'kata_sandi' => $this->encrypt->encode($this->input->post('kata_sandi'))
		);

		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}

	// Notification
	public function get_notification()
	{
		$sql = 'select * from laporan_harian l join proyek p on l.id_proyek = p.id_proyek where l.read_status = 0';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// password encryption function
	// private function encryptIt($q){
	//   $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
	//   $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
	//   return($qEncoded);
	// }

	// password decryption function
	// private function decryptIt($q){
	//   $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
	//   $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
	//   return($qDecoded);
	// }
}
?>