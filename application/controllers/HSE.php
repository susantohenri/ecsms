<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\IOFactory;
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
				unset($post['download-checkbox']);
				unset($post['sendmail-checkbox']);
				$uuid = $this->$model->save($post);
				if ($download) $vars['download_page'] = site_url("HSE/download/{$uuid}");
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
		$model = $this->model;
		$cellMap = $this->$model->fillExcel($uuid);
		$project = $this->$model->getProjectName($uuid);
		$vendor = $this->$model->getVendorName($uuid);

		$spreadsheet = IOFactory::load('./excels/Form 1 - HSE plan.xlsx');

		$sheet = $spreadsheet->getSheet(1);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . "HSE - {$project} - {$vendor}.xlsx" . '"');
		$writer->save('php://output');
	}
}
