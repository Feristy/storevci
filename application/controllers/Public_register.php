<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_register extends CI_Controller {

	public function index()
	{
		$valid = array(
				array(
						'field' => 'name',
						'label' => 'name',
						'rules' => 'required|min_length[3]|is_unique[user.username]',
						'errors' => array(
								'required' => 'Nama pengguna harus diisi.',
	                        	'min_length' => 'Nama pengguna minimal 3 digit.',
	                        	'is_unique' => 'Nama pengguna sudah ada.'
							)
					),
				array(
						'field' => 'email',
						'label' => 'email',
						'rules' => 'required|is_unique[user.email]',
						'errors' => array(
								'required' => 'Email harus diisi.',
								'is_unique' => 'Email sudah digunakan.'
							)
					),
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

		if($this->input->post('submit')){
			$this->form_validation->set_rules($valid);
			if($this->form_validation->run() == TRUE){
				$this->db->insert('user', array(
						'username' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)
					));
				$user = $this->general->read('user', array('username' => $this->input->post('name')));
				$this->session->set_userdata('user', $user->id);
				redirect(site_url());
			}else{
				$msg = validation_errors('<div class="alert alert-sign alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
				set_cookie('msg', $msg, 1);
			}
		}

		$data['msg'] = $this->input->cookie('msg');
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		$content['content'] = $this->load->view('public/register', $data, true);
		$content['title'] = 'Sign Up - Feya Store';
		$this->load->view('layout/public_template', $content);
		$this->general->reload('register', array('submit'));
	}
}