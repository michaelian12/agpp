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
				// $this->load->library('email');

				// $this->email->set_mailtype('html');
				// $this->email->from($this->config->item('bot_mail'), 'Anantagraha Primaperkasa');
				// $this->email->to('michaelagustian9@gmail.com');
				// $this->email->subject('Setel Ulang Kata Sandi di Sistem Informasi Manajemen Risiko Proyek Anantagraha Primaperkasa');

				// // $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" >';
				// $message = 'test';

				// $this->email->message($message);
				// // $this->email->send();
				// if($this->email->send())
			 //    {
			 //    	echo 'Email sent.';
			 //    } else {
			 //    	show_error($this->email->print_debugger());
			 //    }

				// $this->authentication_model->reset_kata_sandi($data['email']);

				$this->sendMail();
				// $this->email();
				// redirect('lupa');
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

	function sendMail()
	{
		$config = Array(
	  		'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => 'michaelianzero@gmail.com', // change it to yours
	  		'smtp_pass' => 'Professional12', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		// 'charset' => 'utf-8',
	  		'wordwrap' => TRUE
		);

	    $message = 'Test email';
	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('michaelianzero@gmail.com', 'Admin'); // change it to yours
	    $this->email->to('michaelagustian9@gmail.com');// change it to yours
	    $this->email->subject('Resume from JobsBuddy for your Job posting');
	    $this->email->message($message);
	    if($this->email->send())
	    {
	    	echo 'Email sent.';
	    } else {
	    	show_error($this->email->print_debugger());
	    }
	}

	public function email()
	{
		$subject='Reset Password Akun Pelayanan PBB';
		$message='Kepada saudara diberitahukan bahwa password anda telah berhasil kami reset. Berikut adalah adalah password anda: "pbb12345". Segera perbarui password anda untuk keamanan akun. Terima kasih.';
		$headers = 'From: webmaster@disyanjak.com' . "\r\n" .
    			   'Reply-To: webmaster@disyanjak.com' . "\r\n" .
    			   'X-Mailer: PHP/' . phpversion();
		if (mail('michaelagustian9@gmail.com',$subject,$message,$headers))
		{
			echo 'Email sent.';
		} else {
	    	// show_error($this->email->print_debugger());
	    	echo "error";
	    }
		
		// echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">';
	}
}
?>