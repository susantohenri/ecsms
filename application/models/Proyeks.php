<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proyeks extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'proyek';
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
				'name' => 'peserta',
				'label' => 'Peserta',
				'options' => array(),
				'width' => 2,
				'attributes' => array(
					array('data-autocomplete' => 'true'),
					array('data-model' => 'Vendors'),
					array('data-field' => 'vendor')
				)
			),
		);
		$this->childs = array(
			array(
				'label' => 'Vendor Peserta',
				'controller' => 'PesertaProyek',
				'model' => 'PesertaProyeks'
			),
		);
	}

	function dt()
	{
		$this->datatables
			->select("{$this->table}.uuid")
			->select("{$this->table}.orders")
			->select('proyek.nama');
		return parent::dt();
	}
}
