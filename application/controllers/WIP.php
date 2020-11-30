<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use Dompdf\Dompdf;

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
				$sendmail = isset ($post['sendmail-button']);
				unset($post['download-practice']);
				unset($post['download-program']);
				unset($post['sendmail-button']);
				$uuid = $this->$model->save($post);
				if ($downloadPractice) redirect(site_url("WIP/downloadPracticeConfirm/{$uuid}"));
				if ($downloadProgram) redirect(site_url("WIP/downloadProgramConfirm/{$uuid}"));
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
		$vars['sendmail_label'] = 'Save & Send Email';
		if ($this->session->userdata('vendor'))
		{
			$vars['download_label'] = '1' === $wip['progress'] ? 'Download' : false;
			$vars['sendmail_label'] = false;
		}

		$this->loadview('index', $vars);
	}

	function downloadPractice($uuid)
	{
		$html = $this->{$this->model}->htmlPractice($uuid);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html['html']);
		$dompdf->setPaper('A4', 'potrait');
		$dompdf->render();
		$dompdf->stream($html['title'], array('Attachment' => true));
	}

	function downloadProgram($uuid)
	{
		$html = $this->{$this->model}->htmlProgram($uuid);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html['html']);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream($html['title'], array('Attachment' => true));
	}
}
