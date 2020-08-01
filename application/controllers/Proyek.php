<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Proyeks';
		parent::__construct();
	}

}