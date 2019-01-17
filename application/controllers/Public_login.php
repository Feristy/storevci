<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_login extends CI_Controller {

	public function index()
	{
		if($this->input->post('submit')){
			$username = $this->general->read('user', array('username' => $this->input->post('name')));
			$email = $this->general->read('user', array('email' => $this->input->post('name')));
			if(!empty($username) || !empty($email)){
				$user = $username.$email;
				if(password_verify($this->input->post('pass'), $user->password)){
					$this->session->set_userdata('user', $user->id);
					redirect(site_url());
				}else{
					$msg = '<div class="alert alert-sign alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Password</strong> anda salah.</div>';
				}
			}else{
				$msg = '<div class="alert alert-sign alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Username</strong> atau <strong>Email</strong> anda tidak falid.</div>';
			}

			set_cookie('msg', $msg, 1);
		}

		$data['msg'] = $this->input->cookie('msg');
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );
		$content['content'] = $this->load->view('public/login', $data, true);
		$content['title'] = 'Sign in - Feya Store';
		$this->load->view('layout/public_template', $content);
		$this->general->reload('login', array('submit'));
	}
}