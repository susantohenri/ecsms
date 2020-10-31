<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

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
			),
			// array(
			// 	'name' => 'a1_score_max',
			// ),
			array(
				'name' => 'a1_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
			),
			array(
				'name' => 'a2_target',
				'label' => '2. Jumlah Jam Kerja',
			),
			array(
				'name' => 'a2_actual',
			),
			// array(
			// 	'name' => 'a2_score_max',
			// ),
			array(
				'name' => 'a2_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
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
			),
			// array(
			// 	'name' => 'b1_score_max',
			// ),
			array(
				'name' => 'b1_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
			),
			array(
				'name' => 'b2_target',
				'label' => '2. Lost Time Incident',
			),
			array(
				'name' => 'b2_actual',
			),
			// array(
			// 	'name' => 'b2_score_max',
			// ),
			array(
				'name' => 'b2_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
			),
			array(
				'name' => 'b3_target',
				'label' => '3. Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b3_actual',
			),
			// array(
			// 	'name' => 'b3_score_max',
			// ),
			array(
				'name' => 'b3_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
			),
			array(
				'name' => 'b4_target',
				'label' => '4. Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b4_actual',
			),
			// array(
			// 	'name' => 'b4_score_max',
			// ),
			array(
				'name' => 'b4_score_actual',
				'attributes' => array(
					array('data-nonscoring' => 'true')
				)
			),
			array(
				'name' => 'b5_target',
				'label' => '5. First Aid',
			),
			array(
				'name' => 'b5_actual',
			),
			array(
				'name' => 'b5_score_max',
			),
			array(
				'name' => 'b5_score_actual',
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
			),
			array(
				'name' => 'c1_score_max',
			),
			array(
				'name' => 'c1_score_actual',
			),
			array(
				'name' => 'c2_target',
				'label' => '2. HSE Talk/ briefing',
			),
			array(
				'name' => 'c2_actual',
			),
			array(
				'name' => 'c2_score_max',
			),
			array(
				'name' => 'c2_score_actual',
			),
			array(
				'name' => 'c3_target',
				'label' => '3. HSE Reporting',
			),
			array(
				'name' => 'c3_actual',
			),
			array(
				'name' => 'c3_score_max',
			),
			array(
				'name' => 'c3_score_actual',
			),
			array(
				'name' => 'c4_target',
				'label' => '4. HSE Management Visit',
			),
			array(
				'name' => 'c4_actual',
			),
			array(
				'name' => 'c4_score_max',
			),
			array(
				'name' => 'c4_score_actual',
			),
			array(
				'name' => 'c5_target',
				'label' => '5. Closure Action',
			),
			array(
				'name' => 'c5_actual',
			),
			array(
				'name' => 'c5_score_max',
			),
			array(
				'name' => 'c5_score_actual',
			),
			array(
				'name' => 'c6_target',
				'label' => '6. Inspection/Audit',
			),
			array(
				'name' => 'c6_actual',
			),
			array(
				'name' => 'c6_score_max',
			),
			array(
				'name' => 'c6_score_actual',
			),
			array(
				'name' => 'c7_target',
				'label' => '7. Kepatuhan terhadap Penggunaan APD',
			),
			array(
				'name' => 'c7_actual',
			),
			array(
				'name' => 'c7_score_max',
			),
			array(
				'name' => 'c7_score_actual',
			),
			array(
				'name' => 'c8_target',
				'label' => '8. Kepatuhan terhadap Pengelolaan limbah',
			),
			array(
				'name' => 'c8_actual',
			),
			array(
				'name' => 'c8_score_max',
			),
			array(
				'name' => 'c8_score_actual',
			),
			array(
				'name' => 'c9_target',
				'label' => '9. Kepatuhan terhadap pengelolaan hygiene industry',
			),
			array(
				'name' => 'c9_actual',
			),
			array(
				'name' => 'c9_score_max',
			),
			array(
				'name' => 'c9_score_actual',
			),
			array(
				'name' => 'c10_target',
				'label' => '10. Kepatuhan terhadap pengelolaan good house keeping',
			),
			array(
				'name' => 'c10_actual',
			),
			array(
				'name' => 'c10_score_max',
			),
			array(
				'name' => 'c10_score_actual',
			),
			array(
				'name' => 'c11_target',
				'label' => '11. Pelaporan Nearmiss',
			),
			array(
				'name' => 'c11_actual',
			),
			array(
				'name' => 'c11_score_max',
			),
			array(
				'name' => 'c11_score_actual',
			),
			array(
				'name' => 'c12_target',
				'label' => '12. Pelaporan Safety Non Conformity (Unsafe Act & Unsafe Condition)',
			),
			array(
				'name' => 'c12_actual',
			),
			array(
				'name' => 'c12_score_max',
			),
			array(
				'name' => 'c12_score_actual',
			)
		);
		$this->childs = array();
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
		$form = parent::getForm($uuid, $isSubform);
		if (strlen($this->session->userdata('vendor')) > 0) {
			$form = array_map(function ($field) {
				if (strpos($field['name'], '_target') > -1) {
					$field['attr'] .= ' disabled="disabled"';
				}
				if (strpos($field['name'], '_max') > -1) {
					$field['attr'] .= ' disabled="disabled"';
				}
				return $field;
			}, $form);
		}
		return $form;
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
		$cellMap = array(
			'C4' => ": {$vendor}",
			'C5' => ": {$project}",
			'C6' => ": Fuel Terminal Boyolali",
			'C7' => ": {$acceptedAt}",

			'D10' => $val['a1_target'],
			'E10' => $val['a1_actual'],

			'D11' => $val['a2_target'],
			'E11' => $val['a2_actual'],

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
}
