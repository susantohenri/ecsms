<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Writer\Html;

class HSEs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'hse';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'project', 'sTitle' => 'Project'),

		);
		$this->form = array(
			array(
				'name' => '',
				'label' => '1. Data Proyek',
				'type' => 'label'
			),
			array(
				'name' => '1a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Profil Perusahaan',
			),
			array(
				'name' => '1b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Gambaran umum dan lingkup kerja project',
			),
			array(
				'name' => '1c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Surat kesanggupan untuk melengkapi dokumen pendukung yang habis masa berlakunya setelah penetapan pemenang',
			),
			array(
				'name' => '',
				'label' => '2. HSE Policy & Objective Contractor',
				'type' => 'label'
			),
			array(
				'name' => '2a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Memiliki kebijakan HSE secara tertulis'
			),
			array(
				'name' => '2b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Kebijakan HSE ditandatangani oleh pejabat yang berwenang dan dicantumkan tanggal',
			),
			array(
				'name' => '2c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Kebijakan mencakup seluruh aspek HSSE',
			),
			array(
				'name' => '2d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Memiliki sasaran/objective',
			),
			array(
				'name' => '',
				'label' => '3. Drug & Alcohol Policy',
				'type' => 'label'
			),
			array(
				'name' => '3a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Memiliki kebijakan Drug & Alcohol secara tertulis',
			),
			array(
				'name' => '3b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Kebijakan HSE ditandatangani oleh pejabat yang berwenang',
			),
			array(
				'name' => '',
				'label' => '4. Struktur Organisasi Proyek',
				'type' => 'label'
			),
			array(
				'name' => '4a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Memiliki struktur organisasi project yang disahkan oleh pimpinan perusahaan',
			),
			array(
				'name' => '4b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Job description masing - masing jabatan sesuai dengan struktur organisasi project',
			),
			array(
				'name' => '4c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Melampirkan surat penunjukan Manager Project yang ditandatangani pimpinan tertinggi',
			),
			array(
				'name' => '4d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'd. Penanggung jawab HSE sudah ditentukan',
			),
			array(
				'name' => '',
				'label' => '5. HSE Performance Indicator (KPI)',
				'type' => 'label'
			),
			array(
				'name' => '5a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Memiliki KPI yang disetujui oleh pimpinan perusahan atau Manager Project yang ditunjuk',
			),
			array(
				'name' => '5b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Sesuai format Pertamina',
			),
			array(
				'name' => '5c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Menetapkan target leading indicator',
			),
			array(
				'name' => '5d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Menetapkan target lagging indicator',
			),
			array(
				'name' => '',
				'label' => '6. Work Site Hazard & Risk Assessment',
				'type' => 'label'
			),
			array(
				'name' => '6a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Perencanaan dan program kerja project (S-Curve)',
			),
			array(
				'name' => '6b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Terdapat tahapan project',
			),
			array(
				'name' => '6c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Terdapat analisa bahaya tiap tahapan',
			),
			array(
				'name' => '6d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'd. Terdapat mitigasi yang tepat, meliputi :<ul> <li>peralatan</li> <li>prosedur</li> <li>pelatihan</li> <li>perijinan</li> <li>pengawasan</li> <li>alat pelindung diri</li> <li>fire protection</li></ul>',
			),
			array(
				'name' => '6e',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'e. Kelengkapan data peralatan kerja',
			),
			array(
				'name' => '6f',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'f. Perijinan peralatan kerja',
			),
			array(
				'name' => '6g',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'g. Penanganan zat kimia',
			),
			array(
				'name' => '6h',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'h. Matriks kebutuhan APD',
			),
			array(
				'name' => '6i',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'i. Daftar dan jumlah APD',
			),
			array(
				'name' => '6j',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'j. Daftar peralatan penanggulangan kebakaran',
			),
			array(
				'name' => '',
				'label' => '7. Transport Safety Management',
				'type' => 'label'
			),
			array(
				'name' => '7a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Memiliki data kebutuhan kendaraan yang dioperasikan selama project',
			),
			array(
				'name' => '7b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Semua kendaraan memiliki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Semua pekerja yang mengoperasikan kendaraan harus memilki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Mempunyai checklist pemeriksaan kelayakan kendaraan',
			),
			array(
				'name' => '',
				'label' => '8. Prosedur Operasi & Standard Keselamatan',
				'type' => 'label'
			),
			array(
				'name' => '8a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Kelengkapan prosedur kerja sesuai dengan pekerjaan yang dilakukan',
			),
			array(
				'name' => '8b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Prosedur penggunaan APAR',
			),
			array(
				'name' => '8c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Prosedur penggunaan APD',
			),
			array(
				'name' => '8d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'd. Prosedur P3K',
			),
			array(
				'name' => '8e',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'e. Daftar standar yang digunakan',
			),
			array(
				'name' => '',
				'label' => '9. Kompetensi Pekerja yang Terlibat',
				'type' => 'label'
			),
			array(
				'name' => '9a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Penanggung jawab HSE mempunyai sertifikat nasional  atau internasional yang masih berlaku',
			),
			array(
				'name' => '9b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Safetyman mempunyai sertifikat dari Migas/Disnaker/AK3',
			),
			array(
				'name' => '9c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Tenaga kerja ahli mempunyai sertifikasi sesuai kompetensi (welder, pekerjaan teknik bawah air, operator alat berat, dll)',
			),
			array(
				'name' => '9d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Terdapat program pelatihan pekerja',
			),
			array(
				'name' => '',
				'label' => '10. HSE Audit / Inspection',
				'type' => 'label'
			),
			array(
				'name' => '10a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Prosedur Audit',
			),
			array(
				'name' => '10b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Prosedur Inspeksi',
			),
			array(
				'name' => '10c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Program inspeksi',
			),
			array(
				'name' => '10d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Program audit',
			),
			array(
				'name' => '',
				'label' => '11. Prosedur Pelaporan & Investigasi Kecelakaan',
				'type' => 'label'
			),
			array(
				'name' => '11a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Prosedur pelaporan insiden sesuai organisasi dan lokasi project yang ditandatangani oleh pimpinan perusahaan / manager project',
			),
			array(
				'name' => '11b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Terdapat alur pelaporan kepada Direksi Pekerjaan Pertamina',
			),
			array(
				'name' => '11c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Prosedur Investigasi Kecelakaan',
			),
			array(
				'name' => '11d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'd. Prosedur sesuai dengan kondisi di lapangan',
			),
			array(
				'name' => '',
				'label' => '12. Emergency Response & Procedure',
				'type' => 'label'
			),
			array(
				'name' => '12a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Prosedur keadaan darurat',
			),
			array(
				'name' => '12b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Terdapat organisasi keadaan darurat',
			),
			array(
				'name' => '12c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Daftar nomor kontak emergency',
			),
			array(
				'name' => '12d',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'd. Data peralatan P3K sesuai standar',
			),
			array(
				'name' => '',
				'label' => '13. HSE Communication',
				'type' => 'label'
			),
			array(
				'name' => '13a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Terdapat program komunikasi HSE',
			),
			array(
				'name' => '13b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Item program sesuai KPI',
			),
			array(
				'name' => '',
				'label' => '14. Pengelolaan Sub Kontraktor',
				'type' => 'label'
			),
			array(
				'name' => '14a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'a. Manajemen Sub Kontraktor',
			),
			array(
				'name' => '14b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'b. Kompetensi Sub Kontraktor',
			),
			array(
				'name' => '14c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1')
				),
				'label' => 'c. Aspek HSE Sub Kontraktor',
			),
			array(
				'name' => '',
				'label' => '15. Pemeriksaan Kesehatan',
				'type' => 'label'
			),
			array(
				'name' => '15a',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'a. Program Medical Check Up (MCU) pekerja',
			),
			array(
				'name' => '15b',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'b. Program Daily Check Up (DCU) pekerja',
			),
			array(
				'name' => '15c',
				'width' => 2,
				'options' => array(
					array('text' => 0, 'value' => '0'),
					array('text' => 1, 'value' => '1'),
					array('text' => 2, 'value' => '2')
				),
				'label' => 'c. Melampirkan hasil MCU (project > 6 bulan) atau surat keterangan sehat (project < 6 bulan)',
			),
		);
		$this->childs = array();
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('hse.project');
		return parent::dt();
	}

	function delete($uuid)
	{
		$hse_files = array_filter(scandir('upload'), function ($file_name) use ($uuid) {
			return strpos($file_name, "HSE-{$uuid}-") > -1;
		});
		foreach ($hse_files as $file) {
			if (file_exists("upload/{$file}")) unlink("upload/{$file}");
		}
		return parent::delete($uuid);
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$entity = 'HSE';
		$is_vendor = $this->session->userdata('vendor');
		$location = $this->config->item('storage_upload_directory');
		$form = parent::getForm($uuid, $isSubform);
		$form = array_map(function ($field) use ($location, $entity, $uuid, $is_vendor) {

			$field['preview'] = false;
			$field['upload'] = false;
			$field['delete'] = false;
			$field['score'] = false;
			$file = "{$location}/{$entity}-{$uuid}-{$field['name']}.pdf";
			$token = time();
			$public_file = base_url("{$file}?token={$token}");
			$is_exists = file_exists($file);

			if ($is_exists) $field['preview'] = "document.getElementById(`pdf_viewer_modal_body`).innerHTML=`<embed src='{$public_file}' width='800px' height='600px' />`";
			if ($is_exists) $field['delete'] = true;
			if ($is_vendor) $field['upload'] = true;
			if ($is_vendor) $field['score'] = $field['value'];
			if (in_array($field['name'], array ('1a', '1b', '1c'))) $field['score'] = false;

			return $field;
		}, $form);

		return $form;
	}

	function getTabs($uuid)
	{
		$hse = $this->findOne($uuid);
		return $this->db
			->select("{$this->table}.uuid")
			->select('user.vendor')
			->select("IF({$this->table}.uuid = '{$uuid}', 'active', '') is_active", false)
			->join('user', "{$this->table}.vendor = user.uuid", 'left')
			->where("{$this->table}.project", $hse['project'])
			->get($this->table)
			->result();
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
		$entity = 'HSE';
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
			->join('project', 'hse.project = project.uuid', 'left')
			->join('user', 'hse.vendor = user.uuid', 'left')
			->get_where($this->table, array('hse.uuid' => $uuid))
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
		$result['title'] = "HSE plan - {$project} - {$vendor}";

		$val = $this->findOne($uuid);
		$cellMap = array(
			'C5' => ": {$vendor}",
			'C6' => ": {$project}",
			'C7' => ": Fuel Terminal Boyolali",

			'F17' => $val['2a'],
			'F18' => $val['2b'],
			'F19' => $val['2c'],
			'F20' => $val['2d'],

			'F23' => $val['3a'],
			'F24' => $val['3b'],

			'F27' => $val['4a'],
			'F28' => $val['4b'],
			'F29' => $val['4c'],
			'F30' => $val['4d'],

			'F33' => $val['5a'],
			'F34' => $val['5b'],
			'F35' => $val['5c'],
			'F36' => $val['5d'],

			'F39' => $val['6a'],
			'F40' => $val['6b'],
			'F41' => $val['6c'],
			'F42' => $val['6d'],
			'F50' => $val['6e'],
			'F51' => $val['6f'],
			'F52' => $val['6g'],
			'F53' => $val['6h'],
			'F54' => $val['6i'],
			'F55' => $val['6j'],

			'F58' => $val['7a'],
			'F59' => $val['7b'],
			'F60' => $val['7c'],
			'F61' => $val['7d'],

			'F64' => $val['8a'],
			'F65' => $val['8b'],
			'F66' => $val['8c'],
			'F67' => $val['8d'],
			'F68' => $val['8e'],

			'F71' => $val['9a'],
			'F72' => $val['9b'],
			'F73' => $val['9c'],
			'F74' => $val['9d'],

			'F77' => $val['10a'],
			'F78' => $val['10b'],
			'F79' => $val['10c'],
			'F80' => $val['10d'],

			'F83' => $val['11a'],
			'F84' => $val['11b'],
			'F85' => $val['11c'],
			'F86' => $val['11d'],

			'F89' => $val['12a'],
			'F90' => $val['12b'],
			'F91' => $val['12c'],
			'F92' => $val['12d'],

			'F95' => $val['13a'],
			'F96' => $val['13b'],

			'F99' => $val['14a'],
			'F100' => $val['14b'],
			'F101' => $val['14c'],

			'F104' => $val['15a'],
			'F105' => $val['15b'],
			'F106' => $val['15c'],
		);

		$spreadsheet = IOFactory::load('./excels/Form 1 - HSE plan.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}

	function excelHtml ($uuid)
	{
		$excel = $this->excel($uuid);
		$writer = new Html($excel['spreadsheet']);

		$tmp = "HSE-{$uuid}.html";
		$writer->save($tmp);
		$html = file_get_contents($tmp);
		unlink($tmp);

		return array(
			'title' => $excel['title'],
			'html' => $html
		);
	}

}
