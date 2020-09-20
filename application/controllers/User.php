<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct ()
	{
		parent::__construct();
	}

	function index ()
	{
	    $vars = array();
	    $this->load->model('Menus');
	    $vars['menu'] = $this->Menus->find(array('role' => $this->session->userdata('role')));
		$vars['page_name'] = 'menu-user';
		$vars['breadcrumb'] = array(
			array(
				'active' => false,
				'text' => 'Home',
				'href' => base_url()
			),
			array(
				'active' => true,
				'text' => 'User',
			),
		);
	    $this->loadview('index', $vars);
	}
}