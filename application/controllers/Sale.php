<?php 
    class Sale extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			// $this->load->model('category_m');
		}

        public function index() {
        	$data['header'] = 'Transaksi penjualan';
        	$data['aktif_page'] = 'penjualan_form';
        	// $data['daftar_category'] = $this->category_m->get();
            $this->template->load('template', 'transaksi/sale/sale_form', $data);
        }
    }
?>