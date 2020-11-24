<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\Writer\Html;
use Dompdf\Dompdf;

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
			else
			{
				$download = isset ($post['download-button']);
				$sendmail = isset ($post['sendmail-button']);
				unset($post['download-button']);
				unset($post['sendmail-button']);
				$uuid = $this->$model->save($post);
				if ($download) redirect(site_url("HSE/downloadConfirm/{$uuid}"));
				if ($sendmail)
				{
					$this->load->model('Emails');
					$excel = $this->{$this->model}->excel($uuid);
					$subject = $excel['title'];

					$writer = new Html($excel['spreadsheet']);
					$tmp = "HSE-{$uuid}.html";
					$writer->save($tmp);
					$html = file_get_contents($tmp);
					unlink($tmp);

					$dompdf = new Dompdf();
					$dompdf->loadHtml($html);
					$dompdf->setPaper('A4', 'potrait');
					$dompdf->render();

					$attachment = $dompdf->output();
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
		if (strlen($this->session->userdata('vendor')) > 0) {
			$vars['page_name'] = 'forms/hse-vendor';
		} else {
			$vars['tabs'] = $this->HSEs->getTabs($id);
			$vars['page_name'] = 'forms/hse-admin';
		}
		$projectDetail = $this->$model->getProjectDetail($id);
		$vars['project_name'] = $projectDetail['nama_project'];

		$hse = $this->$model->findOne($id);
		$vars['show_download_button'] = '1' === $hse['progress'];

		$this->loadview('index', $vars);
	}

	function upload($uuid, $input)
	{
		echo $this->HSEs->upload($uuid, $input);
	}

	function downloadConfirm ($uuid)
	{
		$vars['page_name'] = 'confirm-download';
		$vars['download_link'] = site_url("HSE/download/{$uuid}");
		$this->loadview('index', $vars);
	}

	function download($uuid)
	{
		$excel = $this->{$this->model}->excel($uuid);
		$writer = new Html($excel['spreadsheet']);

		$tmp = "HSE-{$uuid}.html";
		$writer->save($tmp);
		$html = file_get_contents($tmp);
		unlink($tmp);

		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'potrait');
		$dompdf->render();
		$dompdf->stream($excel['title']);
	}

}
