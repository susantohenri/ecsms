<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanBulanan extends MY_Controller {

	function __construct ()
	{
		$this->model = 'LaporanBulanans';
		parent::__construct();
	}

}