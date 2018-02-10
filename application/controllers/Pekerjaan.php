<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pekerjaan_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	// Create
	public function tambah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_pekerjaan[]', 'Nama Pekerjaan', 'required');
		$this->form_validation->set_rules('bobot[]', 'Bobot', 'required');
		$this->form_validation->set_rules('tgl_mulai_pekerjaan[]', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_selesai_pekerjaan[]', 'Tanggal Selesai', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['proyek_item'] = $this->pekerjaan_model->get_proyek($id);
			$this->load->view('pekerjaan-tambah', $data);
		} else {
			$this->pekerjaan_model->set_pekerjaan();
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('pekerjaan');
		}		
	}

	// Read
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
				$table_row .= '<tr><td>'.$pekerjaan_item["nama_pekerjaan"].'</td><td>'.$pekerjaan_item["bobot"].'</td><td>'.$pekerjaan_item["tgl_mulai_pekerjaan"].'</td><td>'.$pekerjaan_item["tgl_selesai_pekerjaan"].'</td><td><a href="pekerjaan-lihat/'.$pekerjaan_item["id_pekerjaan"].'"><i class="ti-eye"></i></a></td><td><a href="pekerjaan-hapus/'.$pekerjaan_item["id_pekerjaan"].'" class="btn_remove" onclick="return confirm(\'Anda yakin ingin menghapus data ini? Semua data yang berkaitan dengan data ini akan ikut terhapus.\')"><i class="ti-trash"></i></a></td></tr>';
			}
			echo json_encode($table_row);
		}
	}

	// Update
	public function ubah($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');
		$this->form_validation->set_rules('tgl_mulai_pekerjaan', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_selesai_pekerjaan', 'Tanggal Selesai', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
			$data['pekerjaan_item'] = $this->pekerjaan_model->get_pekerjaan($id);
			$this->load->view('pekerjaan-lihat', $data);
		} else {
			$this->pekerjaan_model->update_pekerjaan($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('pekerjaan');
		}		
	}

	// Delete
	public function hapus($id)
	{
		// $this->pekerjaan_model->delete_pekerjaan($id);
		if($this->pekerjaan_model->delete_pekerjaan($id))
		{
		   	echo 'Email sent.';
		} else {
		   	echo 'error log';
		   	show_error($this->email->print_debugger());
		}
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('pekerjaan');
	}
}
?>
