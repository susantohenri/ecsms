<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanBulanan extends MY_Controller
{

	function __construct()
	{
		$this->model = 'LaporanBulanans';
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

	function read($id)
	{
		$vars = array();
		$vars['page_name'] = 'form';
		$model = $this->model;
		$vars['form'] = $this->$model->getForm($id);
		$vars['subform'] = $this->$model->getFormChild();
		$vars['uuid'] = $id;
		$vars['js'] = array(
			'moment.min.js',
			'bootstrap-datepicker.js',
			'daterangepicker.min.js',
			'select2.full.min.js',
			'form.js'
		);
		$vars['page_name'] = 'forms/lapbul';

		$vars['tabs'] = $this->$model->tabs($id);
		$vars['project_name'] = $vars['tabs'][0]->nama_project;

		$this->loadview('index', $vars);
	}

	function upload ($uuid, $input) {
		echo $this->LaporanBulanans->upload($uuid, $input);
	}
}
