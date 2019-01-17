<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

	public function index()
	{
		if($this->input->post('del')){
			$this->db->delete('user', array('id' => $this->input->post('del')));
		}

		if($this->input->post('del-all')){
			$allowed_del = explode(',', $this->input->post('in-del-all'));
			foreach ($allowed_del as $del_item) {
				$this->db->delete('user', array('id' => $del_item));
			}
		}

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$data['user'] = $this->general->read_by('user');
		$content['content'] = $this->load->view('admin/user', $data, true);
		$content['title'] = 'Pengguna - Administrator';
		$content['btn'] = 'user';
		$content['btn_add'] = 'alink';
		$content['btn_alink'] = site_url('admin/tambah-pengguna');
		$this->load->view('layout/admin_template', $content);
		$this->general->reload('admin/pengguna', array('del', 'del-all'));
	}
}
