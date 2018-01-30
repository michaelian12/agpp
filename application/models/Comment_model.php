<?php 
class Comment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_comment()
	{
		$query = $this->db->get('comments');
		return $query->result_array();
	}

	public function update_notification($id)
	{
		$data = array(
			'comment_status' => 1
		);

		$this->db->where('comment_id', $id);
		$this->db->update('comments', $data);
	}
}
?>