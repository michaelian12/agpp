 <?php 
class Authentication_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		// $this->load->library('encrypt');
	}

	public function masuk()
	{
		$email = $this->input->post('email');
		$kata_sandi = $this->input->post('kata_sandi');
		// $kata_sandi = $this->encrypt->encode($this->input->post('kata_sandi'));

		$query = $this->db->get_where('pengguna', array('email' => $email, 'kata_sandi' => $kata_sandi));
		return $query->row_array();
	}

	public function get_email()
	{
		$email = $this->input->post('email');

		$query = $this->db->get_where('pengguna', array('email' => $email));
		return $query->row_array();
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