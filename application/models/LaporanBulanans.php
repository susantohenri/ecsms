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
				'label' => '1. Jumlah Tenaga Kerja',
			),
			array(
				'name' => 'a2',
				'width' => 2,
				'label' => '2. Jumlah Jam Kerja',
			),
			array(
				'name' => '',
				'label' => 'Lagging Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'b1',
				'width' => 2,
				'label' => '1. Fatality',
			),
			array(
				'name' => 'b2',
				'width' => 2,
				'label' => '2. Lost Time Incident',
			),
			array(
				'name' => 'b3',
				'width' => 2,
				'label' => '3. Insiden berdampak pencemaran lingkungan',
			),
			array(
				'name' => 'b4',
				'width' => 2,
				'label' => '4. Insiden berdampak kebakaran / kerusakan aset',
			),
			array(
				'name' => 'b5',
				'width' => 2,
				'label' => '5. First Aid',
			),
			array(
				'name' => '',
				'label' => 'Leading Indicator',
				'type' => 'label'
			),
			array(
				'name' => 'c1',
				'width' => 2,
				'label' => '1. HSE Meeting',
			),
			array(
				'name' => 'c2',
				'width' => 2,
				'label' => '2. HSE Talk/ briefing',
			),
			array(
				'name' => 'c3',
				'width' => 2,
				'label' => '3. HSE Reporting',
			),
			array(
				'name' => 'c4',
				'width' => 2,
				'label' => '4. HSE Management Visit',
			),
			array(
				'name' => 'c5',
				'width' => 2,
				'label' => '5. Closure Action',
			),
			array(
				'name' => 'c6',
				'width' => 2,
				'label' => '6. Inspection/Audit',
			),
			array(
				'name' => 'c7',
				'width' => 2,
				'label' => '7. Kepatuhan terhadap Penggunaan APD',
			),
			array(
				'name' => 'c8',
				'width' => 2,
				'label' => '8. Kepatuhan terhadap Pengelolaan limbah',
			),
			array(
				'name' => 'c9',
				'width' => 2,
				'label' => '9. Kepatuhan terhadap pengelolaan hygiene industry',
			),
			array(
				'name' => 'c10',
				'width' => 2,
				'label' => '10. Kepatuhan terhadap pengelolaan good house keeping',
			),
			array(
				'name' => 'c11',
				'width' => 2,
				'label' => '11. Pelaporan Nearmiss',
			),
			array(
				'name' => 'c12',
				'width' => 2,
				'label' => '12. Pelaporan Safety Non Conformity (Unsafe Act & Unsafe Condition)',
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

	function getForm($uuid = false, $isSubform = false)
	{
		$form = parent::getForm($uuid, $isSubform);
		$form = array_map(function ($field) use ($uuid) {
			$field['show_upload_button'] = $this->session->userdata('vendor') ? true : false;
			$field['upload_url'] = site_url("LaporanBulanan/upload/{$uuid}/{$field['name']}");

			$field['show_preview_button'] = false;

			$pdf = "upload/LaporanBulanan-{$uuid}-{$field['name']}.pdf";
			if (file_exists($pdf)) {
				$field['show_preview_button'] = true;
				$pdf = base_url($pdf);
				$field['onclick'] = "document.getElementById(`pdf_viewer_modal_body`).innerHTML=`<embed src='{$pdf}' width='800px' height='600px' />`";
			}
			return $field;
		}, $form);

		return $form;
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

	function upload($uuid, $input)
	{
		$location = 'upload';
		$file_name = "LaporanBulanan-{$uuid}-{$input}.pdf";
		$address = "{$location}/{$file_name}";
		if (file_exists($address)) unlink($address);
		move_uploaded_file($_FILES['doc']['tmp_name'], $address);
		return true;
	}

	function findForDelete($param = array())
	{
	  return $this->db->order_by('bulan', 'asc')->get_where($this->table, $param)->result();
	}
}
