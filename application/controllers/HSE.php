<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
		$vars = array();
		if ($post = $this->$model->lastSubmit($this->input->post())) {
			if (isset($post['delete'])) $this->$model->delete($post['delete']);
			else
			{
				$download = isset ($post['download-checkbox']);
				$sendmail = isset ($post['sendmail-checkbox']);
				unset($post['download-checkbox']);
				unset($post['sendmail-checkbox']);
				$uuid = $this->$model->save($post);
				if ($download) $vars['download_page'] = site_url("HSE/download/{$uuid}");
				if ($sendmail)
				{
					$this->load->model('Emails');
					$excel = $this->{$this->model}->excel($uuid);
					$subject = $excel['title'];

					ob_start();
					$writer = new Xlsx($excel['spreadsheet']);
					$writer->save('php://output');
					$attachment = ob_get_contents();
					ob_end_clean();

					$this->Emails->sendmail($subject, $attachment);
				}
			}
		}
		$vars['page_name'] = 'redirector';
		$vars['redirect_page'] = base_url();
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
		if (strlen($this->session->userdata('vendor')) > 0) {
			$vars['page_name'] = 'forms/hse-vendor';
		} else {
			$vars['tabs'] = $this->HSEs->getTabs($id);
			$vars['page_name'] = 'forms/hse-admin';
		}
		$vars['project_name'] = $this->$model->getProjectName($id);
		$this->loadview('index', $vars);
	}

	function upload($uuid, $input)
	{
		echo $this->HSEs->upload($uuid, $input);
	}

	function download($uuid)
	{
		$excel = $this->{$this->model}->excel($uuid);
		$writer = new Xlsx($excel['spreadsheet']);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . "{$excel['title']}.xlsx" . '"');
		$writer->save('php://output');
	}

}
