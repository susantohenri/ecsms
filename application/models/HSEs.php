<?php defined('BASEPATH') or exit('No direct script access allowed');

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
				'name' => 'project',
				'label' => 'Project',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Projects'),
					array('data-field' => 'nama'),
					array('disabled' => 'disabled')
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
					array('text' => 'Ya', 'value' => 'Ya'),
					array('text' => 'Tidak', 'value' => 'Tidak'),
				)
			),
			array(
				'name' => '',
				'label' => '1. Data Proyek',
				'type' => 'label'
			),
			array(
				'name' => '1a',
				'width' => 2,
				'label' => 'a. Profil Perusahaan',
			),
			array(
				'name' => '1b',
				'width' => 2,
				'label' => 'b. Gambaran umum dan lingkup kerja project',
			),
			array(
				'name' => '1c',
				'width' => 2,
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
				'label' => 'a. Memiliki kebijakan HSE secara tertulis',
			),
			array(
				'name' => '2b',
				'width' => 2,
				'label' => 'b. Kebijakan HSE ditandatangani oleh pejabat yang berwenang dan dicantumkan tanggal',
			),
			array(
				'name' => '2c',
				'width' => 2,
				'label' => 'c. Kebijakan mencakup seluruh aspek HSSE',
			),
			array(
				'name' => '2d',
				'width' => 2,
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
				'label' => 'a. Memiliki kebijakan Drug & Alcohol secara tertulis',
			),
			array(
				'name' => '3b',
				'width' => 2,
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
				'label' => 'a. Memiliki struktur organisasi project yang disahkan oleh pimpinan perusahaan',
			),
			array(
				'name' => '4b',
				'width' => 2,
				'label' => 'b. Job description masing - masing jabatan sesuai dengan struktur organisasi project',
			),
			array(
				'name' => '4c',
				'width' => 2,
				'label' => 'c. Melampirkan surat penunjukan Manager Project yang ditandatangani pimpinan tertinggi',
			),
			array(
				'name' => '4d',
				'width' => 2,
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
				'label' => 'a. Memiliki KPI yang disetujui oleh pimpinan perusahan atau Manager Project yang ditunjuk',
			),
			array(
				'name' => '5b',
				'width' => 2,
				'label' => 'b. Sesuai format Pertamina',
			),
			array(
				'name' => '5c',
				'width' => 2,
				'label' => 'c. Menetapkan target leading indicator',
			),
			array(
				'name' => '5d',
				'width' => 2,
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
				'label' => 'a. Perencanaan dan program kerja project (S-Curve)',
			),
			array(
				'name' => '6b',
				'width' => 2,
				'label' => 'b. Terdapat tahapan project',
			),
			array(
				'name' => '6c',
				'width' => 2,
				'label' => 'c. Terdapat analisa bahaya tiap tahapan',
			),
			array(
				'name' => '6d',
				'width' => 2,
				'label' => 'd. Terdapat mitigasi yang tepat, meliputi :<ul> <li>peralatan</li> <li>prosedur</li> <li>pelatihan</li> <li>perijinan</li> <li>pengawasan</li> <li>alat pelindung diri</li> <li>fire protection</li></ul>',
			),
			array(
				'name' => '6e',
				'width' => 2,
				'label' => 'e. Kelengkapan data peralatan kerja',
			),
			array(
				'name' => '6f',
				'width' => 2,
				'label' => 'f. Perijinan peralatan kerja',
			),
			array(
				'name' => '6g',
				'width' => 2,
				'label' => 'g. Penanganan zat kimia',
			),
			array(
				'name' => '6h',
				'width' => 2,
				'label' => 'h. Matriks kebutuhan APD',
			),
			array(
				'name' => '6i',
				'width' => 2,
				'label' => 'i. Daftar dan jumlah APD',
			),
			array(
				'name' => '6j',
				'width' => 2,
				'label' => 'j. Daftar peralatan penanggulangan kebakaran',
			),
			array(
				'name' => '7a',
				'width' => 2,
				'label' => 'a. Memiliki data kebutuhan kendaraan yang dioperasikan selama project',
			),
			array(
				'name' => '7b',
				'width' => 2,
				'label' => 'b. Semua kendaraan memiliki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7c',
				'width' => 2,
				'label' => 'c. Semua pekerja yang mengoperasikan kendaraan harus memilki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7d',
				'width' => 2,
				'label' => 'd. Mempunyai checklist pemeriksaan kelayakan kendaraan',
			),
			array(
				'name' => '8a',
				'width' => 2,
				'label' => 'a. Kelengkapan prosedur kerja sesuai dengan pekerjaan yang dilakukan',
			),
			array(
				'name' => '8b',
				'width' => 2,
				'label' => 'b. Prosedur penggunaan APAR',
			),
			array(
				'name' => '8c',
				'width' => 2,
				'label' => 'c. Prosedur penggunaan APD',
			),
			array(
				'name' => '8d',
				'width' => 2,
				'label' => 'd. Prosedur P3K',
			),
			array(
				'name' => '8e',
				'width' => 2,
				'label' => 'e. Daftar standar yang digunakan',
			),
			array(
				'name' => '9a',
				'width' => 2,
				'label' => 'a. Penanggung jawab HSE mempunyai sertifikat nasional  atau internasional yang masih berlaku',
			),
			array(
				'name' => '9b',
				'width' => 2,
				'label' => 'b. Safetyman mempunyai sertifikat dari Migas/Disnaker/AK3',
			),
			array(
				'name' => '9c',
				'width' => 2,
				'label' => 'c. Tenaga kerja ahli mempunyai sertifikasi sesuai kompetensi (welder, pekerjaan teknik bawah air, operator alat berat, dll)',
			),
			array(
				'name' => '9d',
				'width' => 2,
				'label' => 'd. Terdapat program pelatihan pekerja',
			),
			array(
				'name' => '10a',
				'width' => 2,
				'label' => 'a. Prosedur Audit',
			),
			array(
				'name' => '10b',
				'width' => 2,
				'label' => 'b. Prosedur Inspeksi',
			),
			array(
				'name' => '10c',
				'width' => 2,
				'label' => 'c. Program inspeksi',
			),
			array(
				'name' => '10d',
				'width' => 2,
				'label' => 'd. Program audit',
			),
			array(
				'name' => '11a',
				'width' => 2,
				'label' => 'a. Prosedur pelaporan insiden sesuai organisasi dan lokasi project yang ditandatangani oleh pimpinan perusahaan / manager project',
			),
			array(
				'name' => '11b',
				'width' => 2,
				'label' => 'b. Terdapat alur pelaporan kepada Direksi Pekerjaan Pertamina',
			),
			array(
				'name' => '11c',
				'width' => 2,
				'label' => 'c. Prosedur Investigasi Kecelakaan',
			),
			array(
				'name' => '11d',
				'width' => 2,
				'label' => 'd. Prosedur sesuai dengan kondisi di lapangan',
			),
			array(
				'name' => '12a',
				'width' => 2,
				'label' => 'a. Prosedur keadaan darurat',
			),
			array(
				'name' => '12b',
				'width' => 2,
				'label' => 'b. Terdapat organisasi keadaan darurat',
			),
			array(
				'name' => '12c',
				'width' => 2,
				'label' => 'c. Daftar nomor kontak emergency',
			),
			array(
				'name' => '12d',
				'width' => 2,
				'label' => 'd. Data peralatan P3K sesuai standar',
			),
			array(
				'name' => '13a',
				'width' => 2,
				'label' => 'a. Terdapat program komunikasi HSE',
			),
			array(
				'name' => '13b',
				'width' => 2,
				'label' => 'b. Item program sesuai KPI',
			),
			array(
				'name' => '14a',
				'width' => 2,
				'label' => 'a. Manajemen Sub Kontraktor',
			),
			array(
				'name' => '14b',
				'width' => 2,
				'label' => 'b. Kompetensi Sub Kontraktor',
			),
			array(
				'name' => '14c',
				'width' => 2,
				'label' => 'c. Aspek HSE Sub Kontraktor',
			),
			array(
				'name' => '15a',
				'width' => 2,
				'label' => 'a. Program Medical Check Up (MCU) pekerja',
			),
			array(
				'name' => '15b',
				'width' => 2,
				'label' => 'b. Program Daily Check Up (DCU) pekerja',
			),
			array(
				'name' => '15c',
				'width' => 2,
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

	function create($data)
	{
		if (!isset($data['lock'])) $data['lock'] = 0;
		return parent::create($data);
	}

	function getForm($uuid = false, $isSubform = false)
	{
		$form = parent::getForm($uuid, $isSubform);
		$form = array_filter($form, function ($field) {
			return !in_array($field['name'], array('progress', 'lock'));
		});
		$form = array_map(function ($field) use ($uuid) {
			if (in_array($field['name'], array('project', 'vendor', 'uuid'))) {
			} else {
				$field['show_upload_button'] = true;
				$field['show_preview_button'] = false;
				$field['show_score'] = false;

				$pdf = "upload/hse-{$uuid}-{$field['name']}.pdf";
				if (file_exists($pdf)) {
					$field['show_preview_button'] = true;
					$field['show_score'] = true;
					$pdf = base_url($pdf);
					$field['onclick'] = "document.getElementById(`pdf_viewer_modal_body`).innerHTML=`<embed src='{$pdf}' width='800px' height='600px' />`";
				}
			}
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
}
