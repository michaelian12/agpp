<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('evaluasi_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah($id = FALSE)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_penyebab', 'Penyebab', 'required');
		$this->form_validation->set_rules('nama_mitigasi', 'Mitigasi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->evaluasi_model->get_proyek($id);
			$data['risiko'] = $this->evaluasi_model->get_risiko();
			$this->load->view('evaluasi-tambah', $data);
		} else {
			$this->evaluasi_model->set_evaluasi();
			redirect('evaluasi');	
		}		
	}

	public function get_penyebab_query()
	{
		$id_risiko = $this->input->post('id_risiko');
		$risiko = $this->evaluasi_model->get_risiko($id_risiko);

		$penyebab = $this->evaluasi_model->get_penyebab_query($id_risiko);
		if (count($penyebab) > 0) {
			$option = '';
			foreach ($penyebab as $penyebab_item) {
				$option .= '<option id="'.$penyebab_item["id_penyebab"].'" value="'.$penyebab_item["nama_penyebab"].'">';
			}
		}

		echo json_encode(array('return_nilai_s' => $risiko['nilai_s'], 'return_option' => $option));
	}

	public function get_mitigasi_query()
	{
		$id_penyebab = $this->input->post('id_penyebab');
		$mitigasi = $this->evaluasi_model->get_mitigasi_query($id_penyebab);
		if (count($mitigasi) > 0) {
			$option = '';
			foreach ($mitigasi as $mitigasi_item) {
				$option .= '<option id="'.$mitigasi_item["id_mitigasi"].'" value="'.$mitigasi_item["nama_mitigasi"].'">';
			}
			echo json_encode($option);
		}
	}

	// public function get_penyebab()
	// {
	// 	$id_penyebab = $this->input->post('id_penyebab');
	// 	$penyebab_item = $this->mitigasi_model->get_penyebab($id_penyebab);

	// 	$result = '<div class="col-md-6"><div class="form-group"><label>RPN</label><input id="rpn" type="text" name="rpn" class="form-control border-input" value="'.$penyebab_item["rpn"].'" required readonly></div></div><div class="col-md-6"><div class="form-group"><label>Kategori</label><input id="kategori" type="text" name="kategori" class="form-control border-input" value="'.$penyebab_item["kategori"].'" required readonly></div></div>';
                                        
	// 	echo json_encode($result);
	// }

	// Read
	public function index()
	{
		// $data['mitigasi'] = $this->mitigasi_model->get_mitigasi_query();
		$data['proyek'] = $this->evaluasi_model->get_proyek();

		$this->load->view('evaluasi', $data);
	}

	// public function get_mitigasi()
	// {
	// 	$id_proyek = $this->input->post('id_proyek');
	// 	$mitigasi = $this->mitigasi_model->get_mitigasi_query($id_proyek);
	// 	if (count($mitigasi) > 0) {
	// 		$table_row = '';
	// 		foreach ($mitigasi as $mitigasi_item) {
	// 			$table_row .= '<tr><td>'.$mitigasi_item["nama_risiko"].'</td><td>'.$mitigasi_item["nama_penyebab"].'</td><td>'.$mitigasi_item["rpn"].'</td><td>'.$mitigasi_item["kategori"].'</td><td>'.$mitigasi_item["nama_mitigasi"].'</td><td><a href="mitigasi-lihat/'.$mitigasi_item["id_mitigasi"].'"><i class="ti-eye"></i></a></td><td><a href="mitigasi-hapus/'.$mitigasi_item["id_mitigasi"].'" class="btn_remove"><i class="ti-trash"></i></a></td></tr>';
	// 		}
	// 		echo json_encode($table_row);
	// 	}
	// }

	// Update
	// public function ubah($id)
	// {
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('nama_mitigasi', 'Mitigasi', 'required');

	
	// 	if ($this->form_validation->run() === FALSE)
	// 	{
	// 		$data['mitigasi_item'] = $this->mitigasi_model->get_mitigasi($id);
	// 		$this->load->view('mitigasi-lihat', $data);
	// 	} else {
	// 		$this->mitigasi_model->update_mitigasi($id);
	// 		redirect('mitigasi');	
	// 	}		
	// }

	// Delete
	// public function hapus($id)
	// {
	// 	$this->mitigasi_model->delete_mitigasi($id);
	// 	redirect('mitigasi');
	// }
}
?>