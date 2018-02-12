<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kemajuan[]', 'Kemajuan', 'required');
		$this->form_validation->set_rules('cuaca', 'Cuaca', 'required');
		$this->form_validation->set_rules('kendala', 'Kendala', 'required');
		$this->form_validation->set_rules('efek', 'Efek', 'required');
		$this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
		$this->form_validation->set_rules('deteksi', 'Deteksi', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->laporan_model->get_proyek($id);
			$data['pekerjaan'] = $this->laporan_model->get_pekerjaan_query($data['proyek_item']['id_proyek']);
			$data['risiko'] = $this->laporan_model->get_risiko_query($id);
			$this->load->view('laporan-tambah', $data);
		} else {
			$this->laporan_model->set_laporan($id);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('laporan');
		}
	}

	// public function get_penyebab_query()
	// {
	// 	$id_risiko = $this->input->post('id_risiko');
	// 	$risiko = $this->laporan_model->get_risiko($id_risiko);

	// 	$efek = $this->laporan_model->get_efek_query($id_risiko);
	// 	if (count($efek) > 0) {
	// 		$option_efek = '';
	// 		foreach ($efek as $efek_item) {
	// 			$option_efek .= '<option id="'.$efek_item["id_efek"].'" value="'.$efek_item["nama_efek"].'">';
	// 		}
	// 	}

	// 	$penyebab = $this->laporan_model->get_penyebab_query($id_risiko);
	// 	if (count($penyebab) > 0) {
	// 		$option_penyebab = '';
	// 		foreach ($penyebab as $penyebab_item) {
	// 			$option_penyebab .= '<option id="'.$penyebab_item["id_penyebab"].'" value="'.$penyebab_item["nama_penyebab"].'">';
	// 		}
	// 	}

	// 	$option_kontrol = '<option value="'.$risiko["nama_kontrol"].'">';

	// 	echo json_encode(array('return_nilai_s' => $risiko['nilai_s'], 'return_efek' => $option_efek, 'return_penyebab' => $option_penyebab, 'return_kontrol' => $option_kontrol, 'return_nilai_d' => $risiko['nilai_d']));

	// 	// echo json_encode(array('return_nilai_s' => $risiko['nilai_s'], 'return_penyebab' => $option_penyebab, 'return_kontrol' => $option_kontrol, 'return_nilai_d' => $risiko['nilai_d']));
	// }

	// Read
	public function index()
	{
		$data['proyek'] = $this->laporan_model->get_proyek();

		$this->load->view('laporan', $data);
	}

	public function get_laporan()
	{
		$id_proyek = $this->input->post('id_proyek');
		$laporan = $this->laporan_model->get_laporan_query($id_proyek);
		if (count($laporan) > 0) {
			$table_row = '';
			$i = 1;
			if ($this->session->userdata('jabatan') == 'Site Manager') {
				foreach ($laporan as $laporan_item) {
					$table_row .= '<tr><td>'.$i.'</td><td>'.$laporan_item["tgl_laporan_pekerjaan"].'</td><td><a href="laporan-lihat/'.$laporan_item['id_proyek'].'/'.$laporan_item['tgl_laporan_pekerjaan'].'"><i class="ti-eye"></i></a></td><td><a href="laporan-hapus/'.$laporan_item['id_proyek'].'/'.$laporan_item["tgl_laporan_pekerjaan"].'" class="btn_remove" onclick="return confirm(\'Anda yakin ingin menghapus data ini? Semua data yang berkaitan dengan data ini akan ikut terhapus.\')"><i class="ti-trash"></i></a></td></tr>';
					$i++;
				}
			} elseif ($this->session->userdata('jabatan') == 'Manajer Proyek') {
				foreach ($laporan as $laporan_item) {
					$table_row .= '<tr><td>'.$i.'</td><td>'.$laporan_item["tgl_laporan_pekerjaan"].'</td><td><a href="laporan-lihat/'.$laporan_item['id_proyek'].'/'.$laporan_item['tgl_laporan_pekerjaan'].'"><i class="ti-eye"></i></a></td></tr>';
					$i++;
				}
			}
			echo json_encode($table_row);
		}
	}

	// Update
	public function ubah($id = NULL, $tgl = NULL)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tgl_laporan', 'Tanggal Laporan', 'required');
		$this->form_validation->set_rules('kemajuan[]', 'Kemajuan', 'required');
		$this->form_validation->set_rules('cuaca', 'Cuaca', 'required');
		$this->form_validation->set_rules('kendala', 'Kendala', 'required');
		$this->form_validation->set_rules('efek', 'Efek', 'required');
		$this->form_validation->set_rules('penyebab', 'Penyebab', 'required');
		$this->form_validation->set_rules('deteksi', 'Deteksi', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->laporan_model->get_proyek($id);
			$data['laporan_pekerjaan'] = $this->laporan_model->get_laporan_pekerjaan($id, $tgl);
			$data['laporan_harian_item'] = $this->laporan_model->get_laporan_harian($id, $tgl);
			$data['risiko'] = $this->laporan_model->get_risiko_query($id);
			$this->load->view('laporan-lihat', $data);
		} else {
			$this->laporan_model->update_laporan();
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('laporan');
		}		
	}

	public function update_notifikasi($id)
	{
		$data['laporan_harian'] = $this->laporan_model->update_notifikasi($id);

		$this->ubah($data['laporan_harian']['id_proyek'], $data['laporan_harian']['tgl_laporan_harian']);
	}

	// Delete
	public function hapus($id, $tgl)
	{
		$this->laporan_model->delete_laporan($id, $tgl);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('laporan');
	}
}
?>
