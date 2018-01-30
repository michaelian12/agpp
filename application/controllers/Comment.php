<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['comment'] = $this->comment_model->get_comment();

		$this->load->view('comment', $data);
		// $this->load->view('comment');
	}

	public function update_notification($id)
	{
		$this->comment_model->update_notification($id);
		$this->index();
	}
}
?>