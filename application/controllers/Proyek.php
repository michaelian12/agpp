<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proyek_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('no_spp', 'No. SPP', 'required');
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required');
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required');
		$this->form_validation->set_rules('id_klien', 'Nama Klien', 'required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['klien'] = $this->proyek_model->get_klien();
			$this->load->view('proyek-tambah', $data);
		} else {
			$this->proyek_model->set_proyek();
			redirect('proyek');
		}		
	}

	// Read
	public function index()
	{
		$data['proyek'] = $this->proyek_model->get_proyek_query();

		$this->load->view('proyek', $data);
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('no_spp', 'No. SPP', 'required');
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required');
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required');
		$this->form_validation->set_rules('id_klien', 'Nama Klien', 'required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->proyek_model->get_proyek($id);
			$data['klien'] = $this->proyek_model->get_klien();
			$this->load->view('proyek-lihat', $data);
		} else {
			$this->proyek_model->update_proyek($id);
			redirect('proyek');	
		}		
	}

	// Delete
	public function hapus($id)
	{
		$this->proyek_model->delete_proyek($id);
		redirect('proyek');
	}
}
?>