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

	function delete($uuid)
	{
		$lapbul_files = array_filter(scandir('upload'), function ($file_name) use ($uuid) {
			return strpos($file_name, "LaporanBulanan-{$uuid}-") > -1;
		});
		foreach ($lapbul_files as $file) {
			if (file_exists("upload/{$file}")) unlink("upload/{$file}");
		}
		return parent::delete($uuid);
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$entity = 'LaporanBulanan';
		$is_vendor = $this->session->userdata('vendor');
		$location = $this->config->item('storage_upload_directory');
		$form = parent::getForm($uuid, $isSubform);
		$form = array_map(function ($field) use ($location, $entity, $uuid, $is_vendor) {

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
		$entity = 'LaporanBulanan';
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

	function findForDelete($param = array())
	{
	  return $this->db->order_by('bulan', 'asc')->get_where($this->table, $param)->result();
	}
}
