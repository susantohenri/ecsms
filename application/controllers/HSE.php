<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HSE extends MY_Controller {

	function __construct ()
	{
		$this->model = 'HSEs';
		parent::__construct();
	}

}