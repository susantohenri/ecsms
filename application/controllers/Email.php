<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Emails';
		parent::__construct();
	}

}