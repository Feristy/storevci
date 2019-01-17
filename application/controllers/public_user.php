<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_user extends CI_Controller {

	public function index()
	{
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		$content['content'] = $this->load->view('public/user.php', $data, true);
		$content['title'] = 'User - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}