<?php

class User Extends CI_Model {

	// Membuat user baru
	function create_user($data) {
		$this->db->insert('users', $data);

		return $this->db->insert_id();
	}

	// Method Login
	function login($username, $password) {
		$where = array(
			'username' => $username,
			'password' => sha1($password)
		);

		$this->db->select()->from('users')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	// Mendapatkan informasi keranjang belanja user dengan id = $userID
	function get_cart($userID) {
		$json = array();
		$this->db->select()->from('users')->where('userID', $userID);
		$query = $this->db->get();
		$json = $query->result_array()[0]['cart'];
		return $json;
	}

	// Menambahkan item dengan id = $itemID ke keranjang user dengan id = $userID
	function add_to_cart($userID, $itemID) {
		$json = array();
		$this->db->select()->from('users')->where('userID', $userID);
		$query = $this->db->get();
		$data = $query->result_array()[0];
		$json = $query->result_array()[0]['cart'];
		$json = json_decode($json);
		array_push($json, $itemID);
		$data['cart'] = json_encode($json);
		$this->db->where('userID', $userID);
		$this->db->update('users', $data);
	}

	// Mengosongkan keranjang user dengan id = $userID
	function empty_cart($userID) {
		$this->db->select()->from('users')->where('userID', $userID);
		$query = $this->db->get();
		$data  = $query->result_array()[0];
		$data['cart'] = '[]';
		$this->db->where('userID', $userID);
		$this->db->update('users', $data);

	}
}