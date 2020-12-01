<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use Dompdf\Dompdf;

class FE extends MY_Controller
{

	function __construct()
	{
		$this->model = 'FEs';
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
				if ($download) redirect(site_url("FE/downloadConfirm/{$uuid}"));
				if ($sendmail)
				{
					$this->load->model('Emails');

					$html = $this->{$this->model}->excelHtml($uuid);
					$dompdf = new Dompdf();
					$dompdf->loadHtml($html['html']);
					$dompdf->setPaper('A4', 'potrait');
					$dompdf->render();

					$subject = $html['title'];
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
		$vars['page_name'] = 'forms/fe';
		$project_detail = $this->$model->getProjectDetail($id);
		$vars['project_name'] = $project_detail['nama_project'];

		$fe = $this->$model->findOne($id);
		$vars['download_label'] = 'Save & Download';
		$vars['sendmail_label'] = 'Save & Send Email';
		if ($this->session->userdata('vendor'))
		{
			$vars['download_label'] = '1' === $fe['progress'] ? 'Download' : false;
			$vars['sendmail_label'] = false;
		}

		$this->loadview('index', $vars);
	}

	function downloadConfirm ($uuid)
	{
		$vars['page_name'] = 'confirm-download';
		$vars['download_link'] = site_url("FE/download/{$uuid}");
		$this->loadview('index', $vars);
	}

	function download($uuid)
	{
		$html = $this->{$this->model}->excelHtml($uuid);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html['html']);
		$dompdf->setPaper('A4', 'potrait');
		$dompdf->render();
		$dompdf->stream($html['title'], array('Attachment' => true));
	}
}
