<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KPI extends MY_Controller {

	function __construct ()
	{
		$this->model = 'KPIs';
		parent::__construct();
	}

}