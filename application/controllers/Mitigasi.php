<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitigasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mitigasi_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['mitigasi'] = $this->mitigasi_model->get_mitigasi_query();

		$this->load->view('mitigasi', $data);
	}

	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_penyebab', 'Penyebab', 'required');
		$this->form_validation->set_rules('nama_mitigasi', 'Mitigasi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['risiko'] = $this->mitigasi_model->get_risiko();
			$this->load->view('mitigasi-tambah', $data);
		} else {
			$this->mitigasi_model->set_mitigasi();
			redirect('mitigasi');	
		}		
	}

	public function get_penyebab()
	{
		$id_risiko = $this->input->post('id_risiko');
		$penyebab = $this->mitigasi_model->get_penyebab($id_risiko);
		if (count($penyebab) > 0) {
			$option = '';
			foreach ($penyebab as $penyebab_item) {
				$option .= '<option value="'.$penyebab_item["id_penyebab"].'" >'.$penyebab_item["nama_penyebab"].'</option>';
			}
			echo json_encode($option);
		}
	}

	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_mitigasi', 'Mitigasi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['mitigasi_item'] = $this->mitigasi_model->get_mitigasi($id);
			$this->load->view('mitigasi-lihat', $data);
		} else {
			$this->mitigasi_model->update_mitigasi($id);
			redirect('mitigasi');	
		}		
	}

	public function hapus($id)
	{
		$this->mitigasi_model->delete_mitigasi($id);
		redirect('mitigasi');
	}
}
?>