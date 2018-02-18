<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterRisiko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('masterrisiko_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_master_risiko', 'Nama Master Risiko', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('master-risiko-tambah');
		} else {
			$this->masterrisiko_model->set_master_risiko();
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('master-risiko');
		}		
	}

	// Read
	public function index()
	{
		$data['master_risiko'] = $this->masterrisiko_model->get_master_risiko();

		$this->load->view('master-risiko', $data);
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_master_risiko', 'Nama Master Risiko', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['master_risiko_item'] = $this->masterrisiko_model->get_master_risiko($id);
			$this->load->view('master-risiko-lihat', $data);
		} else {
			$this->masterrisiko_model->update_master_risiko($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('master-risiko');	
		}		
	}

	// Delete
	public function hapus($id)
	{
		$this->masterrisiko_model->delete_master_risiko($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('master-risiko');
	}
}
?>