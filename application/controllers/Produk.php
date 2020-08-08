<?php 
    class Produk extends CI_Controller {
        public function index() {
        	cek_belum_login();
        	$data['header'] = 'Data Produk';
            $this->template->load('template', 'produk/produk_data', $data);
        }
    }
?>