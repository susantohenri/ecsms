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
				'label' => 'Pemenang Lelang',
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
				'label' => 'Peserta Lelang',
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

	function create($data)
	{
		if (!isset($data['jumlah_laporan_bulanan'])) $data['jumlah_laporan_bulanan'] = 0;
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
		$lapBuls = $this->LaporanBulanans->findForDelete(array('project' => $uuid));
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

		// FILTER PROJECTS FOR VENDOR for pagination
		if (strlen($this->session->userdata('vendor')) > 0) {
			$vendor_id = $this->session->userdata('uuid');
			$this->db
				->join('pesertaproject', 'project.uuid = pesertaproject.project', 'left')
				->where("(project.pemenang = '{$vendor_id}' OR ((project.pemenang IS NULL OR '' = project.pemenang) AND pesertaproject.vendor = '{$vendor_id}'))");
		}

		// searching for pagination
		$search = $this->input->get('search');
		if (strlen($search) > 0) $this->db->like('project.nama', $search);

		// grouping for pagination
		$this->db->group_by("{$this->table}.uuid");
		$this->db->select("{$this->table}.*");

		// pagination
		$per_page = 10;
		$count_all = $this->db->count_all_results($this->table);
		$current_page = $this->input->get('requested_page');
		$current_page = $current_page ? $current_page : 1;
		$offset = ($current_page - 1) * $per_page;
		$this->db->offset($offset);
		$total_page = ceil($count_all / $per_page);
		$this->db->limit($per_page);

		// FILTER PROJECTS FOR VENDOR for result
		if (strlen($this->session->userdata('vendor')) > 0) {
			$vendor_id = $this->session->userdata('uuid');
			$this->db
				->join('pesertaproject', 'project.uuid = pesertaproject.project', 'left')
				->where("(project.pemenang = '{$vendor_id}' OR ((project.pemenang IS NULL OR '' = project.pemenang) AND pesertaproject.vendor = '{$vendor_id}'))");
		}

		// searching for result
		$search = $this->input->get('search');
		if (strlen($search) > 0) $this->db->like('project.nama', $search);

		// grouping for result
		$this->db->group_by("{$this->table}.uuid");

		// sorting
		$this->db->order_by("{$this->table}.orders", 'desc');

		$this->db->select("{$this->table}.*");

		// build link for HSE (multiple vendor)
		if (strlen($this->session->userdata('vendor')) > 0) {
			$vendor_id = $this->session->userdata('uuid');
			$this->db
				->select('hse.uuid hse_uuid', false)
				->join('hse', "{$this->table}.uuid = hse.{$this->table} AND hse.vendor = '{$vendor_id}'", 'left');
		} else {
			$this->db
				->select('hse.uuid hse_uuid', false)
				->join('hse', "{$this->table}.uuid = hse.{$this->table}", 'left');
		}

		$this->db
			->select('pja.uuid pja_uuid', false)
			->select('pja.progress pja_progress', false)
			->join('pja', 'pja.project = project.uuid', 'left');
		$this->db
			->select("lapbul.uuid lapbul_uuid", false)
			->select("CONCAT(CEIL(lapbul.progress / project.jumlah_laporan_bulanan * 100), ' %') lapbul_text", false)
			->join("(SELECT uuid, project, SUM(laporanbulanan.progress) progress FROM laporanbulanan GROUP BY project) lapbul", "lapbul.project = project.uuid", 'left');
		$this->db
			->select('wip.uuid wip_uuid', false)
			->select('wip.progress wip_progress', false)
			->join('wip', 'wip.project = project.uuid', 'left');
		$this->db
			->select('kpi.uuid kpi_uuid', false)
			->select('kpi.progress kpi_progress', false)
			->join('kpi', 'kpi.project = project.uuid', 'left');

		$result = $this->db->get($this->table)->result();
		// die($this->db->last_query());
		// die(json_encode($result[0]));

		$number = $offset + 1;
		$result = array_map(function ($record) use (&$number) {
			$record->number = $number;
			$number++;

			if (!is_null($record->hse_uuid)) $record->hse_link = site_url("HSE/read/{$record->hse_uuid}");
			if (strlen($record->pemenang) > 0) $record->pja_link = site_url("PJA/read/{$record->pja_uuid}");
			if ($record->pja_progress > 0 && strlen($record->lapbul_uuid) > 0) $record->lapbul_link = site_url("LaporanBulanan/read/{$record->lapbul_uuid}");
			if ('100 %' === $record->lapbul_text) $record->wip_link = site_url("WIP/read/{$record->wip_uuid}");
			if ($record->wip_progress > 0) $record->kpi_link = site_url("KPI/read/{$record->kpi_uuid}");
			if ($record->kpi_progress > 0) $record->fe_link = site_url("Project/FE/{$record->uuid}");

			return $record;
		}, $result);
		return array(
			'current_page' => $current_page,
			'total_page' => $total_page,
			'data' => $result
		);
	}
}
