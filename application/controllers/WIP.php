<?php defined('BASEPATH') or exit('No direct script access allowed');

class WIP extends MY_Controller
{

	function __construct()
	{
		$this->model = 'WIPs';
		parent::__construct();
	}

	public function index()
	{
		$model = $this->model;
		if ($post = $this->$model->lastSubmit($this->input->post())) {
			if (isset($post['delete'])) $this->$model->delete($post['delete']);
			else
			{
				$downloadPractice = isset ($post['download-practice']);
				$downloadProgram = isset ($post['download-program']);
				unset($post['download-practice']);
				unset($post['download-program']);
				$uuid = $this->$model->save($post);
				if ($downloadPractice) redirect(site_url("PJA/downloadPracticeConfirm/{$uuid}"));
				if ($downloadProgram) redirect(site_url("PJA/downloadProgramConfirm/{$uuid}"));
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
		$vars['page_name'] = 'forms/wip';
		$vars['project_name'] = $this->$model->getProjectName($id);
		$this->loadview('index', $vars);
	}

	function download($uuid)
	{
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = 'WIP.pdf';

		$data = array('records' => $this->WIPs->download($uuid));
		// $this->pdf->load_view('pdf/form_1', $data);

		$this->load->view('pdf/form_2', $data);
		$html = $this->output->get_output();
		$this->pdf->load_html($html);

		$this->pdf->render();
		$this->pdf->stream('WIP.pdf');
	}
}
