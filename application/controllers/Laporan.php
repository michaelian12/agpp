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
			foreach ($laporan as $laporan_item) {
				$table_row .= '<tr><td>'.$i.'</td><td>'.$laporan_item["tgl_laporan_pekerjaan"].'</td><td><a href="laporan-lihat/'.$laporan_item['id_proyek'].'/'.$laporan_item['tgl_laporan_pekerjaan'].'"><i class="ti-eye"></i></a></td><td><a href="laporan-hapus/'.$laporan_item['id_proyek'].'/'.$laporan_item["tgl_laporan_pekerjaan"].'" class="btn_remove"><i class="ti-trash"></i></a></td></tr>';
				$i++;
			}
			echo json_encode($table_row);
		}
	}

	public function tambah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kemajuan[]', 'Kemajuan', 'required');
		$this->form_validation->set_rules('ket_kendala', 'Kendala', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->laporan_model->get_proyek($id);
			$data['pekerjaan'] = $this->laporan_model->get_pekerjaan_query($data['proyek_item']['id_proyek']);
			$this->load->view('laporan-tambah', $data);
		} else {
			$this->laporan_model->set_laporan($id);
			redirect('laporan');
		}		
	}

	public function ubah($id = NULL, $tgl = NULL)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kemajuan[]', 'Kemajuan', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->laporan_model->get_proyek($id);
			$data['laporan_pekerjaan'] = $this->laporan_model->get_laporan_pekerjaan($id, $tgl);
			$data['laporan_kendala_item'] = $this->laporan_model->get_laporan_kendala($id, $tgl);
			$this->load->view('laporan-lihat', $data);
		} else {
			$this->laporan_model->update_laporan();
			redirect('laporan');
		}		
	}

	public function hapus($id, $tgl)
	{
		$this->laporan_model->delete_laporan($id, $tgl);
		redirect('laporan');
	}
}
?>
