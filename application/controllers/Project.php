<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Projects';
		parent::__construct();
	}

}