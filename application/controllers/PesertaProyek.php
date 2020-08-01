<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaProyek extends MY_Controller {

	function __construct ()
	{
		$this->model = 'PesertaProyeks';
		parent::__construct();
	}

}