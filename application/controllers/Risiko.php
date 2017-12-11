<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Risiko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('risiko_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['risiko'] = $this->risiko_model->get_risiko();
		$data['penyebab'] = $this->risiko_model->get_penyebab();

		$this->load->view('risiko', $data);
	}

	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_risiko', 'Nama Risiko', 'required');
		$this->form_validation->set_rules('nilai_s', 'Tingkat Keparahan', 'required');
		$this->form_validation->set_rules('nama_efek[]', 'Nama Efek', 'required');
		$this->form_validation->set_rules('nama_penyebab[]', 'Nama Penyebab', 'required');
		$this->form_validation->set_rules('nilai_o[]', 'Tingkat Kejadian', 'required');
		$this->form_validation->set_rules('nama_kontrol', 'Nama Kontrol', 'required');
		$this->form_validation->set_rules('nilai_d', 'Tingkat Deteksi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('risiko-tambah');
		} else {
			$id_risiko = $this->risiko_model->set_risiko();
			$this->risiko_model->set_efek($id_risiko);
			$this->risiko_model->set_penyebab($id_risiko);
			redirect('risiko');
		}		
	}

	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_risiko', 'Nama Risiko', 'required');
		$this->form_validation->set_rules('nilai_s', 'Tingkat Keparahan', 'required');
		$this->form_validation->set_rules('nama_efek[]', 'Nama Efek', 'required');
		$this->form_validation->set_rules('nama_penyebab[]', 'Nama Penyebab', 'required');
		$this->form_validation->set_rules('nilai_o[]', 'Tingkat Kejadian', 'required');
		$this->form_validation->set_rules('nama_kontrol', 'Nama Kontrol', 'required');
		$this->form_validation->set_rules('nilai_d', 'Tingkat Deteksi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['risiko_item'] = $this->risiko_model->get_risiko($id);
			$data['efek'] = $this->risiko_model->get_efek($id);
			$data['penyebab'] = $this->risiko_model->get_penyebab($id);
			$this->load->view('risiko-lihat', $data);
		} else {
			$this->risiko_model->update_risiko($id);
			redirect('risiko');
		}		
	}

	public function hapus($id)
	{
		$this->risiko_model->delete_risiko($id);
		// redirect('risiko');
	}

	public function hapus_efek($id)
	{
		$this->risiko_model->delete_efek($id);
	}

	public function hapus_penyebab($id)
	{
		$this->risiko_model->delete_penyebab($id);
	}
}
?>