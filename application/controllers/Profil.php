<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
		// $this->load->library('encrypt');
	}

	// Update
	public function index()
	{
		$id = $this->session->userdata('id_pengguna');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');
		$this->form_validation->set_rules('nama_pengguna', 'Nama Lengkap', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['profil'] = $this->profil_model->get_profil($id);
			$this->load->view('profil', $data);
		} else {
			$this->profil_model->update_profil($id);
			redirect('profil');
		}		
	}
}
?>