<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_gambar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->input->post('submit_upload')){
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('upload')){
				$file = $this->upload->data('file_name');
				$this->db->insert('gambar', array('nama' => $file));
				$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$file.' berhasil diupload.</div>';
			}else{
				$msg = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
			}

			set_cookie('msg', $msg, 1);
		}

		if($this->input->post('del')){
			$del_file = $this->general->read('gambar', array('id' => $this->input->post('del')));
			unlink('./assets/upload/'.$del_file->nama);
			$this->db->delete('gambar', array('id' => $this->input->post('del')));
		}

		if($this->input->post('del-all')){
			$allowed_del = explode(',', $this->input->post('in-del-all'));
			foreach ($allowed_del as $del_item) {
				$del_file = $this->general->read('gambar', array('id' => $del_item));
				unlink('./assets/upload/'.$del_file->nama);
				$this->db->delete('gambar', array('id' => $del_item));
			}
		}

		$data['msg'] = $this->input->cookie('msg');

		$data['gambar'] = $this->general->read('gambar');
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$content['content'] = $this->load->view('admin/gambar', $data, true);
		$content['title'] = 'Gambar - Administrator';
		$content['btn'] = 'gambar';
		$content['btn_add'] = 'file';
		$this->load->view('layout/admin_template', $content);
		$this->general->reload('admin/gambar', array('del', 'del-all', 'submit_upload'));
	}
}