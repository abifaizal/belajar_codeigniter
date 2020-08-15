<?php 
	class Stock extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			// $this->load->model(['item_m', 'category_m', 'unit_m']);
		}

		public function stock_in_data() {
			$data['header'] = 'Data stock masuk';
        	$data['aktif_page'] = 'stock_in_data';
            $this->template->load('template', 'transaksi/stock_in/stock_in_data.php', $data);
		}

		public function stock_in_add() {
			$data['header'] = 'Form stock masuk';
        	$data['aktif_page'] = 'stock_in_form';
            $this->template->load('template', 'transaksi/stock_in/stock_in_form.php', $data);
		}
	}
 ?>