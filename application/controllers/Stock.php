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

		public function stock_in_add() {
			$data['header'] = 'Form stock masuk';
        	$data['aktif_page'] = 'stock_in_form';

        	$supplier = $this->supplier_m->get();
            $data['supplier'] = $supplier;

            $item = $this->item_m->get();
            $data['item'] = $item;

            $this->template->load('template', 'transaksi/stock_in/stock_in_form.php', $data);
		}

		public function proses() {
			$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['submit_stock_in'])) {
        		$this->stock_m->add_stock_in($inputan);
        		$this->item_m->update_stock_in($inputan);
        		if($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'Data telah tersimpan');
	            }
	            redirect('stock/in');
        	}
        	if(isset($_POST['submit_stock_out'])) {
        		$this->stock_m->add_stock_out($inputan);
        	}
		}
	}
 ?>