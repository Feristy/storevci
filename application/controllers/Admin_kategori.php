<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kategori extends CI_Controller {

	public function index()
	{
		if($this->input->post('del')){
			$this->db->delete('kategori', array('id' => $this->input->post('del')));
		}

		if($this->input->post('del-all')){
			$allowed_del = explode(',', $this->input->post('in-del-all'));
			foreach ($allowed_del as $del_item) {
				$this->db->delete('kategori', array('id' => $del_item));
			}
		}

		if($this->input->post('add')){
			$last_position = $this->general->last_position('kategori', 'position');
			$slug = url_title($this->input->post('nama'));
			$this->db->insert('kategori', array(
					'nama' => $this->input->post('nama'),
					'slug' => $slug,
					'position' => $last_position
				));
		}

		if($this->input->post('edit')){
			$edit_slug = url_title($this->input->post('nama'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kategori', array(
				'nama' => $this->input->post('nama'),
				'slug' => $edit_slug
				));
		}

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$data['kategori'] = $this->general->read_by('kategori', 'position');
		$content['content'] = $this->load->view('admin/kategori', $data, true);
		$content['title'] = 'Kategori - Administrator';
		$content['btn'] = 'kategori';
		$content['sortable'] = 1;
		$this->load->view('layout/admin_template', $content);
		$this->general->reload('admin/kategori', array('del', 'del-all', 'add', 'edit'));
	}
}