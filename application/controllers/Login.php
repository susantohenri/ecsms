<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index () {
		$this->cleanUpTemporaryFileUpload();
		if ($post = $this->input->post()) {
			$this->load->model('Users');
			$login = $this->Users->findOne(array(
				'username' => $post['username'],
				'password' => md5($post['password'])
			));
			if (isset ($login['uuid'])) {
				$this->load->library('session');
				$this->load->model('Roles');
				$role = $this->Roles->findOne($login['role']);
				$login['display_name'] = 'Vendor' === $role['name'] ? $login['vendor'] : $role['name'];
				$this->session->set_userdata($login);
				redirect(base_url());
			}
		}
		$this->load->view('login');
	}

	function Migrate ($version = null) {
		$this->load->library('migration');
	    $success = !is_null ($version) ? $this->migration->version($version) : $this->migration->latest();
	    if (!$success) show_error($this->migration->error_string());
	}

	function Logout() {
	  	$this->load->library('session');
	    $this->session->sess_destroy();
	    redirect(base_url());
	}

	private function cleanUpTemporaryFileUpload ()
	{
		$age_limit = 2;// hours
		$temporary_dir = $this->config->item('temporary_upload_directory');
		$now = time();
		foreach (scandir($temporary_dir) as $file_name)
		{
			$split_name = explode('-', $file_name);
			$since = $split_name[0];
			if ($since < 1) continue;
			$hour_ago = floor(($now - $since) / 3600);
			if ($hour_ago > $age_limit) unlink("{$temporary_dir}/$file_name");
		}
	}


}