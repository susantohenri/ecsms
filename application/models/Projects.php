<?php defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'project';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'nama', 'sTitle' => 'Nama'),

		);
		$this->form = array(
			array(
				'name' => 'nama',
				'width' => 2,
				'label' => 'Nama',
			),
			array(
				'name' => 'lokasi',
				'width' => 2,
				'label' => 'Lokasi',
			),
			array(
				'name' => 'jangka_waktu',
				'label' => 'Jangka Waktu',
				'width' => 2,
				'attributes' => array(
					array('data-number' => 'true')
				)
			),
			array(
				'name' => 'jumlah_laporan_bulanan',
				'label' => 'Jumlah Laporan Bulanan',
				'width' => 2,
				'attributes' => array(
					array('data-number' => 'true')
				)
			),
			array(
				'name' => 'pemenang',
				'label' => 'Pemenang',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Vendors'),
					array('data-field' => 'vendor'),
				)
			),
		);
		$this->childs = array(
			array(
				'label' => 'Vendor Peserta',
				'controller' => 'PesertaProject',
				'model' => 'PesertaProjects'
			),
		);
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('project.nama');
		return parent::dt();
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$form = parent::getForm($uuid, $isSubform);
		if (!$uuid) {
			$form = array_filter($form, function ($field) {
				return 'pemenang' !== $field['name'];
			});
		}
		return $form;
	}

	function create($data)
	{
		$uuid = parent::create($data);
		$models = array('PJAs', 'LaporanBulanans', 'WIPs', 'KPIs');
		$this->load->model($models);
		foreach ($models as $model) {
			if ('LaporanBulanans' === $model) {
				for ($bulan = 1; $bulan <= $data['jumlah_laporan_bulanan']; $bulan++) {
					$this->$model->create(array('project' => $uuid, 'bulan' => $bulan));
				}
			} else $this->$model->create(array('project' => $uuid));
		}
		return $uuid;
	}

	function update($record)
	{
		$uuid = parent::update($record);
		$project = $this->findOne($uuid);
		$this->load->model('LaporanBulanans');
		$lapBuls = $this->LaporanBulanans->find(array('project' => $uuid));
		if (count($lapBuls) > $project['jumlah_laporan_bulanan']) {
			foreach ($lapBuls as $index => $lap) {
				if ($index + 1 > $project['jumlah_laporan_bulanan']) {
					$this->LaporanBulanans->delete($lap->uuid);
				}
			}
		} else if (count($lapBuls) < $project['jumlah_laporan_bulanan']) {
			for ($bulan = count($lapBuls) + 1; $bulan <= (int) $project['jumlah_laporan_bulanan']; $bulan++) {
				$this->LaporanBulanans->create(array(
					'project' => $uuid,
					'bulan' => $bulan
				));
			}
		}
		return $uuid;
	}

	function delete($uuid)
	{
		$models = array('PJAs', 'LaporanBulanans', 'WIPs', 'KPIs');
		$this->load->model($models);
		foreach ($models as $model) {
			foreach ($this->$model->find(array(
				'project' => $uuid
			)) as $record) $this->$model->delete($record->uuid);
		}
		return parent::delete($uuid);
	}

	function dashboard()
	{
		$search = $this->input->get('search');
		if (strlen($search) > 0) $this->db->like('project.nama', $search);

		$this->db->order_by('orders', 'asc');
		$result = $this->db->get($this->table)->result();

		$number = 1;
		$result = array_map(function ($record) use (&$number) {
			$record->number = $number;
			$number++;
			return $record;
		}, $result);
		return $result;
	}
}
