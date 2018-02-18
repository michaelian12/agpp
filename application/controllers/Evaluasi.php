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

		$this->form_validation->set_rules('nama_risiko', 'Risiko', 'required');
		$this->form_validation->set_rules('nilai_s', 'Tingkat Keparahan', 'required');
		$this->form_validation->set_rules('nama_penyebab', 'Nama Penyebab', 'required');
		$this->form_validation->set_rules('nilai_o', 'Tingkat Kejadian', 'required');
		$this->form_validation->set_rules('nama_kontrol', 'Nama Kontrol', 'required');
		$this->form_validation->set_rules('nilai_d', 'Tingkat Deteksi', 'required');
		$this->form_validation->set_rules('rpn', 'RPN', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_mitigasi', 'Nama Mitigasi', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->evaluasi_model->get_proyek($id);
			$data['risiko'] = $this->evaluasi_model->get_risiko_query($id);
			$this->load->view('evaluasi-tambah', $data);
		} else {
			$this->evaluasi_model->set_evaluasi($id);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('evaluasi');	
		}		
	}

	public function tambah_laporan($id = FALSE)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		// $this->form_validation->set_rules('nama_risiko', 'Risiko', 'required');
		// $this->form_validation->set_rules('nilai_s', 'Tingkat Keparahan', 'required');
		// $this->form_validation->set_rules('nama_penyebab', 'Nama Penyebab', 'required');
		// $this->form_validation->set_rules('nilai_o', 'Tingkat Kejadian', 'required');
		// $this->form_validation->set_rules('nama_kontrol', 'Nama Kontrol', 'required');
		// $this->form_validation->set_rules('nilai_d', 'Tingkat Deteksi', 'required');
		// $this->form_validation->set_rules('rpn', 'RPN', 'required');
		// $this->form_validation->set_rules('kategori', 'Kategori', 'required');
		// $this->form_validation->set_rules('nama_mitigasi', 'Nama Mitigasi', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->evaluasi_model->get_proyek($id);
			$data['risiko'] = $this->evaluasi_model->get_risiko_query($id);
			$data['form'] = Array(
		  		'tgl_evaluasi' => $this->input->post('tgl_laporan'),
		  		'nama_risiko' => $this->input->post('kendala'),
		  		'nama_penyebab' => $this->input->post('penyebab'),
		  		'nama_kontrol' => $this->input->post('deteksi')
			);
			$this->load->view('evaluasi-tambah', $data);
		} else {
			$this->evaluasi_model->set_evaluasi($id);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('evaluasi');	
		}		
	}

	public function get_penyebab_query()
	{
		$id_risiko = $this->input->post('id_risiko');
		$risiko = $this->evaluasi_model->get_risiko($id_risiko);

		$efek = $this->evaluasi_model->get_efek_query($id_risiko);
		if (count($efek) > 0) {
			$option_efek = '';
			foreach ($efek as $efek_item) {
				$option_efek .= '<option id="'.$efek_item["id_efek"].'" value="'.$efek_item["nama_efek"].'">';
			}
		}

		$penyebab = $this->evaluasi_model->get_penyebab_query($id_risiko);
		if (count($penyebab) > 0) {
			$option_penyebab = '';
			foreach ($penyebab as $penyebab_item) {
				$option_penyebab .= '<option id="'.$penyebab_item["id_penyebab"].'" value="'.$penyebab_item["nama_penyebab"].'">';
			}
		}

		$option_kontrol = '<option value="'.$risiko["nama_kontrol"].'">';

		echo json_encode(array('return_nilai_s' => $risiko['nilai_s'], 'return_efek' => $option_efek, 'return_penyebab' => $option_penyebab, 'return_kontrol' => $option_kontrol, 'return_nilai_d' => $risiko['nilai_d']));

		// echo json_encode(array('return_nilai_s' => $risiko['nilai_s'], 'return_penyebab' => $option_penyebab, 'return_kontrol' => $option_kontrol, 'return_nilai_d' => $risiko['nilai_d']));
	}

	public function get_mitigasi_query()
	{
		$id_penyebab = $this->input->post('id_penyebab');
		$penyebab = $this->evaluasi_model->get_penyebab($id_penyebab);

		$mitigasi = $this->evaluasi_model->get_mitigasi_query($id_penyebab);
		if (count($mitigasi) > 0) {
			$option_mitigasi = '';
			foreach ($mitigasi as $mitigasi_item) {
				$option_mitigasi .= '<option id="'.$mitigasi_item["id_mitigasi"].'" value="'.$mitigasi_item["nama_mitigasi"].'">';
			}
		}
			
		echo json_encode(array('return_nilai_o' => $penyebab['nilai_o'], 'return_mitigasi' => $option_mitigasi));
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

	public function get_evaluasi()
	{
		$id_proyek = $this->input->post('id_proyek');
		$evaluasi = $this->evaluasi_model->get_evaluasi_query($id_proyek);
		if (count($evaluasi) > 0) {
			$table_row = '';
			foreach ($evaluasi as $evaluasi_item) {
				$table_row .= '<tr><td>'.$evaluasi_item["tgl_evaluasi"].'</td><td>'.$evaluasi_item["nama_risiko"].'</td><td>'.$evaluasi_item["nama_penyebab"].'</td><td>'.$evaluasi_item["rpn"].'</td><td>'.$evaluasi_item["kategori"].'</td><td>'.$evaluasi_item["nama_mitigasi"].'</td><td><a href="evaluasi-lihat/'.$evaluasi_item["id_evaluasi"].'"><i class="ti-eye"></i></a></td><td><a href="evaluasi-hapus/'.$evaluasi_item["id_evaluasi"].'" class="btn_remove" onclick="return confirm(\'Anda yakin ingin menghapus data ini? Semua data yang berkaitan dengan data ini akan ikut terhapus.\')"><i class="ti-trash"></i></a></td></tr>';
			}
			echo json_encode($table_row);
		}
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_risiko', 'Risiko', 'required');
		$this->form_validation->set_rules('nilai_s', 'Tingkat Keparahan', 'required');
		$this->form_validation->set_rules('nama_penyebab', 'Nama Penyebab', 'required');
		$this->form_validation->set_rules('nilai_o', 'Tingkat Kejadian', 'required');
		$this->form_validation->set_rules('nama_kontrol', 'Nama Kontrol', 'required');
		$this->form_validation->set_rules('nilai_d', 'Tingkat Deteksi', 'required');
		$this->form_validation->set_rules('rpn', 'RPN', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_mitigasi', 'Nama Mitigasi', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['evaluasi_item'] = $this->evaluasi_model->get_evaluasi($id);
			$data['proyek_item'] = $this->evaluasi_model->get_proyek($data['evaluasi_item']['id_proyek']);
			$data['risiko'] = $this->evaluasi_model->get_risiko_query($data['proyek_item']['id_proyek']);
			$this->load->view('evaluasi-lihat', $data);
		} else {
			$this->evaluasi_model->update_evaluasi($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('evaluasi');	
		}		
	}

	// Delete
	public function hapus($id)
	{
		$this->evaluasi_model->delete_evaluasi($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('evaluasi');
	}
}
?>