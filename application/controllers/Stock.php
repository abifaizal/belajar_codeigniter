<?php 
	class Stock extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model(['supplier_m', 'item_m', 'stock_m']);
		}

		public function stock_in_data() {
			$data['header'] = 'Data stock masuk';
        	$data['aktif_page'] = 'stock_in_data';
        	$daftar_stock_in = $this->stock_m->get_stock_in();
        	$data['stock_in'] = $daftar_stock_in;
            $this->template->load('template', 'transaksi/stock_in/stock_in_data.php', $data);
		}

		public function stock_out_data() {
			$data['header'] = 'Data stock keluar';
        	$data['aktif_page'] = 'stock_out_data';
        	$daftar_stock_out = $this->stock_m->get_stock_out();
        	$data['stock_out'] = $daftar_stock_out;
            $this->template->load('template', 'transaksi/stock_out/stock_out_data.php', $data);
		}

		public function stock_in_add() {
			$data['header'] = 'Form stock masuk';
        	$data['aktif_page'] = 'stock_in_form';

        	$supplier = $this->supplier_m->get();
            $data['supplier'] = $supplier;

            $item = $this->item_m->get();
            $data['item'] = $item;

            $this->template->load('template', 'transaksi/stock_in/stock_in_form.php', $data);
		}

		public function stock_out_add() {
			$data['header'] = 'Form stock keluar';
        	$data['aktif_page'] = 'stock_in_form';

            $item = $this->item_m->get(null, 'stock_out');
            $data['item'] = $item;

            $this->template->load('template', 'transaksi/stock_out/stock_out_form.php', $data);
		}

		public function proses() {
			$inputan = $this->input->post(null, TRUE);

        	if(isset($_POST['submit_stock_in'])) {
        		$this->stock_m->add_stock_in($inputan);
        		$this->item_m->update_stock_in($inputan['stock_qty'], $inputan['item_id']);
        		if($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'Data telah tersimpan');
	            }
	            redirect('stock/in');
        	}

        	if(isset($_POST['submit_stock_out'])) {
        		$initial_stock = $this->item_m->get($inputan['item_id'])->row()->item_stok;
        		if($inputan['stock_qty'] > $initial_stock) {
        			$this->session->set_flashdata('error', 'Jumlah stok keluar melebihi jumlah stok tersedia');
        			redirect('stock/out/add');
        		} else {
	        		$this->stock_m->add_stock_out($inputan);
	        		$this->item_m->update_stock_out($inputan['stock_qty'], $inputan['item_id']);
	        		if($this->db->affected_rows() > 0) {
		                $this->session->set_flashdata('success', 'Data telah tersimpan');
		            }
		            redirect('stock/out');
		        }
        	}
		}

		public function stock_in_del() {
			$stock_id = $this->input->post('stock_id');
			$row = $this->stock_m->get($stock_id)->row();
			$item_id = $row->item_id;
			$stock_qty = $row->stock_qty;
			$inputan = array('item_id' => $item_id, 'stock_qty' => $stock_qty);

			$this->item_m->update_stock_out($inputan['stock_qty'], $inputan['item_id']);
			$this->stock_m->del($stock_id);

			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah terhapus');
            }
			redirect('stock/in');
		}

		public function stock_out_del() {
			$stock_id = $this->input->post('stock_id');
			$row = $this->stock_m->get($stock_id)->row();
			$item_id = $row->item_id;
			$stock_qty = $row->stock_qty;
			$inputan = array('item_id' => $item_id, 'stock_qty' => $stock_qty);

			$this->item_m->update_stock_in($inputan['stock_qty'], $inputan['item_id']);
			$this->stock_m->del($stock_id);

			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah terhapus');
            }
			redirect('stock/out');
		}
	}
 ?>