<?php defined('BASEPATH') or exit('No direct script access allowed');

class WIPs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'wip';
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
				'name' => 'progress',
				'label' => 'Progress',
				'width' => 2,
				'attributes' => array(
					array('data-number' => 'true')
				)
			),
			array(
				'name' => 'lock',
				'width' => 2,
				'label' => 'Lock',
			),
			array(
				'name' => '1a_isneed',
				'width' => 2,
				'label' => 'Seluruh pekerja telah menggunakan APD sesuai dengan persyaratan yang ditentukan',
			),
			array(
				'name' => '1a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1a_score_actual',
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
				'label' => 'Kondisi APD dalam keadaan baik dan dapat berfungsi',
			),
			array(
				'name' => '1b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1c_isneed',
				'width' => 2,
				'label' => 'Kontraktor menyediakan APD bagi seluruh pekerja',
			),
			array(
				'name' => '1c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1d_isneed',
				'width' => 2,
				'label' => 'Jumlah APD telah memenuhi kebutuhan proteksi pekerja',
			),
			array(
				'name' => '1d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1e_isneed',
				'width' => 2,
				'label' => 'Dilakukan pemeriksaan & evaluasi APD maksimum sebulan sekali',
			),
			array(
				'name' => '1e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2a_isneed',
				'width' => 2,
				'label' => 'Pemasangan LOTO telah dikomunikasikan kepada pihak terkait',
			),
			array(
				'name' => '2a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2a_score_actual',
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
				'label' => 'Tag Out telah dipasang secara jelas dan terpasang pada pemutus arus atau pada peralatan yang diperbaiki',
			),
			array(
				'name' => '2b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2b_score_actual',
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
				'label' => 'Memasang & melepaskan LOTO hanya dilakukan oleh pihak yang berwenang',
			),
			array(
				'name' => '2c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3a_isneed',
				'width' => 2,
				'label' => 'HSE sign tersedia di lokasi project',
			),
			array(
				'name' => '3a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3a_score_actual',
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
				'label' => 'HSE sign relevan dengan pekerjaan yang sedang dilaksanakan',
			),
			array(
				'name' => '3b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3b_score_actual',
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
				'label' => 'HSE sign mudah dilihat oleh pekerja di lokasi tersebut',
			),
			array(
				'name' => '3c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4a_isneed',
				'width' => 2,
				'label' => 'Pengalaman minimum 2 tahun dibidang HSE',
			),
			array(
				'name' => '4a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4a_score_actual',
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
				'label' => 'Memenuhi kompetensi yang butuhkan',
			),
			array(
				'name' => '4b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4b_score_actual',
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
				'label' => 'Memahami tugas dan tanggung jawabnya sebagai pengawas HSE',
			),
			array(
				'name' => '4c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5a_isneed',
				'width' => 2,
				'label' => 'Pengalaman minimum 2 tahun dalam project sejenis',
			),
			array(
				'name' => '5a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5a_score_actual',
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
				'label' => 'Memenuhi kompetensi yang butuhkan',
			),
			array(
				'name' => '5b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5b_score_actual',
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
				'label' => 'Memahami tugas dan tanggung jawabnya sebagai pengawas pekerjaan',
			),
			array(
				'name' => '5c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6a_isneed',
				'width' => 2,
				'label' => 'Prosedur keadaan darurat telah disosialisasikan ke seluruh pekerja proyek',
			),
			array(
				'name' => '6a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6a_score_actual',
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
				'label' => 'Telah dilakukan simulasi keadaan darurat untuk project tersebut',
			),
			array(
				'name' => '6b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6b_score_actual',
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
				'label' => 'Jalur evakuasi telah tersedia & jelas',
			),
			array(
				'name' => '6c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6c_score_actual',
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
				'label' => 'Alarm keadaan darurat telah tersedia & berfungsi dengan baik',
			),
			array(
				'name' => '6d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6d_score_actual',
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
				'label' => 'Tersedia APAR sesuai standard dengan jumlah yang cukup',
			),
			array(
				'name' => '7a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7a_score_actual',
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
				'label' => 'Tersedia hydrant sesuai standar dan cukup untuk memadamkan kebakaran',
			),
			array(
				'name' => '7b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7c_isneed',
				'width' => 2,
				'label' => 'Tersedia Fire detection dilokasi kerja',
			),
			array(
				'name' => '7c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7d_isneed',
				'width' => 2,
				'label' => 'Dilakukan pemeriksaan & pengetesan performance Fire Protection secara rutin',
			),
			array(
				'name' => '7d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7e_isneed',
				'width' => 2,
				'label' => 'Pekerja mampu menggunakan fire protection',
			),
			array(
				'name' => '7e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8a_isneed',
				'width' => 2,
				'label' => 'Tersedia kotak P3K & obat-obatan sesuai standar dan tidak kadaluarsa',
			),
			array(
				'name' => '8a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8a_score_actual',
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
				'label' => 'Tersedia ambulans bila terjadi kondisi darurat',
			),
			array(
				'name' => '8b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8b_score_actual',
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
				'label' => 'Terdapat personil terlatih sebagai petugas P3K',
			),
			array(
				'name' => '8c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8c_score_actual',
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
				'label' => 'Seluruh pekerja telah diasuransikan / jamsostek',
			),
			array(
				'name' => '8d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8d_score_actual',
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
				'label' => 'Memiliki daftar lokasi Puskesmas / RS terdekat',
			),
			array(
				'name' => '8e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8e_score_actual',
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
				'label' => 'Menyediakan fasilitas kesehatan / klinik',
			),
			array(
				'name' => '8f_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8f_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9a_isneed',
				'width' => 2,
				'label' => 'Tersedia tempat penampungan limbah B3 di setiap unit kerja',
			),
			array(
				'name' => '9a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9a_score_actual',
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
				'label' => 'Identifikasi tempat penampungan limbah B3 telah jelas',
			),
			array(
				'name' => '9b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9b_score_actual',
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
				'label' => 'Limbah B3 disimpan maksimum 90 hari',
			),
			array(
				'name' => '9c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9c_score_actual',
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
				'label' => 'Tempat penampungan limbah B3 dalam kondisi yang baik <br>(tidak pecah/berlubang) dan terhindar dari masuknya air',
			),
			array(
				'name' => '9d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9d_score_actual',
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
				'label' => 'Tersedia peralatan untuk penanggulangan & penanganan tumpahan limbah B3 di unit',
			),
			array(
				'name' => '9e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9f_isneed',
				'width' => 2,
				'label' => 'Prosedur penanggulangan dan penanganan tumpahan limbah B3 telah dipahami oleh pekerja',
			),
			array(
				'name' => '9f_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9f_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9g_isneed',
				'width' => 2,
				'label' => 'Memiliki program untuk meminimalisir limbah B3',
			),
			array(
				'name' => '9g_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9g_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9g_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9h_isneed',
				'width' => 2,
				'label' => 'Semua limbah yang dibuang telah diidentifikasi serta diregister',
			),
			array(
				'name' => '9h_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9h_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9h_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10a_isneed',
				'width' => 2,
				'label' => 'SIKA telah sesuai dengan jenis pekerjaan yang dilakukan',
			),
			array(
				'name' => '10a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10a_score_actual',
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
				'label' => 'SIKA masih berlaku',
			),
			array(
				'name' => '10b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10b_score_actual',
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
				'label' => 'Dilakukan pengetesan/pemeriksaan terlebih dahulu sebelum SIKA diterbitkan',
			),
			array(
				'name' => '10c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10c_score_actual',
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
				'label' => 'Bahaya dan rekomendasi SIKA telah dikomunikasikan ke pekerja yang terkait',
			),
			array(
				'name' => '10d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11a_isneed',
				'width' => 2,
				'label' => 'Bahan & peralatan disimpan ditempat yang teratur',
			),
			array(
				'name' => '11a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11a_score_actual',
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
				'label' => 'Memisahkan material yang berbahaya, beracun dan mudah terbakar',
			),
			array(
				'name' => '11b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11c_isneed',
				'width' => 2,
				'label' => 'Sarana & jalur mobilisasi serta evakuasi tidak terhalang',
			),
			array(
				'name' => '11c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11d_isneed',
				'width' => 2,
				'label' => 'Menjaga kebersihan lokasi kerja',
			),
			array(
				'name' => '11d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11e_isneed',
				'width' => 2,
				'label' => 'Tidak ada bahan berbahaya & beracun yang berserakan dilokasi jalur mobilisasi',
			),
			array(
				'name' => '11e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12a_isneed',
				'width' => 2,
				'label' => 'Sampah dari pekerjaan tersebut telah di kelompokkan berdasarkan pada jenisnya (B3, Anorganik, Organik dan limbah klinis)',
			),
			array(
				'name' => '12a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12a_score_actual',
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
				'label' => 'Identifikasi kategori dari limbah tersebut telah dilakukan sesuai dengan jenis limbah yang ada di tempat penampungan limbah tersebut',
			),
			array(
				'name' => '12b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12b_score_actual',
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
				'label' => 'Tempat penampungan limbah dalam kondisi yang baik (tidak bocor / retak / rusak)',
			),
			array(
				'name' => '12c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13a_isneed',
				'width' => 2,
				'label' => 'Material memiliki MSDS (Material Safety Data Sheet)',
			),
			array(
				'name' => '13a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13b_isneed',
				'width' => 2,
				'label' => 'Prosedur penanggulangan paparan telah dipahami pekerja',
			),
			array(
				'name' => '13b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13c_isneed',
				'width' => 2,
				'label' => 'MSDS material yang digunakan telah dipahami pekerja',
			),
			array(
				'name' => '13c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14a_isneed',
				'width' => 2,
				'label' => 'Tidak merokok dilokasi yang tidak diperbolehkan',
			),
			array(
				'name' => '14a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '14a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15a_isneed',
				'width' => 2,
				'label' => 'Tidak membawa / mengkonsumsi minuman / obat-obatan terlarang & senjata yang dilarang dilokasi kerja',
			),
			array(
				'name' => '15a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '15a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16a_isneed',
				'width' => 2,
				'label' => 'Menyediakan penerangan yang cukup',
			),
			array(
				'name' => '16a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16b_isneed',
				'width' => 2,
				'label' => 'Seragam pekerja memiliki Fluoresence (berpendar)',
			),
			array(
				'name' => '16b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16c_isneed',
				'width' => 2,
				'label' => 'Dilakukan pengawasan yang lebih ketat untuk pekerjaan critical dimalam hari',
			),
			array(
				'name' => '16c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16d_isneed',
				'width' => 2,
				'label' => 'Tidak ada pekerja yang rabun senja',
			),
			array(
				'name' => '16d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17a_isneed',
				'width' => 2,
				'label' => 'Tangan dan kaki tidak dalam kondisi basah',
			),
			array(
				'name' => '17a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17b_isneed',
				'width' => 2,
				'label' => 'Pekerja menggunakan alas kaki yang bersifat isolator',
			),
			array(
				'name' => '17b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17c_isneed',
				'width' => 2,
				'label' => 'Terdapat tanda bahaya (high voltage) untuk pekerjaan tegangan tinggi',
			),
			array(
				'name' => '17c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17d_isneed',
				'width' => 2,
				'label' => 'Tidak ada kabel yang terkelupas',
			),
			array(
				'name' => '17d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17e_isneed',
				'width' => 2,
				'label' => 'Kabel listrik dalam kondisi yang bagus dan layak',
			),
			array(
				'name' => '17e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17f_isneed',
				'width' => 2,
				'label' => 'Grounding terpasang dengan baik',
			),
			array(
				'name' => '17f_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17f_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18a_isneed',
				'width' => 2,
				'label' => 'Setiap peralatan yang digunakan memiliki SOP',
			),
			array(
				'name' => '18a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18b_isneed',
				'width' => 2,
				'label' => 'SOP telah disosialisasikan ke pekerja',
			),
			array(
				'name' => '18b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18c_isneed',
				'width' => 2,
				'label' => 'SOP tersedia dan mudah ditemukan dilokasi kerja',
			),
			array(
				'name' => '18c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19a_isneed',
				'width' => 2,
				'label' => 'Perkakas tangan hanya boleh digunakan oleh orang yang sudah memiliki kompetensi',
			),
			array(
				'name' => '19a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19b_isneed',
				'width' => 2,
				'label' => 'Dilakukan pemeriksaan sebelum digunakan',
			),
			array(
				'name' => '19b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19c_isneed',
				'width' => 2,
				'label' => 'Operator menggunakan APD yang disyaratkan',
			),
			array(
				'name' => '19c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19d_isneed',
				'width' => 2,
				'label' => 'Posisi pengoperasian aman dan nyaman',
			),
			array(
				'name' => '19d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19e_isneed',
				'width' => 2,
				'label' => 'Safety device terpasang pada peralatan perkakas dan berfungsi',
			),
			array(
				'name' => '19e_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19e_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20a_isneed',
				'width' => 2,
				'label' => 'Mengkomunikasikan daerah yang akan dilakukan radiography test',
			),
			array(
				'name' => '20a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20b_isneed',
				'width' => 2,
				'label' => 'Tidak ada orang di area radiasi X-ray',
			),
			array(
				'name' => '20b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20c_isneed',
				'width' => 2,
				'label' => 'Diberikan rambu pembatas area radiasi X-ray',
			),
			array(
				'name' => '20c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21a_isneed',
				'width' => 2,
				'label' => 'Lokasi pekerjaan memiliki ventilasi yang cukup untuk sirkulasi udara',
			),
			array(
				'name' => '21a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21b_isneed',
				'width' => 2,
				'label' => 'Tidak meletakan bahan berbahaya dan beracun dilokasi ventilasi udara',
			),
			array(
				'name' => '21b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22a_isneed',
				'width' => 2,
				'label' => 'Tabung bertekanan telah di inspeksi secara rutin',
			),
			array(
				'name' => '22a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22b_isneed',
				'width' => 2,
				'label' => 'Tidak ada kebocoran gas bertekanan',
			),
			array(
				'name' => '22b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a1_isneed',
				'width' => 2,
				'label' => 'Welder harus sudah memiliki sertifikasi pengelasan sesuai dengan persyaratan',
			),
			array(
				'name' => '23a1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a2_isneed',
				'width' => 2,
				'label' => 'penempatan peralatan harus dalam kondisi stabil',
			),
			array(
				'name' => '23a2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a3_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan gas test pada pengelasan',
			),
			array(
				'name' => '23a3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a4_isneed',
				'width' => 2,
				'label' => 'Terdapat APAR di dekat lokasi welding',
			),
			array(
				'name' => '23a4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a5_isneed',
				'width' => 2,
				'label' => 'Grounding telah dipasang selama pengelasan',
			),
			array(
				'name' => '23a5_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a5_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b1_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan gas test sebelum pemotongan dengan burner',
			),
			array(
				'name' => '23b1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b2_isneed',
				'width' => 2,
				'label' => 'Terdapat APAR di dekat lokasi pemotongan dengan burner',
			),
			array(
				'name' => '23b2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b3_isneed',
				'width' => 2,
				'label' => 'apakah',
			),
			array(
				'name' => '23b3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24a_isneed',
				'width' => 2,
				'label' => 'Pekerja menggunakan Breathing Aparatus',
			),
			array(
				'name' => '24a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24b_isneed',
				'width' => 2,
				'label' => 'dilakukan pemeriksaan gas beracun secara berkala',
			),
			array(
				'name' => '24b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24c_isneed',
				'width' => 2,
				'label' => 'Pekerja memiliki competency bekerja di confined space',
			),
			array(
				'name' => '24c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a1_isneed',
				'width' => 2,
				'label' => 'Tangga terbuat dari material yang kuat dan tahan terhadap cuaca',
			),
			array(
				'name' => '25a1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a2_isneed',
				'width' => 2,
				'label' => 'Kondisi tangga masih baik dan layak difungsikan',
			),
			array(
				'name' => '25a2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a3_isneed',
				'width' => 2,
				'label' => 'Tangga diletakkan didasar yang stabil, kuat dan tidak slip',
			),
			array(
				'name' => '25a3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a4_isneed',
				'width' => 2,
				'label' => 'Kemiringan tangga sesuai dengan ketentuan keselamatan',
			),
			array(
				'name' => '25a4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a5_isneed',
				'width' => 2,
				'label' => 'Tangga diletakkan ditempat yang aman',
			),
			array(
				'name' => '25a5_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a5_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a6_isneed',
				'width' => 2,
				'label' => 'Tangga memiliki railing untuk pegangan',
			),
			array(
				'name' => '25a6_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a6_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a7_isneed',
				'width' => 2,
				'label' => 'Pekerja menggunakan tangga secara aman',
			),
			array(
				'name' => '25a7_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a7_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b1_isneed',
				'width' => 2,
				'label' => 'Perancah terbuat dari bahan yang kuat serta tahan terhadap cuaca',
			),
			array(
				'name' => '25b1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b2_isneed',
				'width' => 2,
				'label' => 'Perancah memiliki bracing untuk menahan gaya kesamping / goyangan',
			),
			array(
				'name' => '25b2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b3_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan pemeriksaan sebelum & pada saat perancah digunakan',
			),
			array(
				'name' => '25b3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b4_isneed',
				'width' => 2,
				'label' => 'Tangga naik ke perancah sudah disediakan',
			),
			array(
				'name' => '25b4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b5_isneed',
				'width' => 2,
				'label' => 'Perancah diletakkan didasar yang kuat dan stabil',
			),
			array(
				'name' => '25b5_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b5_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b6_isneed',
				'width' => 2,
				'label' => 'Pekerja sudah mengantisipasi kemungkinan jatuhnya benda dari pekerjaan ketinggian',
			),
			array(
				'name' => '25b6_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b6_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b7_isneed',
				'width' => 2,
				'label' => 'Pekerja yang bekerja diketinggian harus sudah terlatih dan dalam kondisi sehat',
			),
			array(
				'name' => '25b7_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b7_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b8_isneed',
				'width' => 2,
				'label' => 'Scaffolding memiliki railing dan papan pijakan untuk pekerja',
			),
			array(
				'name' => '25b8_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b8_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b9_isneed',
				'width' => 2,
				'label' => 'Terdapat instalasi penangkal petir sementara untuk pekerjaan di ketinggian (yang belum tercover oleh sistem penangkal petir yang ada)',
			),
			array(
				'name' => '25b9_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b9_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26a_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan pemeriksaan sebelum digunakan',
			),
			array(
				'name' => '26a_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26a_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26b_isneed',
				'width' => 2,
				'label' => 'Pengemudi telah memiliki kompetensi & ijin mengemudi',
			),
			array(
				'name' => '26b_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26b_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26c_isneed',
				'width' => 2,
				'label' => 'Pengemudi mematuhi rambu-rambu yang ada',
			),
			array(
				'name' => '26c_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26c_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26d_isneed',
				'width' => 2,
				'label' => 'safety device tersedia pada pesawat / alat angkut & berfungsi',
			),
			array(
				'name' => '26d_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26d_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a1_isneed',
				'width' => 2,
				'label' => 'Operator yang mengoperasikan crane harus memenuhi kompetensi yang ditentukan / memiliki surat ijin operasi',
			),
			array(
				'name' => '27a1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a2_isneed',
				'width' => 2,
				'label' => 'Tabel kapasitas beban, informasi bahaya khusus telah terpasang di crane',
			),
			array(
				'name' => '27a2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a3_isneed',
				'width' => 2,
				'label' => 'Operator dibantu oleh minimal satu orang pemandu / helper saat mengoperasikan',
			),
			array(
				'name' => '27a3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a4_isneed',
				'width' => 2,
				'label' => 'Daerah yang berada di pada radius putaran crane / dilintasan alat angkat harus diberi rambu dilarang melintas',
			),
			array(
				'name' => '27a4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a5_isneed',
				'width' => 2,
				'label' => 'Kait (hook) memiliki kancing pengaman (safety latches)',
			),
			array(
				'name' => '27a5_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a5_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a6_isneed',
				'width' => 2,
				'label' => 'Beban yang diangkat sesuai dengan kapasitas kekuatan sling',
			),
			array(
				'name' => '27a6_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a6_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a7_isneed',
				'width' => 2,
				'label' => 'Melakukan pemeriksaan crane, sling secara periodik',
			),
			array(
				'name' => '27a7_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a7_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a8_isneed',
				'width' => 2,
				'label' => 'Mobil crane berada diatas landasan yang stabil dan dilengkapi tangkai penahan (Boowe Stop)',
			),
			array(
				'name' => '27a8_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a8_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a9_isneed',
				'width' => 2,
				'label' => 'Crane telah disertifikasi & masa sertifikasi masih berlaku',
			),
			array(
				'name' => '27a9_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a9_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b1_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan pengetesan semua fungsi listrik sebelum digunakan',
			),
			array(
				'name' => '27b1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b2_isneed',
				'width' => 2,
				'label' => 'Lokasi erection aman dari kejatuhan benda-benda',
			),
			array(
				'name' => '27b2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b3_isneed',
				'width' => 2,
				'label' => 'Pintu masuk / keluar harus dalam keadaan terkunci pada saat lift digunakan',
			),
			array(
				'name' => '27b3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b4_isneed',
				'width' => 2,
				'label' => 'Beban penumpang tidak melebihi batas yang diijinkan',
			),
			array(
				'name' => '27b4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c1_isneed',
				'width' => 2,
				'label' => 'Telah dilakukan pemeriksaan sebelum excavator digunakan',
			),
			array(
				'name' => '27c1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c2_isneed',
				'width' => 2,
				'label' => 'Posisi excavator stabil dan aman dari potensi longsoran',
			),
			array(
				'name' => '27c2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c3_isneed',
				'width' => 2,
				'label' => 'Tidak ada orang didalam area jangkauan excavator',
			),
			array(
				'name' => '27c3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a1_isneed',
				'width' => 2,
				'label' => 'Memastikan tidak ada pipa / kabel-kabel /gas di lokasi yang akan digali',
			),
			array(
				'name' => '28a1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a2_isneed',
				'width' => 2,
				'label' => 'Terdapat rambu yang menunjukan ada pekerjaan penggalian / lubang',
			),
			array(
				'name' => '28a2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a3_isneed',
				'width' => 2,
				'label' => 'Mengantisipasi dampak kerusakan struktur galian',
			),
			array(
				'name' => '28a3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1_isneed',
				'width' => 2,
				'label' => 'Penerapan Mitigasi JHSEA',
			),
			array(
				'name' => '1_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2_isneed',
				'width' => 2,
				'label' => 'HSE Meeting (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '2_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3_isneed',
				'width' => 2,
				'label' => 'HSE Talk / briefing (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '3_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4_isneed',
				'width' => 2,
				'label' => 'HSE Training / Induction (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '4_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5_isneed',
				'width' => 2,
				'label' => 'Pelaporan Penerapan HSE ke Pertamina (sesuai schedule HSE Plant)',
			),
			array(
				'name' => '5_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6_isneed',
				'width' => 2,
				'label' => 'Inspeksi HSE secara rutin oleh level pelaksana (mulai dari Pre mobilization hingga mobilization) sesuai schedule HSE Plan)',
			),
			array(
				'name' => '6_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7_isneed',
				'width' => 2,
				'label' => 'Inspeksi HSE oleh Managemen kontraktor (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '7_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8_isneed',
				'width' => 2,
				'label' => 'Incident / accident reporting',
			),
			array(
				'name' => '8_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9_isneed',
				'width' => 2,
				'label' => 'Investigation report',
			),
			array(
				'name' => '9_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10_isneed',
				'width' => 2,
				'label' => 'Pekerja paham terhadap HSE Policy & Objective pekerjaan tersebut',
			),
			array(
				'name' => '10_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11_isneed',
				'width' => 2,
				'label' => 'Pemeriksaan kesehatan',
			),
			array(
				'name' => '11_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12_isneed',
				'width' => 2,
				'label' => 'Tindak lanjut temuan',
			),
			array(
				'name' => '12_score_max',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12_score_actual',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12_note',
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
			->select('wip.proyek');
		return parent::dt();
	}
}
