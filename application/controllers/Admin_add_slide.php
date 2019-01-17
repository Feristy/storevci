<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_add_slide extends CI_Controller {

	public function view($id = '')
	{
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		$content['content'] = $this->load->view('admin/add_slide', $data, true);
		$content['title'] = 'Slide Produk - Administrator';
		$content['btn'] = 'produk';
		$this->load->view('layout/admin_template', $content);
		$this->general->reload('admin/produk', array('del', 'del-all'));
	}
}