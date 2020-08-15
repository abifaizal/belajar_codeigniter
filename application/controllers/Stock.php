<?php 
	class Stock extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model(['supplier_m']);
		}

		public function stock_in_data() {
			$data['header'] = 'Data stock masuk';
        	$data['aktif_page'] = 'stock_in_data';
            $this->template->load('template', 'transaksi/stock_in/stock_in_data.php', $data);
		}

		public function stock_in_add() {
			$data['header'] = 'Form stock masuk';
        	$data['aktif_page'] = 'stock_in_form';
        	$supplier = $this->supplier_m->get();
            $data['supplier'] = $supplier;
            $this->template->load('template', 'transaksi/stock_in/stock_in_form.php', $data);
		}
	}
 ?>