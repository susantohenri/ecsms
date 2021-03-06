<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Writer\Html;

class KPIs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'kpi';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'project', 'sTitle' => 'Project'),
		);

		$this->form = array(
			array(
				'name' => 'a1_target',
				'label' => '1. Jumlah Tenaga Kerja',
			),
			array(
				'name' => 'a1_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'a2_target',
				'label' => '2. Jumlah Jam Kerja',
			),
			array(
				'name' => 'a2_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => '',
				'label' => 'Lagging Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'b1_target',
				'label' => '1. Fatality',
			),
			array(
				'name' => 'b1_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'b2_target',
				'label' => '2. Lost Time Incident',
			),
			array(
				'name' => 'b2_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'b3_target',
				'label' => '3. Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b3_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'b4_target',
				'label' => '4. Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b4_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'b5_target',
				'label' => '5. First Aid',
			),
			array(
				'name' => 'b5_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'b5_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'b5_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => '',
				'label' => 'Leading Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'c1_target',
				'label' => '1. HSE Meeting',
			),
			array(
				'name' => 'c1_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c1_score_max',
				'label'=> 'Score Max',
				'value'=> 7,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c1_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c2_target',
				'label' => '2. HSE Talk/ briefing',
			),
			array(
				'name' => 'c2_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c2_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c2_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c3_target',
				'label' => '3. HSE Reporting',
			),
			array(
				'name' => 'c3_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c3_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c3_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c4_target',
				'label' => '4. HSE Management Visit',
			),
			array(
				'name' => 'c4_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c4_score_max',
				'label'=> 'Score Max',
				'value'=> 7,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c4_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c5_target',
				'label' => '5. Closure Action',
			),
			array(
				'name' => 'c5_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c5_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c5_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c6_target',
				'label' => '6. Inspection/Audit',
			),
			array(
				'name' => 'c6_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c6_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c6_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c7_target',
				'label' => '7. Kepatuhan terhadap Penggunaan APD',
			),
			array(
				'name' => 'c7_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c7_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c7_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c8_target',
				'label' => '8. Kepatuhan terhadap Pengelolaan limbah',
			),
			array(
				'name' => 'c8_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c8_score_max',
				'label'=> 'Score Max',
				'value'=> 7,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c8_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c9_target',
				'label' => '9. Kepatuhan terhadap pengelolaan hygiene industry',
			),
			array(
				'name' => 'c9_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c9_score_max',
				'label'=> 'Score Max',
				'value'=> 7,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c9_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c10_target',
				'label' => '10. Kepatuhan terhadap pengelolaan good house keeping',
			),
			array(
				'name' => 'c10_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c10_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c10_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c11_target',
				'label' => '11. Pelaporan Nearmiss',
			),
			array(
				'name' => 'c11_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c11_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c11_score_actual',
				'label'=> 'Score Actual'
			),
			array(
				'name' => 'c12_target',
				'label' => '12. Pelaporan Safety Non Conformity (Unsafe Act & Unsafe Condition)',
			),
			array(
				'name' => 'c12_actual',
				'label'=> 'Actual'
			),
			array(
				'name' => 'c12_score_max',
				'label'=> 'Score Max',
				'value'=> 8,
				'attributes' => array(
					array('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'c12_score_actual',
				'label'=> 'Score Actual'
			)
		);
		$this->childs = array();
	}

	function getHasil ($uuid)
	{
		$form = parent::prepopulate($uuid);
		$score_actuals = array_filter($form, function ($field) {
			return strpos($field['name'], '_score_actual') > -1;
		});

		$total_score_actual = 0;
		foreach ($score_actuals as $score)
		{
			$total_score_actual += $score['value'];
		}

		return $total_score_actual;
	}

	function update ($data)
	{
		if (isset ($data['progress']))
		{
			if (1 == $data['progress'])
			{
				$current = $this->findOne($data['uuid']);
				if (0 == $current['progress'])
				{
					$data['acceptedAt'] = date('Y-m-d H:i:s');
				}
			}
		}
		return parent::update($data);
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('kpi.project');
		return parent::dt();
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$entity = 'KPI';
		$is_vendor = $this->session->userdata('vendor');
		$location = $this->config->item('storage_upload_directory');
		$form = parent::getForm($uuid, $isSubform);
		$form = array_map(function ($field) use ($location, $entity, $uuid, $is_vendor) {
			if ($is_vendor)
			{
				if (strpos($field['name'], '_target') > -1) {
					$field['attr'] .= ' disabled="disabled"';
				}
				if (strpos($field['name'], '_max') > -1) {
					$field['attr'] .= ' disabled="disabled"';
				}
			}

			$field['is_first'] = strpos($field['name'], '_target') > -1;
			$field['is_last'] = strpos($field['name'], '_score_actual') > -1;
			if (in_array($field['name'], array(
				'a1_actual',
				'a2_actual',
				'b1_actual',
				'b2_actual',
				'b3_actual',
				'b4_actual',
			)))
			{
				$field['is_last'] = true;
			}

			if ($field['is_first'])
			{
				$field['preview'] = false;
				$field['upload'] = false;
				$field['delete'] = false;
				$file = "{$location}/{$entity}-{$uuid}-{$field['name']}.pdf";
				$token = time();
				$public_file = base_url("{$file}?token={$token}");
				$is_exists = file_exists($file);
	
				if ($is_exists) $field['preview'] = "document.getElementById(`pdf_viewer_modal_body`).innerHTML=`<embed src='{$public_file}' width='800px' height='600px' />`";
				if ($is_exists) $field['delete'] = true;
				if ($is_vendor) $field['upload'] = true;
			}

			return $field;
		}, $form);
		return $form;
	}

	function upload($file_name)
	{
		$location = $this->config->item('temporary_upload_directory');
		$address = "{$location}/{$file_name}";
		if (!$_FILES)// MEANS REQUEST DOC DELETION
		{
			$myfile = fopen($address, "w") or die("Unable to open file!");
			fwrite($myfile, ' ');
			fclose($myfile);
		}
		else
		{
			if (file_exists($address)) unlink($address);
			move_uploaded_file($_FILES['doc']['tmp_name'], $address);
		}
		return true;
	}

	function lastSubmit($post)
	{
		$entity = 'KPI';
		if (!$post) return false;
		if ($post['last_submit'] === $this->session->userdata('last_submit')) return false;
		$this->session->set_userdata('last_submit', $post['last_submit']);

		$last_submit = $post['last_submit'];
		$temporary_dir = $this->config->item('temporary_upload_directory');
		$storage_dir = $this->config->item('storage_upload_directory');

		// DELETE REQUESTED DOCS
		foreach (scandir($temporary_dir) as $tmp_file_name)
		{
			if (strpos($tmp_file_name, "{$last_submit}-{$entity}-") > -1 && strpos($tmp_file_name, "-delete") > -1)
			{
				$fix_file_name = str_replace("{$last_submit}-", '', $tmp_file_name);
				$fix_file_name = str_replace("-delete", '', $fix_file_name);
				$fix_file_address = "{$storage_dir}/{$fix_file_name}";
				if (file_exists($fix_file_address)) unlink($fix_file_address);
				unlink("{$temporary_dir}/{$tmp_file_name}");
			}
		}

		// MOVE UPLOADED FOCS
		foreach (scandir($temporary_dir) as $tmp_file_name)
		{
			if (strpos($tmp_file_name, "{$last_submit}-{$entity}-") > -1)
			{
				$fix_file_name = str_replace("{$last_submit}-", '', $tmp_file_name);
				$fix_file_address = "{$storage_dir}/{$fix_file_name}";
				if (file_exists($fix_file_address)) unlink($fix_file_address);
				rename("{$temporary_dir}/$tmp_file_name", $fix_file_address);
			}
		}

		unset($post['last_submit']);
		return $post;
	}

	function getProjectDetail($uuid)
	{
		return $this->db
			->select('project.nama nama_project', false)
			->select('user.vendor nama_vendor', false)
			->join('project', 'kpi.project = project.uuid', 'left')
			->join('user', 'user.uuid = project.pemenang', 'left')
			->get_where($this->table, array('kpi.uuid' => $uuid))
			->row_array();
	}

	function excel ($uuid)
	{
		$result = array (
			'title' => '',
			'spreadsheet' => ''
		);

		$projectDetail = $this->getProjectDetail($uuid);
		$project = $projectDetail['nama_project'];
		$vendor = $projectDetail['nama_vendor'];
		$result['title'] = "KPI HSSE - {$project}";

		$val = $this->findOne($uuid);
		$acceptedAt = date("j F  Y", strtotime($val['acceptedAt']));
		$hasil = $this->getHasil($uuid);
		$cellMap = array(
			'C4' => ": {$vendor}",
			'C5' => ": {$project}",
			'C6' => ": Fuel Terminal Boyolali",
			'C7' => ": {$acceptedAt}",
			'G31'=> $hasil,

			'D10' => $val['a1_target'],
			'E10' => $val['a1_actual'],

			'D11' => $val['a2_target'],
			'E11' => $val['a2_actual'],

			'D13' => $val['b1_target'],
			'E13' => $val['b1_actual'],

			'D14' => $val['b2_target'],
			'E14' => $val['b2_actual'],

			'D15' => $val['b3_target'],
			'E15' => $val['b3_actual'],

			'D16' => $val['b4_target'],
			'E16' => $val['b4_actual'],

			'D17' => $val['b5_target'],
			'E17' => $val['b5_actual'],
			'G17' => $val['b5_score_actual'],

			'D19' => $val['c1_target'],
			'E19' => $val['c1_actual'],
			'G19' => $val['c1_score_actual'],

			'D20' => $val['c2_target'],
			'E20' => $val['c2_actual'],
			'G20' => $val['c2_score_actual'],

			'D21' => $val['c3_target'],
			'E21' => $val['c3_actual'],
			'G21' => $val['c3_score_actual'],

			'D22' => $val['c4_target'],
			'E22' => $val['c4_actual'],
			'G22' => $val['c4_score_actual'],

			'D23' => $val['c5_target'],
			'E23' => $val['c5_actual'],
			'G23' => $val['c5_score_actual'],

			'D24' => $val['c6_target'],
			'E24' => $val['c6_actual'],
			'G24' => $val['c6_score_actual'],

			'D25' => $val['c7_target'],
			'E25' => $val['c7_actual'],
			'G25' => $val['c7_score_actual'],

			'D26' => $val['c8_target'],
			'E26' => $val['c8_actual'],
			'G26' => $val['c8_score_actual'],

			'D27' => $val['c9_target'],
			'E27' => $val['c9_actual'],
			'G27' => $val['c9_score_actual'],

			'D28' => $val['c10_target'],
			'E28' => $val['c10_actual'],
			'G28' => $val['c10_score_actual'],

			'D29' => $val['c11_target'],
			'E29' => $val['c11_actual'],
			'G29' => $val['c11_score_actual'],

			'D30' => $val['c12_target'],
			'E30' => $val['c12_actual'],
			'G30' => $val['c12_score_actual'],

			// 'F15' => $val['1b_isya'] === '1' ? '✓' : '',
			// 'G15' => $val['1b_isya'] === '0' ? '✓' : '',
			// 'H15' => $val['1b_isneed'] === '1' ? '✓' : '',
			// 'I15' => $val['1b_note']
		);

		$spreadsheet = IOFactory::load('./excels/Form 5 - KPI HSSE.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}

	function excelHtml ($uuid)
	{
		$excel = $this->excel($uuid);
		$writer = new Html($excel['spreadsheet']);

		$tmp = "KPI-{$uuid}.html";
		$writer->save($tmp);
		$html = file_get_contents($tmp);
		unlink($tmp);

		$html = str_replace('✓', '<div style="font-family: DejaVu Sans, sans-serif;">✔</div>', $html);
		$html = str_replace('∑', '<div style="font-family: DejaVu Sans, sans-serif; display:inline">∑</div>', $html);
		$html = str_replace('placeholder-for-three-signs', '(......................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(......................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(......................................)', $html);

		return array(
			'title' => $excel['title'],
			'html' => $html
		);
	}
}
