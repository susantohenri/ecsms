<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KPI extends MY_Controller
{

	function __construct()
	{
		$this->model = 'KPIs';
		parent::__construct();
	}

	public function index()
	{
		$model = $this->model;
		if ($post = $this->$model->lastSubmit($this->input->post())) {
			if (isset($post['delete'])) $this->$model->delete($post['delete']);
			else
			{
				$download = isset ($post['download-button']);
				$sendmail = isset ($post['sendmail-button']);
				unset($post['download-button']);
				unset($post['sendmail-button']);
				$uuid = $this->$model->save($post);
				if ($download) redirect(site_url("KPI/downloadConfirm/{$uuid}"));
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
		$vars['page_name'] = 'forms/kpi';
		$projectDetail = $this->$model->getProjectDetail($id);
		$vars['project_name'] = $projectDetail['nama_project'];

		$kpi = $this->$model->findOne($id);
		$vars['download_label'] = 'Save & Download';
		$vars['sendmail_label'] = 'Save & Send Email';
		if ($this->session->userdata('vendor'))
		{
			$vars['download_label'] = '1' === $kpi['progress'] ? 'Download' : false;
			$vars['sendmail_label'] = false;
		}

		$this->loadview('index', $vars);
	}

	function downloadConfirm ($uuid)
	{
		$vars['page_name'] = 'confirm-download';
		$vars['download_link'] = site_url("KPI/download/{$uuid}");
		$this->loadview('index', $vars);
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
