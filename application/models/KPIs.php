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
				'name' => 'project',
				'label' => 'Project',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Projects'),
					array('data-field' => 'nama')
				)
			),
			array(
				'name' => 'progress',
				'label' => 'Progress',
				'width' => 2,
				'attributes' => array(
					array('data-number' => 'true')
				)
			),
			array(
				'name' => 'lock',
				'label' => 'Lock',
				'width' => 2,
				'options' => array(
					array('text' => 'Ya', 'value' => '1'),
					array('text' => 'Tidak', 'value' => '0'),
				)
			),
			array(
				'name' => 'a1',
				'width' => 2,
				'label' => 'Jumlah Tenaga Kerja',
			),
			array(
				'name' => 'a1_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'a2',
				'width' => 2,
				'label' => 'Jumlah Jam Kerja',
			),
			array(
				'name' => 'a2_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'b1',
				'width' => 2,
				'label' => 'Fatality',
			),
			array(
				'name' => 'b1_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'b2',
				'width' => 2,
				'label' => 'Lost Time Incident',
			),
			array(
				'name' => 'b2_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'b3',
				'width' => 2,
				'label' => 'Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b3_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'b4',
				'width' => 2,
				'label' => 'Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b4_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'b5',
				'width' => 2,
				'label' => 'First Aid',
			),
			array(
				'name' => 'b5_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c1',
				'width' => 2,
				'label' => 'HSE Meeting',
			),
			array(
				'name' => 'c1_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c2',
				'width' => 2,
				'label' => 'HSE Talk/ briefing',
			),
			array(
				'name' => 'c2_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c3',
				'width' => 2,
				'label' => 'HSE Reporting',
			),
			array(
				'name' => 'c3_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c4',
				'width' => 2,
				'label' => 'HSE Management Visit',
			),
			array(
				'name' => 'c4_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c5',
				'width' => 2,
				'label' => 'Closure Action',
			),
			array(
				'name' => 'c5_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c6',
				'width' => 2,
				'label' => 'Inspection/Audit',
			),
			array(
				'name' => 'c6_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c7',
				'width' => 2,
				'label' => 'Kepatuhan terhadap Penggunaan APD',
			),
			array(
				'name' => 'c7_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c8',
				'width' => 2,
				'label' => 'Kepatuhan terhadap Pengelolaan limbah',
			),
			array(
				'name' => 'c8_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c9',
				'width' => 2,
				'label' => 'Kepatuhan terhadap pengelolaan hygiene industry',
			),
			array(
				'name' => 'c9_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c10',
				'width' => 2,
				'label' => 'Kepatuhan terhadap pengelolaan good house keeping',
			),
			array(
				'name' => 'c10_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c11',
				'width' => 2,
				'label' => 'Pelaporan Nearmiss',
			),
			array(
				'name' => 'c11_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => 'c12',
				'width' => 2,
				'label' => 'Pelaporan Safety Non Conformity (Unsafe Act & Unsafe Condition)',
			),
			array(
				'name' => 'c12_score',
				'width' => 2,
				'label' => ' ',
			),
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
}
