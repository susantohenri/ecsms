<?php defined('BASEPATH') or exit('No direct script access allowed');

class WIPs extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'wip';
		$this->thead = array(
			(object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
			(object) array('mData' => 'project', 'sTitle' => 'Project'),

		);
		$this->form = array(
			array(
				'name' => '',
				'label' => 'CHECK LIST INSPEKSI HSE WORK PRACTICE',
				'type' => 'form-separator'
			),
			array(
				'name' => '',
				'label' => '1. Kepatuhan penggunaan APD',
				'type' => 'label'
			),
			array(
				'name' => '1a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Seluruh pekerja telah menggunakan APD sesuai dengan persyaratan yang ditentukan',
			),
			array(
				'name' => '1a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Kondisi APD dalam keadaan baik dan dapat berfungsi',
			),
			array(
				'name' => '1b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Kontraktor menyediakan APD bagi seluruh pekerja',
			),
			array(
				'name' => '1c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Jumlah APD telah memenuhi kebutuhan proteksi pekerja',
			),
			array(
				'name' => '1d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '1e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Dilakukan pemeriksaan & evaluasi APD maksimum sebulan sekali',
			),
			array(
				'name' => '1e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '2. Penerapan LOTO untuk pekerjaan yang beresiko tersengat listrik',
				'type' => 'label'
			),
			array(
				'name' => '2a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Pemasangan LOTO telah dikomunikasikan kepada pihak terkait',
			),
			array(
				'name' => '2a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '2a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '2a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tag Out telah dipasang secara jelas dan terpasang pada pemutus arus atau pada peralatan yang diperbaiki',
			),
			array(
				'name' => '2b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '2b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '2b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Memasang & melepaskan LOTO hanya dilakukan oleh pihak yang berwenang',
			),
			array(
				'name' => '2c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '2c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '2c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '3. Penerapan HSE Sign',
				'type' => 'label'
			),
			array(
				'name' => '3a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. HSE sign tersedia di lokasi project',
			),
			array(
				'name' => '3a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '3a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '3a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. HSE sign relevan dengan pekerjaan yang sedang dilaksanakan',
			),
			array(
				'name' => '3b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '3b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '3b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. HSE sign mudah dilihat oleh pekerja di lokasi tersebut',
			),
			array(
				'name' => '3c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '3c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '3c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '4. Pengawas HSE Kontraktor untuk project tersebut',
				'type' => 'label'
			),
			array(
				'name' => '4a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Pengalaman minimum 2 tahun dibidang HSE',
			),
			array(
				'name' => '4a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '4a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '4a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Memenuhi kompetensi yang butuhkan',
			),
			array(
				'name' => '4b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '4b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '4b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Memahami tugas dan tanggung jawabnya sebagai pengawas HSE',
			),
			array(
				'name' => '4c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '4c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '4c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '5. Terdapat pengawas pekerjaan dari kontraktor',
				'type' => 'label'
			),
			array(
				'name' => '5a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Pengalaman minimum 2 tahun dalam project sejenis',
			),
			array(
				'name' => '5a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '5a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '5a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Memenuhi kompetensi yang butuhkan',
			),
			array(
				'name' => '5b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '5b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '5b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Memahami tugas dan tanggung jawabnya sebagai pengawas pekerjaan',
			),
			array(
				'name' => '5c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '5c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '5c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '6. Prosedur keadaan darurat di lokasi pekerjaan',
				'type' => 'label'
			),
			array(
				'name' => '6a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Prosedur keadaan darurat telah disosialisasikan ke seluruh pekerja project',
			),
			array(
				'name' => '6a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '6a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '6a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Telah dilakukan simulasi keadaan darurat untuk project tersebut',
			),
			array(
				'name' => '6b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '6b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '6b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Jalur evakuasi telah tersedia & jelas',
			),
			array(
				'name' => '6c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '6c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '6c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Alarm keadaan darurat telah tersedia & berfungsi dengan baik',
			),
			array(
				'name' => '6d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '6d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '6d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '7. Fire Protection & Detection System',
				'type' => 'label'
			),
			array(
				'name' => '7a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tersedia APAR sesuai standard dengan jumlah yang cukup',
			),
			array(
				'name' => '7a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tersedia hydrant sesuai standar dan cukup untuk memadamkan kebakaran',
			),
			array(
				'name' => '7b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Tersedia Fire detection dilokasi kerja',
			),
			array(
				'name' => '7c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Dilakukan pemeriksaan & pengetesan performance Fire Protection secara rutin',
			),
			array(
				'name' => '7d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Pekerja mampu menggunakan fire protection',
			),
			array(
				'name' => '7e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '8. Penanganan kecelakaan, sakit & meninggal',
				'type' => 'label'
			),
			array(
				'name' => '8a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tersedia kotak P3K & obat-obatan sesuai standar dan tidak kadaluarsa',
			),
			array(
				'name' => '8a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tersedia ambulans bila terjadi kondisi darurat',
			),
			array(
				'name' => '8b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Terdapat personil terlatih sebagai petugas P3K',
			),
			array(
				'name' => '8c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Seluruh pekerja telah diasuransikan / jamsostek',
			),
			array(
				'name' => '8d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Memiliki daftar lokasi Puskesmas / RS terdekat',
			),
			array(
				'name' => '8e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Menyediakan fasilitas kesehatan / klinik',
			),
			array(
				'name' => '8f_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8f_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '9. Pengelolaan & Penanganan limbah B3',
				'type' => 'label'
			),
			array(
				'name' => '9a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tersedia tempat penampungan limbah B3 di setiap unit kerja',
			),
			array(
				'name' => '9a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Identifikasi tempat penampungan limbah B3 telah jelas',
			),
			array(
				'name' => '9b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Limbah B3 disimpan maksimum 90 hari',
			),
			array(
				'name' => '9c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Tempat penampungan limbah B3 dalam kondisi yang baik <br>(tidak pecah/berlubang) dan terhindar dari masuknya air',
			),
			array(
				'name' => '9d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Tersedia peralatan untuk penanggulangan & penanganan tumpahan limbah B3 di unit',
			),
			array(
				'name' => '9e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Prosedur penanggulangan dan penanganan tumpahan limbah B3 telah dipahami oleh pekerja',
			),
			array(
				'name' => '9f_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9f_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9g_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'g. Memiliki program untuk meminimalisir limbah B3',
			),
			array(
				'name' => '9g_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9g_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9g_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9h_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'h. Semua limbah yang dibuang telah diidentifikasi serta diregister',
			),
			array(
				'name' => '9h_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9h_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9h_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '10. SIKA untuk pekerjaan critical',
				'type' => 'label'
			),
			array(
				'name' => '10a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. SIKA telah sesuai dengan jenis pekerjaan yang dilakukan',
			),
			array(
				'name' => '10a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '10a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '10a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. SIKA masih berlaku',
			),
			array(
				'name' => '10b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '10b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '10b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Dilakukan pengetesan/pemeriksaan terlebih dahulu sebelum SIKA diterbitkan',
			),
			array(
				'name' => '10c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '10c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '10c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Bahaya dan rekomendasi SIKA telah dikomunikasikan ke pekerja yang terkait',
			),
			array(
				'name' => '10d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '10d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '10d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '11. Kebersihan & kerapihan lokasi kerja',
				'type' => 'label'
			),
			array(
				'name' => '11a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Bahan & peralatan disimpan ditempat yang teratur',
			),
			array(
				'name' => '11a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Memisahkan material yang berbahaya, beracun dan mudah terbakar',
			),
			array(
				'name' => '11b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Sarana & jalur mobilisasi serta evakuasi tidak terhalang',
			),
			array(
				'name' => '11c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Menjaga kebersihan lokasi kerja',
			),
			array(
				'name' => '11d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Tidak ada bahan berbahaya & beracun yang berserakan dilokasi jalur mobilisasi',
			),
			array(
				'name' => '11e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '12. Pengelolaan sampah/material bekas',
				'type' => 'label'
			),
			array(
				'name' => '12a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Sampah dari pekerjaan tersebut telah di kelompokkan berdasarkan pada jenisnya (B3, Anorganik, Organik dan limbah klinis)',
			),
			array(
				'name' => '12a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '12a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '12a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Identifikasi kategori dari limbah tersebut telah dilakukan sesuai dengan jenis limbah yang ada di tempat penampungan limbah tersebut',
			),
			array(
				'name' => '12b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '12b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '12b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Tempat penampungan limbah dalam kondisi yang baik (tidak bocor / retak / rusak)',
			),
			array(
				'name' => '12c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '12c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '12c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '13. Keselamatan terhadap paparan material',
				'type' => 'label'
			),
			array(
				'name' => '13a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Material memiliki MSDS (Material Safety Data Sheet)',
			),
			array(
				'name' => '13a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '13a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '13a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Prosedur penanggulangan paparan telah dipahami pekerja',
			),
			array(
				'name' => '13b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '13b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '13b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '13c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. MSDS material yang digunakan telah dipahami pekerja',
			),
			array(
				'name' => '13c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '13c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '13c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '14. ',
				'type' => 'label'
			),
			array(
				'name' => '14a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tidak merokok dilokasi yang tidak diperbolehkan',
			),
			array(
				'name' => '14a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '14a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '14a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '15. ',
				'type' => 'label'
			),
			array(
				'name' => '15a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tidak membawa / mengkonsumsi minuman / obat-obatan terlarang & senjata yang dilarang dilokasi kerja',
			),
			array(
				'name' => '15a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '15a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '15a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '16. Keselamatan bekerja dalam kondisi gelap',
				'type' => 'label'
			),
			array(
				'name' => '16a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Menyediakan penerangan yang cukup',
			),
			array(
				'name' => '16a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '16a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '16a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Seragam pekerja memiliki Fluoresence (berpendar)',
			),
			array(
				'name' => '16b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '16b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '16b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Dilakukan pengawasan yang lebih ketat untuk pekerjaan critical dimalam hari',
			),
			array(
				'name' => '16c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '16c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '16c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '16d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Tidak ada pekerja yang rabun senja',
			),
			array(
				'name' => '16d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '16d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '16d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '17. Keselamatan listrik',
				'type' => 'label'
			),
			array(
				'name' => '17a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tangan dan kaki tidak dalam kondisi basah',
			),
			array(
				'name' => '17a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Pekerja menggunakan alas kaki yang bersifat isolator',
			),
			array(
				'name' => '17b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Terdapat tanda bahaya (high voltage) untuk pekerjaan tegangan tinggi',
			),
			array(
				'name' => '17c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Tidak ada kabel yang terkelupas',
			),
			array(
				'name' => '17d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Kabel listrik dalam kondisi yang bagus dan layak',
			),
			array(
				'name' => '17e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '17f_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Grounding terpasang dengan baik',
			),
			array(
				'name' => '17f_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '17f_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '17f_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '18. Penerapan SOP terhadap peralatan operasi',
				'type' => 'label'
			),
			array(
				'name' => '18a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Setiap peralatan yang digunakan memiliki SOP',
			),
			array(
				'name' => '18a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '18a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '18a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. SOP telah disosialisasikan ke pekerja',
			),
			array(
				'name' => '18b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '18b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '18b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '18c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. SOP tersedia dan mudah ditemukan dilokasi kerja',
			),
			array(
				'name' => '18c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2'),
					array('value' => '3', 'text' => '3')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '18c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '18c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '19. Keselamatan perkakas tangan (hand tools : grinding, cutting, sawing, bor, dll)',
				'type' => 'label'
			),
			array(
				'name' => '19a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Perkakas tangan hanya boleh digunakan oleh orang yang sudah memiliki kompetensi',
			),
			array(
				'name' => '19a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '19a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '19a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Dilakukan pemeriksaan sebelum digunakan',
			),
			array(
				'name' => '19b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '19b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '19b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Operator menggunakan APD yang disyaratkan',
			),
			array(
				'name' => '19c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '19c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '19c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Posisi pengoperasian aman dan nyaman',
			),
			array(
				'name' => '19d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '19d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '19d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '19e_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Safety device terpasang pada peralatan perkakas dan berfungsi',
			),
			array(
				'name' => '19e_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '19e_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '19e_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '20. Keselamatan Radiasi',
				'type' => 'label'
			),
			array(
				'name' => '20a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Mengkomunikasikan daerah yang akan dilakukan radiography test',
			),
			array(
				'name' => '20a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '20a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '20a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tidak ada orang di area radiasi X-ray',
			),
			array(
				'name' => '20b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '20b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '20b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '20c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Diberikan rambu pembatas area radiasi X-ray',
			),
			array(
				'name' => '20c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '20c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '20c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '21. Ventilasi udara',
				'type' => 'label'
			),
			array(
				'name' => '21a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Lokasi pekerjaan memiliki ventilasi yang cukup untuk sirkulasi udara',
			),
			array(
				'name' => '21a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '21a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '21a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '21b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tidak meletakan bahan berbahaya dan beracun dilokasi ventilasi udara',
			),
			array(
				'name' => '21b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '21b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '21b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '22. Keselamatan gas bertekanan',
				'type' => 'label'
			),
			array(
				'name' => '22a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tabung bertekanan telah di inspeksi secara rutin',
			),
			array(
				'name' => '22a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '22a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '22a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '22b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tidak ada kebocoran gas bertekanan',
			),
			array(
				'name' => '22b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '22b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '22b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '23. Keselamatan pada pekerjaan panas (Pengelasan, Heater, burner, cutter, dll)',
				'type' => 'label'
			),
			array(
				'name' => '',
				'label' => 'a. Pengelasan',
				'type' => 'label'
			),
			array(
				'name' => '23a1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Welder harus sudah memiliki sertifikasi pengelasan sesuai dengan persyaratan',
			),
			array(
				'name' => '23a1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23a1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. penempatan peralatan harus dalam kondisi stabil',
			),
			array(
				'name' => '23a2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23a2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Telah dilakukan gas test pada pengelasan',
			),
			array(
				'name' => '23a3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23a3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Terdapat APAR di dekat lokasi welding',
			),
			array(
				'name' => '23a4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23a4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23a5_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Grounding telah dipasang selama pengelasan',
			),
			array(
				'name' => '23a5_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23a5_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => 'b. burner / cutter',
				'type' => 'label'
			),
			array(
				'name' => '23b1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Telah dilakukan gas test sebelum pemotongan dengan burner',
			),
			array(
				'name' => '23b1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23b1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Terdapat APAR di dekat lokasi pemotongan dengan burner',
			),
			array(
				'name' => '23b2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23b2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '23b3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. apakah',
			),
			array(
				'name' => '23b3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '23b3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '23b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '24. Keselamatan di ruang terbatas',
				'type' => 'label'
			),
			array(
				'name' => '24a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Pekerja menggunakan Breathing Aparatus',
			),
			array(
				'name' => '24a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '24a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '24a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. dilakukan pemeriksaan gas beracun secara berkala',
			),
			array(
				'name' => '24b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '24b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '24b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '24c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Pekerja memiliki competency bekerja di confined space',
			),
			array(
				'name' => '24c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '24c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '24c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '25. Keselamatan bekerja diketinggian (> 2m)',
				'type' => 'label'
			),
			array(
				'name' => '',
				'label' => 'a. Tangga',
				'type' => 'label'
			),
			array(
				'name' => '25a1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Tangga terbuat dari material yang kuat dan tahan terhadap cuaca',
			),
			array(
				'name' => '25a1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Kondisi tangga masih baik dan layak difungsikan',
			),
			array(
				'name' => '25a2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Tangga diletakkan didasar yang stabil, kuat dan tidak slip',
			),
			array(
				'name' => '25a3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Kemiringan tangga sesuai dengan ketentuan keselamatan',
			),
			array(
				'name' => '25a4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a5_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Tangga diletakkan ditempat yang aman',
			),
			array(
				'name' => '25a5_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a5_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a6_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Tangga memiliki railing untuk pegangan',
			),
			array(
				'name' => '25a6_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a6_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25a7_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'g. Pekerja menggunakan tangga secara aman',
			),
			array(
				'name' => '25a7_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25a7_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25a7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => 'b. Scaffolding',
				'type' => 'label'
			),
			array(
				'name' => '25b1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Perancah terbuat dari bahan yang kuat serta tahan terhadap cuaca',
			),
			array(
				'name' => '25b1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Perancah memiliki bracing untuk menahan gaya kesamping / goyangan',
			),
			array(
				'name' => '25b2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Telah dilakukan pemeriksaan sebelum & pada saat perancah digunakan',
			),
			array(
				'name' => '25b3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Tangga naik ke perancah sudah disediakan',
			),
			array(
				'name' => '25b4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b5_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Perancah diletakkan didasar yang kuat dan stabil',
			),
			array(
				'name' => '25b5_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b5_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b6_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Pekerja sudah mengantisipasi kemungkinan jatuhnya benda dari pekerjaan ketinggian',
			),
			array(
				'name' => '25b6_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b6_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b7_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'g. Pekerja yang bekerja diketinggian harus sudah terlatih dan dalam kondisi sehat',
			),
			array(
				'name' => '25b7_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b7_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b8_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'h. Scaffolding memiliki railing dan papan pijakan untuk pekerja',
			),
			array(
				'name' => '25b8_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b8_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '25b9_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'i. Terdapat instalasi penangkal petir sementara untuk pekerjaan di ketinggian (yang belum tercover oleh sistem penangkal petir yang ada)',
			),
			array(
				'name' => '25b9_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '25b9_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '25b9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '26. Penggunaan alat / pesawat angkut secara aman',
				'type' => 'label'
			),
			array(
				'name' => '26a_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Telah dilakukan pemeriksaan sebelum digunakan',
			),
			array(
				'name' => '26a_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '26a_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '26a_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26b_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Pengemudi telah memiliki kompetensi & ijin mengemudi',
			),
			array(
				'name' => '26b_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '26b_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '26b_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26c_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Pengemudi mematuhi rambu-rambu yang ada',
			),
			array(
				'name' => '26c_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '26c_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '26c_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '26d_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. safety device tersedia pada pesawat / alat angkut & berfungsi',
			),
			array(
				'name' => '26d_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '26d_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '26d_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '27. Penggunaan alat / pesawat angkat secara aman',
				'type' => 'label'
			),
			array(
				'name' => '',
				'label' => 'a. Crane',
				'type' => 'label'
			),
			array(
				'name' => '27a1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Operator yang mengoperasikan crane harus memenuhi kompetensi yang ditentukan / memiliki surat ijin operasi',
			),
			array(
				'name' => '27a1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Tabel kapasitas beban, informasi bahaya khusus telah terpasang di crane',
			),
			array(
				'name' => '27a2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Operator dibantu oleh minimal satu orang pemandu / helper saat mengoperasikan',
			),
			array(
				'name' => '27a3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Daerah yang berada di pada radius putaran crane / dilintasan alat angkat harus diberi rambu dilarang melintas',
			),
			array(
				'name' => '27a4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a5_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'e. Kait (hook) memiliki kancing pengaman (safety latches)',
			),
			array(
				'name' => '27a5_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a5_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a6_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'f. Beban yang diangkat sesuai dengan kapasitas kekuatan sling',
			),
			array(
				'name' => '27a6_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a6_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a7_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'g. Melakukan pemeriksaan crane, sling secara periodik',
			),
			array(
				'name' => '27a7_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a7_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a8_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'h. Mobil crane berada diatas landasan yang stabil dan dilengkapi tangkai penahan (Boowe Stop)',
			),
			array(
				'name' => '27a8_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a8_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27a9_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'i. Crane telah disertifikasi & masa sertifikasi masih berlaku',
			),
			array(
				'name' => '27a9_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27a9_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27a9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => 'b. Passenger Lift',
				'type' => 'label'
			),
			array(
				'name' => '27b1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Telah dilakukan pengetesan semua fungsi listrik sebelum digunakan',
			),
			array(
				'name' => '27b1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27b1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27b1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Lokasi erection aman dari kejatuhan benda-benda',
			),
			array(
				'name' => '27b2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27b2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27b2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Pintu masuk / keluar harus dalam keadaan terkunci pada saat lift digunakan',
			),
			array(
				'name' => '27b3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27b3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27b3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27b4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'd. Beban penumpang tidak melebihi batas yang diijinkan',
			),
			array(
				'name' => '27b4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27b4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27b4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => 'c. Excavator',
				'type' => 'label'
			),
			array(
				'name' => '27c1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Telah dilakukan pemeriksaan sebelum excavator digunakan',
			),
			array(
				'name' => '27c1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27c1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27c1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Posisi excavator stabil dan aman dari potensi longsoran',
			),
			array(
				'name' => '27c2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27c2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27c2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '27c3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Tidak ada orang didalam area jangkauan excavator',
			),
			array(
				'name' => '27c3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '27c3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '27c3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => '28. Keselamatan pekerjaan penggalian',
				'type' => 'label'
			),
			array(
				'name' => '28a1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'a. Memastikan tidak ada pipa / kabel-kabel /gas di lokasi yang akan digali',
			),
			array(
				'name' => '28a1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '28a1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '28a1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'b. Terdapat rambu yang menunjukan ada pekerjaan penggalian / lubang',
			),
			array(
				'name' => '28a2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '28a2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '28a2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '28a3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => 'c. Mengantisipasi dampak kerusakan struktur galian',
			),
			array(
				'name' => '28a3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '28a3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '28a3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '',
				'label' => 'CHECK LIST INSPEKSI PENERAPAN PROGRAM HSE',
				'type' => 'form-separator'
			),
			array(
				'name' => '1_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '1. Penerapan Mitigasi JHSEA',
			),
			array(
				'name' => '1_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '1_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '1_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '2_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '2. HSE Meeting (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '2_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '2_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '2_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '3_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '3. HSE Talk / briefing (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '3_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '3_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '3_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '4_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '4. HSE Training / Induction (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '4_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '4_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '4_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '5_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '5. Pelaporan Penerapan HSE ke Pertamina (sesuai schedule HSE Plant)',
			),
			array(
				'name' => '5_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '5_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '5_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '6_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '6. Inspeksi HSE secara rutin oleh level pelaksana (mulai dari Pre mobilization hingga mobilization) sesuai schedule HSE Plan)',
			),
			array(
				'name' => '6_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '6_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '6_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '7_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '7. Inspeksi HSE oleh Managemen kontraktor (sesuai schedule HSE Plan)',
			),
			array(
				'name' => '7_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '7_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '7_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '8_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '8. Incident / accident reporting',
			),
			array(
				'name' => '8_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '8_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '8_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '9_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '9. Investigation report',
			),
			array(
				'name' => '9_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '9_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '9_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '10_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '10. Pekerja paham terhadap HSE Policy & Objective pekerjaan tersebut',
			),
			array(
				'name' => '10_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '10_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '10_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '11_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '11. Pemeriksaan kesehatan',
			),
			array(
				'name' => '11_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '11_score_actual',
				'label' => 'Score Actual',
			),
			array(
				'name' => '11_note',
				'width' => 2,
				'label' => ' ',
			),
			array(
				'name' => '12_isneed',
				'options' => array(
					array('value' => '1', 'text' => 'Need'),
					array('value' => '0', 'text' => 'Not Need')
				),
				'label' => '12. Tindak lanjut temuan',
			),
			array(
				'name' => '12_score_max',
				'options' => array(
					array('value' => '0', 'text' => '0'),
					array('value' => '1', 'text' => '1'),
					array('value' => '2', 'text' => '2')
				),
				'label' => 'Score Max',
			),
			array(
				'name' => '12_score_actual',
				'label' => 'Score Actual',
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
			->select('wip.project');
		return parent::dt();
	}

	function getProjectName($uuid)
	{
		$result = $this->db
			->select('project.nama')
			->join('project', 'wip.project = project.uuid', 'left')
			->get_where($this->table, array('wip.uuid' => $uuid))
			->row_array();
		return $result['nama'];
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
		$form = array_map(function ($field) {
			if (strpos($field['name'], '_score_max') > -1) $field['attr'] .= ' disabled="disabled"';
			return $field;
		}, $form);
		return $form;
	}

	function create ($data)
	{
		$isneeds = array_filter($this->form, function ($field) {
			return strpos($field['name'], '_isneed') > -1;
		});
		foreach ($isneeds as $field) $data[$field['name']] = 1;

		$max_scores = array_filter($this->form, function ($field) {
			return strpos($field['name'], '_score_max') > -1;
		});
		foreach ($max_scores as $field) $data[$field['name']] = 2;

		$max3 = array(
			'2a',
			'4a',
			'4b',
			'4c',
			'5a',
			'5b',
			'5c',
			'6b',
			'6c',
			'6d',
			'7a',
			'7b',
			'7c',
			'7d',
			'7e',
			'8d',
			'17f',
			'18a',
			'18c'
		);
		foreach ($max3 as $field) $data["{$field}_score_max"] = 3;

		$data['8e_score_max'] = 1;

		return parent::create($data);
	}

	function download($uuid)
	{
		return array();
	}
}
