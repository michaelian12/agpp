<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('authentication_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
		// $this->load->library('encrypt');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('masuk');
		} else {
			$data = $this->authentication_model->get_email();

			// check if the account exists
			if (!empty($data)) {
				// check password
				if ($data['kata_sandi'] == $this->input->post('kata_sandi')) {
					// 	check the account status
					if ($data['status'] == "Aktif") {
						// echo md5("qwe");
						$session_data = array(
							'id_pengguna' => $data['id_pengguna'],
							'jabatan' => $data['jabatan']
						);
						$this->session->set_userdata($session_data);
						// echo $session_data['id_pengguna'];
						redirect ('profil');

						// check occupation
						// if ($data['jabatan'] == "Direktur") {
							
						// } elseif ($data['jabatan'] == "Manajer Proyek") {
							
						// } elseif ($data['jabatan'] == "Site Manager") {
							
						// }



					} else { // status nonactive
						$this->session->set_flashdata('error', 'Anda tidak dapat masuk, akun anda tidak aktif');
						redirect('masuk');
					}
				} else { // wrong password
					if (!empty($this->session->userdata('id_pengguna'))) {
						echo $this->session->userdata('id_pengguna');
						$this->session->sess_destroy();
					} else {
						echo "kosong";
					}
					$this->session->set_flashdata('error', 'Email dan kata sandi tidak valid');
					redirect('masuk');
				}
			} else { // account doesn't exists
				$this->session->set_flashdata('error', 'Akun tidak ditemukan');
				redirect('masuk');
			}
		}
	}

	public function lupa()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('lupa');
		} else {
			$data = $this->authentication_model->get_email();

			// check if the account exists
			if (!empty($data)) {
				$this->load->library('email');

				$this->email->set_mailtype('html');
				$this->email->from($this->config->iten('bot_mail'), 'Anantagraha Primaperkasa');
				$this->email->to($data['email']);
				$this->email->subject('Setel Ulang Kata Sandi di Sistem Informasi Manajemen Risiko Proyek Anantagraha Primaperkasa');

				$message = '<!DOCTYPE html PUBLIC>';

				$this->email->message($message);
				$this->email->send();


				$this->authentication_model->reset_kata_sandi();
				// redirect('pengguna'); redirect ke tulisan cek email
			} else { // account doesn't exists
				// redirect('pengguna'); redirect ke tulisan akun tidak ditemukan
			}

		}
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>