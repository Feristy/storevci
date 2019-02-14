<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_single_produk extends CI_Controller {

	public function view($id)
	{
		$data['produk'] = $this->general->read('produk', array('nama' => $id));
		$data['general'] = $this->general;
		$content['content'] = $this->load->view('public/home', $data, true);
		$content['title'] = 'Home - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}