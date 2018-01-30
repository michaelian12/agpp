<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notifikasi_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	public function get_notifikasi()
	{
		$notifikasi = $this->notifikasi_model->get_notifikasi();
		$output = '';

		if (count($notifikasi) > 0) {
			foreach ($notifikasi as $notifikasi_item) {
				$output .= '<li><a href="laporan-lihat/'.$notifikasi_item["id_laporan_harian"].'"><strong>'.$notifikasi_item["tgl_laporan_harian"].'</strong><br/><small><em>'.$notifikasi_item["no_spp"].'</em></small></a></li><li class="divider"></li>';
			}
		} else {
			$output .= '<li><a href="#" class="text-bold text-italic">No New notifikasi</a></li>';
		}

		echo json_encode(array('notifikasi' => $output, 'unread_notifikasi' => count($notifikasi)));
	}
}
?>