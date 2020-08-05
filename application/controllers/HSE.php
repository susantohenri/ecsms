<?php defined('BASEPATH') or exit('No direct script access allowed');

class HSE extends MY_Controller
{

	function __construct()
	{
		$this->model = 'HSEs';
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

	public function loadview($view, $vars = array())
	{
		if ($vars['page_name'] === 'form') $vars['page_name'] = 'forms/hse';
		$vars['error'] = $this->session->flashdata('model_error');
		$vars['account_type'] = $this->session->userdata('role');

		$page_title = preg_split('#([A-Z][^A-Z]*)#', $this->controller, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
		$page_title = implode(' ', $page_title);
		$vars['page_title']   = isset($this->page_title) ? $this->page_title : $page_title;

		if (!isset($vars['form_action'])) $vars['form_action'] = site_url($this->controller);
		$vars['current'] = array(
			'model' => $this->model,
			'controller' => $this->controller
		);

		$this->load->model('Permissions');
		if (!isset($vars['permission'])) $vars['permission'] = $this->Permissions->getPermissions();
		$this->load->view($view, $vars);
	}
}
