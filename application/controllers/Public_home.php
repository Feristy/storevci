<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_home extends CI_Controller {

	public function index()
	{
		$data['general'] = $this->general;
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		if($this->input->post('submit')){
			var_dump($this->input->post('color'));
		}
		$data['produk'] = $this->general->read_by('produk');
		$data['slide'] = $this->general->read('slide');
		$data['general'] = $this->general;
		$content['content'] = $this->load->view('public/home', $data, true);
		$content['title'] = 'Home - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}