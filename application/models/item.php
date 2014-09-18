<?php

class Item extends CI_Model {
	// Mengambil item dari database sebanyak $num mulai dari $start
	function get_items($num, $start=0) {
		$this->db->select()->from('items')->order_by('tanggal', 'desc')->limit($num,$start);
		$query = $this->db->get();

		return $query->result_array();
	}

	// Mengambil single item dengan ID = $itemID
	function get_item($itemID) {
		$this->db->select()->from('items')->where('itemID', $itemID)->order_by('tanggal', 'desc');
		$query = $this->db->get();
		
		return $query->first_row('array');
	}

	// Menampilkan banyak item di database
	function get_items_count() {
		$this->db->select('itemID')->from('items');
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	// Menyisipkan item ke database
	function insert_item($data) {
		$this->db->insert('items', $data);
		return $this->db->insert_id();
	}

	// Mengupdate item dengan id=$itemID ke database
	function update_item($itemID, $data) {
		$this->db->where('itemID', $itemID);
		$this->db->update('items', $data);
	}

	// Menghapus item dengan id=$item ke database
	function delete_item($itemID) {
		$this->db->where('itemID', $itemID);
		$this->db->delete('items');
	}
}