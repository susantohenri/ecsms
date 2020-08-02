<?php defined('BASEPATH') or exit('No direct script access allowed');

class HSEs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'hse';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'proyek', 'sTitle' => 'Proyek'),

		);
		$this->form = array(
			array(
				'name' => 'proyek',
				'label' => 'Proyek',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Proyeks'),
					array('data-field' => 'nama')
				)
			),
			array(
				'name' => 'vendor',
				'label' => 'Vendor',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Vendors'),
					array('data-field' => 'vendor')
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
				'name' => 'kunci_data_vendor',
				'label' => 'Kunci Data Vendor',
				'width' => 2,
				'options' => array(
					array('text' => 'Ya', 'value' => 'Ya'),
					array('text' => 'Tidak', 'value' => 'Tidak'),
				)
			),
			array(
				'name' => '1a',
				'width' => 2,
				'label' => 'Profil Perusahaan',
			),
			array(
				'name' => '1a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b',
				'width' => 2,
				'label' => 'Gambaran umum dan lingkup kerja proyek',
			),
			array(
				'name' => '1b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1c',
				'width' => 2,
				'label' => 'Surat kesanggupan untuk melengkapi dokumen pendukung yang habis masa berlakunya setelah penetapan pemenang',
			),
			array(
				'name' => '1c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2a',
				'width' => 2,
				'label' => 'Memiliki kebijakan HSE secara tertulis',
			),
			array(
				'name' => '2a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2b',
				'width' => 2,
				'label' => 'Kebijakan HSE ditandatangani oleh pejabat yang berwenang dan dicantumkan tanggal',
			),
			array(
				'name' => '2b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c',
				'width' => 2,
				'label' => 'Kebijakan mencakup seluruh aspek HSSE',
			),
			array(
				'name' => '2c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2d',
				'width' => 2,
				'label' => 'Memiliki sasaran/objective',
			),
			array(
				'name' => '2d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3a',
				'width' => 2,
				'label' => 'Memiliki kebijakan Drug & Alcohol secara tertulis',
			),
			array(
				'name' => '3a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3b',
				'width' => 2,
				'label' => 'Kebijakan HSE ditandatangani oleh pejabat yang berwenang',
			),
			array(
				'name' => '3b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4a',
				'width' => 2,
				'label' => 'Memiliki struktur organisasi proyek yang disahkan oleh pimpinan perusahaan',
			),
			array(
				'name' => '4a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4b',
				'width' => 2,
				'label' => 'Job description masing - masing jabatan sesuai dengan struktur organisasi proyek',
			),
			array(
				'name' => '4b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c',
				'width' => 2,
				'label' => 'Melampirkan surat penunjukan Manager Proyek yang ditandatangani pimpinan tertinggi',
			),
			array(
				'name' => '4c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4d',
				'width' => 2,
				'label' => 'Penanggung jawab HSE sudah ditentukan',
			),
			array(
				'name' => '4d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5a',
				'width' => 2,
				'label' => 'Memiliki KPI yang disetujui oleh pimpinan perusahan atau Manager Proyek yang ditunjuk',
			),
			array(
				'name' => '5a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5b',
				'width' => 2,
				'label' => 'Sesuai format Pertamina',
			),
			array(
				'name' => '5b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c',
				'width' => 2,
				'label' => 'Menetapkan target leading indicator',
			),
			array(
				'name' => '5c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5d',
				'width' => 2,
				'label' => 'Menetapkan target lagging indicator',
			),
			array(
				'name' => '5d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6a',
				'width' => 2,
				'label' => 'Perencanaan dan program kerja proyek (S-Curve)',
			),
			array(
				'name' => '6a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6b',
				'width' => 2,
				'label' => 'Terdapat tahapan proyek',
			),
			array(
				'name' => '6b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6c',
				'width' => 2,
				'label' => 'Terdapat analisa bahaya tiap tahapan',
			),
			array(
				'name' => '6c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6d',
				'width' => 2,
				'label' => 'Terdapat mitigasi yang tepat, meliputi :<ul> <li>peralatan</li> <li>prosedur</li> <li>pelatihan</li> <li>perijinan</li> <li>pengawasan</li> <li>alat pelindung diri</li> <li>fire protection</li></ul>',
			),
			array(
				'name' => '6d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6e',
				'width' => 2,
				'label' => 'Kelengkapan data peralatan kerja',
			),
			array(
				'name' => '6e_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6f',
				'width' => 2,
				'label' => 'Perijinan peralatan kerja',
			),
			array(
				'name' => '6f_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6g',
				'width' => 2,
				'label' => 'Penanganan zat kimia',
			),
			array(
				'name' => '6g_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6h',
				'width' => 2,
				'label' => 'Matriks kebutuhan APD',
			),
			array(
				'name' => '6h_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6i',
				'width' => 2,
				'label' => 'Daftar dan jumlah APD',
			),
			array(
				'name' => '6i_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6j',
				'width' => 2,
				'label' => 'Daftar peralatan penanggulangan kebakaran',
			),
			array(
				'name' => '6j_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7a',
				'width' => 2,
				'label' => 'Memiliki data kebutuhan kendaraan yang dioperasikan selama proyek',
			),
			array(
				'name' => '7a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b',
				'width' => 2,
				'label' => 'Semua kendaraan memiliki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7c',
				'width' => 2,
				'label' => 'Semua pekerja yang mengoperasikan kendaraan harus memilki surat ijin yang masih berlaku',
			),
			array(
				'name' => '7c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7d',
				'width' => 2,
				'label' => 'Mempunyai checklist pemeriksaan kelayakan kendaraan',
			),
			array(
				'name' => '7d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8a',
				'width' => 2,
				'label' => 'Kelengkapan prosedur kerja sesuai dengan pekerjaan yang dilakukan',
			),
			array(
				'name' => '8a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8b',
				'width' => 2,
				'label' => 'Prosedur penggunaan APAR',
			),
			array(
				'name' => '8b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8c',
				'width' => 2,
				'label' => 'Prosedur penggunaan APD',
			),
			array(
				'name' => '8c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8d',
				'width' => 2,
				'label' => 'Prosedur P3K',
			),
			array(
				'name' => '8d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8e',
				'width' => 2,
				'label' => 'Daftar standar yang digunakan',
			),
			array(
				'name' => '8e_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9a',
				'width' => 2,
				'label' => 'Penanggung jawab HSE mempunyai sertifikat nasional  atau internasional yang masih berlaku',
			),
			array(
				'name' => '9a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9b',
				'width' => 2,
				'label' => 'Safetyman mempunyai sertifikat dari Migas/Disnaker/AK3',
			),
			array(
				'name' => '9b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9c',
				'width' => 2,
				'label' => 'Tenaga kerja ahli mempunyai sertifikasi sesuai kompetensi (welder, pekerjaan teknik bawah air, operator alat berat, dll)',
			),
			array(
				'name' => '9c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9d',
				'width' => 2,
				'label' => 'Terdapat program pelatihan pekerja',
			),
			array(
				'name' => '9d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10a',
				'width' => 2,
				'label' => 'Prosedur Audit',
			),
			array(
				'name' => '10a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10b',
				'width' => 2,
				'label' => 'Prosedur Inspeksi',
			),
			array(
				'name' => '10b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10c',
				'width' => 2,
				'label' => 'Program inspeksi',
			),
			array(
				'name' => '10c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d',
				'width' => 2,
				'label' => 'Program audit',
			),
			array(
				'name' => '10d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11a',
				'width' => 2,
				'label' => 'Prosedur pelaporan insiden sesuai organisasi dan lokasi proyek yang ditandatangani oleh pimpinan perusahaan / manager proyek',
			),
			array(
				'name' => '11a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b',
				'width' => 2,
				'label' => 'Terdapat alur pelaporan kepada Direksi Pekerjaan Pertamina',
			),
			array(
				'name' => '11b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11c',
				'width' => 2,
				'label' => 'Prosedur Investigasi Kecelakaan',
			),
			array(
				'name' => '11c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11d',
				'width' => 2,
				'label' => 'Prosedur sesuai dengan kondisi di lapangan',
			),
			array(
				'name' => '11d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12a',
				'width' => 2,
				'label' => 'Prosedur keadaan darurat',
			),
			array(
				'name' => '12a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12b',
				'width' => 2,
				'label' => 'Terdapat organisasi keadaan darurat',
			),
			array(
				'name' => '12b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c',
				'width' => 2,
				'label' => 'Daftar nomor kontak emergency',
			),
			array(
				'name' => '12c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12d',
				'width' => 2,
				'label' => 'Data peralatan P3K sesuai standar',
			),
			array(
				'name' => '12d_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13a',
				'width' => 2,
				'label' => 'Terdapat program komunikasi HSE',
			),
			array(
				'name' => '13a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13b',
				'width' => 2,
				'label' => 'Item program sesuai KPI',
			),
			array(
				'name' => '13b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14a',
				'width' => 2,
				'label' => 'Manajemen Sub Kontraktor',
			),
			array(
				'name' => '14a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14b',
				'width' => 2,
				'label' => 'Kompetensi Sub Kontraktor',
			),
			array(
				'name' => '14b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14c',
				'width' => 2,
				'label' => 'Aspek HSE Sub Kontraktor',
			),
			array(
				'name' => '14c_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15a',
				'width' => 2,
				'label' => 'Program Medical Check Up (MCU) pekerja',
			),
			array(
				'name' => '15a_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15b',
				'width' => 2,
				'label' => 'Program Daily Check Up (DCU) pekerja',
			),
			array(
				'name' => '15b_score',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15c',
				'width' => 2,
				'label' => 'Melampirkan hasil MCU (proyek > 6 bulan) atau surat keterangan sehat (proyek < 6 bulan)',
			),
			array(
				'name' => '15c_score',
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
			->select('hse.proyek');
		return parent::dt();
	}
}
