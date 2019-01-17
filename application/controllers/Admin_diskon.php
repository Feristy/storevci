<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_diskon extends CI_Controller {

	public function index()
	{
		if($this->input->post('del')){
			$this->db->delete('produk', array('id' => $this->input->post('del')));
		}

		if($this->input->post('del-all')){
			$allowed_del = explode(',', $this->input->post('in-del-all'));
			foreach ($allowed_del as $del_item) {
				$this->db->delete('produk', array('id' => $del_item));
			}
		}

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$data['produk'] = $this->general->read_by('produk');
		$content['content'] = $this->load->view('admin/diskon', $data, true);
		$content['title'] = 'Diskon Produk - Administrator';
		$content['btn'] = 'produk';
		$content['btn_add'] = 'alink';
		$content['btn_alink'] = site_url('admin/tambah-produk');
		$this->load->view('layout/admin_template', $content);
		$this->general->reload('admin/produk', array('del', 'del-all'));
	}
}
