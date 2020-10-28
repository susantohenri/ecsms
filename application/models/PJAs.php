<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

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
				'name' => '',
				'label' => '1. Work Plan (Rencana Kerja)',
				'type' => 'label'
			),
			array(
				'name' => '1a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah program HSE sudah masuk dalam rencana kerja kontraktor pelaksana tersebut?',
			),
			array(
				'name' => '1a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '1a_note',
				'type' => 'text'
			),
			array(
				'name' => '1b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah tugas dan tanggung jawab penerapan aspek HSE sudah didefinisikan serta dipahami oleh Kontraktor ?',
			),
			array(
				'name' => '1b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '1b_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '2. Potensi Bahaya',
				'type' => 'label'
			),
			array(
				'name' => '2a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor telah menyusun JHSEA terhadap seluruh tahapan pekerjaan (mulai dari tahapan mobilisasi hingga demobilisasi) yang akan dilaksanakan?',
			),
			array(
				'name' => '2a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '2a_note',
				'type' => 'text'
			),
			array(
				'name' => '2b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah kontraktor telah mengidentifikasi dan menganalisa seluruh pekerjaan yang memiliki potensi bahaya kritis?',
			),
			array(
				'name' => '2b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '2b_note',
				'type' => 'text'
			),
			array(
				'name' => '2c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah kontraktor telah memiliki prosedur operasi (terkait dengan potensi bahaya kritis yang teridentifikasi) dan mengkomunikasikannya sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '2c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '2c_note',
				'type' => 'text'
			),
			array(
				'name' => '2d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah Kontraktor memiliki system untuk mengawasi adanya potensi bahaya selama dalam pelaksanaan pekerjaan kontrak (unsafe act & unsafe condition)?',
			),
			array(
				'name' => '2d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '2d_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '3. Rencana Tanggap Darurat & Prosedur Emergency',
				'type' => 'label'
			),
			array(
				'name' => '3a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah pekerja Kontraktor telah memahami prosedur keadaan darurat yang berlaku di lokasi pekerjaan kontrak tersebut?',
			),
			array(
				'name' => '3a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3a_note',
				'type' => 'text'
			),
			array(
				'name' => '3b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah pekerja kontraktor memahami system pengkomunikasian / pelaporan bila terjadi keadaan darurat?',
			),
			array(
				'name' => '3b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3b_note',
				'type' => 'text'
			),
			array(
				'name' => '3c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah kontraktor memiliki Petugas P3K (First Aider) yang terlatih untuk Pertolongan Pertama?',
			),
			array(
				'name' => '3c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3c_note',
				'type' => 'text'
			),
			array(
				'name' => '3d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah kontraktor telah menyediakan perlengkapan P3K yang sesuai untuk diletakan di lokasi kerja?',
			),
			array(
				'name' => '3d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3d_note',
				'type' => 'text'
			),
			array(
				'name' => '3e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Apakah kontraktor telah memiliki emergency call number bila terjadi kondisi darurat?',
			),
			array(
				'name' => '3e_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3e_note',
				'type' => 'text'
			),
			array(
				'name' => '3f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Apakah kontraktor telah menyediakan dokter / Tim Medis?',
			),
			array(
				'name' => '3f_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '3f_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '4. HSE Communication & Promotion',
				'type' => 'label'
			),
			array(
				'name' => '4a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah kontraktor telah melaksanakan Pre Job HSE meeting sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '4a_note',
				'type' => 'text'
			),
			array(
				'name' => '4b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah Kontraktor telah memiliki program HSE meeting selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '4b_note',
				'type' => 'text'
			),
			array(
				'name' => '4c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah Kontraktor telah memiliki program HSE talk / briefing selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '4c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '4c_note',
				'type' => 'text'
			),
			array(
				'name' => '4d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah Kontraktor telah menyiapkan HSE sign / poster / banner/ spanduk terkait dengan pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '4d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '4d_note',
				'type' => 'text'
			),
			array(
				'name' => '4e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Apakah kontraktor memiliki system reward / punishment terhadap pekerja terkait dengan implementasi aspek HSE?',
			),
			array(
				'name' => '4e_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '4e_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '5. Perizinan & Kepatuhan Regulasi',
				'type' => 'label'
			),
			array(
				'name' => '5a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor sudah memiliki surat ijin kerja aman sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '5a_note',
				'type' => 'text'
			),
			array(
				'name' => '5b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah peralatan yang akan digunakan telah disertifikasi (apabila secara regulasi disyaratkan) dan masih berlaku selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '5b_note',
				'type' => 'text'
			),
			array(
				'name' => '5c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah ijin dari institusi / badan terkait telah dipenuhi sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '5c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '5c_note',
				'type' => 'text'
			),
			array(
				'name' => '5d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah pekerja kontraktor telah memahami peraturan dan ketentuan aspek HSE yang berlaku dilokasi pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '5d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '5d_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '6. Inspeksi dan atau Audit HSE',
				'type' => 'label'
			),
			array(
				'name' => '6a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor sudah melaksanakan inspeksi dan atau audit HSE sebelum pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '6a_note',
				'type' => 'text'
			),
			array(
				'name' => '6b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah Kontraktor memiliki program inspeksi HSE rutin dan atau audit HSE selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '6b_note',
				'type' => 'text'
			),
			array(
				'name' => '6c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah Kontraktor memiliki program inspeksi Tim Management Kontraktor terhadap aspek HSE selama pelaksanaan pekerjaan?',
			),
			array(
				'name' => '6c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '6c_note',
				'type' => 'text'
			),
			array(
				'name' => '6d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah Kontraktor telah menyusun Check list inspeksi HSE untuk pengawasan internal selama pelaksanaan pekerjaan kontrak?',
			),
			array(
				'name' => '6d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '6d_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '7. Tindaklanjut Temuan HSE',
				'type' => 'label'
			),
			array(
				'name' => '7a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah hasil inspeksi dan atau audit sebelum pelaksanaan pekerjaan telah ditindaklanjuti oleh Kontraktor?',
			),
			array(
				'name' => '7a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '7a_note',
				'type' => 'text'
			),
			array(
				'name' => '7b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah tindak lanjut hasil inspeksi dan atau audit tersebut dimonitor dan dikontrol tindaklanjutnya?',
			),
			array(
				'name' => '7b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '7b_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '8. Training & Kompetensi HSE',
				'type' => 'label'
			),
			array(
				'name' => '8a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor telah melaksanakan Induction Training terhadap pekerjanya sebelum melaksanakan pekerjaan?',
			),
			array(
				'name' => '8a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8a_note',
				'type' => 'text'
			),
			array(
				'name' => '8b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah evaluasi terhadap tingkat pemahaman pekerja terhadap materi Inductiopn Training yang diberikan telah dilakukan?',
			),
			array(
				'name' => '8b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8b_note',
				'type' => 'text'
			),
			array(
				'name' => '8c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah Kontraktor telah menyediakan pekerja yang bersertifikasi untuk melaksanakan pekerjaan yang secara regulasi disyaratkan untuk bersertifikasi?',
			),
			array(
				'name' => '8c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8c_note',
				'type' => 'text'
			),
			array(
				'name' => '8d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah kontraktor memiliki program pelatihan HSE terhadap pekerjanya?',
			),
			array(
				'name' => '8d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8d_note',
				'type' => 'text'
			),
			array(
				'name' => '8e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Apakah materi dalam program pelatihan HSE tersebut meliputi namun tidak terbatas pada :<ul><li>Penjelasan Bahaya dan mitigasi pekerjaan yang akan dilaksanakan?</li><li>Pertolongan pertama dan pacu jantung (CPR)?</li><li>Cara memadamkan api?</li><li>Pengelolaan limbah / sampah hasil kerja?</li><li>Tanggap darurat?</li><li>Komitmen aspek HSE terhadap pekerjaan tersebut?</li><li>Kebersihan & kerapihan lokasi kerja?</li><li>MSDS material yang digunakan?</li><li>Petunjuk kerja aman terhadap pekerjaan critical yang dilaksanakan (contoh : working at height, confined space, welding, radiography, excavation, pekerjaan didalam air, electrical, dll ?</li><li>HSE Regulation?</li><li>Penggunaan PPE / APD?</li></ul>',
			),
			array(
				'name' => '8e_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8e_note',
				'type' => 'text'
			),
			array(
				'name' => '8f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Apakah Kontraktor memiliki system evaluasi terhadap tingkat pemahaman pekerja kontraktor terkait materi training HSE yang diberikan?',
			),
			array(
				'name' => '8f_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8f_note',
				'type' => 'text'
			),
			array(
				'name' => '8g_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'g. Apakah seluruh pekerja Kontraktor yang akan melaksanakan pekerjaan sudah dinyatakan sehat berdasarkan hasil Medical Check Up (untuk pekerjaan critical yang mensyaratkan kondisi fit) atau pemeriksaan kesehatan?',
			),
			array(
				'name' => '8g_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '8g_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '9. Komitmen Manajemen Kontraktor',
				'type' => 'label'
			),
			array(
				'name' => '9a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor telah menyusun HSE performance indicator (KPI HSE Kontraktor) terhadap pekerjaan tersebut?',
			),
			array(
				'name' => '9a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '9a_note',
				'type' => 'text'
			),
			array(
				'name' => '9b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah program dan kinerja HSE yang telah disusun tersebut menjadi bagian dalam pelaporan kinerja internal Kontraktor?',
			),
			array(
				'name' => '9b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '9b_note',
				'type' => 'text'
			),
			array(
				'name' => '9c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah kontraktor memiliki system untuk mengevaluasi pencapaian kinerja HSE Kontraktor serta melakukan upaya-upaya perbaikan?',
			),
			array(
				'name' => '9c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '9c_note',
				'type' => 'text'
			),
			array(
				'name' => '9d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah HSE objective & policy kontraktor terhadap pekerjaan tersebut telah tersedia dan dikomunikasikan kepada seluruh pekerja kontraktor terkait?',
			),
			array(
				'name' => '9d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '9d_note',
				'type' => 'text'
			),
			array(
				'name' => '9e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Apakah Kontraktor telah menyusun struktur organisasi project yang dilengkapi dengan personil yang menjabat beserta tugas dan tanggungjawabnya dalam penerapan aspek HSE?',
			),
			array(
				'name' => '9e_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '9e_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '10. Peralatan/Material',
				'type' => 'label'
			),
			array(
				'name' => '10a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah semua peralatan Kontraktor yang akan dipakai telah memenuhi criteria kelayakan fungsi?',
			),
			array(
				'name' => '10a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10a_note',
				'type' => 'text'
			),
			array(
				'name' => '10b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah kontraktor telah menyediakan peralatan bantu untuk handling material dan prosedurnya telah tersedia?',
			),
			array(
				'name' => '10b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10b_note',
				'type' => 'text'
			),
			array(
				'name' => '10c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah material / bahan yang digunakan telah memiliki MSDS (Material Safety Data Sheet) dan dikomunikasikan kepada pekerja terkait?',
			),
			array(
				'name' => '10c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10c_note',
				'type' => 'text'
			),
			array(
				'name' => '10d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah kontraktor telah memiliki prosedur pengoperasian peralatan terkait yang mengakomodir petunjuk kerja aman serta mengkomunikasikannya kepada pekerja?',
			),
			array(
				'name' => '10d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10d_note',
				'type' => 'text'
			),
			array(
				'name' => '10e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Apakah Kontraktor telah menyediakan peralatan untuk mengelola limbah / sampah hasil pekerjaan?',
			),
			array(
				'name' => '10e_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10e_note',
				'type' => 'text'
			),
			array(
				'name' => '10f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Apakah Kontraktor telah menyediakan APD / PPE yang dibutuhkan oleh pekerja dengan jumlah yang cukup?',
			),
			array(
				'name' => '10f_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '10f_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '11. Pelaporan HSE',
				'type' => 'label'
			),
			array(
				'name' => '11a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah Kontraktor memiliki prosedur pelaporan insiden, accident & investigasi?',
			),
			array(
				'name' => '11a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '11a_note',
				'type' => 'text'
			),
			array(
				'name' => '11b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah Kontraktor memiliki program pelaporan kinerja HSE kepada pihak Pengawas Pertamina?',
			),
			array(
				'name' => '11b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '11b_note',
				'type' => 'text'
			),
			array(
				'name' => '',
				'label' => '12. Personil HSE Kontraktor',
				'type' => 'label'
			),
			array(
				'name' => '12a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Apakah personil dalam organisasi project Kontraktor (pimpinan tertinggi project hingga pelaksana project) telah memahami tugas dan tanggungjawabnya dalam penerapan aspek HSE?',
			),
			array(
				'name' => '12a_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '12a_note',
				'type' => 'text'
			),
			array(
				'name' => '12b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Apakah personil pengawas HSE Kontraktor telah tersedia dengan jumlah yang cukup?',
			),
			array(
				'name' => '12b_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '12b_note',
				'type' => 'text'
			),
			array(
				'name' => '12c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Apakah posisi personil HSE dalam struktur organisasi project Kontraktor memiliki bargaining position yang kuat dalam penerapan aspek HSE?',
			),
			array(
				'name' => '12c_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '12c_note',
				'type' => 'text'
			),
			array(
				'name' => '12d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Apakah personil HSE telah memenuhi kompetensi minimum & memahami tanggung jawabnya?',
			),
			array(
				'name' => '12d_isya',
				'options' => array(
					array('value' => '1', 'text' => 'Ya'),
					array('value' => '0', 'text' => 'Tidak')
				)
			),
			array(
				'name' => '12d_note',
				'type' => 'text'
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

	function getProjectDetail($uuid)
	{
		return $this->db
			->select('project.nama nama_project', false)
			->select('user.vendor nama_vendor', false)
			->join('project', 'pja.project = project.uuid', 'left')
			->join('user', 'user.uuid = project.pemenang', 'left')
			->get_where($this->table, array('pja.uuid' => $uuid))
			->row_array();
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
		$result['title'] = "Checklist Pre Job Activty - {$project}";

		$val = $this->findOne($uuid);
		$acceptedAt = date("j F  Y", strtotime($val['acceptedAt']));
		$cellMap = array(
			'D6' => ": {$vendor}",
			'D7' => ": {$project}",
			'D8' => ": Fuel Terminal Boyolali",
			'D9' => ": {$acceptedAt}",

			'F14' => $val['1a_isya'] === '1' ? '✓' : '',
			'G14' => $val['1a_isya'] === '0' ? '✓' : '',
			'H14' => $val['1a_isneed'] === '1' ? '✓' : '',
			'I14' => $val['1a_note'],

			'F15' => $val['1b_isya'] === '1' ? '✓' : '',
			'G15' => $val['1b_isya'] === '0' ? '✓' : '',
			'H15' => $val['1b_isneed'] === '1' ? '✓' : '',
			'I15' => $val['1b_note']
		);

		$spreadsheet = IOFactory::load('./excels/Form 2 - Checklist Pre Job Activty.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}
}
