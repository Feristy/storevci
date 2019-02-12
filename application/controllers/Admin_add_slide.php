<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_add_slide extends CI_Controller {

	public function view($id = '')
	{
		if($this->input->post('add')){
			$this->db->insert('slide', array(
				'img' => $this->input->post('gambar'),
				'title' => $this->input->post('title'),
				'sub_title' => $this->input->post('sub'),
				'btn_text' => $this->input->post('btn')
			));
			$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil menambah slide baru.</div>';
			set_cookie('msg', $msg, 1);
		}

		if($this->input->post('edit')){
			$this->db->where('id', $id);
			$this->db->update('slide', array(
				'img' => $this->input->post('gambar'),
				'title' => $this->input->post('title'),
				'sub_title' => $this->input->post('sub'),
				'btn_text' => $this->input->post('btn')
			));
			$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil memperbarui slide.</div>';
			set_cookie('msg', $msg, 1);
		}

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		$data['title1'] = !empty($id) ? 'Edit Pengguna': 'Tambah';
		$data['msg'] = $this->input->cookie('msg');
		$data['submit'] = !empty($id) ? 'edit': 'add';
		$data['title_submit'] = !empty($id) ? 'Edit': 'Tambah';
		$data['slide'] = $this->general->read('slide', array('id' => $id));
		$data['gambar'] = $this->general->read('gambar');
		$content['content'] = $this->load->view('admin/add-slide', $data, true);
		$content['title'] = 'Slide Produk - Administrator';
		$content['btn'] = 'produk';
		$this->load->view('layout/admin_template', $content);
		$id = !empty($id) ? $id: @$this->general->last('slide')->id;
		$this->general->reload('admin/edit-slide/'.@$id, array('add', 'edit'));
	}
}