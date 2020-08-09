<?php 
    class Item extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model('item_m');
            $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data item';
            $data['aktif_menu'] = 'item';
        	$data['aktif_page'] = 'item_data';
        	$data['daftar_item'] = $this->item_m->get();
            $this->template->load('template', 'produk/item/item_data', $data);
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah item';
            $data['aktif_menu'] = 'item';
        	$data['aktif_page'] = 'item_tambah';

        	$item = new stdClass();
        	$item->item_id = null;
            $item->item_barcode = null;
            $item->item_nama = null;
            $item->category_id = null;
            $item->unit_id = null;
        	$item->item_harga = null;
            $item->item_stok = null;
        	$data['row'] = $item;

            $this->template->load('template', 'produk/item/item_form', $data);
        }

        public function edit($id) {
        	$data['header'] = 'Form Edit item';
            $data['aktif_menu'] = 'item';
        	$data['aktif_page'] = 'item_edit';
        	
        	$query = $this->item_m->get($id);
            if($query->num_rows() > 0) {
               $data['row'] = $query->row();
               $this->template->load('template', 'produk/item/item_form', $data);
            } else {
                echo "<script>
                            alert('Maaf, data tidak ditemukan');
                            window.location='".site_url('item')."';
                        </script>";
            }
        }

        public function del() {
            $item_id = $this->input->post('item_id');
            $this->item_m->del($item_id);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah terhapus');
            }
            redirect('item');
        }

        public function proses() {
        	$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['item_tambah'])) {
        		$this->item_m->add($inputan);
        	}
        	if(isset($_POST['item_edit'])) {
        		$this->item_m->edit($inputan);
        	}

        	if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah tersimpan');
            }
            redirect('item');
        }
    }
?>