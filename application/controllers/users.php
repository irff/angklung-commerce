<?php

class Users Extends CI_Controller {

	// Controller login user
	function login() {
		$data['error'] = 0;
		if($_POST) {
			$this->load->model('user');
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			$user = $this->user->login($username, $password);

			if(!$user) {
				$data['error'] = 1;
			} else {
				$this->session->set_userdata('userID', $user['userID']);
				$this->session->set_userdata('user_type', $user['user_type']);
				$this->session->set_userdata('username', $user['username']);
				redirect(base_url().'items');
			}
		}

		$this->load->view('header');
		$this->load->view('login', $data);
		$this->load->view('footer');
	}

	// Controller register user
	function register() {
		if($_POST) {
			$data=array(
				'username' => $_POST['username'],
				'password' => sha1($_POST['password']),
				'email' => $_POST['email'],
				'user_type' => 'buyer',
				);
			$this->load->model('user');
			$userID = $this->user->create_user($data);
			$this->session->set_userdata('userID', $userID);
			$this->session->set_userdata('user_type', $data['user_type']);
			$this->session->set_userdata('username', $data['username']);
			redirect(base_url().'items');
		}
		$this->load->view('header');
		$this->load->view('register_user');
		$this->load->view('footer');
	}

	// Controller Logout user
	function logout() {
		$this->session->sess_destroy();
		redirect(base_url().'items');
	}

	// Mendapatkan informasi apa yang ada di keranjang user dengan id = $userID
	function get_cart($userID) {
		$this->load->model('user');
		$this->load->model('item');
		$cart = $this->user->get_cart($userID);
		$cart = json_decode($cart);
		$data['cart'] = array();
		if(is_array($cart)) {
			foreach($cart as $item) {
				$barang = $this->item->get_item($item);
				array_push($data['cart'], $barang);
			}			
		}
		$this->load->view('header');
		$this->load->view('lihat_keranjang', $data);
		$this->load->view('footer');
	}

	// Kontroller menambahkan barang dengan id = $itemID ke keranjang user dengan id = $userID
	function add_to_cart($userID, $itemID) {
		$this->load->model('user');
		$this->user->add_to_cart($userID, $itemID);
		redirect(base_url());
	}

	// Kontroller mengosongkan keranjang user dengan id = $userID
	function empty_cart($userID) {
		$this->load->model('user');
		$this->user->empty_cart($userID);
		redirect(base_url());
	}
}