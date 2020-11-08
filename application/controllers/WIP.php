<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
				if ($downloadPractice) redirect(site_url("WIP/downloadPracticeConfirm/{$uuid}"));
				if ($downloadProgram) redirect(site_url("WIP/downloadProgramConfirm/{$uuid}"));
			}
		}
		redirect(base_url());
	}

	function downloadPracticeConfirm ($uuid)
	{
		$vars['page_name'] = 'confirm-download';
		$vars['download_link'] = site_url("WIP/downloadPractice/{$uuid}");
		$this->loadview('index', $vars);
	}

	function downloadProgramConfirm ($uuid)
	{
		$vars['page_name'] = 'confirm-download';
		$vars['download_link'] = site_url("WIP/downloadProgram/{$uuid}");
		$this->loadview('index', $vars);
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
		$projectDetail = $this->$model->getProjectDetail($id);
		$vars['project_name'] = $projectDetail['nama_project'];

		$wip = $this->$model->findOne($id);
		$vars['download_label'] = 'Save & Download';
		if ($this->session->userdata('vendor'))
		{
			$vars['download_label'] = '1' === $wip['progress'] ? 'Download' : false;
		}

		$this->loadview('index', $vars);
	}

	function downloadPractice($uuid)
	{
		$excel = $this->{$this->model}->excelPractice($uuid);
		$writer = new Xlsx($excel['spreadsheet']);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . "{$excel['title']}.xlsx" . '"');
		$writer->save('php://output');
	}

	function downloadProgram($uuid)
	{
		$excel = $this->{$this->model}->excelProgram($uuid);
		$writer = new Xlsx($excel['spreadsheet']);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . "{$excel['title']}.xlsx" . '"');
		$writer->save('php://output');
	}
}
