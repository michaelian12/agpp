<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pekerjaan_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['proyek'] = $this->pekerjaan_model->get_proyek();

		$this->load->view('pekerjaan', $data);
	}

	public function get_pekerjaan()
	{
		$id_proyek = $this->input->post('id_proyek');
		$pekerjaan = $this->pekerjaan_model->get_pekerjaan_query($id_proyek);
		if (count($pekerjaan) > 0) {
			$table_row = '';
			foreach ($pekerjaan as $pekerjaan_item) {
				$table_row .= '<tr><td>'.$pekerjaan_item["nama_pekerjaan"].'</td><td>'.$pekerjaan_item["bobot"].'</td><td><a href="pekerjaan-lihat/'.$pekerjaan_item["id_pekerjaan"].'"><i class="ti-eye"></i></a></td><td><a href="pekerjaan-hapus/'.$pekerjaan_item["id_pekerjaan"].'"><i class="ti-trash"></i></a></td></tr>';
			}
			echo json_encode($table_row);
		}
	}

	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		// $this->form_validation->set_rules('no_spp', 'No. SPP', 'required');
		// $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required');
		// $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required');
		// $this->form_validation->set_rules('nama_klien', 'Nama Klien', 'required');
		// $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		// $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('pekerjaan-tambah');
		} else {
			$this->pekerjaan_model->set_pekerjaan();
			redirect('pekerjaan');
		}		
	}

	// public function ubah($id)
	// {
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('no_spp', 'No. SPP', 'required');
	// 	$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required');
	// 	$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required');
	// 	$this->form_validation->set_rules('nama_klien', 'Nama Klien', 'required');
	// 	$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
	// 	$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

	
	// 	if ($this->form_validation->run() === FALSE)
	// 	{
	// 		$data['proyek_item'] = $this->proyek_model->get_proyek($id);
	// 		$this->load->view('proyek-lihat', $data);
	// 	} else {
	// 		$this->proyek_model->update_proyek($id);
	// 		redirect('proyek');	
	// 	}		
	// }

	public function hapus($id)
	{
		$this->pekerjaan_model->delete_pekerjaan($id);
		redirect('pekerjaan');
	}
}
