<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['pengguna'] = $this->pengguna_model->get_pengguna();

		$this->load->view('pengguna', $data);
	}

	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');
		$this->form_validation->set_rules('nama_pengguna', 'Nama Lengkap', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('pengguna-tambah');
		} else {
			$this->pengguna_model->set_pengguna();
			redirect('pengguna');	
		}		
	}

	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');
		$this->form_validation->set_rules('nama_pengguna', 'Nama Lengkap', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['pengguna_item'] = $this->pengguna_model->get_pengguna($id);
			$this->load->view('pengguna-lihat', $data);
		} else {
			$this->pengguna_model->update_pengguna($id);
			redirect('pengguna');	
		}		
	}

	public function hapus($id)
	{
		$this->pengguna_model->delete_pengguna($id);
		redirect('pengguna');
	}
}
