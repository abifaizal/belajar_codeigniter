<?php 
    class Sale extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
            $this->load->model(['sale_m', 'item_m', 'customer_m']);
			// $this->load->model('category_m');
		}

        public function index() {
        	$data['header'] = 'Transaksi penjualan';
        	$data['aktif_page'] = 'penjualan_form';

            $item = $this->item_m->get(null, 'stock_out');
            $data['item'] = $item;

            $customer = $this->customer_m->get()->result();
            $data['customer'] = $customer;

            $invoice_number = $this->sale_m->get_sale_number();
            $data['invoice_number'] = $invoice_number;

            $this->template->load('template', 'transaksi/sale/sale_form', $data);
        }
    }
?>