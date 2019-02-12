<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_cart extends CI_Controller {

	public function view($id = '')
	{
		//if(!empty($id)){
			//$produk = $this->general->read('produk', array('id' => $id));
			//if(!$this->session->has_userdata('cart')){
				// $s_produk = json_decode($this->session->userdata('cart'));
				// $s = count($s_produk);
				// $s_produk[$s] = array('user' => 1, 'produk' => $id, 'barang' => 1, 'harga' => $produk->harga);
			//}else{
				
			//}
			$dd = $this->session->userdata('cart');

			$dd = json_decode($dd);
			$d = count($dd);


			$dd[] = array(
				'user' => 1,
				'produk' => 2,
				'barang' => 1,
				'harga' => 2000
			);

			$ss = 

			$ss = json_encode($ss);

			//$this->session->set_userdata('cart', $ss);
			var_dump();
		//}

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
			    );

		$content['content'] = $this->load->view('public/cart', $data, true);
		$content['title'] = 'Shopping Cart - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}