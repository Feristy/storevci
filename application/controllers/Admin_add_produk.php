<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_add_produk extends CI_Controller {

	public function view($id = '')
	{
		if($this->input->post('add')){
			$this->db->insert('produk', array(
					'nama' => $this->input->post('name'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok'),
					'gambar' => $this->input->post('gambar'),
					'kategori' => $this->input->post('kategori'),
					'diskon' => $this->input->post('diskon'),
					'deskripsi' => $this->input->post('tentang')
				));	
			$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil menambah produk baru.</div>';
			set_cookie('msg', $msg, 1);
		}

		if($this->input->post('edit')){
			$this->db->where('id', $id);
			$this->db->update('produk', array(
					'nama' => $this->input->post('name'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok'),
					'gambar' => $this->input->post('gambar'),
					'kategori' => $this->input->post('kategori'),
					'diskon' => $this->input->post('diskon'),
					'deskripsi' => $this->input->post('tentang')
				));	
			$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil memperbarui produk.</div>';
			set_cookie('msg', $msg, 1);
		}

		$produk = $this->general->read('produk', array('id' => $id));
		$gambar = explode(',', @$produk->gambar);
		$gambar_produk = [];
		foreach ($gambar as $gambar_id) {
			$gambar_produk[] = $this->general->read('gambar', array('id' => $gambar_id));
		}
		
		$data['gambar_produk'] = !empty($produk->gambar) ? $gambar_produk: null;
		$data['produk'] = $produk;
		$data['gambar'] = $this->general->read('gambar');
		$data['kategori'] = $this->general->read('kategori');
		$data['title1'] = !empty($id) ? 'Edit Pengguna': 'Tambah';
		$data['msg'] = $this->input->cookie('msg');
		$data['submit'] = !empty($id) ? 'edit': 'add';
		$data['title_submit'] = !empty($id) ? 'Edit': 'Tambah';
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$content['content'] = $this->load->view('admin/add-produk', $data, true);
		$title = 'Produk - Administrator';
		$content['title'] = !empty($id) ? 'Edit '.$title: 'Tambah '.$title;
		$content['btn'] = 'produk';
		$this->load->view('layout/admin_template', $content);
		$id = !empty($id) ? $id: $this->general->last('produk')->id;
		$this->general->reload('admin/edit-produk/'.@$id, array('add', 'edit'));
	}
}
