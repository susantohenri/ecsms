<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Templates';
		parent::__construct();
	}

}