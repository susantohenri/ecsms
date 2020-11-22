<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

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
				'label' => 'c. Melakukan pemantauan & mengantisipasi damp',
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

	function getHasil ($uuid)
	{
		$form = parent::prepopulate($uuid);
		$split= array_chunk($form, 564);
		$form_practice = $split[0];
		$form_program = $split[1];

		// PRACTICE
		$practice_needs = array_map(function ($field) {
			if (strpos($field['name'], '_isneed') > -1 && '1' === $field['value']) return str_replace('_isneed', '', $field['name']);
			else return '';
		}, $form_practice);
		$practice_needs = array_filter($practice_needs, function ($field) {
			return '' !== $field;
		});
		$practice_score_max = 0;
		$practice_score_actual = 0;
		$practice_needs_score_max = array_map(function ($index) {
			return "{$index}_score_max";
		}, $practice_needs);
		$practice_needs_score_actual = array_map(function ($index) {
			return "{$index}_score_actual";
		}, $practice_needs);
		foreach ($form as $field)
		{
			if (in_array($field['name'], $practice_needs_score_max))
			{
				$practice_score_max += $field['value'];
			}
			if (in_array($field['name'], $practice_needs_score_actual))
			{
				$practice_score_actual += $field['value'];
			}
		}
		$hasil_practice = array(
			'total_score_max' => $practice_score_max,
			'total_score_actual' => $practice_score_actual,
			'percent' => number_format(($practice_score_actual / $practice_score_max) * 100, 2)
		);

		// PROGRAM
		$program_needs = array_map(function ($field) {
			if (strpos($field['name'], '_isneed') > -1 && '1' === $field['value']) return str_replace('_isneed', '', $field['name']);
			else return '';
		}, $form_program);

		$program_needs = array_filter($program_needs, function ($field) {
			return '' !== $field;
		});

		$program_score_max = 0;
		$program_score_actual = 0;
		$program_needs_score_max = array_map(function ($index) {
			return "{$index}_score_max";
		}, $program_needs);
		$program_needs_score_actual = array_map(function ($index) {
			return "{$index}_score_actual";
		}, $program_needs);
		foreach ($form as $field)
		{
			if (in_array($field['name'], $program_needs_score_max))
			{
				$program_score_max += $field['value'];
			}
			if (in_array($field['name'], $program_needs_score_actual))
			{
				$program_score_actual += $field['value'];
			}
		}
		$hasil_program = array(
			'total_score_max' => $program_score_max,
			'total_score_actual' => $program_score_actual,
			'percent' => number_format(($program_score_actual / $program_score_max) * 100, 2)
		);

		return array (
			'practice' => $hasil_practice,
			'program' => $hasil_program
		);
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('wip.project');
		return parent::dt();
	}

	function getProjectDetail($uuid)
	{
		return $this->db
			->select('project.nama nama_project', false)
			->select('user.vendor nama_vendor', false)
			->join('project', 'wip.project = project.uuid', 'left')
			->join('user', 'user.uuid = project.pemenang', 'left')
			->get_where($this->table, array('wip.uuid' => $uuid))
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

	function excelPractice ($uuid)
	{
		$result = array (
			'title' => '',
			'spreadsheet' => ''
		);

		$projectDetail = $this->getProjectDetail($uuid);
		$project = $projectDetail['nama_project'];
		$vendor = $projectDetail['nama_vendor'];
		$result['title'] = "Check List Inspeksi HSE Work Practice - {$project}";

		$val = $this->findOne($uuid);
		$acceptedAt = date("j F  Y", strtotime($val['acceptedAt']));
		$hasil = $this->getHasil($uuid);
		$cellMap = array(
			'D6' => ": {$vendor}",
			'D7' => ": {$project}",
			'D8' => ": Fuel Terminal Boyolali",
			'D9' => ": {$acceptedAt}",
			'H177'=> $hasil['practice']['total_score_max'],
			'I177'=> $hasil['practice']['total_score_actual'],
			'H178'=> $hasil['practice']['percent'],

			'E13' => $val['1a_isneed'] === '1' ? '✓' : '',
			'G13' => $val['1a_isneed'] === '0' ? '✓' : '',
			'I13' => $val['1a_score_actual'],
			'J13' => $val['1a_note'],

			'E14' => $val['1b_isneed'] === '1' ? '✓' : '',
			'G14' => $val['1b_isneed'] === '0' ? '✓' : '',
			'I14' => $val['1b_score_actual'],
			'J14' => $val['1b_note'],

			'E15' => $val['1c_isneed'] === '1' ? '✓' : '',
			'G15' => $val['1c_isneed'] === '0' ? '✓' : '',
			'I15' => $val['1c_score_actual'],
			'J15' => $val['1c_note'],

			'E16' => $val['1d_isneed'] === '1' ? '✓' : '',
			'G16' => $val['1d_isneed'] === '0' ? '✓' : '',
			'I16' => $val['1d_score_actual'],
			'J16' => $val['1d_note'],

			'E17' => $val['1e_isneed'] === '1' ? '✓' : '',
			'G17' => $val['1e_isneed'] === '0' ? '✓' : '',
			'I17' => $val['1e_score_actual'],
			'J17' => $val['1e_note'],

			'E19' => $val['2a_isneed'] === '1' ? '✓' : '',
			'G19' => $val['2a_isneed'] === '0' ? '✓' : '',
			'I19' => $val['2a_score_actual'],
			'J19' => $val['2a_note'],

			'E20' => $val['2b_isneed'] === '1' ? '✓' : '',
			'G20' => $val['2b_isneed'] === '0' ? '✓' : '',
			'I20' => $val['2b_score_actual'],
			'J20' => $val['2b_note'],

			'E21' => $val['2c_isneed'] === '1' ? '✓' : '',
			'G21' => $val['2c_isneed'] === '0' ? '✓' : '',
			'I21' => $val['2c_score_actual'],
			'J21' => $val['2c_note'],

			'E23' => $val['3a_isneed'] === '1' ? '✓' : '',
			'G23' => $val['3a_isneed'] === '0' ? '✓' : '',
			'I23' => $val['3a_score_actual'],
			'J23' => $val['3a_note'],

			'E24' => $val['3b_isneed'] === '1' ? '✓' : '',
			'G24' => $val['3b_isneed'] === '0' ? '✓' : '',
			'I24' => $val['3b_score_actual'],
			'J24' => $val['3b_note'],

			'E25' => $val['3c_isneed'] === '1' ? '✓' : '',
			'G25' => $val['3c_isneed'] === '0' ? '✓' : '',
			'I25' => $val['3c_score_actual'],
			'J25' => $val['3c_note'],

			'E27' => $val['4a_isneed'] === '1' ? '✓' : '',
			'G27' => $val['4a_isneed'] === '0' ? '✓' : '',
			'I27' => $val['4a_score_actual'],
			'J27' => $val['4a_note'],

			'E28' => $val['4b_isneed'] === '1' ? '✓' : '',
			'G28' => $val['4b_isneed'] === '0' ? '✓' : '',
			'I28' => $val['4b_score_actual'],
			'J28' => $val['4b_note'],

			'E29' => $val['4c_isneed'] === '1' ? '✓' : '',
			'G29' => $val['4c_isneed'] === '0' ? '✓' : '',
			'I29' => $val['4c_score_actual'],
			'J29' => $val['4c_note'],

			'E31' => $val['5a_isneed'] === '1' ? '✓' : '',
			'G31' => $val['5a_isneed'] === '0' ? '✓' : '',
			'I31' => $val['5a_score_actual'],
			'J31' => $val['5a_note'],

			'E32' => $val['5b_isneed'] === '1' ? '✓' : '',
			'G32' => $val['5b_isneed'] === '0' ? '✓' : '',
			'I32' => $val['5b_score_actual'],
			'J32' => $val['5b_note'],

			'E33' => $val['5c_isneed'] === '1' ? '✓' : '',
			'G33' => $val['5c_isneed'] === '0' ? '✓' : '',
			'I33' => $val['5c_score_actual'],
			'J33' => $val['5c_note'],

			'E35' => $val['6a_isneed'] === '1' ? '✓' : '',
			'G35' => $val['6a_isneed'] === '0' ? '✓' : '',
			'I35' => $val['6a_score_actual'],
			'J35' => $val['6a_note'],

			'E36' => $val['6b_isneed'] === '1' ? '✓' : '',
			'G36' => $val['6b_isneed'] === '0' ? '✓' : '',
			'I36' => $val['6b_score_actual'],
			'J36' => $val['6b_note'],

			'E37' => $val['6c_isneed'] === '1' ? '✓' : '',
			'G37' => $val['6c_isneed'] === '0' ? '✓' : '',
			'I37' => $val['6c_score_actual'],
			'J37' => $val['6c_note'],

			'E38' => $val['6d_isneed'] === '1' ? '✓' : '',
			'G38' => $val['6d_isneed'] === '0' ? '✓' : '',
			'I38' => $val['6d_score_actual'],
			'J38' => $val['6d_note'],

			'E40' => $val['7a_isneed'] === '1' ? '✓' : '',
			'G40' => $val['7a_isneed'] === '0' ? '✓' : '',
			'I40' => $val['7a_score_actual'],
			'J40' => $val['7a_note'],

			'E41' => $val['7b_isneed'] === '1' ? '✓' : '',
			'G41' => $val['7b_isneed'] === '0' ? '✓' : '',
			'I41' => $val['7b_score_actual'],
			'J41' => $val['7b_note'],

			'E42' => $val['7c_isneed'] === '1' ? '✓' : '',
			'G42' => $val['7c_isneed'] === '0' ? '✓' : '',
			'I42' => $val['7c_score_actual'],
			'J42' => $val['7c_note'],

			'E43' => $val['7d_isneed'] === '1' ? '✓' : '',
			'G43' => $val['7d_isneed'] === '0' ? '✓' : '',
			'I43' => $val['7d_score_actual'],
			'J43' => $val['7d_note'],

			'E44' => $val['7e_isneed'] === '1' ? '✓' : '',
			'G44' => $val['7e_isneed'] === '0' ? '✓' : '',
			'I44' => $val['7e_score_actual'],
			'J44' => $val['7e_note'],

			'E46' => $val['8a_isneed'] === '1' ? '✓' : '',
			'G46' => $val['8a_isneed'] === '0' ? '✓' : '',
			'I46' => $val['8a_score_actual'],
			'J46' => $val['8a_note'],

			'E47' => $val['8b_isneed'] === '1' ? '✓' : '',
			'G47' => $val['8b_isneed'] === '0' ? '✓' : '',
			'I47' => $val['8b_score_actual'],
			'J47' => $val['8b_note'],

			'E48' => $val['8c_isneed'] === '1' ? '✓' : '',
			'G48' => $val['8c_isneed'] === '0' ? '✓' : '',
			'I48' => $val['8c_score_actual'],
			'J48' => $val['8c_note'],

			'E49' => $val['8d_isneed'] === '1' ? '✓' : '',
			'G49' => $val['8d_isneed'] === '0' ? '✓' : '',
			'I49' => $val['8d_score_actual'],
			'J49' => $val['8d_note'],

			'E50' => $val['8e_isneed'] === '1' ? '✓' : '',
			'G50' => $val['8e_isneed'] === '0' ? '✓' : '',
			'I50' => $val['8e_score_actual'],
			'J50' => $val['8e_note'],

			'E51' => $val['8f_isneed'] === '1' ? '✓' : '',
			'G51' => $val['8f_isneed'] === '0' ? '✓' : '',
			'I51' => $val['8f_score_actual'],
			'J51' => $val['8f_note'],

			'E53' => $val['9a_isneed'] === '1' ? '✓' : '',
			'G53' => $val['9a_isneed'] === '0' ? '✓' : '',
			'I53' => $val['9a_score_actual'],
			'J53' => $val['9a_note'],

			'E54' => $val['9b_isneed'] === '1' ? '✓' : '',
			'G54' => $val['9b_isneed'] === '0' ? '✓' : '',
			'I54' => $val['9b_score_actual'],
			'J54' => $val['9b_note'],

			'E55' => $val['9c_isneed'] === '1' ? '✓' : '',
			'G55' => $val['9c_isneed'] === '0' ? '✓' : '',
			'I55' => $val['9c_score_actual'],
			'J55' => $val['9c_note'],

			'E56' => $val['9d_isneed'] === '1' ? '✓' : '',
			'G56' => $val['9d_isneed'] === '0' ? '✓' : '',
			'I56' => $val['9d_score_actual'],
			'J56' => $val['9d_note'],

			'E57' => $val['9e_isneed'] === '1' ? '✓' : '',
			'G57' => $val['9e_isneed'] === '0' ? '✓' : '',
			'I57' => $val['9e_score_actual'],
			'J57' => $val['9e_note'],

			'E58' => $val['9f_isneed'] === '1' ? '✓' : '',
			'G58' => $val['9f_isneed'] === '0' ? '✓' : '',
			'I58' => $val['9f_score_actual'],
			'J58' => $val['9f_note'],

			'E59' => $val['9g_isneed'] === '1' ? '✓' : '',
			'G59' => $val['9g_isneed'] === '0' ? '✓' : '',
			'I59' => $val['9g_score_actual'],
			'J59' => $val['9g_note'],

			'E60' => $val['9h_isneed'] === '1' ? '✓' : '',
			'G60' => $val['9h_isneed'] === '0' ? '✓' : '',
			'I60' => $val['9h_score_actual'],
			'J60' => $val['9h_note'],

			'E62' => $val['10a_isneed'] === '1' ? '✓' : '',
			'G62' => $val['10a_isneed'] === '0' ? '✓' : '',
			'I62' => $val['10a_score_actual'],
			'J62' => $val['10a_note'],

			'E63' => $val['10b_isneed'] === '1' ? '✓' : '',
			'G63' => $val['10b_isneed'] === '0' ? '✓' : '',
			'I63' => $val['10b_score_actual'],
			'J63' => $val['10b_note'],

			'E64' => $val['10c_isneed'] === '1' ? '✓' : '',
			'G64' => $val['10c_isneed'] === '0' ? '✓' : '',
			'I64' => $val['10c_score_actual'],
			'J64' => $val['10c_note'],

			'E65' => $val['10d_isneed'] === '1' ? '✓' : '',
			'G65' => $val['10d_isneed'] === '0' ? '✓' : '',
			'I65' => $val['10d_score_actual'],
			'J65' => $val['10d_note'],

			'E67' => $val['11a_isneed'] === '1' ? '✓' : '',
			'G67' => $val['11a_isneed'] === '0' ? '✓' : '',
			'I67' => $val['11a_score_actual'],
			'J67' => $val['11a_note'],

			'E68' => $val['11b_isneed'] === '1' ? '✓' : '',
			'G68' => $val['11b_isneed'] === '0' ? '✓' : '',
			'I68' => $val['11b_score_actual'],
			'J68' => $val['11b_note'],

			'E69' => $val['11c_isneed'] === '1' ? '✓' : '',
			'G69' => $val['11c_isneed'] === '0' ? '✓' : '',
			'I69' => $val['11c_score_actual'],
			'J69' => $val['11c_note'],

			'E70' => $val['11d_isneed'] === '1' ? '✓' : '',
			'G70' => $val['11d_isneed'] === '0' ? '✓' : '',
			'I70' => $val['11d_score_actual'],
			'J70' => $val['11d_note'],

			'E71' => $val['11e_isneed'] === '1' ? '✓' : '',
			'G71' => $val['11e_isneed'] === '0' ? '✓' : '',
			'I71' => $val['11e_score_actual'],
			'J71' => $val['11e_note'],

			'E73' => $val['12a_isneed'] === '1' ? '✓' : '',
			'G73' => $val['12a_isneed'] === '0' ? '✓' : '',
			'I73' => $val['12a_score_actual'],
			'J73' => $val['12a_note'],

			'E74' => $val['12b_isneed'] === '1' ? '✓' : '',
			'G74' => $val['12b_isneed'] === '0' ? '✓' : '',
			'I74' => $val['12b_score_actual'],
			'J74' => $val['12b_note'],

			'E75' => $val['12c_isneed'] === '1' ? '✓' : '',
			'G75' => $val['12c_isneed'] === '0' ? '✓' : '',
			'I75' => $val['12c_score_actual'],
			'J75' => $val['12c_note'],

			'E77' => $val['13a_isneed'] === '1' ? '✓' : '',
			'G77' => $val['13a_isneed'] === '0' ? '✓' : '',
			'I77' => $val['13a_score_actual'],
			'J77' => $val['13a_note'],

			'E78' => $val['13b_isneed'] === '1' ? '✓' : '',
			'G78' => $val['13b_isneed'] === '0' ? '✓' : '',
			'I78' => $val['13b_score_actual'],
			'J78' => $val['13b_note'],

			'E79' => $val['13c_isneed'] === '1' ? '✓' : '',
			'G79' => $val['13c_isneed'] === '0' ? '✓' : '',
			'I79' => $val['13c_score_actual'],
			'J79' => $val['13c_note'],

			'E80' => $val['14a_isneed'] === '1' ? '✓' : '',
			'G80' => $val['14a_isneed'] === '0' ? '✓' : '',
			'I80' => $val['14a_score_actual'],
			'J80' => $val['14a_note'],

			'E81' => $val['15a_isneed'] === '1' ? '✓' : '',
			'G81' => $val['15a_isneed'] === '0' ? '✓' : '',
			'I81' => $val['15a_score_actual'],
			'J81' => $val['15a_note'],

			'E83' => $val['16a_isneed'] === '1' ? '✓' : '',
			'G83' => $val['16a_isneed'] === '0' ? '✓' : '',
			'I83' => $val['16a_score_actual'],
			'J83' => $val['16a_note'],

			'E84' => $val['16b_isneed'] === '1' ? '✓' : '',
			'G84' => $val['16b_isneed'] === '0' ? '✓' : '',
			'I84' => $val['16b_score_actual'],
			'J84' => $val['16b_note'],

			'E85' => $val['16c_isneed'] === '1' ? '✓' : '',
			'G85' => $val['16c_isneed'] === '0' ? '✓' : '',
			'I85' => $val['16c_score_actual'],
			'J85' => $val['16c_note'],

			'E86' => $val['16d_isneed'] === '1' ? '✓' : '',
			'G86' => $val['16d_isneed'] === '0' ? '✓' : '',
			'I86' => $val['16d_score_actual'],
			'J86' => $val['16d_note'],

			'E88' => $val['17a_isneed'] === '1' ? '✓' : '',
			'G88' => $val['17a_isneed'] === '0' ? '✓' : '',
			'I88' => $val['17a_score_actual'],
			'J88' => $val['17a_note'],

			'E89' => $val['17b_isneed'] === '1' ? '✓' : '',
			'G89' => $val['17b_isneed'] === '0' ? '✓' : '',
			'I89' => $val['17b_score_actual'],
			'J89' => $val['17b_note'],

			'E90' => $val['17c_isneed'] === '1' ? '✓' : '',
			'G90' => $val['17c_isneed'] === '0' ? '✓' : '',
			'I90' => $val['17c_score_actual'],
			'J90' => $val['17c_note'],

			'E91' => $val['17d_isneed'] === '1' ? '✓' : '',
			'G91' => $val['17d_isneed'] === '0' ? '✓' : '',
			'I91' => $val['17d_score_actual'],
			'J91' => $val['17d_note'],

			'E92' => $val['17e_isneed'] === '1' ? '✓' : '',
			'G92' => $val['17e_isneed'] === '0' ? '✓' : '',
			'I92' => $val['17e_score_actual'],
			'J92' => $val['17e_note'],

			'E93' => $val['17f_isneed'] === '1' ? '✓' : '',
			'G93' => $val['17f_isneed'] === '0' ? '✓' : '',
			'I93' => $val['17f_score_actual'],
			'J93' => $val['17f_note'],

			'E95' => $val['18a_isneed'] === '1' ? '✓' : '',
			'G95' => $val['18a_isneed'] === '0' ? '✓' : '',
			'I95' => $val['18a_score_actual'],
			'J95' => $val['18a_note'],

			'E96' => $val['18b_isneed'] === '1' ? '✓' : '',
			'G96' => $val['18b_isneed'] === '0' ? '✓' : '',
			'I96' => $val['18b_score_actual'],
			'J96' => $val['18b_note'],

			'E97' => $val['18c_isneed'] === '1' ? '✓' : '',
			'G97' => $val['18c_isneed'] === '0' ? '✓' : '',
			'I97' => $val['18c_score_actual'],
			'J97' => $val['18c_note'],

			'E99' => $val['19a_isneed'] === '1' ? '✓' : '',
			'G99' => $val['19a_isneed'] === '0' ? '✓' : '',
			'I99' => $val['19a_score_actual'],
			'J99' => $val['19a_note'],

			'E100' => $val['19b_isneed'] === '1' ? '✓' : '',
			'G100' => $val['19b_isneed'] === '0' ? '✓' : '',
			'I100' => $val['19b_score_actual'],
			'J100' => $val['19b_note'],

			'E101' => $val['19c_isneed'] === '1' ? '✓' : '',
			'G101' => $val['19c_isneed'] === '0' ? '✓' : '',
			'I101' => $val['19c_score_actual'],
			'J101' => $val['19c_note'],

			'E102' => $val['19d_isneed'] === '1' ? '✓' : '',
			'G102' => $val['19d_isneed'] === '0' ? '✓' : '',
			'I102' => $val['19d_score_actual'],
			'J102' => $val['19d_note'],

			'E103' => $val['19e_isneed'] === '1' ? '✓' : '',
			'G103' => $val['19e_isneed'] === '0' ? '✓' : '',
			'I103' => $val['19e_score_actual'],
			'J103' => $val['19e_note'],

			'E105' => $val['20a_isneed'] === '1' ? '✓' : '',
			'G105' => $val['20a_isneed'] === '0' ? '✓' : '',
			'I105' => $val['20a_score_actual'],
			'J105' => $val['20a_note'],

			'E106' => $val['20b_isneed'] === '1' ? '✓' : '',
			'G106' => $val['20b_isneed'] === '0' ? '✓' : '',
			'I106' => $val['20b_score_actual'],
			'J106' => $val['20b_note'],

			'E107' => $val['20c_isneed'] === '1' ? '✓' : '',
			'G107' => $val['20c_isneed'] === '0' ? '✓' : '',
			'I107' => $val['20c_score_actual'],
			'J107' => $val['20c_note'],

			'E109' => $val['21a_isneed'] === '1' ? '✓' : '',
			'G109' => $val['21a_isneed'] === '0' ? '✓' : '',
			'I109' => $val['21a_score_actual'],
			'J109' => $val['21a_note'],

			'E110' => $val['21b_isneed'] === '1' ? '✓' : '',
			'G110' => $val['21b_isneed'] === '0' ? '✓' : '',
			'I110' => $val['21b_score_actual'],
			'J110' => $val['21b_note'],

			'E112' => $val['22a_isneed'] === '1' ? '✓' : '',
			'G112' => $val['22a_isneed'] === '0' ? '✓' : '',
			'I112' => $val['22a_score_actual'],
			'J112' => $val['22a_note'],

			'E113' => $val['22b_isneed'] === '1' ? '✓' : '',
			'G113' => $val['22b_isneed'] === '0' ? '✓' : '',
			'I113' => $val['22b_score_actual'],
			'J113' => $val['22b_note'],

			'E116' => $val['23a1_isneed'] === '1' ? '✓' : '',
			'G116' => $val['23a1_isneed'] === '0' ? '✓' : '',
			'I116' => $val['23a1_score_actual'],
			'J116' => $val['23a1_note'],

			'E117' => $val['23a2_isneed'] === '1' ? '✓' : '',
			'G117' => $val['23a2_isneed'] === '0' ? '✓' : '',
			'I117' => $val['23a2_score_actual'],
			'J117' => $val['23a2_note'],

			'E118' => $val['23a3_isneed'] === '1' ? '✓' : '',
			'G118' => $val['23a3_isneed'] === '0' ? '✓' : '',
			'I118' => $val['23a3_score_actual'],
			'J118' => $val['23a3_note'],

			'E119' => $val['23a4_isneed'] === '1' ? '✓' : '',
			'G119' => $val['23a4_isneed'] === '0' ? '✓' : '',
			'I119' => $val['23a4_score_actual'],
			'J119' => $val['23a4_note'],

			'E120' => $val['23a5_isneed'] === '1' ? '✓' : '',
			'G120' => $val['23a5_isneed'] === '0' ? '✓' : '',
			'I120' => $val['23a5_score_actual'],
			'J120' => $val['23a5_note'],

			'E122' => $val['23b1_isneed'] === '1' ? '✓' : '',
			'G122' => $val['23b1_isneed'] === '0' ? '✓' : '',
			'I122' => $val['23b1_score_actual'],
			'J122' => $val['23b1_note'],

			'E123' => $val['23b2_isneed'] === '1' ? '✓' : '',
			'G123' => $val['23b2_isneed'] === '0' ? '✓' : '',
			'I123' => $val['23b2_score_actual'],
			'J123' => $val['23b2_note'],

			'E124' => $val['23b3_isneed'] === '1' ? '✓' : '',
			'G124' => $val['23b3_isneed'] === '0' ? '✓' : '',
			'I124' => $val['23b3_score_actual'],
			'J124' => $val['23b3_note'],

			'E126' => $val['24a_isneed'] === '1' ? '✓' : '',
			'G126' => $val['24a_isneed'] === '0' ? '✓' : '',
			'I126' => $val['24a_score_actual'],
			'J126' => $val['24a_note'],

			'E127' => $val['24b_isneed'] === '1' ? '✓' : '',
			'G127' => $val['24b_isneed'] === '0' ? '✓' : '',
			'I127' => $val['24b_score_actual'],
			'J127' => $val['24b_note'],

			'E128' => $val['24c_isneed'] === '1' ? '✓' : '',
			'G128' => $val['24c_isneed'] === '0' ? '✓' : '',
			'I128' => $val['24c_score_actual'],
			'J128' => $val['24c_note'],

			'E131' => $val['25a1_isneed'] === '1' ? '✓' : '',
			'G131' => $val['25a1_isneed'] === '0' ? '✓' : '',
			'I131' => $val['25a1_score_actual'],
			'J131' => $val['25a1_note'],

			'E132' => $val['25a2_isneed'] === '1' ? '✓' : '',
			'G132' => $val['25a2_isneed'] === '0' ? '✓' : '',
			'I132' => $val['25a2_score_actual'],
			'J132' => $val['25a2_note'],

			'E133' => $val['25a3_isneed'] === '1' ? '✓' : '',
			'G133' => $val['25a3_isneed'] === '0' ? '✓' : '',
			'I133' => $val['25a3_score_actual'],
			'J133' => $val['25a3_note'],

			'E134' => $val['25a4_isneed'] === '1' ? '✓' : '',
			'G134' => $val['25a4_isneed'] === '0' ? '✓' : '',
			'I134' => $val['25a4_score_actual'],
			'J134' => $val['25a4_note'],

			'E135' => $val['25a5_isneed'] === '1' ? '✓' : '',
			'G135' => $val['25a5_isneed'] === '0' ? '✓' : '',
			'I135' => $val['25a5_score_actual'],
			'J135' => $val['25a5_note'],

			'E136' => $val['25a6_isneed'] === '1' ? '✓' : '',
			'G136' => $val['25a6_isneed'] === '0' ? '✓' : '',
			'I136' => $val['25a6_score_actual'],
			'J136' => $val['25a6_note'],

			'E137' => $val['25a7_isneed'] === '1' ? '✓' : '',
			'G137' => $val['25a7_isneed'] === '0' ? '✓' : '',
			'I137' => $val['25a7_score_actual'],
			'J137' => $val['25a7_note'],

			'E139' => $val['25b1_isneed'] === '1' ? '✓' : '',
			'G139' => $val['25b1_isneed'] === '0' ? '✓' : '',
			'I139' => $val['25b1_score_actual'],
			'J139' => $val['25b1_note'],

			'E140' => $val['25b2_isneed'] === '1' ? '✓' : '',
			'G140' => $val['25b2_isneed'] === '0' ? '✓' : '',
			'I140' => $val['25b2_score_actual'],
			'J140' => $val['25b2_note'],

			'E141' => $val['25b3_isneed'] === '1' ? '✓' : '',
			'G141' => $val['25b3_isneed'] === '0' ? '✓' : '',
			'I141' => $val['25b3_score_actual'],
			'J141' => $val['25b3_note'],

			'E142' => $val['25b4_isneed'] === '1' ? '✓' : '',
			'G142' => $val['25b4_isneed'] === '0' ? '✓' : '',
			'I142' => $val['25b4_score_actual'],
			'J142' => $val['25b4_note'],

			'E143' => $val['25b5_isneed'] === '1' ? '✓' : '',
			'G143' => $val['25b5_isneed'] === '0' ? '✓' : '',
			'I143' => $val['25b5_score_actual'],
			'J143' => $val['25b5_note'],

			'E144' => $val['25b6_isneed'] === '1' ? '✓' : '',
			'G144' => $val['25b6_isneed'] === '0' ? '✓' : '',
			'I144' => $val['25b6_score_actual'],
			'J144' => $val['25b6_note'],

			'E145' => $val['25b7_isneed'] === '1' ? '✓' : '',
			'G145' => $val['25b7_isneed'] === '0' ? '✓' : '',
			'I145' => $val['25b7_score_actual'],
			'J145' => $val['25b7_note'],

			'E146' => $val['25b8_isneed'] === '1' ? '✓' : '',
			'G146' => $val['25b8_isneed'] === '0' ? '✓' : '',
			'I146' => $val['25b8_score_actual'],
			'J146' => $val['25b8_note'],

			'E147' => $val['25b9_isneed'] === '1' ? '✓' : '',
			'G147' => $val['25b9_isneed'] === '0' ? '✓' : '',
			'I147' => $val['25b9_score_actual'],
			'J147' => $val['25b9_note'],

			'E149' => $val['26a_isneed'] === '1' ? '✓' : '',
			'G149' => $val['26a_isneed'] === '0' ? '✓' : '',
			'I149' => $val['26a_score_actual'],
			'J149' => $val['26a_note'],

			'E150' => $val['26b_isneed'] === '1' ? '✓' : '',
			'G150' => $val['26b_isneed'] === '0' ? '✓' : '',
			'I150' => $val['26b_score_actual'],
			'J150' => $val['26b_note'],

			'E151' => $val['26c_isneed'] === '1' ? '✓' : '',
			'G151' => $val['26c_isneed'] === '0' ? '✓' : '',
			'I151' => $val['26c_score_actual'],
			'J151' => $val['26c_note'],

			'E152' => $val['26d_isneed'] === '1' ? '✓' : '',
			'G152' => $val['26d_isneed'] === '0' ? '✓' : '',
			'I152' => $val['26d_score_actual'],
			'J152' => $val['26d_note'],

			'E155' => $val['27a1_isneed'] === '1' ? '✓' : '',
			'G155' => $val['27a1_isneed'] === '0' ? '✓' : '',
			'I155' => $val['27a1_score_actual'],
			'J155' => $val['27a1_note'],

			'E156' => $val['27a2_isneed'] === '1' ? '✓' : '',
			'G156' => $val['27a2_isneed'] === '0' ? '✓' : '',
			'I156' => $val['27a2_score_actual'],
			'J156' => $val['27a2_note'],

			'E157' => $val['27a3_isneed'] === '1' ? '✓' : '',
			'G157' => $val['27a3_isneed'] === '0' ? '✓' : '',
			'I157' => $val['27a3_score_actual'],
			'J157' => $val['27a3_note'],

			'E158' => $val['27a4_isneed'] === '1' ? '✓' : '',
			'G158' => $val['27a4_isneed'] === '0' ? '✓' : '',
			'I158' => $val['27a4_score_actual'],
			'J158' => $val['27a4_note'],

			'E159' => $val['27a5_isneed'] === '1' ? '✓' : '',
			'G159' => $val['27a5_isneed'] === '0' ? '✓' : '',
			'I159' => $val['27a5_score_actual'],
			'J159' => $val['27a5_note'],

			'E160' => $val['27a6_isneed'] === '1' ? '✓' : '',
			'G160' => $val['27a6_isneed'] === '0' ? '✓' : '',
			'I160' => $val['27a6_score_actual'],
			'J160' => $val['27a6_note'],

			'E161' => $val['27a7_isneed'] === '1' ? '✓' : '',
			'G161' => $val['27a7_isneed'] === '0' ? '✓' : '',
			'I161' => $val['27a7_score_actual'],
			'J161' => $val['27a7_note'],

			'E162' => $val['27a8_isneed'] === '1' ? '✓' : '',
			'G162' => $val['27a8_isneed'] === '0' ? '✓' : '',
			'I162' => $val['27a8_score_actual'],
			'J162' => $val['27a8_note'],

			'E163' => $val['27a9_isneed'] === '1' ? '✓' : '',
			'G163' => $val['27a9_isneed'] === '0' ? '✓' : '',
			'I163' => $val['27a9_score_actual'],
			'J163' => $val['27a9_note'],

			'E165' => $val['27b1_isneed'] === '1' ? '✓' : '',
			'G165' => $val['27b1_isneed'] === '0' ? '✓' : '',
			'I165' => $val['27b1_score_actual'],
			'J165' => $val['27b1_note'],

			'E166' => $val['27b2_isneed'] === '1' ? '✓' : '',
			'G166' => $val['27b2_isneed'] === '0' ? '✓' : '',
			'I166' => $val['27b2_score_actual'],
			'J166' => $val['27b2_note'],

			'E167' => $val['27b3_isneed'] === '1' ? '✓' : '',
			'G167' => $val['27b3_isneed'] === '0' ? '✓' : '',
			'I167' => $val['27b3_score_actual'],
			'J167' => $val['27b3_note'],

			'E168' => $val['27b4_isneed'] === '1' ? '✓' : '',
			'G168' => $val['27b4_isneed'] === '0' ? '✓' : '',
			'I168' => $val['27b4_score_actual'],
			'J168' => $val['27b4_note'],

			'E170' => $val['27c1_isneed'] === '1' ? '✓' : '',
			'G170' => $val['27c1_isneed'] === '0' ? '✓' : '',
			'I170' => $val['27c1_score_actual'],
			'J170' => $val['27c1_note'],

			'E171' => $val['27c2_isneed'] === '1' ? '✓' : '',
			'G171' => $val['27c2_isneed'] === '0' ? '✓' : '',
			'I171' => $val['27c2_score_actual'],
			'J171' => $val['27c2_note'],

			'E172' => $val['27c3_isneed'] === '1' ? '✓' : '',
			'G172' => $val['27c3_isneed'] === '0' ? '✓' : '',
			'I172' => $val['27c3_score_actual'],
			'J172' => $val['27c3_note'],

			'E174' => $val['28a1_isneed'] === '1' ? '✓' : '',
			'G174' => $val['28a1_isneed'] === '0' ? '✓' : '',
			'I174' => $val['28a1_score_actual'],
			'J174' => $val['28a1_note'],

			'E175' => $val['28a2_isneed'] === '1' ? '✓' : '',
			'G175' => $val['28a2_isneed'] === '0' ? '✓' : '',
			'I175' => $val['28a2_score_actual'],
			'J175' => $val['28a2_note'],

			'E176' => $val['28a3_isneed'] === '1' ? '✓' : '',
			'G176' => $val['28a3_isneed'] === '0' ? '✓' : '',
			'I176' => $val['28a3_score_actual'],
			'J176' => $val['28a3_note'],
		);

		$spreadsheet = IOFactory::load('./excels/Form 3.1 - Check List Inspeksi HSE Work Practice.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}

	function excelProgram ($uuid)
	{
		$result = array (
			'title' => '',
			'spreadsheet' => ''
		);

		$projectDetail = $this->getProjectDetail($uuid);
		$project = $projectDetail['nama_project'];
		$vendor = $projectDetail['nama_vendor'];
		$result['title'] = "Check List Inspeksi Penerapan Program HSE - {$project}";

		$val = $this->findOne($uuid);
		$acceptedAt = date("j F  Y", strtotime($val['acceptedAt']));
		$hasil = $this->getHasil($uuid);
		$cellMap = array(
			'C4' => ": {$vendor}",
			'C5' => ": {$project}",
			'C6' => ": Fuel Terminal Boyolali",
			'C7' => ": {$acceptedAt}",
			'F23' => $hasil['program']['total_score_max'],
			'G23' => $hasil['program']['total_score_actual'],
			'F24' => $hasil['program']['percent'],

			'D11' => $val['1_isneed'] === '1' ? '✓' : '',
			'E11' => $val['1_isneed'] === '0' ? '✓' : '',
			'G11' => $val['1_score_actual'],
			'H11' => $val['1_note'],

			'D12' => $val['2_isneed'] === '1' ? '✓' : '',
			'E12' => $val['2_isneed'] === '0' ? '✓' : '',
			'G12' => $val['2_score_actual'],
			'H12' => $val['2_note'],

			'D13' => $val['3_isneed'] === '1' ? '✓' : '',
			'E13' => $val['3_isneed'] === '0' ? '✓' : '',
			'G13' => $val['3_score_actual'],
			'H13' => $val['3_note'],

			'D14' => $val['4_isneed'] === '1' ? '✓' : '',
			'E14' => $val['4_isneed'] === '0' ? '✓' : '',
			'G14' => $val['4_score_actual'],
			'H14' => $val['4_note'],

			'D15' => $val['5_isneed'] === '1' ? '✓' : '',
			'E15' => $val['5_isneed'] === '0' ? '✓' : '',
			'G15' => $val['5_score_actual'],
			'H15' => $val['5_note'],

			'D16' => $val['6_isneed'] === '1' ? '✓' : '',
			'E16' => $val['6_isneed'] === '0' ? '✓' : '',
			'G16' => $val['6_score_actual'],
			'H16' => $val['6_note'],

			'D17' => $val['7_isneed'] === '1' ? '✓' : '',
			'E17' => $val['7_isneed'] === '0' ? '✓' : '',
			'G17' => $val['7_score_actual'],
			'H17' => $val['7_note'],

			'D18' => $val['8_isneed'] === '1' ? '✓' : '',
			'E18' => $val['8_isneed'] === '0' ? '✓' : '',
			'G18' => $val['8_score_actual'],
			'H18' => $val['8_note'],

			'D19' => $val['9_isneed'] === '1' ? '✓' : '',
			'E19' => $val['9_isneed'] === '0' ? '✓' : '',
			'G19' => $val['9_score_actual'],
			'H19' => $val['9_note'],

			'D20' => $val['10_isneed'] === '1' ? '✓' : '',
			'E20' => $val['10_isneed'] === '0' ? '✓' : '',
			'G20' => $val['10_score_actual'],
			'H20' => $val['10_note'],

			'D21' => $val['11_isneed'] === '1' ? '✓' : '',
			'E21' => $val['11_isneed'] === '0' ? '✓' : '',
			'G21' => $val['11_score_actual'],
			'H21' => $val['11_note'],

			'D22' => $val['12_isneed'] === '1' ? '✓' : '',
			'E22' => $val['12_isneed'] === '0' ? '✓' : '',
			'G22' => $val['12_score_actual'],
			'H22' => $val['12_note'],
		);

		$spreadsheet = IOFactory::load('./excels/Form 3.2 - WIP - Check List Inspeksi Penerapan Program HSE.xlsx');
		$sheet = $spreadsheet->getSheet(0);
		foreach ($cellMap as $cell => $val) $sheet->setCellValue($cell, $val);

		$result['spreadsheet'] = $spreadsheet;
		return $result;
	}
}
