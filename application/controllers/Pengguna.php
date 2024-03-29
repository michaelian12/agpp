<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
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
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('pengguna');	
		}		
	}

	// Read
	public function index()
	{
		$data['pengguna'] = $this->pengguna_model->get_pengguna();

		$this->load->view('pengguna', $data);
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nama_pengguna', 'Nama Lengkap', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['pengguna_item'] = $this->pengguna_model->get_pengguna($id);
			$this->load->view('pengguna-lihat', $data);
		} else {
			$this->pengguna_model->update_pengguna($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('pengguna');	
		}		
	}

	// Delete
	public function hapus($id)
	{
		$this->pengguna_model->delete_pengguna($id);
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('pengguna');
	}
}
?>