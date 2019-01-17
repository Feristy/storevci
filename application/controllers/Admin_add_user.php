<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_add_user extends CI_Controller {

	public function view($id = '')
	{
		$valid_name = array(
				array(
						'field' => 'name',
						'label' => 'name',
						'rules' => 'required|min_length[3]|is_unique[user.username]',
						'errors' => array(
	                        	'required' => 'Nama pengguna harus diisi.',
	                        	'min_length' => 'Nama pengguna minimal 3 digit.',
	                        	'is_unique' => 'Nama pengguna sudah ada.'
                        	)
					)
			);

		$valid_pass = array(
				array(
						'field' => 'pass',
						'label' => 'pass',
						'rules' => 'required|min_length[4]',
						'errors' => array(
								'required' => 'Password harus diisi.',
								'min_length' => 'Password minimal 3 digit.'
							)
					),
				array(
						'field' => 'confirm',
						'label' => 'confirm',
						'rules' => 'matches[pass]',
						'errors' => array('matches' => 'Password konfrimasi anda tidak sama.')
					)
			);

		if($this->input->post('add')){
			$this->form_validation->set_rules($valid_name);
			$this->form_validation->set_rules($valid_pass);
			if ($this->form_validation->run() == TRUE){
				$this->db->insert('user', array(
						'username' => $this->input->post('name'),
						'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'alamat' => $this->input->post('alamat'),
						'gender' => $this->input->post('gender'),
						'about' => $this->input->post('about'),
						'gambar' => $this->input->post('gambar')
					));
				$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil menambah pengguna baru.</div>';
				set_cookie('msg', $msg, 1);
			}else{
				$msg = validation_errors('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
				set_cookie('msg', $msg, 1);
			}
		}

		$user = $this->general->read('user', array('id' => $id));

		if($this->input->post('edit')){
			if($this->input->post('name') != $user->username){
				$this->form_validation->set_rules($valid_name);
			}

			if(!empty($this->input->post('last'))){
				$this->form_validation->set_rules($valid_pass);
			}

			if ($this->form_validation->run() == TRUE){
				$this->db->where('id', $id);
				$this->db->update('user', array(
						'username' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'alamat' => $this->input->post('alamat'),
						'gender' => $this->input->post('gender'),
						'about' => $this->input->post('about'),
						'gambar' => $this->input->post('gambar')
					));

				if(!empty($this->input->post('last'))){
					if(password_verify($this->input->post('last'), $user->password)){
						$this->db->where('id', $id);
						$this->db->update('user', array('password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)));
					}else{
						$pass_msg = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password lama anda salah.</div>';
						$msg = $pass_msg;
						set_cookie('msg', $msg, 1);
					}
				}

				if(empty($pass_msg)){
					$msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil mengrubah data pengguna.</div>';
					set_cookie('msg', $msg, 1);
				}
			}else{
				$msg = validation_errors('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
				set_cookie('msg', $msg, 1);
			}
		}

		$data['user'] = $user;
		$data['id'] = $id;
		$select = 'selected="selected"';
		$data['gender'] = $user->gender == 'Laki - Laki' ? $select: '';
		$data['gender1'] = $user->gender == 'Perempuan' ? $select: '';
		$data['gambar_user'] = $this->general->read('gambar', array('id' => $user->gambar));
		$data['gambar'] = $this->general->read('gambar');
		$data['title1'] = !empty($id) ? 'Edit Pengguna': 'Tambah Pengguna';
		$data['msg'] = $this->input->cookie('msg');
		$data['submit'] = !empty($id) ? 'edit': 'add';
		$data['title_submit'] = !empty($id) ? 'Edit': 'Tambah';
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$content['content'] = $this->load->view('admin/add-user', $data, true);
		$title = 'Pengguna - Administrator';
		$content['title'] = !empty($id) ? 'Edit '.$title: 'Tambah '.$title;
		$content['btn'] = 'user';
		$this->load->view('layout/admin_template', $content);
		$id = !empty($id) ? $id: $this->general->last('user')->id;
		$this->general->reload('admin/edit-pengguna/'.$id, array('add', 'edit'));
	}
}