<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanBulanans extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'laporanbulanan';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'project', 'sTitle' => 'Project'),

		);
		$this->form = array(
			array(
				'name' => 'a1',
				'width' => 2,
				'label' => 'Jumlah Tenaga Kerja',
			),
			array(
				'name' => 'a2',
				'width' => 2,
				'label' => 'Jumlah Jam Kerja',
			),
			array(
				'name' => '',
				'label' => 'Lagging Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'b1',
				'width' => 2,
				'label' => 'Fatality',
			),
			array(
				'name' => 'b2',
				'width' => 2,
				'label' => 'Lost Time Incident',
			),
			array(
				'name' => 'b3',
				'width' => 2,
				'label' => 'Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b4',
				'width' => 2,
				'label' => 'Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b5',
				'width' => 2,
				'label' => 'First Aid',
			),
			array(
				'name' => '',
				'label' => 'Leading Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'c1',
				'width' => 2,
				'label' => 'HSE Meeting',
			),
			array(
				'name' => 'c2',
				'width' => 2,
				'label' => 'HSE Talk/ briefing',
			),
			array(
				'name' => 'c3',
				'width' => 2,
				'label' => 'HSE Reporting',
			),
			array(
				'name' => 'c4',
				'width' => 2,
				'label' => 'HSE Management Visit',
			),
			array(
				'name' => 'c5',
				'width' => 2,
				'label' => 'Closure Action',
			),
			array(
				'name' => 'c6',
				'width' => 2,
				'label' => 'Inspection/Audit',
			),
			array(
				'name' => 'c7',
				'width' => 2,
				'label' => 'Kepatuhan terhadap Penggunaan APD',
			),
			array(
				'name' => 'c8',
				'width' => 2,
				'label' => 'Kepatuhan terhadap Pengelolaan limbah',
			),
			array(
				'name' => 'c9',
				'width' => 2,
				'label' => 'Kepatuhan terhadap pengelolaan hygiene industry',
			),
			array(
				'name' => 'c10',
				'width' => 2,
				'label' => 'Kepatuhan terhadap pengelolaan good house keeping',
			),
			array(
				'name' => 'c11',
				'width' => 2,
				'label' => 'Pelaporan Nearmiss',
			),
			array(
				'name' => 'c12',
				'width' => 2,
				'label' => 'Pelaporan Safety Non Conformity (Unsafe Act & Unsafe Condition)',
			),
		);
		$this->childs = array();
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('laporanbulanan.project');
		return parent::dt();
	}

	function tabs($uuid)
	{
		return array_map(function ($record) use ($uuid) {
			$record->is_active = $record->lapbul_uuid === $uuid;
			return $record;
		}, $this->db
		->select('laporanbulanan.uuid lapbul_uuid', false)
		->select('laporanbulanan.bulan lapbul_bulan', false)
		->select('project.nama nama_project', false)
		->join('project', 'laporanbulanan.project = project.uuid', 'left')
		->where("laporanbulanan.project = (SELECT project FROM laporanbulanan WHERE uuid = '{$uuid}')")
		->order_by('laporanbulanan.bulan', 'asc')
		->get($this->table)
		->result());
	}

	function findForDelete($param = array())
	{
	  return $this->db->order_by('bulan', 'asc')->get_where($this->table, $param)->result();
	}
}
