<?php defined('BASEPATH') or exit('No direct script access allowed');

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
			array(
				'name' => 'a1_score_max',
			),
			array(
				'name' => 'a1_score_actual',
			),
			array(
				'name' => 'a2_target',
				'label' => '2. Jumlah Jam Kerja',
			),
			array(
				'name' => 'a2_actual',
			),
			array(
				'name' => 'a2_score_max',
			),
			array(
				'name' => 'a2_score_actual',
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
			array(
				'name' => 'b1_score_max',
			),
			array(
				'name' => 'b1_score_actual',
			),
			array(
				'name' => 'b2_target',
				'label' => '2. Lost Time Incident',
			),
			array(
				'name' => 'b2_actual',
			),
			array(
				'name' => 'b2_score_max',
			),
			array(
				'name' => 'b2_score_actual',
			),
			array(
				'name' => 'b3_target',
				'label' => 'Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b3_actual',
			),
			array(
				'name' => 'b3_score_max',
			),
			array(
				'name' => 'b3_score_actual',
			),
			array(
				'name' => 'b4_target',
				'label' => 'Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b4_actual',
			),
			array(
				'name' => 'b4_score_max',
			),
			array(
				'name' => 'b4_score_actual',
			),
			array(
				'name' => 'b5_target',
				'label' => 'First Aid',
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
				'label' => 'HSE Reporting',
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
				'label' => 'HSE Management Visit',
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
				'label' => 'Closure Action',
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
				'label' => 'Inspection/Audit',
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
				'label' => 'Kepatuhan terhadap Penggunaan APD',
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
				'label' => 'Kepatuhan terhadap Pengelolaan limbah',
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
				'label' => 'Kepatuhan terhadap pengelolaan hygiene industry',
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
				'label' => 'Kepatuhan terhadap pengelolaan good house keeping',
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

	function getProjectName($uuid)
	{
		$result = $this->db
			->select('project.nama')
			->join('project', 'kpi.project = project.uuid', 'left')
			->get_where($this->table, array('kpi.uuid' => $uuid))
			->row_array();
		return $result['nama'];
	}

	function download($uuid)
	{
		return array();
	}
}
