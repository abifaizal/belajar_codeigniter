<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('buku_m');
	}

	public function index()
	{
		$query = $this->buku_m->get();
		$data['header'] = "Tampil Data Buku";
		$data['buku'] = $query->result();

		$this->load->view('buku_tampil', $data);
	}

	public function add()
	{
		$data['header'] = "Tambah Data Buku";
		$this->load->view('buku_tambah', $data);
	}

	public function edit($id = null)
	{
		$query = $this->buku_m->get($id);
		$data['header'] = "Edit Data Buku";
		$data['buku'] = $query->row();

		$this->load->view('buku_edit', $data);
	}

	public function delete($id = null)
	{
		// echo $id;
		$this->buku_m->delete($id);
		redirect('buku');
	}

	public function proses()
	{
		if(isset($_POST['simpan_buku'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->buku_m->add($inputan);
		}
		else if(isset($_POST['edit_buku'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->buku_m->edit($inputan);
		}

		redirect('buku');
	}

}