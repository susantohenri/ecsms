<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PenerimaEmail extends MY_Controller {

	function __construct ()
	{
		$this->model = 'PenerimaEmails';
		parent::__construct();
	}

}