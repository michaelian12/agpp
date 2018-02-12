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
						$session_data = array(
							'id_pengguna' => $data['id_pengguna'],
							'jabatan' => $data['jabatan']
						);
						$this->session->set_userdata($session_data);
						redirect ('profil');
					} else {
						// status nonactive
						$this->session->set_flashdata('error', 'Anda tidak dapat masuk, akun anda tidak aktif');
						redirect('masuk');
					}
				} else {
					// wrong password
					$this->session->set_flashdata('error', 'Email dan kata sandi tidak valid');
					redirect('masuk');
				}
			} else {
				// account doesn't exists
				$this->session->set_flashdata('error', 'Akun tidak ditemukan');
				redirect('masuk');
			}
		}
	}

	public function lupa()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('lupa');
		} else {
			$data = $this->authentication_model->get_email();

			// check if the account exists
			if (!empty($data)) {
				$this->authentication_model->reset_kata_sandi($data['email']);
				$this->sendMail($data['email']);
				redirect('lupa');
			} else {
				// account doesn't exists
				$this->session->set_flashdata('error', 'Akun tidak ditemukan');
				redirect('lupa');
			}
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function sendMail($recipient)
	{
		$config = Array(
	  		'protocol' => 'smtp',
	  		'smtp_host' => 'mail.anantagraha.com',
	  		'smtp_port' => 587,
	  		'smtp_user' => 'service-noreply@anantagraha.com', // change it to yours
	  		'smtp_pass' => 'primaperkasapt', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'utf-8',
	  		'wordwrap' => TRUE
		);

	    $message = 'Test email';
	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('service-noreply@anantagraha.com', 'service-noreply@anantagraha.com'); // change it to yours
	    $this->email->to($recipient);// change it to yours
	    $this->email->subject('Setel ulang kata sandi');
	    $this->email->message('Kepada saudara diberitahukan bahwa kata sandi anda telah berhasil kami setel ulang. Berikut adalah adalah kata sandi anda: "agpp12345". Segera perbaharui kata sandi anda untuk keamanan akun. Terima kasih.');
	    if($this->email->send())
	    {
	    	// echo 'Email sent.';
	    	$this->session->set_flashdata('success', 'Kata sandi baru telah dikirim ke email anda.');
	    } else {
	    	show_error($this->email->print_debugger());
	    }
	}
}
?>