<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

	public function index()
	{ 
		$content['content'] = $this->load->view('admin/dashboard', '', true);
		$content['title'] = 'Dashboard - Administrator';
		$content['btn'] = 'home';
		$this->load->view('layout/admin_template', $content);
	}
}
