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

        public function proses() {
            $inputan = $this->input->post(null, TRUE);
            $this->sale_m->add_parent_sale($inputan);

            for($i = 0; $i < count($inputan['hidden_item_id']); $i++) {
                $params = array(
                    'item_id'      => $inputan['hidden_item_id'][$i],
                    'item_harga'   => $inputan['hidden_item_harga'][$i],
                    'item_qty'     => $inputan['hidden_item_qty'][$i],
                    'item_total'   => $inputan['hidden_item_total'][$i],
                    'sale_invoice' => $inputan['sale_invoice'],
                );
                $this->sale_m->add_detail_sale($params);

                $this->item_m->update_stock_out($inputan['hidden_item_qty'][$i], $inputan['hidden_item_id'][$i]);
            }
        }
    }
?>