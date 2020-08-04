<?php defined('BASEPATH') or exit('No direct script access allowed');

class Project extends MY_Controller
{

	function __construct()
	{
		$this->model = 'Projects';
		parent::__construct();
	}

	public function index()
	{
		$model = $this->model;
		if ($post = $this->$model->lastSubmit($this->input->post())) {
			if (isset($post['delete'])) $this->$model->delete($post['delete']);
			else {
				$db_debug = $this->db->db_debug;
				$this->db->db_debug = FALSE;

				$result = $this->$model->save($post);

				$error = $this->db->error();
				$this->db->db_debug = $db_debug;
				if (isset($result['error'])) $error = $result['error'];
				if (count($error)) {
					$this->session->set_flashdata('model_error', $error['message']);
					redirect($this->controller);
				}
			}
		}
		redirect(base_url());
	}

	function dashboard()
	{
		$result = array();
		$result = $this->Projects->dashboard();
		echo json_encode($result);
	}
}
