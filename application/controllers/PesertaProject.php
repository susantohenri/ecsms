<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaProject extends MY_Controller {

	function __construct ()
	{
		$this->model = 'PesertaProjects';
		parent::__construct();
	}

}