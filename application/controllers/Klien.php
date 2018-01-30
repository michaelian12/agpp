<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('klien_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_klien', 'Nama Klien', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('klien-tambah');
		} else {
			$this->klien_model->set_klien();
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('klien');	
		}		
	}

	// Read
	public function index()
	{
		$data['klien'] = $this->klien_model->get_klien();

		$this->load->view('klien', $data);
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_klien', 'Nama Klien', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['klien_item'] = $this->klien_model->get_klien($id);
			$this->load->view('klien-lihat', $data);
		} else {
			$this->klien_model->update_klien($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('klien');	
		}		
	}

	// Delete
	public function hapus($id)
	{
		$this->klien_model->delete_klien($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('klien');
	}
}
?>