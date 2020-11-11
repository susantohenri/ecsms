<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

class FEs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'fe';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'project', 'sTitle' => 'Project'),
		);
		$this->form = array(
			array(
				'name' => '',
				'label' => 'INCIDENT RECORD :',
				'type' => 'label'
			),
			array(
				'name' => 'incident_1_jml_kasus',
				'label' => 'I. Fatality / kebakaran - property damage (kerugian ≥ US$ 1 juta) / pencemaran lingkungan (≥ 15 Bbl) / kerugian lain ≥ US$ 1',
			),
			array(
				'name' => 'incident_1_punishment',
				'label' => '',
			),
			array(
				'name' => 'incident_2_jml_kasus',
				'label' => 'II. Insiden berdampak pencemaran lingkungan, kebakaran / kerusakan aset, Medical Treatment cases (yang dibawah kategori sanksi hitam)',
			),
			array(
				'name' => 'incident_2_punishment',
				'label' => '',
			),
			array(
				'name' => '',
				'label' => 'ELEMEN :',
				'type' => 'label'
			),
			array(
				'name' => 'elemen_1_nilai_awal',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '1. Kesiapan saat Pre-Job Activity',
			),
			array(
				'name' => 'elemen_1_bobot',
				'value' => '20 %',
				'attributes' => array(
					array ('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'elemen_1_nilai_akhir',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '',
			),
			array(
				'name' => 'elemen_2_nilai_awal',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '2. Inspeksi HSE',
			),
			array(
				'name' => 'elemen_2_bobot',
				'value' => '30 %',
				'attributes' => array(
					array ('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'elemen_2_nilai_akhir',
				'attributes' => array(
					array ('disabled' => 'disabled')
				),
				'label' => '',
			),
			array(
				'name' => 'elemen_3_nilai_awal',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '3. Program HSE',
			),
			array(
				'name' => 'elemen_3_bobot',
				'value' => '35 %',
				'attributes' => array(
					array ('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'elemen_3_nilai_akhir',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '',
			),
			array(
				'name' => 'elemen_4_nilai_awal',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '4. Evaluasi HSE Performance',
			),
			array(
				'name' => 'elemen_4_bobot',
				'value' => '15 %',
				'attributes' => array(
					array ('disabled' => 'disabled')
				)
			),
			array(
				'name' => 'elemen_4_nilai_akhir',
				'attributes' => array (
					array ('disabled' => 'disabled')
				),
				'label' => '',
			),
		);
		$this->childs = array();
	}

	function prepopulate($uuid)
	{
		$fe = parent::findOne($uuid);
		$project = $fe['project'];
		$form = parent::prepopulate(($uuid));

		$bobots = array_filter($form, function ($field) {
			return strpos($field['name'], '_bobot') > -1;
		});

		$divider = array();
		foreach ($bobots as $bobot)
		{
			$divider[$bobot['name']] = str_replace(' %', '', $bobot['value']);
		}

		$this->load->model(array('PJAs'));

		$pja = $this->PJAs->findOne(array('project' => $project));
		$hasil_pja = $this->PJAs->getHasil($pja['uuid']);

		$nilai_awals = array(
			'pja' => $hasil_pja['percent']
		);

		$nilai_akhirs = array(
			'pja' => number_format($nilai_awals['pja'] / $divider['elemen_1_bobot'], 2)
		);

		$form = array_map(function ($field) use ($nilai_awals, $nilai_akhirs) {
			switch ($field['name'])
			{
				case 'elemen_1_nilai_awal':
					$field['value'] = $nilai_awals['pja'] . ' %';
					break;
				case 'elemen_1_nilai_akhir':
					$field['value'] = $nilai_akhirs['pja'] . ' %';
					break;
			}
			return $field;
		}, $form);
		return $form;
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$form = parent::getForm($uuid, $isSubform);
		if (strlen($this->session->userdata('vendor')) > 0) {
			$form = array_map(function ($field) {
				$field['attr'] .= ' disabled="disabled"';
				return $field;
			}, $form);
		}
		return $form;
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('fe.project');
		return parent::dt();
	}

	function getProjectDetail($uuid)
	{
		return $this->db
			->select('project.nama nama_project', false)
			->select('user.vendor nama_vendor', false)
			->join('project', 'fe.project = project.uuid', 'left')
			->join('user', 'user.uuid = project.pemenang', 'left')
			->get_where($this->table, array('fe.uuid' => $uuid))
			->row_array();
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

	function excel ($uuid)
	{
		$result = array (
			'title' => '',
			'spreadsheet' => ''
		);

		$projectDetail = $this->getProjectDetail($uuid);
		$project = $projectDetail['nama_project'];
		$vendor = $projectDetail['nama_vendor'];
		$result['title'] = "Evaluasi Akhir - {$project}";

		$val = $this->findOne($uuid);
		$acceptedAt = date("j F  Y", strtotime($val['acceptedAt']));
		$cellMap = array(
			'C6' => ": {$vendor}",
			'C7' => ": {$project}",
			'C8' => ": Fuel Terminal Boyolali",
			'C9' => ": {$acceptedAt}",

			'D12' => $val['incident_1_jml_kasus'],
			'F12' => $val['incident_1_punishment'],

			'D13' => $val['incident_2_jml_kasus'],
			'F13' => $val['incident_2_punishment'],

			'D15' => $val['elemen_1_nilai_awal'],
			'F15' => $val['elemen_1_bobot'],
			'I15' => $val['elemen_1_nilai_akhir'],

			'D16' => $val['elemen_2_nilai_awal'],
			'F16' => $val['elemen_2_bobot'],
			'I16' => $val['elemen_2_nilai_akhir'],

			'D17' => $val['elemen_3_nilai_awal'],
			'F17' => $val['elemen_3_bobot'],
			'I17' => $val['elemen_3_nilai_akhir'],

			'D18' => $val['elemen_4_nilai_awal'],
			'F18' => $val['elemen_4_bobot'],
			'I18' => $val['elemen_4_nilai_akhir']
		);

		$spreadsheet = IOFactory::load('./excels/Form 6 - Evaluasi Akhir.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}
}
