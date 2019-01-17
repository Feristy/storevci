<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_home extends CI_Controller {

	public function index()
	{
		$data['general'] = $this->general;
		
		$data['produk'] = $this->general->read_by('produk');
		$content['content'] = $this->load->view('public/home', $data, true);
		$content['title'] = 'Home - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}