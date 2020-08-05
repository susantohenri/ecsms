<?php defined('BASEPATH') or exit('No direct script access allowed');

class PJAs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'pja';
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
				'name' => '1a_isneed',
				'width' => 2,
				'label' => 'Apakah program HSE sudah masuk dalam rencana kerja kontraktor pelaksana tersebut?',
			),
			array(
				'name' => '1a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b_isneed',
				'width' => 2,
				'label' => 'Apakah tugas dan tanggung jawab penerapan aspek HSE sudah didefinisikan serta dipahami oleh Kontraktor ?',
			),
			array(
				'name' => '1b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyusun JHSEA terhadap seluruh tahapan pekerjaan (mulai dari tahapan mobilisasi hingga demobilisasi) yang akan dilaksanakan?',
			),
			array(
				'name' => '2a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2b_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah mengidentifikasi dan menganalisa seluruh pekerjaan yang memiliki potensi bahaya kritis?',
			),
			array(
				'name' => '2b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah memiliki prosedur operasi (terkait dengan potensi bahaya kritis yang teridentifikasi) dan mengkomunikasikannya sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '2c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2d_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki system untuk mengawasi adanya potensi bahaya selama dalam pelaksanaan pekerjaan kontrak (unsafe act & unsafe condition)?',
			),
			array(
				'name' => '2d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3a_isneed',
				'width' => 2,
				'label' => 'Apakah pekerja Kontraktor telah memahami prosedur keadaan darurat yang berlaku di lokasi pekerjaan kontrak tersebut?',
			),
			array(
				'name' => '3a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3b_isneed',
				'width' => 2,
				'label' => 'Apakah pekerja kontraktor memahami system pengkomunikasian / pelaporan bila terjadi keadaan darurat?',
			),
			array(
				'name' => '3b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3c_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor memiliki Petugas P3K (First Aider) yang terlatih untuk Pertolongan Pertama?',
			),
			array(
				'name' => '3c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3d_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah menyediakan perlengkapan P3K yang sesuai untuk diletakan di lokasi kerja?',
			),
			array(
				'name' => '3d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3e_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah memiliki emergency call number bila terjadi kondisi darurat?',
			),
			array(
				'name' => '3e_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3f_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah menyediakan dokter / Tim Medis?',
			),
			array(
				'name' => '3f_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4a_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah melaksanakan Pre Job HSE meeting sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4b_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah memiliki program HSE meeting selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah memiliki program HSE talk / briefing selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4d_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyiapkan HSE sign / poster / banner/ spanduk terkait dengan pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '4d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4e_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor memiliki system reward / punishment terhadap pekerja terkait dengan implementasi aspek HSE?',
			),
			array(
				'name' => '4e_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor sudah memiliki surat ijin kerja aman sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5b_isneed',
				'width' => 2,
				'label' => 'Apakah peralatan yang akan digunakan telah disertifikasi (apabila secara regulasi disyaratkan) dan masih berlaku selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c_isneed',
				'width' => 2,
				'label' => 'Apakah ijin dari institusi / badan terkait telah dipenuhi sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5d_isneed',
				'width' => 2,
				'label' => 'Apakah pekerja kontraktor telah memahami peraturan dan ketentuan aspek HSE yang berlaku dilokasi pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '5d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor sudah melaksanakan inspeksi dan atau audit HSE sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6b_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki program inspeksi HSE rutin dan atau audit HSE selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6c_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki program inspeksi Tim Management Kontraktor terhadap aspek HSE selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6d_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyusun Check list inspeksi HSE untuk pengawasan internal selama pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '6d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7a_isneed',
				'width' => 2,
				'label' => 'Apakah hasil inspeksi dan atau audit sebelum pelaksanaan pekerjaan telah ditindaklanjuti oleh Kontraktor?',
			),
			array(
				'name' => '7a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b_isneed',
				'width' => 2,
				'label' => 'Apakah tindak lanjut hasil inspeksi dan atau audit tersebut dimonitor dan dikontrol tindaklanjutnya?',
			),
			array(
				'name' => '7b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah melaksanakan Induction Training terhadap pekerjanya sebelum melaksanakan pekerjaan?',
			),
			array(
				'name' => '8a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8b_isneed',
				'width' => 2,
				'label' => 'Apakah evaluasi terhadap tingkat pemahaman pekerja terhadap materi Inductiopn Training yang diberikan telah dilakukan?',
			),
			array(
				'name' => '8b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8c_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyediakan pekerja yang bersertifikasi untuk melaksanakan pekerjaan yang secara regulasi disyaratkan untuk bersertifikasi?',
			),
			array(
				'name' => '8c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8d_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor memiliki program pelatihan HSE terhadap pekerjanya?',
			),
			array(
				'name' => '8d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8e_isneed',
				'width' => 2,
				'label' => 'Apakah materi dalam program pelatihan HSE tersebut meliputi namun tidak terbatas pada :<ul><li>Penjelasan Bahaya dan mitigasi pekerjaan yang akan dilaksanakan?</li><li>Pertolongan pertama dan pacu jantung (CPR)?</li><li>Cara memadamkan api?</li><li>Pengelolaan limbah / sampah hasil kerja?</li><li>Tanggap darurat?</li><li>Komitmen aspek HSE terhadap pekerjaan tersebut?</li><li>Kebersihan & kerapihan lokasi kerja?</li><li>MSDS material yang digunakan?</li><li>Petunjuk kerja aman terhadap pekerjaan critical yang dilaksanakan (contoh : working at height, confined space, welding, radiography, excavation, pekerjaan didalam air, electrical, dll ?</li><li>HSE Regulation?</li><li>Penggunaan PPE / APD?</li></ul>',
			),
			array(
				'name' => '8e_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8f_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki system evaluasi terhadap tingkat pemahaman pekerja kontraktor terkait materi training HSE yang diberikan?',
			),
			array(
				'name' => '8f_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8g_isneed',
				'width' => 2,
				'label' => 'Apakah seluruh pekerja Kontraktor yang akan melaksanakan pekerjaan sudah dinyatakan sehat berdasarkan hasil Medical Check Up (untuk pekerjaan critical yang mensyaratkan kondisi fit) atau pemeriksaan kesehatan?',
			),
			array(
				'name' => '8g_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8g_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyusun HSE performance indicator (KPI HSE Kontraktor) terhadap pekerjaan tersebut?',
			),
			array(
				'name' => '9a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9b_isneed',
				'width' => 2,
				'label' => 'Apakah program dan kinerja HSE yang telah disusun tersebut menjadi bagian dalam pelaporan kinerja internal Kontraktor?',
			),
			array(
				'name' => '9b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9c_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor memiliki system untuk mengevaluasi pencapaian kinerja HSE Kontraktor serta melakukan upaya-upaya perbaikan?',
			),
			array(
				'name' => '9c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9d_isneed',
				'width' => 2,
				'label' => 'Apakah HSE objective & policy kontraktor terhadap pekerjaan tersebut telah tersedia dan dikomunikasikan kepada seluruh pekerja kontraktor terkait?',
			),
			array(
				'name' => '9d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9e_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyusun struktur organisasi project yang dilengkapi dengan personil yang menjabat beserta tugas dan tanggungjawabnya dalam penerapan aspek HSE?',
			),
			array(
				'name' => '9e_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10a_isneed',
				'width' => 2,
				'label' => 'Apakah semua peralatan Kontraktor yang akan dipakai telah memenuhi criteria kelayakan fungsi?',
			),
			array(
				'name' => '10a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10b_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah menyediakan peralatan bantu untuk handling material dan prosedurnya telah tersedia?',
			),
			array(
				'name' => '10b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10c_isneed',
				'width' => 2,
				'label' => 'Apakah material / bahan yang digunakan telah memiliki MSDS (Material Safety Data Sheet) dan dikomunikasikan kepada pekerja terkait?',
			),
			array(
				'name' => '10c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d_isneed',
				'width' => 2,
				'label' => 'Apakah kontraktor telah memiliki prosedur pengoperasian peralatan terkait yang mengakomodir petunjuk kerja aman serta mengkomunikasikannya kepada pekerja?',
			),
			array(
				'name' => '10d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10e_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyediakan peralatan untuk mengelola limbah / sampah hasil pekerjaan?',
			),
			array(
				'name' => '10e_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10f_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor telah menyediakan APD / PPE yang dibutuhkan oleh pekerja dengan jumlah yang cukup?',
			),
			array(
				'name' => '10f_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11a_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki prosedur pelaporan insiden, accident & investigasi?',
			),
			array(
				'name' => '11a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b_isneed',
				'width' => 2,
				'label' => 'Apakah Kontraktor memiliki program pelaporan kinerja HSE kepada pihak Pengawas Pertamina?',
			),
			array(
				'name' => '11b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12a_isneed',
				'width' => 2,
				'label' => 'Apakah personil dalam organisasi project Kontraktor (pimpinan tertinggi project hingga pelaksana project) telah memahami tugas dan tanggungjawabnya dalam penerapan aspek HSE?',
			),
			array(
				'name' => '12a_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12b_isneed',
				'width' => 2,
				'label' => 'Apakah personil pengawas HSE Kontraktor telah tersedia dengan jumlah yang cukup?',
			),
			array(
				'name' => '12b_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c_isneed',
				'width' => 2,
				'label' => 'Apakah posisi personil HSE dalam struktur organisasi project Kontraktor memiliki bargaining position yang kuat dalam penerapan aspek HSE?',
			),
			array(
				'name' => '12c_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12d_isneed',
				'width' => 2,
				'label' => 'Apakah personil HSE telah memenuhi kompetensi minimum & memahami tanggung jawabnya?',
			),
			array(
				'name' => '12d_isya',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12d_note',
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
			->select('pja.project');
		return parent::dt();
	}
}
