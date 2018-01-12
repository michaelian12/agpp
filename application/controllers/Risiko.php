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

	// Create
	public function tambah($id)
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
			$data['proyek_item'] = $this->risiko_model->get_proyek($id);
			$this->load->view('risiko-tambah', $data);
		} else {
			$id_risiko = $this->risiko_model->set_risiko($id);
			$this->risiko_model->set_efek($id_risiko);
			$this->risiko_model->set_penyebab($id_risiko);
			$this->risiko_model->update_nilai_kritis($id);
			redirect('risiko');
		}		
	}

	// Read
	public function index()
	{
		// $data['risiko'] = $this->risiko_model->get_risiko_query();
		$data['proyek'] = $this->risiko_model->get_proyek();

		$this->load->view('risiko', $data);
	}

	public function get_risiko()
	{
		$id_proyek = $this->input->post('id_proyek');
		$risiko = $this->risiko_model->get_risiko_query($id_proyek);
		if (count($risiko) > 0) {
			$table_row = '';
			foreach ($risiko as $risiko_item) {
				$table_row .= '<tr><td>'.$risiko_item["nama_risiko"].'</td><td>'.$risiko_item["nilai_s"].'</td><td>'.$risiko_item["nama_penyebab"].'</td><td>'.$risiko_item["nilai_o"].'</td><td>'.$risiko_item["nama_kontrol"].'</td><td>'.$risiko_item["nilai_d"].'</td><td>'.$risiko_item["rpn"].'</td><td><a href="risiko-lihat/'.$risiko_item["id_risiko"].'"><i class="ti-eye"></i></a></td><td><a href="risiko-hapus/'.$risiko_item["id_risiko"].'" class="btn_remove"><i class="ti-trash"></i></a></td></tr>';
			}
			echo json_encode($table_row);
		}
	}

	// Update
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
			$id_proyek = $this->risiko_model->update_risiko($id);
			$this->risiko_model->update_nilai_kritis($id_proyek);
			redirect('risiko');
		}		
	}

	// Delete
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