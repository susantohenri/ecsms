<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateEmail extends MY_Controller {

	function __construct ()
	{
		$this->model = 'TemplateEmails';
		parent::__construct();
	}

}