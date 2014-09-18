<?php

class Items extends CI_Controller {
	//Konstruktor
	function __construct() {
		parent::__construct();
		$this->load->model('item');
	}

	// Controller halaman depan
	function index($start = 0) {
		$data['items'] = $this->item->get_items(12, $start);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'items/index';
		$config['total_rows'] = $this->item->get_items_count();
		$config['per_page'] = 12;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$this->load->view('header');
		$this->load->view('item_index', $data);
		$this->load->view('footer');
	}

	// Controller untuk single item dengan id = $itemID
	function item($itemID) {
		$data['item'] = $this->item->get_item($itemID);
		$this->load->view('header');
		$this->load->view('item', $data);
		$this->load->view('footer');
	}

	// Membuat item baru
	function new_item() {
		if(!$this->session->userdata('userID')) {
			redirect(base_url().'users/login');
		}
		if($_POST) {
			$data = array(
				'nama' => $_POST['nama'],
				'deskripsi' => $_POST['deskripsi'],
				'harga' => $_POST['harga'],
				'stok' => $_POST['stok'],
			);

			$ID = $this->item->insert_item($data);
			$folder ="files/";
			$config = array(
				'file_name'		=> $ID.'-'.$data['nama'],
				'upload_path'	=> 'files/',
				'allowed_types'	=> "jpg|png|jpeg|gif",
				'overwrite'		=> true,
				'max_size'		=> "2000KB"
			);

			$this->load->library('upload', $config);

			if($this->upload->do_upload('gambar')) {
				echo "berhasil";
			} else {
				echo "gagal";
				echo $this->upload->display_errors();
			}

			$this->load->database();
			$this->db->where('itemID', $ID);
			$this->db->update('items', array('gambar'=>$folder.($this->upload->data()['file_name'])));
			redirect(base_url());
		} else {
			$this->load->view('header');
			$this->load->view('new_item');
			$this->load->view('footer');
		}
	}

	// Mengedit item dengan id = $itemID
	function edit_item($itemID) {
		if(!$this->session->userdata('userID')) {
			redirect(base_url().'users/login');
		}

		$data['success'] = 0;
		if($_POST) {
			$data_item = array(
				'nama' => $_POST['nama'],
				'deskripsi' => $_POST['deskripsi'],
				'harga' => $_POST['harga'],
				'stok' => $_POST['stok'],
			);
			unset($data['success']);
			$this->item->update_item($itemID, $data_item);
			$data['success'] = 1;
		}

		$data['item'] = $this->item->get_item($itemID);
		$this->load->view('header');
		$this->load->view('edit_item', $data);
		$this->load->view('footer');

	}

	// Menghapus item dengan id = $itemID
	function delete_item($itemID) {
		if(!$this->session->userdata('userID')) {
			redirect(base_url().'users/login');
		}
		$this->item->delete_item($itemID);
		redirect(base_url());
	}
}