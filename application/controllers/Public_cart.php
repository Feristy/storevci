<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_cart extends CI_Controller {

	public function view($id = '')
	{
		// if(!empty($id)){
		// 	if(empty($this->session->userdata('cart'))){
		// 		$id_cart = time();
		// 		$this->db->insert('cart', array(
		// 				'id_cart' => $id_cart,
		// 				''
		// 			));
		// 	}else{
		// 		$id_produk = $this->general->read('cart', array('id_cart' => $this->session->userdata('cart')))->id_produk;
		// 		$produk = explode(',', $id_produk);

		// 		$this->db->where('id_cart', $this->session->userdata('cart'));
		// 		$this->db->update('cart', array('id_produk' => ));
		// 	}
		// }

		// $sd = array(
		// 		'indomie' => array('count' => 2, 'harga' => 2000),
		// 		'mie sedap' => array('count' => 3, 'harga' => 2300)
		// 	);
		$sd = array(
				array('name' => 'indomie', 'count' => 2, 'harga' => 2300),
				array('name' => 'mie sedap', 'count' => 4, 'harga' => 4000)
			);
		$sd = json_encode($sd);
		$dd = json_decode($sd);
		var_dump($dd[0]->name);

		$data['sign'] = $this->general->read('user', array('id' => $this->session->userdata('user')));
		$data['produk'] = $this->general->read_by('produk');
		$content['content'] = $this->load->view('public/cart', $data, true);
		$content['title'] = 'Shopping Cart - Feya Store';
		$this->load->view('layout/public_template', $content);
	}
}